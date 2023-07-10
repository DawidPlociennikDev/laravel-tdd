<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::get();
        return new Response($movies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $fileName = $request->name . "." . $request->file('cover')->getClientOriginalExtension();

        $data = $request->validated();
        $request->file('cover')->storePubliclyAs("public/images", $fileName);

        $data['cover'] = asset("storage/images/$fileName");

        $movie = Movie::create($data);

        return new Response($movie);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $movie = Movie::findOrFail($id);

        return new Response($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->update($request->validated());

        if ($request->has('cover')) {
            $fileName = $request->name . "." . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storePubliclyAs("public/images", $fileName);
            $movie->update(['cover' => asset("storage/images/$fileName")]);
        }

        return new Response(['message' => "Successfully updated $movie->name"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return new Response(['message' => "Successfully removed $movie->name"]);
    }
}
