<?php

namespace Database\Seeders;

use App\Models\MailAttribute;
use App\Models\MailAttributeTransaction;
use App\Models\MailTransaction;
use Illuminate\Database\Seeder;
use Database\Seeders\MailLogSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            LevelSeeder::class,
            UserSeeder::class,
            UserRoleSeeder::class,
            MailSeeder::class,
            FileSeeder::class,
            MailAttributeSeeder::class,
            MailAttributeTransactionSeeder::class,
             MailVersionSeeder::class,
          //  MailTransactionSeeder::class,
           //  MailLogSeeder::class,
        ]);
    }
}
