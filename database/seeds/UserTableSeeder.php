<?php

use Illuminate\Database\Seeder;
use App\Users;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Users::class, 50)->create();
    }
}
