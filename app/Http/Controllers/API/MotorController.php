<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Current;
use App\Models\Sensor;
use App\Models\Temperature;
use App\Models\Vibration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotorController extends Controller
{
    public function index()
    {
        $data = Sensor::where("plant_type", "Motor")->get();

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
        $data = Sensor::where('sensor', 'mlx')->where('plant_name', $sensor->plant_name)->with('setPoint')->get();

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
            'ambient'       => 'required'
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(400, 'Bad Request', $validator->messages());
        }
        $validated = $validator->validated();
        Temperature::create($validated);
        return ApiFormatter::createApi(201, 'Data stored', $validated);
    }

    public function get_vibration(Sensor $sensor)
    {
        $data = Sensor::where('sensor', 'adxl')->where('plant_name', $sensor->plant_name)->with('vibration')->get();

        if (!$data) {
            return ApiFormatter::createApi(400, 'Failed fetching data');
        }
        return ApiFormatter::createApi(200, 'Success fetching data', $data);
    }

    public function post_vibration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sensor_id' => 'required',
            'x_axis'    => 'required',
            'y_axis'    => 'required',
            'z_axis'    => 'required',
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(400, 'Bad Request', $validator->messages());
        }
        $validated = $validator->validated();
        Vibration::create($validated);
        return ApiFormatter::createApi(201, 'Data stored', $validated);
    }

    public function get_current(Sensor $sensor)
    {
        $data = Sensor::where('sensor', 'pzem')->where('plant_name', $sensor->plant_name)->with('setPoint')->get();

        if (!$data) {
            return ApiFormatter::createApi(400, 'Failed fetching data');
        }
        return ApiFormatter::createApi(200, 'Success fetching data', $data);
    }

    public function post_current(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sensor_id' => 'required',
            'volt'      => 'required',
            'ampere'    => 'required',
            'power'     => 'required'
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(400, 'Bad Request', $validator->messages());
        }
        $validated = $validator->validated();
        Current::create($validated);
        return ApiFormatter::createApi(201, 'Data stored', $validated);
    }
}
