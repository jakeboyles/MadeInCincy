<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Company;

class CompaniesSeeder extends Seeder {

    public function run()
    {
        DB::table('companies')->delete();
        Eloquent::unguard();

        Company::insert([
            [
                'id'=> 1,
                'lat' => "39.114025",
                'long' => "-84.513890",
                'name' => "RoadTrippers",
                'description' => "Roadtrippers HQ",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.roadtrippers.com",
                'category_id' => 1
            ],
            [
                'id'=> 2,
                'lat' => "39.110624",
                'long' => "-84.515660",
                'name' => "Cintrifuse",
                'description' => "Cintrifuse HQ",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.cintrifuse.com",
                'category_id' => 5
            ],
            [
                'id'=> 3,
                'lat' => "39.110624",
                'long' => "-84.515660",
                'name' => "Brandery",
                'description' => "The Brandery",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.brandery.com",
                'category_id' => 2
            ],
            [
                'id'=> 4,
                'lat' => "39.1100127",
                'long' => "-84.5206703",
                'name' => "Choremonster",
                'description' => "Choremonster HQ",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.choremonster.com",
                'category_id' => 1
            ],
            [
                'id'=> 5,
                'lat' => "39.1108908",
                'long' => "-84.5157333",
                'name' => "SQRL",
                'description' => "SQRL HQ",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.getsqrl.com",
                'category_id' => 1
            ],
            [
                'id'=> 6,
                'lat' => "39.109615",
                'long' => "-84.516514",
                'name' => "Frameri",
                'description' => "Frameri retail location",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.frameri.com",
                'category_id' => 1
            ],
            [
                'id'=> 7,
                'lat' => "39.1286862",
                'long' => "-84.4307708",
                'name' => "Ahalogy",
                'description' => "Ahalogy HQ",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.ahalogy.com",
                'category_id' => 1
            ],
            [
                'id'=> 8,
                'lat' => "39.1150377",
                'long' => "-84.5199733",
                'name' => "Modulus",
                'description' => "Modulus HQ",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.modulus.com",
                'category_id' => 1
            ],
            [
                'id'=> 9,
                'lat' => "39.0955948",
                'long' => "-84.523511",
                'name' => "Dotloop",
                'description' => "Dotloop HQ",
                'status' => 1,
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00",
                'url' => "http://www.dotloop.com",
                'category_id' => 1
            ],
            [
                'id'=> 15,
                'lat' => "39.104971",
                'long' => "-84.511328",
                'name' => "Differential",
                'description' => "Meteor.js development",
                'status' => 1,
                'created_at' => "2015-09-17 08:15:01",
                'updated_at' => "2015-09-17 08:15:01",
                'url' => "http://www.differential.com",
                'category_id' => 1
            ]
        ]);
    }

}