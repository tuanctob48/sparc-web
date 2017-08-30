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
        DB::table('project')->insert([
            'id'=>'1',
            'name' => 'airmap',
            'number_member'=> '5',
            'leader_id'=>'1',
            'department'=>'Airmap Team',
            'date_started'=>'21/8/2016'
        ]);
        DB::table('table_management')->insert([
            'id'=>'1',
            'name' => 'airmap',
            'security_key' => 'pamria',
            'project_id'=>'1',
        ]);
            
        // $this->call(UsersTableSeeder::class);
    }
}
