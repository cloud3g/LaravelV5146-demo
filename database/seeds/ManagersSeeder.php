<?php

use Illuminate\Database\Seeder;

class ManagersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('managers')->delete();

        \DB::table('managers')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'username' => 'admin',
                    'password' => '$2y$10$iFtzksdcYJxI8rbfYcXo2e8qUg5.0si2/gwcx1LHqwBsztrvxtWyq',
                    'truename' => '先森',
                    'email' => 'qq@qq.com',
                    'salt' => '',
                    'lastip' => '127.0.0.1',
                    'lasttime' => 1486170986,
                    'remember_token' => NULL,
                    'created_at' => '2017-01-12 11:02:35',
                    'updated_at' => '2017-02-04 01:16:26',
                ),
        ));
    }
}
