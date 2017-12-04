<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as User2;
use SebastianBergmann\Comparator\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User2::truncate();
        Factory(User::class, 50)->create();
    }
}
