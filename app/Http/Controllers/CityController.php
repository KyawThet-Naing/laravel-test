<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\utils\Message;
use Exception;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $city = City::all();
            return Message::success($city, "new data created");
        } catch (Exception $e) {
            return Message::error($e->getMessage());
        }
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $city = new City();
            $city->name = $request->name;
            $city->population = $request->population;
            $city->save();
            $city = City::find($city)->first();


            return Message::success($request->status, "new data created");
        } catch (Exception $e) {
            return Message::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        try {

            $city = City::find($city->id);

            if ($city == NULL) {
                throw new Exception("City not found!");
            }



            return Message::success("city", "city details");
        } catch (Exception $e) {
            return Message::error($e->getMessage());
        }
        //
    }

    public function getDetail(Request $req)
    {
        try {

            $city = City::find($req->id);

            if ($city == NULL) {
                throw new Exception("City not found!");
            }

            return Message::success($city, "city details");
        } catch (Exception $e) {
            return Message::error($e->getMessage());
        }
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
