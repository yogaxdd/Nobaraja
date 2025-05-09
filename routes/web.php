<?php

use Illuminate\Http\Request;
use App\Models\Film;

Route::get('/', function (Request $request) {
    $query = Film::query();

    if ($request->filled('search')) {
        $query->where('judul', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('genre')) {
        $query->where('genre', $request->genre);
    }

    $films = $query->latest()->paginate(12);
    return view('home', compact('films'));
});

Route::get('/film/{id}', function ($id) {
    $film = \App\Models\Film::find($id);
    if (!$film) {
        abort(404, 'Film tidak ditemukan.');
    }
    return view('film', compact('film'));
});
