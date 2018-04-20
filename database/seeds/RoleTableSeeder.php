<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Administrator';
        $role_admin->save();

        $role_professor = new Role();
        $role_professor->name = 'professor';
        $role_professor->description = 'Profesor';
        $role_professor->save();

        $role_student = new Role();
        $role_student->name = 'student';
        $role_student->description = 'Student';
        $role_student->save();
    }
}
