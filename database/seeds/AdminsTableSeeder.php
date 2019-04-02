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
    	\DB::table('admins')->insert(array (
    		0 =>
    		array (
    			'id'       => 1,
    			'name'     => 'admin',
    			'username' => 'admin',
    			'password' => bcrypt('admin'),
    		),
    	));
    }
}
