<?php

namespace App\Services;

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

    public function storeOrUpdateCourier($request, $id = null, $method = null) : void {
        $this->courierRepository->storeOrUpdateCourier($request, $id, $method);
    }

    public function deleteCourier($id) : void {
        $this->courierRepository->deleteCourier($id);
    }
}
