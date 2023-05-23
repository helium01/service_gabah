<?php

namespace App\Http\Controllers;

use App\Models\pirsensor;
use Illuminate\Http\Request;

class pirsensorController extends Controller
{
    public function index()
    {
        $sensors = pirsensor::all();
        return response()->json($sensors);
    }
    public function index_view()
    {
        return view('admin.pir.index');
    }

    public function store(Request $request)
    {
        $sensor = pirsensor::create($request->all());
        return response()->json($sensor, 201);
    }

    public function show(pirsensor $sensor)
    {
        return response()->json($sensor);
    }

    public function update(Request $request, pirsensor $sensor)
    {
        $sensor->update($request->all());
        return response()->json($sensor);
    }

    public function destroy(pirsensor $sensor)
    {
        $sensor->delete();
        return response()->json(null, 204);
    }
}
