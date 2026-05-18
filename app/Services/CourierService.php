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

    public function getCouriers(?array $search = null) {
        $couriers = $this->courierRepository->getCouriers($search);

        return $couriers;
    }

    public function findCourierById(string $id) : Courier {
        $courier = $this->courierRepository->getCourierById($id);

        return $courier;
    }

    public function storeOrUpdateCourier(array $request, ?string $id = null) {
        $courier = $this->courierRepository->storeOrUpdateCourier($request, $id);

        return $courier;
    }

    public function deleteCourier(string $id) {
        $courier = $this->courierRepository->deleteCourier($id);

        return $courier;
    }
}
