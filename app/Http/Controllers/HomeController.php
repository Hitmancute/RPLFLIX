<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\content;
use App\Models\genre;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $content = content::where('title', 'LIKE', '%' . $request->get('search') . '%')->get();
        } elseif ($request->get('genre')) {
            $content = content::where('genre_id', $request->get('genre'))->get();
        } else {
            $content = content::all();
        }
        $genre = genre::all();
        return view('dashboard.member', compact('content', 'genre'));
    }
}
