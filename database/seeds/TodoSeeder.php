<?php
use App\Todo;
use Illuminate\Database\Seeder;
use SebastianBergmann\Comparator\Factory;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::truncate();
        Factory(Todo::class, 150)->create();
    }
}