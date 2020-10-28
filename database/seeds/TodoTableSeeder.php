<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i = 1; $i <= 10; $i++ )
        {
            $str = "user000$i";
            DB::table('users')->insert([
                'id'=> $i,
                'name' => "user$i",
                'email' => "user$i@gmail.com",
                'password' => bcrypt($str),
            ]);
        }

        for($i = 1; $i <= 100; $i++)
        {
            $j = floor(($i - 1) / 10) + 1;
            DB::table('todos')->insert([
                'title' => "タスク$i",
                'user_id' => $j,
                'due_date' => date('Y-m-d'),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        
    }
}