<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $id = \App\Models\Sensor::create([
            'plant_name'     => 'Panel1',
            'plant_type'     => 'Panel',
            'sensor'    => 'bmp280_1',
        ])->id;
        \App\Models\SetPoint::create([
            'sensor_id' => $id,
            'warning'   => 30,
            'danger'    => 33
        ]);

        $id = \App\Models\Sensor::create([
            'plant_name'     => 'Panel1',
            'plant_type'     => 'Panel',
            'sensor'    => 'bmp280_2',
        ])->id;
        \App\Models\SetPoint::create([
            'sensor_id' => $id,
            'warning'   => 30,
            'danger'    => 33
        ]);

        $id = \App\Models\Sensor::create([
            'plant_name'     => 'Panel1',
            'plant_type'     => 'Panel',
            'sensor'    => 'bmp280_3',
        ])->id;
        \App\Models\SetPoint::create([
            'sensor_id' => $id,
            'warning'   => 30,
            'danger'    => 33
        ]);

        \App\Models\Sensor::create([
            'plant_name'     => 'Motor1',
            'plant_type'     => 'Motor',
            'sensor'    => 'adxl',
        ]);

        $id = \App\Models\Sensor::create([
            'plant_name'     => 'Motor1',
            'plant_type'     => 'Motor',
            'sensor'    => 'mlx',
        ])->id;
        \App\Models\SetPoint::create([
            'sensor_id' => $id,
            'warning'   => 28,
            'danger'    => 31
        ]);

        $id = \App\Models\Sensor::create([
            'plant_name'     => 'Motor1',
            'plant_type'     => 'Motor',
            'sensor'    => 'pzem',
        ])->id;
        \App\Models\SetPoint::create([
            'sensor_id' => $id,
            'warning'   => 0.09,
            'danger'    => 0.11
        ]);

        // \App\Models\Temperature::factory(15)->create();
    }
}
