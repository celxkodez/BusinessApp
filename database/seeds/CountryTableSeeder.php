<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = json_decode(
            file_get_contents(__DIR__ . '/countries.json'), 
            true
        );

        collect($countries)->each(function($country){
            DB::table('countries')->insert([
                'capital'=>$country['capital'] ?? '',
                'full_name'=>$country['full_name'] ?? '',
                'name'=>$country['name'],
                'country_code'=>$country['country-code'] ?? '',
                'currency'=>$country['currency'] ?? '',
                'currency_code'=>$country['currency_code'] ?? '',
                'currency_sub_unit'=>$country['currency_sub_unit'] ?? '',
                'calling_code'=>$country['calling_code'] ?? '',
                'currency_symbol'=>$country['currency_symbol'] ?? ''
            ]);
        });
    }
}
