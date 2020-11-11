<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\SeriesCreator;
use App\Services\SeriesRemover;
use Illuminate\Http\Request;

class SeriesController extends Controller {
    public function index(){
        $series = Serie::query()->orderBy('name')->get();

        return view('index', ['series' => $series]);
    }

    public function create(){
        return view('createSerie');
    }

    public function store(SeriesFormRequest $request, SeriesCreator $seriesCreator){
        $name = $request->get('name');
        $numberOfSeasons = $request->number_seasons;
        $numberOfEpisodes = $request->number_episodes;

        $seriesCreator->createSerie($name, $numberOfSeasons, $numberOfEpisodes);

        return redirect('/');
    }

    public function update(Request $request, int $id){
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }

    public function delete(Request $request, SeriesRemover $seriesRemover){
        $seriesRemover->deleteSerie($request->id);

        return redirect('/');
    }
}
