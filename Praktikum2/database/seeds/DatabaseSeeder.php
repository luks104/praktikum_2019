<?php

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
        $this->call('TableSeeder');
        $this->command->info('Tables seeded!');
    }

}

class TableSeeder extends Seeder
    {
        public function run()
        {
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" >'),
                'name' => ('basicInput')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="password" >'),
                'name' => ('basicInput1')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-palindrome-jao="">'),
                'name' => ('basicInput2')
            ]);
        }
    }
