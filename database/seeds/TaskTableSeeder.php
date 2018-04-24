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

        $task1 = new Task();
        $task1->name = "ASP.NET aplikacija za diplomske radove";
        $task1->name_en = "ASP.NET application for master thesis ";
        $task1->goal = "Napraviti aplikaciju za prijavu na diplomske radove";
        $task1->college_type = "diplomski";
        $task1->save();
        $task1->users()->attach(User::where('name', 'Miro')->first());

        $task2 = new Task();
        $task2->name = "Usporebda različitih izvora svjetlosti";
        $task2->name_en = "Comparation of different sources of light";
        $task2->goal = "Usporediti efikasnost i cijenu različitih izvora svjetlosti";
        $task2->college_type = "preddiplomski";
        $task2->save();
        $task2->users()->attach(User::where('name', 'Lovro')->first());

        $task3 = new Task();
        $task3->name = "Upravljanje robotskim manipulatorom";
        $task3->name_en = "Robotic manipulator management";
        $task3->goal = "Napraviti aplikaciju za upravljanje robotskim manipulatorom";
        $task3->college_type = "stručni";
        $task3->save();
        $task3->users()->attach(User::where('name', 'Lovro')->first());

        $task4 = new Task();
        $task4->name = "STM aplikacija";
        $task4->name_en = "STM application";
        $task4->goal = "STM aplikacija ra rukovanje LED lampicama";
        $task4->college_type = "stručni";
        $task4->save();
        $task4->users()->attach(User::where('name', 'Miro')->first());

        $task5 = new Task();
        $task5->name = "Arduino pokretni robot";
        $task5->name_en = "Arduino mobile robot";
        $task5->goal = "Isprogramirati mobilni robot pomoću arduina";
        $task5->college_type = "preddiplomski";
        $task5->save();
        $task5->users()->attach(User::where('name', 'Lovro')->first());
    }
}
