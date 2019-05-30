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
                'name' => ('ime')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-minlength="3" data-parsley-uppercase="" data-parsley-required="true">'),
                'name' => ('priimek')
            ]);
            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-required="true" data-parsley-davcnastevilka>'),
                'name' => ('davcnaStevilka')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-minlength="6" data-parsley-uppercase="" data-parsley-required="true"'),
                'name' => ('naslov')
            ]);

            DB::table('input_templates')->insert([
                'template' => ('<input type="text" data-parsley-required="true" data-parsley-datum>'),
                'name' => ('datum')
            ]);
        
        
        }
    }
