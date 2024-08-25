<?php

namespace App\Jobs;

use App\Models\Competitions;
use App\Models\Countries;
use App\Models\Sports;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CollectGames implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = "https://webws.365scores.com/web/games/allscores";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $return = curl_exec($ch);
        curl_close($ch);

        $return = json_decode($return);

        foreach ($return->sports as $sport){
            $teste = Sports::where('id_365_score', '=', $sport->id)->first();

            if (empty($teste)){
                $new_sport = [
                    'name' => $sport->name,
                    'name_for_url' => $sport->nameForURL,
                    'id_365_score' => $sport->id
                ];
                Sports::create($new_sport);
            }
        }

        foreach ($return->countries as $country){
            $teste = Countries::where('id_365_score', '=', $country->id)->first();

            if (empty($teste)){
                $new_country = [
                    'id_365_score' => $country->id,
                    'name' => $country->name,
                    'total_games' => !empty($country->totalGames) ? $country->totalGames : null,
                    'live_games' => !empty($country->liveGames) ? $country->liveGames :null,
                    'name_for_url' => $country->nameForURL
                ];
                Countries::create($new_country);
            }
        }

        foreach ($return->competitions as $competition){
            $testeDb = Competitions::where('id_365_score', '=', $competition->id)->first();

            if(empty($testeDb)){
                $new_competition = [
                    'id_365_score' => $competition->id,
                    'countryId' => $competition->countryId,
                    'sportId' => $competition->sportId,
                    'name' => $competition->name
                ];
                Competitions::create($new_competition);
            }
        }

        echo 'Finalizado';
    }
}
