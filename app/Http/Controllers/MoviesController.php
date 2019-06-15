<?php

namespace App\Http\Controllers;
use \App\movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Welcome to movie database';
        return view('movies.index')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
	    $nm = new movie;
	    $nm->naslov = $data['naslov'];
	    $nm->godina = $data['godina'];
	    $nm->certifikat = $data['certifikat'];
        $nm->trajanje_u_min = $data['trajanje_u_min'];
        $nm->opis = $data['opis'];
        $nm->zanr_id = $data['zanr_id'];
        $nm->oskari = $data['oskari'];
        $nm->slika = $data['slika'];
	    $nm->save();
	    return redirect()->action('MoviesController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('movies.show')->with('movie',Movie::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m = movie::find($id);
	    $m->delete();
        return redirect()->action('MoviesController@create');
    }
}
