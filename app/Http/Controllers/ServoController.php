<?php

namespace App\Http\Controllers;

use App\Models\servo;
use Illuminate\Http\Request;

class ServoController extends Controller
{
    public function index()
    {
        $sensors = servo::all();
        return response()->json([
            'data' => $sensors
        ]);
    }
    public function index_view()
    {
        $sensors = servo::find(1);
        return view('admin.servo.index',compact('sensors'));
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
        if ($sensor->status == 1) {
            $sensor->update([
                'status' => 0
            ]);
        } else {
            $sensor->update([
                'status' => 1
            ]);
        }
        return redirect('/servo/view');
    }

    public function destroy(servo $sensor)
    {
        $sensor->delete();
        return response()->json(null, 204);
    }
}
