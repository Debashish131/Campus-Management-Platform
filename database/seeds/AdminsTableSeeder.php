<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert(array(
            array(
                'name' => "Admin",
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
            ),
            array(
                'name' => "Heaven",
                'email' => 'heaven@gmail.com',
                'password' => bcrypt('12345'),
            )
        ));
    }
}
