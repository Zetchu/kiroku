<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function index(){
        $genres = Genre::all();

        return view("genre.index", compact("genres"));
    }

    public function show(int $id)
    {
        $genre = Genre::find($id);
        // get all the comments for a specific series that we loaded
//        $comments = Comments::where('series_id', $series->id)->get();

        return view('genre.show', compact('genre', ));
    }

    public function create(){
        return view('genre.create');
    }


    public function store(Request $request){
Genre::create([
    'name'=>request('name'),
]);
return redirect()->route('genre.index');
    }

    //

}
