<?php

use App\Http\Controllers\API\MotorController;
use App\Http\Controllers\API\PanelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(PanelController::class)->group(function () {
  Route::get('panel_sensor', 'index');
  Route::get('panel_sensor/{sensor:plant_name}', 'show');
  Route::get('panel_sensor/{sensor:plant_name}/temperature', 'get_temperature');
  Route::post('panel_sensor/temperature', 'post_temperature');

  Route::get('panel_sensor/{sensor:plant_name}/monitoring', 'sensor_monitoring');
});

Route::controller(MotorController::class)->group(function () {
  Route::get('motor_sensor', 'index');
  Route::get('motor_sensor/{sensor:plant_name}', 'show');
  Route::get('motor_sensor/{sensor:plant_name}/temperature', 'get_temperature');
  Route::post('motor_sensor/temperature', 'post_temperature');
  Route::get('motor_sensor/{sensor:plant_name}/vibration', 'get_vibration');
  Route::post('motor_sensor/vibration', 'post_vibration');
  Route::get('motor_sensor/{sensor:plant_name}/current', 'get_current');
  Route::post('motor_sensor/current', 'post_current');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
