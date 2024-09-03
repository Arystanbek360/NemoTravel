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
        return $query;
    }
}
