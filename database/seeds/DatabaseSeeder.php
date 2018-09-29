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
        $this->call([
            AbsencesTableSeeder::class,
            AdminsTableSeeder::class,
            HolidaysTableSeeder::class,
            UsersTableSeeder::class,
            ReportsTableSeeder::class,
            RollCallsTableSeeder::class,
            SalariesTableSeeder::class,
            DepartmentRolesTableSeeder::class,
            DepartmentsTableSeeder::class,
            UserRolesTableSeeder::class,
            CompanyUsersTableSeeder::class,
            ReportOTsTableSeeder::class,
        ]);
    }
}
