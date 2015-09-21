<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Job;

class JobsSeeder extends Seeder {

    public function run()
    {
        DB::table('jobs')->delete();
    }

}
