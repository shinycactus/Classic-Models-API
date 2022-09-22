<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Models\Office;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class OfficeController extends Controller
{
    use ResponseTrait;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $offices['offices'] = Office::all();
            return $this->formatResponse(true, $offices);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfficeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeRequest $request)
    {
        //
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $office['office'] = Office::with('employees')->findOrFail($id);
            return $this->formatResponse(true, $office);
        } catch (\Exception $e) {
            return $this->formatResponse(false, $e->getMessage());
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeRequest  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeRequest $request, Office $office)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }
}
