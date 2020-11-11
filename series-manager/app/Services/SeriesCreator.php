<?php

namespace App\Services;

use App\Season;
use App\Serie;
use Illuminate\Support\Facades\DB;

class SeriesCreator {
    public function createSerie(string $name, int $numberOfSeasons, int $numberOfEpisodes): Serie{

        DB::beginTransaction();
        $serie = Serie::create(['name' => $name]);
        $this->createSeasons($numberOfSeasons, $numberOfEpisodes, $serie);
        DB::commit();

        return $serie;
    }

    private function createSeasons(int $numberOfSeasons, int $numberOfEpisodes, Serie $serie){
        for ($i = 1; $i <= $numberOfSeasons ; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);

            $this->createEpisodes($numberOfEpisodes, $season);
        }

    }

    private function createEpisodes(int $numberOfEpisodes, Season $season){
        for ($index = 1; $index <= $numberOfEpisodes ; $index++) {
            $season->episodes()->create(['number' => $index]);
        }
    }
}
