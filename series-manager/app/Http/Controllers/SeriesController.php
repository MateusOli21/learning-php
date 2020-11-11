<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Season;
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

        /**
         * @var Serie $serie
         */
        $serie = Serie::create([
            'name' => $name
        ]);

        $numberOfSeasons = $request->number_seasons;
        $numberOfEpisodes = $request->number_episodes;

        for ($i = 1; $i <= $numberOfSeasons ; $i++) {

            /**
             * @var Season $season
             */
            $season = $serie->seasons()->create(['number' => $i]);

            for ($index = 1; $index <= $numberOfEpisodes ; $index++) {
                $season->episodes()->create(['number' => $index]);
            }
        }

        return redirect('/');
    }

    public function delete(Request $request){
        Serie::destroy($request->id);

        return redirect('/');
    }
}
