<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('users')->insert([
				'id'=>'1',
        'username' => 'admin',
        'email' => 'admin@gmail.com',
				'typeAccount'=>'00',
				'password' => '12345',
      ]);
        // $this->call(UsersTableSeeder::class);
    }
}
