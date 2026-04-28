<?php

namespace App\Http\Controllers;

use App\Models\content;
use App\Models\genre;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $content = content::where('title','LIKE','%'.$request->get('search').'%')->get();
        } else {
            $content = content::all();
        }
        $genre = genre::all();
        return view('content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = genre::all();
        return view('content.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|min:3',
            'genre_id'      => 'required|',
            'description'   => 'required|min:3',
            'duration'      => 'required|',
            'cover'         => 'required|file|mimes:jpg,png,jpeg|max:2480',
            'file'          => 'required|file|mimes:mp4,avi,mov|max:24800',
            'release_date'  => 'required|',
            'age_rating'    => 'required|min:3',
        ]);

        //membuat file cover 
        $cover = $request->file('cover');
        $namecover = "cover_" . time() . "." . $cover->getClientOriginalExtension();
        $coverdir = 'uploads/cover';
        $cover->move($coverdir, $namecover);

        //membuat file vidio
        $file = $request->file('file');
        $namefile = "file_" . time() . "." . $file->getClientOriginalExtension();
        $filedir = 'uploads/film';
        $file->move($filedir, $namefile);

        $data = [
            'title'         => $request->title,
            'genre_id'      => $request->genre_id,
            'description'   => $request->description,
            'file'          => $namefile,
            'duration'      => $request->duration,
            'cover'         => $namecover,
            'release_date'  => $request->release_date,
            'age_rating'    => $request->age_rating,
        ];

        content::create($data);
        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(content $content)
    {
        return view('content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(content $content)
    {
        $genre = genre::all();
        return view('content.edit', compact('content', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, content $content)
    {
        $request->validate([
            'title'         => 'required|min:3',
            'genre_id'      => 'required|',
            'description'   => 'required|min:3',
            'duration'      => 'required|',
            'cover'         => 'required|file|mimes:jpg,png,jpeg|max:2480',
            'file'          => 'required|file|mimes:mp4,avi,mov|max:24800',
            'release_date'  => 'required|',
            'age_rating'    => 'required|min:3',
        ]);

        //membuat file cover P
        $cover = $request->file('cover');
        $namecover = "cover_" . time() . "." . $cover->getClientOriginalExtension();
        $coverdir = 'uploads/cover';
        $cover->move($coverdir, $namecover);

        //membuat file vidio
        $file = $request->file('file');
        $namefile = "file_" . time() . "." . $file->getClientOriginalExtension();
        $filedir = 'uploads/film';
        $file->move($filedir, $namefile);

        $data = [
            'title'         => $request->title,
            'genre_id'      => $request->genre_id,
            'description'   => $request->description,
            'file'          => $namefile,
            'duration'      => $request->duration,
            'cover'         => $namecover,
            'release_date'  => $request->release_date,
            'age_rating'    => $request->age_rating,
        ];

        $content->update($data);
        return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(content $content)
    {
        $content->delete();
        return redirect()->route('content.index');
    }
}
