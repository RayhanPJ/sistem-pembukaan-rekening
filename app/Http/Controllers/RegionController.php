<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getProvinces()
    {
        $provinces = Province::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $provinces
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function getRegencyByProvincyId(string $id)
    {
        $regency = Regency::where('province_id', $id)->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $regency
        ], 200);
    }
    /**
     * Display the specified resource.
     */
    public function getDistrictByRegencyId(string $id)
    {
        $district = District::where('regency_id', $id)->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $district
        ], 200);
    }
    /**
     * Display the specified resource.
     */
    public function getVillageByDistrictId(string $id)
    {
        $village = Village::where('district_id', $id)->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $village
        ], 200);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
