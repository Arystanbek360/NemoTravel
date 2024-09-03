<?php

namespace App\Repositories;

use App\Models\Deadline;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DeadlineRepository extends Repository
{
    public function getPaginated(array $params = []): Collection
    {
        $query = Deadline::query();
        $query = $this->applyFilter($query, $params);
        $query = $this->applyOrder($query, $params);
        $query = $this->applyPagination($query, $params);

        return $query->get();
    }

    public function count(array $params): int
    {
        $query = Deadline::query();
        $query = $this->applyFilter($query, $params);

        return $query->count();
    }

    private function applyFilter(Builder $query, array $params = []): Builder
    {
        //
        return $query;
    }
}
