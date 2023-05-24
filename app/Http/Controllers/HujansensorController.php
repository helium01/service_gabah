<?php

namespace App\Http\Controllers;

use App\Models\hujansensor;
use Illuminate\Http\Request;

class HujansensorController extends Controller
{
    public function index()
    {
        $sensors = hujansensor::orderBy('created_at', 'desc')->limit(10)->get();
        $sensor = hujansensor::orderBy('created_at', 'desc')->limit(1)->get();
        if ($sensor->count() == 0) {
            $keadaan = "tidak ada data";
        }
        foreach ($sensor as $dt) {
            if ($dt->node >= 4) {
                $keadaan = "terdapat manusia atau hewan";
            } else {
                $keadaan = "tidak terdapat manusia atau hewan";
            }
        }
        return response()->json([
            'data' => $sensors,
            'keadaan' => $keadaan
        ]);
    }
    public function index_view()
    {
        return view('admin.hujan.index');
    }

    public function store(Request $request)
    {
        $sensor = hujansensor::create($request->all());
        return response()->json($sensor, 201);
    }

    public function show(hujansensor $sensor)
    {
        return response()->json($sensor);
    }

    public function update(Request $request, hujansensor $sensor)
    {
        $sensor->update($request->all());
        return response()->json($sensor);
    }

    public function destroy(hujansensor $sensor)
    {
        $sensor->delete();
        return response()->json(null, 204);
    }
}
