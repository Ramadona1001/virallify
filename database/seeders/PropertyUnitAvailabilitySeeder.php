<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use UnitAvailability\Models\UnitAvailability;
use UnitAvailability\Models\UnitAvailabilityTranslation;

class PropertyUnitAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // UnitAvailability::truncate();
        $unit_availability = [
            'Rent' => 'للإيجار',
            'Sale' => 'بيع',
        ];
        foreach ($unit_availability as $en => $ar) {
            $data = [
                'status' => 1,
                'sort' => 1,
                'en' => [
                    'unit_availability_name' => $en,
                ],
                'ar' => [
                    'unit_availability_name' => $ar,
                ]
            ];
            if (UnitAvailabilityTranslation::where('unit_availability_name',$en)->first() == null) {
                $unit = UnitAvailability::create($data);
            }
            // if ($en == 'Rent') {
            //     $data = [
            //         'status' => 1,
            //         'sort' => 1,
            //         'en' => [
            //             'unit_availability_name' => $en,
            //         ],
            //         'ar' => [
            //             'unit_availability_name' => $ar,
            //         ]
            //     ];
            // }
        }
    }
}
