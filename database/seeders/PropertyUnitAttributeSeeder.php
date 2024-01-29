<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use UnitTypes\Models\UnitType;
use UnitTypes\Models\UnitTypeAttribute;
use UnitTypes\Models\UnitTypeTranslation;

class PropertyUnitAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // UnitType::truncate();
        $unit_types= [
            'Apartment' => 'شقة',
            'Roof' => 'رووف',
            'Villa' => 'فيلا',
            'Triplex Villa' => 'فيلا تربلكس',
            'Duplex' => 'دوبلكس',
            'Floor' => 'دور',
            'Town House' => 'تاون هاوس',
            'Building' => 'بناية - عمارة',
            'Pent House' => 'Pent House',
            'Land' => 'أرض',
            'Shop' => 'محل',
            'Office' => 'مكتب',
        ];
        foreach ($unit_types as $en => $ar) {
            $data = [
                'status' => 1,
                'sort' => 1,
                'image' => 'https://placehold.co/400x400',
                'en' => [
                    'unit_type_name' => $en,
                ],
                'ar' => [
                    'unit_type_name' => $ar,
                ]
            ];
            $unit_check = UnitType::whereTranslationLike('unit_type_name','%'.$en.'%')->first();
            if ($unit_check == null) {
                $unit = UnitType::create($data);
            }else{
                $unit = UnitType::where('id',$unit_check->unit_type_id)->first();
            }
            if ($en == 'Apartment') {
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_apartments[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_apartments as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }
            
            if ($en == 'Roof') {
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Maid Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Driver Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Laundry Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Store Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Parking',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_roofs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_roofs as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }

            if ($en == 'Villa') {
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Number of floors',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Living Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                $unit_type_attributes_villas[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Roof',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Roof',
                    ])
                ];
                foreach ($unit_type_attributes_villas as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }

            if ($en == 'Triplex Villa') {
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Living Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Maid Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Driver Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Laundry Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Store Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Parking',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_triplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_triplexs as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }
            
            if ($en == 'Duplex') {
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Maid Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Driver Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Laundry Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Store Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Parking',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_duplexs[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_duplexs as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }

            if ($en == 'Floor') {
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_floors[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_floors as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }

            if ($en == 'Town House') {
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Number of floors',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Living Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Maid Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Driver Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Laundry Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Store Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Parking',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_towns[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_towns as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }
            
            if ($en == 'Building') {
                $unit_type_attributes_buildings[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Number of floors',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_buildings[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Number of Flats',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_buildings[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Rent Value',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_buildings[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_buildings[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_buildings[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_buildings as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }

            if ($en == 'Pent House') {
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Number of Bedrooms',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Master bedroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Bathroom',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Maid Room',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Unit',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Space',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Furnished',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'Furnished',
                        'Unfurnished',
                        'Semi-furnished'
                    ])
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for nationalities',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'All Nationalities',
                        'Only for Kuwaitis',
                        'Only for Expats',
                        'Only for Westerners'
                    ])
                ];
                $unit_type_attributes_pents[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Available for',
                    'type' => 'dropdown',
                    'attribute_data' => json_encode([
                        'For Families',
                        'for singles',
                    ])
                ];
                foreach ($unit_type_attributes_pents as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }
            
            if ($en == 'Land') {
                $unit_type_attributes_lands[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Plot',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                foreach ($unit_type_attributes_lands as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }

            if ($en == 'Shop') {
                $unit_type_attributes_shops[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Plot',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                foreach ($unit_type_attributes_shops as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }

            if ($en == 'Office') {
                $unit_type_attributes_offices[] = [
                    'unit_type_id' => $unit->id,
                    'name' => 'Plot',
                    'type' => 'text',
                    'attribute_data' => null
                ];
                foreach ($unit_type_attributes_offices as $attr) {
                    UnitTypeAttribute::create($attr);
                }
            }
        }
    }
}
