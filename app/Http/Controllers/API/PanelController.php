<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Models\Temperature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PanelController extends Controller
{
    public function index()
    {
        $data = Sensor::where("plant_type", "Panel")->get();

        if (!$data) {
            return ApiFormatter::createApi(400, 'Failed fetching data');
        }
        return ApiFormatter::createApi(200, 'Success fetching data', $data);
    }

    public function show(Sensor $sensor)
    {
        $data = Sensor::where('plant_name', $sensor->plant_name)->with('setPoint')->get();

        if (!$data) {
            return ApiFormatter::createApi(400, 'Failed fetching data');
        }
        return ApiFormatter::createApi(200, 'Success fetching data', $data);
    }

    public function get_temperature(Sensor $sensor)
    {
        $data = Sensor::where('plant_name', $sensor->plant_name)->with('temperature')->get();

        if (!$data) {
            return ApiFormatter::createApi(400, 'Failed fetching data');
        }
        return ApiFormatter::createApi(200, 'Success fetching data', $data);
    }

    public function post_temperature(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sensor_id'     => 'required',
            'temperature'   => 'required',
            'pressure'      => 'required'
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(400, 'Bad Request', $validator->messages());
        }
        $validated = $validator->validated();
        Temperature::create($validated);
        return ApiFormatter::createApi(201, 'Data stored', $validated);
    }
}
