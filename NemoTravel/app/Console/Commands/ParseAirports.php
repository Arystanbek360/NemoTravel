<?php

namespace App\Console\Commands;

use App\Models\Airports;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ParseAirports extends Command
{
    protected $signature = 'app:parse-airports';

    protected $description = 'Command description';

    public function handle()
    {
        $airports = json_decode(Storage::get('airports.json'), true);

        foreach ($airports as $code => $airport) {
            $airportData = [
                'code'           => $code,
                'cityName_ru'    => $airport['cityName']['ru'],
                'cityName_en'    => $airport['cityName']['en'],
                'airportName_ru' => $airport['airportName']['ru'] ?? null,
                'airportName_en' => $airport['airportName']['en'] ?? null,
                'area'           => $airport['area'] ?? null,
                'country'        => $airport['country'],
                'lat'            => $airport['lat'] ?? null,
                'lng'            => $airport['lng'] ?? null,
                'timezone'       => $airport['timezone'],
            ];

            Airports::create($airportData);

            $this->info($airportData['code']);
        }

        $this->info('Успешно заполнились все аэропорты');
    }
}
