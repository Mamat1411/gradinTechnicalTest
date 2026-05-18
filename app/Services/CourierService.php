<?php

namespace App\Services;

use App\Models\Courier;
use App\Repositories\CourierRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CourierService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CourierRepository $courierRepository)
    {}

    public function getCouriers() :LengthAwarePaginator{
        $couriers = $this->courierRepository->getCouriers();

        return $couriers;
    }

    public function findCourierById(string $id) : Courier {
        $courier = $this->courierRepository->getCourierById($id);

        return $courier;
    }

    public function storeOrUpdateCourier($request, $id = null, $method = null) : void {
        $this->courierRepository->storeOrUpdateCourier($request, $id, $method);
    }

    public function deleteCourier(string $id) : void {
        $this->courierRepository->deleteCourier($id);
    }
}
