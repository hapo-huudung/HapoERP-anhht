<?php

use Illuminate\Database\Seeder;

class CompanyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Models\CompanyUser::class, 10)->create();
    }
}
