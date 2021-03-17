<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'id'    => 1,
                'level' => 'Administrator'
            ],
            [
                'id'    => 2,
                'level' => 'Officer'
            ]
        ];

        if (Level::count() == 0) {
            foreach ($levels as $level) {
                Level::create($level);
            }
        } else {
            Level::truncate();

            foreach ($levels as $level) {
                Level::create($level);
            }
        }
    }
}
