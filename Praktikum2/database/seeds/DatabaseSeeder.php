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
                'template' => ('<input type="password" data-parsley-minlength="6" data-parsley-required="true">'),
                'name' => ('basicInput1')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-palindrome="" data-parsley-required="true">'),
                'name' => ('basicInput2')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-uppercase="" data-parsley-required="true">'),
                'name' => ('name')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-minlength="3" data-parsley-uppercase="" data-parsley-required="true">'),
                'name' => ('surname')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-required="true" data-parsley-tax>'),
                'name' => ('tax')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-minlength="6" data-parsley-uppercase="" data-parsley-required="true"'),
                'name' => ('address')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-required="true" data-parsley-date>'),
                'name' => ('date')
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
