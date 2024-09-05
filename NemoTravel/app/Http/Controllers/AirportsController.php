<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\AirportResource;
use App\Models\Airports;
use App\Services\AirportsService;
use Illuminate\Http\JsonResponse;

class AirportsController extends Controller
{
    public function __construct(public AirportsService $service)
    {
    }

    public function getPaginated(IndexRequest $request): JsonResponse
    {
        return self::response(function () use ($request) {
            return $this->service->getPaginated($request->validated());
        });
    }

    public function show(Airports $airport): JsonResponse
    {
        return self::response(function () use ($airport) {
            return AirportResource::make($airport);
        });
    }

    public function create(CreateRequest $request): JsonResponse
    {
        return self::response(function () use ($request) {
            return $this->service->create($request->validated());
        });
    }

    public function update(Airports $airport, UpdateRequest $request): JsonResponse
    {
        return self::response(function () use ($airport, $request) {
            return $this->service->update($airport, $request->validated());
        });
    }

    public function delete(Airports $airport): JsonResponse
    {
        return self::response(function () use ($airport) {
            return $this->service->delete($airport);
        });
    }
}
