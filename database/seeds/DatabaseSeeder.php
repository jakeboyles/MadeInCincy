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

        Category::create(['id'=>1,'type' => 'Company']);
        Category::create(['id'=>2,'type' => 'Accelerator']);
        Category::create(['id'=>3,'type' => 'VC']);
        Category::create(['id'=>4,'type' => 'University']);
        Category::create(['id'=>5,'type' => 'Coworking Space']);
    }

}
