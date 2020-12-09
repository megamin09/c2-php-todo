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
        for($i = 1; $i <= 100; $i++){
            DB::table('todos')->insert([
                'title' => "タスク$i",
                'user_id' => self::createUserIdByTaskId($i),
                'due_date' => date('Y-m-d'),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    /**
     * タスクidからユーザーidを生成する
     * @param int $task_id
     * @return int
     */
    private function createUserIdByTaskId(int $task_id): int
    {
        return ceil($task_id*0.1);
    }
}
