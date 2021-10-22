@extends('layouts.app')

@section('content')

    <div class="show-container">
        <div class="show-box container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $apt->title }}</h4>
                            <span>{{$apt->address}}</span>
                        </div>
                        <div class="tools-edit-charts">
                            <a href="{{ route('userApartments.edit', $apt) }}"><i class="far fa-edit"></i></i></a>
                            <a href="{{ route('statistics', $apt->id) }}"><i class="far fa-chart-bar"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="show-gallery row my-5">
                <div class="col-6">
                    <div class="show-thumbnail">
                    </div>
                </div>
                <div class="col-6">
                    <div class="side-pics"></div>
                    <div class="side-pics"></div>
                    <div class="side-pics"></div>
                    <div class="side-pics"></div>
                </div>
            </div>
            <div class="bio row my-5">
                <div class="bio-left col-8">
                <div>Descrizione: {{$apt->summary}}</div>
                </div>
                <div class="bio-right col-4">
                    <div>
                        <ul>
                            <li class="price"><span>€{{$apt->price}} / notte</span></li>
                            <li><span>Numero di ospiti: {{$apt->guests_n}}</span></li>
                            <li><span>Numero di stanze: {{$apt->rooms_n}}</span></li>
                            <li><span>Numero di letti: {{$apt->beds_n}}</span></li>
                            <li><span>Numero di bagni: {{$apt->bathrooms_n}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="show-services row my-5">
                <div class="services-box col-6">
                    <span>Servizi inclusi</span>
                    <ul>
                        @foreach ($apt->service as $service)
                            <li>{{$service->service_name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12 mb-3">
                    @if ($sponsored == null)
                    <div class="row">
                        <div class="col-4">
                            <div class="no-sponsor">
                                <h4>Non hai nessuna sponsorizzazione su questo appartamento  <i class="fas fa-frown" style="vertical-align: middle"></i></h4>
                                <h4 class="mt-1">Sponsorizzalo ora per metterlo in evidenza!</h4>
                                <img src="{{ asset('image/arrow.png') }}" alt="Arrow">
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="show-sponsor row">
                                @foreach ($sponsorships as $sponsorship)
                                    <div class="bla col-4">
                                        <form action="{{route('sponsorship')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <h4>{{$sponsorship->type}}</h4>
                                            <h4>€ {{$sponsorship->cost_sponsorship}}</h4>
                                            <h5>Sponsorizza il tuo appartamento per {{$sponsorship->duration}} ore</h5>
                                            <input type="hidden" name="apartment_id" value="{{$apt->id}}">
                                            <input type="hidden" name="cost_sponsorship" value="{{$sponsorship->cost_sponsorship}}">
                                            <input type="hidden" name="sponsorship_id" value="{{$sponsorship->id}}">
                                            @csrf
                                            @method('GET')
                                            <input type="submit" class="btn-acquista" value="Acquista">
                                        </form>
                                    </div>
                                @endforeach  
                            </div>
                        </div>

                    </div>
                    @else
                        <div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @foreach ($apt->sponsorship as $thisAptSponsorship)
                                <h4>L'appartamento ha la sponsorizzazione {{ $thisAptSponsorship->type }}.</h4>
                                <div>Scadenza sponsorizzazione: il {{$sponsored->format('d-M-Y')}} alle ore {{$sponsored->format('H:m')}}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="show-message">
                <h3><i class="fas fa-inbox"></i> Casella messaggi</h3>

                @if ($messages->isEmpty())
                    <h5 class="mt-2">Non hai ancora nessun messaggio!</h5>
                @else 

                <table class="messages-container">
                    <thead>
                        <tr>
                            <th class="table-name">Nome</th>
                            <th class="table-name">Cognome</th>
                            <th class="table-name">Email</th>
                            <th class="table-name">Messaggio</th>
                            <th class="table-name">Mandato il</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="message-name">{{$sender->first_name}}</td>
                            <td class="message-name">{{$sender->last_name}}</td>
                            <td class="message-name">{{$sender->email}}</td>  
                            @foreach($messages as $msg)
                                <td class="message-name">{{$msg->content}}</td>
                                <td class="message-name">{{$msg->created_at}}</td>
                            @endforeach
                            </tr>
                    </tbody>
                </table>

                @endif

            </div>
                
        </div>
    </div>

@endsection
