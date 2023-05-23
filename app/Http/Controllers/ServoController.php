<?php

namespace App\Http\Controllers;

use App\Models\servo;
use Illuminate\Http\Request;

class ServoController extends Controller
{
    public function index()
    {
        $sensors = servo::all();
        return response()->json($sensors);
    }
    public function index_view()
    {
        return view('admin.servo.index');
    }

    public function store(Request $request)
    {
        $sensor = servo::create($request->all());
        return response()->json($sensor, 201);
    }

    public function show(servo $sensor)
    {
        return response()->json($sensor);
    }

    public function update(Request $request, servo $sensor)
    {
        $sensor->update($request->all());
        return response()->json($sensor);
    }

    public function destroy(servo $sensor)
    {
        $sensor->delete();
        return response()->json(null, 204);
    }
}
