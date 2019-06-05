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
                'template' => ('<input type="text" data-parsley-palindrome="" data-parsley-required="true">'),
                'name' => ('basicInput2')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-uppercase-initial="" data-parsley-required="true">'),
                'name' => ('uppercaseInitial')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="date" data-parsley-required="true">'),
                'name' => ('date')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-required="true">'),
                'name' => ('required')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-registration-plate="" data-parsley-required="true">'),
                'name' => ('registrationPlate')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-vin="" data-parsley-required="true">'),
                'name' => ('vin')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-emso="" data-parsley-required="true">'),
                'name' => ('emso')
            ]);

            DB::table('categories')->insert([
                'name' => ('kategorija1')
            ]);
            
            DB::table('categories')->insert([
                'name' => ('kategorija2')
            ]); 

            DB::table('categories')->insert([
                'name' => ('kategorija3')
            ]); 
        }
    }
