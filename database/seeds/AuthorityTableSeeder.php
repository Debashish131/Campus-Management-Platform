<?php

use Illuminate\Database\Seeder;

class AuthorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('authorities')->insert(array(
            array(
                'name' => "Authority",
                'email' => 'authority@gmail.com',
                'password' => bcrypt('12345'),
            ),
            array(
                'name' => "Super Admin",
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('12345'),
            )
        ));

    }
}
