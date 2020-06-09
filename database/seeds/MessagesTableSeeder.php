<?php

use Illuminate\Database\Seeder;
use App\Messages;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Messages::class, 50)->create();
    }
}
