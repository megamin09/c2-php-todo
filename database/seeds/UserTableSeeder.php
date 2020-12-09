<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            DB::table('users')->insert([
                'name' => "ユーザー$i",
                'email' => "hoge+$i@test.com",
                'password' => bcrypt('password'),
            ]);
        }
    }
}
