@extends('layouts.app')

@section('content')
    <div class="card-header">Unos novog filma</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="store">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNaslov">Naslov</label>
                        <input type="text" class="form-control" id="inputNaslov" name="naslov" placeholder="Naslov filma">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGodina">Godina</label>
                        <select class="form-control" id="inputGodina" name="godina">
                            <?php
                            for ($i=1900; $i<=date('Y'); $i++)
                            {
                                ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="certifikatId">Certifikat</label>
                            <select id="certifikatId" name="certifikat" class="form-control">
                    @php
                        $cert = DB::table('certifikat')->get();
                    @endphp
                            @foreach ($cert as $c)
                                <option value="{{ $c->certifikatID }}">{{ $c->certifikat }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTrajanje">Trajanje (min)</label>
                        <input type="text" class="form-control" id="inputTrajanje" name="trajanje_u_min" placeholder="Trajanje">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputOpis">Opis</label>
                    <textarea class="form-control" id="inputOpis" name="opis" rows="3"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="genre">Žanr</label>
                            <select id="genre" name="zanr_id" class="form-control">
                    @php
                        $genre = DB::table('zanr')->get();
                    @endphp
                            @foreach ($genre as $g)
                                <option value="{{ $g->id }}">{{ $g->naziv }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputOscars">Oskari</label>
                        <input type="text" class="form-control" name="oskari" id="inputOscars">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPicture">Odaberite sliku</label>
                    <input type="file" class="form-control-file" name="slika" id="inputPicture">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
                <br/>
                <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Slika</th>
                            <th scope="col">Naslov</th>
                            <th scope="col">Godina</th>
                            <th scope="col">Trajanje</th>
                            <th scope="col">Akcija</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $movie = DB::table('movies')->orderBy('naslov')->get();
                        @endphp
                                            
                        @foreach( $movie as $m )
                            <tr>
                            <td class="text-center align-middle"> @php print "<img src='images/".$m->slika."' height='250' width='185'>" @endphp </td>
                            <td class="align-middle"><a href="movies/show/{{ $m->id }}"> {{ $m->naslov }} </a></td>
                            <td class="text-center align-middle">{{ $m->godina }}</td>
                            <td class="text-center align-middle">{{ $m->trajanje_u_min }} min</td>
                            <td class="text-center align-middle"><a href="movies/destroy/{{ $m->id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Obriši</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </form>
        </div>          
@endsection
