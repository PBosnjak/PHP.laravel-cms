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

        $professor1 = new User();
        $professor1->name = "Lovro";
        $professor1->email = "lovro@mail.com";
        $professor1->password = bcrypt('123456');
        $professor1->save();
        $professor1->roles()->attach($role_professor);

        $student = new User();
        $student->name = "Ivo";
        $student->email = "ivo@mail.com";
        $student->password = bcrypt('123456');
        $student->save();
        $student->roles()->attach($role_student);

        $student1 = new User();
        $student1->name = "David";
        $student1->email = "david@mail.com";
        $student1->password = bcrypt('123456');
        $student1->save();
        $student1->roles()->attach($role_student);

        $student2 = new User();
        $student2->name = "Lucija";
        $student2->email = "lucija@mail.com";
        $student2->password = bcrypt('123456');
        $student2->save();
        $student2->roles()->attach($role_student);
    }
}
