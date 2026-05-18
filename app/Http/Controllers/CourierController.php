<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourierRequest;
use App\Http\Resources\CourierResource;
use App\Models\Courier;
use App\Services\CourierService;
use Illuminate\Support\Facades\DB;

class CourierController extends Controller
{
    public function __construct(private CourierService $courierService)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $couriers = $this->courierService->getCouriers();
            $response = CourierResource::collection($couriers);

            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => "failed",
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourierRequest $request)
    {
        $validatedData = $request->validated();

        DB::beginTransaction();
        try {
            $response = $this->courierService->storeOrUpdateCourier($validatedData);
            DB::commit();

            return response()->json([
                "status" => 201,
                "message" => "success",
                "data" => new CourierResource($response)
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => 500,
                "message" => "failed"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Courier $courier)
    {
        try {
            $response = $this->courierService->findCourierById($courier->id);
            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => new CourierResource($response),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => "failed",
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourierRequest $request, Courier $courier)
    {
        $validatedData = $request->validated();

        DB::beginTransaction();
        try {
            $response = $this->courierService->storeOrUpdateCourier($validatedData, $courier->id);
            DB::commit();

            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => new CourierResource($response)
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => 500,
                "message" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courier $courier)
    {
        try {
            $this->courierService->deleteCourier($courier->id);
            return response()->json([
                "status" => 200,
                "message" => "success",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => "failed",
            ], 500);
        }
    }
}
