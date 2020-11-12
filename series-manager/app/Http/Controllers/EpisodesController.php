<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller{
    public function index(int $id){
        /**
         * @var Season $season
         */
        $season = Season::find($id);

        $episodes = $season->episodes;

        return view('episodes', compact('episodes', 'season'));
    }

    public function store(int $id, Request $request){
        $watchedEpisodes = $request->episodes;

        /**
         * @var Season $season
         */
        $season = Season::find($id);

        $season->episodes->each(function(Episode $episode) use($watchedEpisodes){
            $episode->watched = in_array($episode->id, $watchedEpisodes);
        });

        $season->push();

        return redirect()->back();
    }
}
