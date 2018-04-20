<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task();
        $task->name = "PHP aplikacija za diplomske radove";
        $task->name_en = "PHP application for master thesis ";
        $task->goal = "Napraviti aplikaciju za prijavu na diplomske radove";
        $task->college_type = "diplomski";
        $task->save();
        $task->users()->attach(User::where('name', 'Miro')->first());
    }
}
