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
                'type' => ('<input type="text" >')
            ]);
            DB::table('input_templates')->insert([
                'type' => ('<input type="password" >')
            ]);
        }
    }
