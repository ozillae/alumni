<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }

    public function listCity(Request $request)
    {
        $result = array();
        $prov = Province::where('code', $request->get('id'))->first();
        if($prov != null) {
            $model = City::where('province', $prov->code)->orderBy('name')->get();

            $result['data'] = $model;
            $result['status'] = 'OK';
        } else {
            $result['data'] = [];
            $result['status'] = 'Failed';
        }

        return response()->json($result);
    }
}
