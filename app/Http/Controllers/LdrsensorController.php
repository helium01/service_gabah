<?php

namespace App\Http\Controllers;

use App\Models\ldrsensor;
use Illuminate\Http\Request;

class LdrsensorController extends Controller
{
    public function index()
    {
        $sensors = ldrsensor::all();
        return response()->json($sensors);
    }
    public function index_view()
    {
        return view('admin.ldr.index');
    }

    public function store(Request $request)
    {
        $sensor = ldrsensor::create($request->all());
        return response()->json($sensor, 201);
    }

    public function show(ldrsensor $sensor)
    {
        return response()->json($sensor);
    }

    public function update(Request $request, ldrsensor $sensor)
    {
        $sensor->update($request->all());
        return response()->json($sensor);
    }

    public function destroy(ldrsensor $sensor)
    {
        $sensor->delete();
        return response()->json(null, 204);
    }
}
