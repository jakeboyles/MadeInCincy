<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('CategoriesSeeder');
        $this->call('CompaniesSeeder');
        $this->call('JobsSeeder');
    }

}