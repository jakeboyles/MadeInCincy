<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Category::create(['type' => 'Company']);
        Category::create(['type' => 'Accelerator']);
        Category::create(['type' => 'VC']);
    }

}
