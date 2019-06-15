@extends('layouts.app')

@php
use \App\movie;
@endphp

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="/show/{{ $movie->id }}">
            @csrf
            <div class="text-center card-header"><h2>{{ $movie->naslov }}</h2></div>
            <br/>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <img src="{{ URL::to('images/'.$movie->slika.' ') }} "height='390' width='280' class="rounded float-left" alt="{{$movie->slika}}"><br/>
                    </div>
                    <div class="col-4 align-middle">
                        <br/>
                        <b>Godina izlaska:</b> {{ $movie->godina }} <br/>
                        <b>Dužina trajanja:</b> {{ $movie->trajanje_u_min}} min<br/>
                        @php
                            $cert = DB::table('certifikat')->get();
                        @endphp
                            @foreach ($cert as $c)
                                @if($movie->certifikat == $c->certifikatID )
                                   <b>Certifikat:</b> {{ $c->certifikat }} - {{$c->opis }}
                                @endif
                            @endforeach
                            <br/>
                        @php
                            $genre = DB::table('zanr')->get();
                        @endphp
                            @foreach ($genre as $g)
                                @if($movie->zanr_id == $g->id)
                                    <b>Žanr:</b> {{ $g->naziv }}
                                @endif
                            @endforeach
                        <br/>
                        <b>Osvojeno oskara:</b> {{ $movie->oskari }} <br/><br/>
                        <b>Priča:</b><br/>{{ $movie->opis }}
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
