<?php

namespace App\Repositories;

use App\Models\Courier;
use Illuminate\Pagination\LengthAwarePaginator;

class CourierRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(private Courier $courier)
    {}

    public function getCouriers() : LengthAwarePaginator {
        $couriers = $this->courier->orderBy('full_name', 'asc')->paginate(7);

        return $couriers;
    }

    public function getCourierById(string $id) : Courier {
        $courier = $this->courier->find($id, ["*"]);

        return $courier;
    }

    public function storeOrUpdateCourier(array $request, ?string $id = null) {
        if ($id) {
            $courier = $this->courier->findOrFail($id);
            $courier->update($request);
            return $courier;
        }

        $courier = $this->courier->create($request);

        return $courier;
    }

    public function deleteCourier(string $id) : Courier {
        $courier = $this->courier->delete($id);

        return $courier;
    }
}
