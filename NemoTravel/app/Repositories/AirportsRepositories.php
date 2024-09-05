<?php

namespace App\Repositories;

use App\Models\Airports;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class AirportsRepositories extends Repository
{
    public function getPaginated(array $params = []): Collection
    {
        $query = Airports::query();
        $query = $this->applyFilter($query, $params);
        $query = $this->applyOrder($query, $params);
        $query = $this->applyPagination($query, $params);

        return $query->get();
    }

    public function count(array $params): int
    {
        $query = Airports::query();
        $query = $this->applyFilter($query, $params);

        return $query->count();
    }

    private function applyFilter(Builder $query, array $params = []): Builder
    {
        if (isset($params['code'])) {
            $query->where('code', 'ilike', $params['code'] . '%');
        }

        if (isset($params['area'])) {
            $query->where('area', 'ilike', $params['area'] . '%');
        }


        if (isset($params['country'])) {
            $query->where('country', 'ilike', $params['country'] . '%');
        }

        if (isset($params['cityName'])) {
            $query->where('cityName_ru', 'ilike', '%' . $params['cityName'] . '%')
                ->orWhere('cityName_en', 'ilike', '%' . $params['cityName'] . '%');
        }

        if (isset($params['filter'])) {
            $query->where('cityName_ru', 'ilike', '%' . $params['cityName'] . '%')
                ->orWhere('cityName_en', 'ilike', '%' . $params['cityName'] . '%')
                ->orWhere('airportName_ru', 'ilike', '%' . $params['airportName'] . '%')
                ->orWhere('airportName_en', 'ilike', '%' . $params['airportName'] . '%');
        }

        if (isset($params['airportName'])) {
            $query->where('airportName_ru', 'ilike', '%' . $params['airportName'] . '%')
                ->orWhere('airportName_en', 'ilike', '%' . $params['airportName'] . '%');
        }

        return $query;
    }
}
