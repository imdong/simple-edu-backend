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
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminTablesSeeder::class);// add the code

        // 添加教师时需要更新的
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
