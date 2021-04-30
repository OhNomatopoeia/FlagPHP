<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseFavoriteController extends Controller
{
    public function store(House $house, Request $request)
    {
        
        $house->favorites()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
