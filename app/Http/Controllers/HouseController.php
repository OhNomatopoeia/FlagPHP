<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::get();
        return view('house.index',[
            'houses' => $houses
        ]);
    }

    public function store(Request $request)
    {
       $this->validate($request, [
           'rooms' => 'required',
           'bathrooms' => 'required',
           'area' => 'required',
           'price' => 'required',
       ]);

       $request->user()->house()->create([
            'rooms' => $request->rooms,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'price' => $request->price
       ]);

       return back();
    }
}
