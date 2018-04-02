<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Territory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TerritorySelectorController extends Controller
{
    public function returnDistricts(Request $request)
    {
        if ($request->ajax())
        {
            $territory = Territory::findOrFail($request->id);

            $districts = Territory::districts($territory)->get();

            return response()->json($districts);
        }
    }

    public function returnCities(Request $request)
    {
        if ($request->ajax())
        {
            $territory = Territory::findOrFail($request->id);

            $cities = Territory::cities($territory)->get();

            return response()->json($cities);
        }
    }
}
