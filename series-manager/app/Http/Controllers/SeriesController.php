<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller {
    public function index(){
        $series = Serie::query()->orderBy('name')->get();

        return view('index', ['series' => $series]);
    }

    public function create(){
        return view('createSerie');
    }

    public function store(Request $request){
        $name = $request->get('name');

        Serie::create([
            'name' => $name
        ]);

        return redirect('/');
    }
}
