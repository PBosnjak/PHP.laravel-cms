<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_professor = Role::where('name', 'professor')->first();
        $role_student = Role::where('name', 'student')->first();

        $admin = new User();
        $admin->name = "Petar";
        $admin->email = "pero@mail.com";
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $professor = new User();
        $professor->name = "Miro";
        $professor->email = "miro@mail.com";
        $professor->password = bcrypt('123456');
        $professor->save();
        $professor->roles()->attach($role_professor);

        $student = new User();
        $student->name = "Ivo";
        $student->email = "ivo@mail.com";
        $student->password = bcrypt('123456');
        $student->save();
        $student->roles()->attach($role_student);
    }
}
