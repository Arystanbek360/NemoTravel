<?php

namespace App\Services;

use App\Http\Resources\AirportResource;
use App\Models\Airports;
use App\Repositories\AirportsRepositories;

class AirportsService
{
    public function __construct(public AirportsRepositories $repository)
    {
    }

    public function getPaginated(array $params): array
    {
        return [
            'list'  => AirportResource::collection($this->repository->getPaginated($params)),
            'count' => $this->repository->count($params),
        ];
    }

    public function create(array $data): array
    {
        return [
            'message' => __('airport.create'),
            'region'  => new AirportResource(Airports::create($data)),
        ];
    }

    public function update(Airports $activity, array $data): array
    {
        $activity->update($data);

        return [
            'message' => __('airport.update'),
            'region'  => new AirportResource($activity),
        ];
    }

    public function delete(Airports $activity): array
    {
        $activity->delete();
        return [
            'message' => __('airport.delete'),
        ];
    }
}
