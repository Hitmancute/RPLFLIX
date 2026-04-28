<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $genre = genre::where('genre_title','LIKE','%'.$request->get('search').'%')->get();
        }else{
            $genre = genre::all();
        }
        return view('genre.index',compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre_title'     => 'required|min:3',
            'desription'      => 'required|min:3'
        ]);

        $data = [
            'genre_title'     => $request->genre_title,
            'desription'      => $request->desription
        ];

        genre::create($data);
        return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(genre $genre)
    {
        return view('genre.create',compact('genre'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, genre $genre)
    {
        $request->validate([
            'genre_title'     => 'required|min:3',
            'desription'      => 'required|min:3'
        ]);

        $data = [
            'genre_title'     => $request->genre_title,
            'desription'      => $request->desription
        ];

        $genre->update($data);
        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }
}
