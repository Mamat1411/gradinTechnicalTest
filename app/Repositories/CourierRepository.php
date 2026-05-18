<?php

namespace App\Repositories;

use App\Models\Courier;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function storeOrUpdateCourier(array $request, $id = null, $method = null) : void {
        if (request()->method() == 'PUT' || request()->method() == 'PATCH') {
            if (!$this->courier->whereId($id)->first()) {
                throw new ModelNotFoundException;
            }

            $this->courier->updateOrCreate(
                ['id' => $id],
                $request
            );
        }
    }

    public function deleteCourier(string $id) : void {
        $this->courier->delete($id);
    }
}
