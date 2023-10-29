<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department_models')->insert(
            [
                'department_name' => 'Buying Department',
                'floor' => '1',
                'unit' => '15',
                'building' => 'SKY TOWER',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ]
        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'Finance Department',
                'floor' => '2',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name 1',
                'city_name' => 'City name 1',
                'state_name' => 'State Name 1',
                'country' => 'Country Name 1',
                'zip_code' => '123456',
            ]
        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'IT Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'AC Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'TMNM Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'CMDJ Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'MNBT Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'MUE Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'WMWH Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'LMHT Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],
        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'FIFA Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'F88 Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
        DB::table('department_models')->insert(
            [
                'department_name' => 'HCM Department',
                'floor' => '3',
                'unit' => '15',
                'building' => 'SKY TOWER 1',
                'street_address' => '123 Street Name',
                'city_name' => 'City name',
                'state_name' => 'State Name',
                'country' => 'Country Name',
                'zip_code' => '123456',
            ],

        );
    }
}
