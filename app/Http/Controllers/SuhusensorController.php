<?php

namespace App\Http\Controllers;

use App\Models\suhusensor;
use Illuminate\Http\Request;

class SuhusensorController extends Controller
{
    public function index()
    {
        $sensors = suhusensor::all();
        return response()->json($sensors);
    }
    public function index_view()
    {
        return view('admin.suhu.index');
    }

    public function store(Request $request)
    {
        $sensor = suhusensor::create($request->all());
        return response()->json($sensor, 201);
    }

    public function show(suhusensor $sensor)
    {
        return response()->json($sensor);
    }

    public function update(Request $request, suhusensor $sensor)
    {
        $sensor->update($request->all());
        return response()->json($sensor);
    }

    public function destroy(suhusensor $sensor)
    {
        $sensor->delete();
        return response()->json(null, 204);
    }
}
