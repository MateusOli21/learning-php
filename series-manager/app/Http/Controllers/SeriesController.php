<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request){
        $name = $request->get('name');

        Serie::create([
            'name' => $name
        ]);

        return redirect('/');
    }

    public function delete(Request $request){
        Serie::destroy($request->id);

        return redirect('/');
    }
}
