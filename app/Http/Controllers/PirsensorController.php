<?php

namespace App\Http\Controllers;

use App\Models\pirsensor;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class pirsensorController extends Controller
{
    public function index()
    {
        $sensors = pirsensor::orderBy('created_at','desc')->limit(10)->get();
        $sensor = pirsensor::orderBy('created_at','desc')->limit(1)->get();
        if ($sensor->count() == 0) {
            $keadaan = "tidak ada data";
        }
        foreach ($sensor as $dt) {
            if ($dt->node < 1) {
                $keadaan = "terdapat manusia atau hewan";
            } else {
                $keadaan = "tidak terdapat manusia atau hewan";
            }
        }
        return response()->json([
            'data' => $sensors,
            'keadaan'=>$keadaan
        ]);
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
