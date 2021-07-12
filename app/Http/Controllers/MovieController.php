<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'movies' => Movie::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('add-movie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        // Upload poster
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posters');
            $movie->poster = $path;
        }
        $movie->title = $request->title;
        $movie->publishing_date = $request->publishing_date;
        $movie->save();

        return \redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie, $id)
    {
        return view('movie', ['movie' => $this->getOne($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie, $id)
    {
        return \view('edit-movie', ['movie' => $this->getOne($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie, $id)
    {
        $movie = Movie::find($id);
        // Upload poster
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posters');
            $movie->poster = $path;
        }
        $movie->title = $request->title;
        $movie->publishing_date = $request->publishing_date;
        $movie->save();

        return \redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie, $id)
    {
        Movie::findOrFail($id)->delete();


        return \redirect()->route('home');
    }

    private function getOne($id)
    {
        return Movie::with('comments')->find($id);
    }
}
