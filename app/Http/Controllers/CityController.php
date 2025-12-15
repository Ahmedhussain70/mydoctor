<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function city()
    {
        $data = City::get();
        return view('admin.city.default', compact('data'));
    }

    public function add_city($id)
    {

        $data = City::find($id);
        return view('admin.city.savecity', compact('data', 'id'));
    }


    public function save_city(Request $request)
    {
        // return $request;
        if ($request->id == 0) {
            $data = new city();
        } else {
            $data = City::find($request->id);
        }

        $data->city_name = $request->city_name;
        $data->save();

        return redirect('backend/city');
    }

    public function delete_city($id)
    {
        $data = City::find($id);
        $data->delete();
        return redirect('backend/city');
    }
}
