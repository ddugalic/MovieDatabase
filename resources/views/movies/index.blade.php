@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        @php
            print "<span style='font-size: 20px;'>|&nbsp&nbsp</span>";
            $slova = range('A','Z');
			foreach($slova as $slovo){
                print "<span style='font-size: 20px;'><a href='?sl=".$slovo."%' >".$slovo."</a>	&nbsp|&nbsp&nbsp</span>";
            }
            if(isset($_GET["sl"])){
                $sl = $_GET["sl"];
                $movie = DB::table('movies')->where('naslov', 'like', $sl . '%')->orderBy('naslov')->get();
                foreach($movie as $m){
                    print "<br/><br/><img src='images/".$m->slika."' height='250' width='185'><br/>";
                    print "<a href='movies/show/$m->id'> $m->naslov </a>".
                    " ("
                    . $m->godina .
                    ") <br/>Trajanje: "
                    . $m->trajanje_u_min .
                    " min <br/><br/>";
                }
            }
        @endphp
        @if (Auth::user() && Auth::user()->role == 100 )
            <br/><br/>
            <a href="create" class="btn btn-primary btn-lg active" 
                role="button" aria-pressed="true">Dodaj novi film</a>
        @endif
    </div>
@endsection
