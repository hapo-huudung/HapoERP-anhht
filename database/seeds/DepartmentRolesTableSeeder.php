<?php

use Illuminate\Database\Seeder;

class DepartmentRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DepartmentRole::class, 1)->create();
    }
}
