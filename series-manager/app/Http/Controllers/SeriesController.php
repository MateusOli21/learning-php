<?php

namespace App\Http\Controllers;

class SeriesController extends Controller {
    public function index(){
        $series = [
            'serie um',
            'serie dois',
            'serie três',
        ];

        return view('index', ['series' => $series]);
    }

    public function create(){
        return view('createSerie');
    }
}
