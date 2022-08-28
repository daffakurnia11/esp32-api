<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Models\Temperature;
use Carbon\Carbon;
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

    public function sensor_monitoring(Request $request, Sensor $sensor)
    {
        if (!$request->has('sensor')) {
            return ApiFormatter::createApi(400, 'Failed fetching data');
        }
        $numsensor = $request->input('sensor') - 1;
        $plant = Sensor::where('plant_name', $sensor->plant_name)->get()[$numsensor];
        $data = Temperature::where('sensor_id', $plant->id)->take(200)->latest()->get();

        if (!$data) {
            return ApiFormatter::createApi(400, 'Failed fetching data');
        }
        return ApiFormatter::createApi(200, 'Success fetching data', $data);
    }
}
