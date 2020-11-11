<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller{
    public function index(int $id){
        $serie = Serie::find($id);

        $seasons = $serie->seasons;

        return view('seasons', compact('serie', 'seasons'));
    }
}
