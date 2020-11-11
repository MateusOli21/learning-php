<?php

namespace App\Services;

use App\Episode;
use App\Season;
use App\Serie;
use Illuminate\Support\Facades\DB;

class SeriesRemover{
    public function deleteSerie(int $id){

        DB::beginTransaction();
        $serie = Serie::find($id);
        $this->deleteSeasons($serie);
        $serie->delete();
        DB::commit();
    }

    public function deleteSeasons(Serie $serie){
        $serie->seasons->each(function (Season $season){
            $this->deleteEpisodes($season);
            $season->delete();
        });
    }

    public function deleteEpisodes(Season $season){
        $season->episodes()->each(function (Episode $episode){
            $episode->delete();
        });
    }
}
