<?php

use Illuminate\Database\Seeder;
use App\Models\Board;

class BoardsTableSeeder extends Seeder
{
    public function run()
    {
        $boards = factory(Board::class)->times(50)->make()->each(function ($board, $index) {
            if ($index == 0) {
                // $board->field = 'value';
            }
        });

        Board::insert($boards->toArray());
    }

}

