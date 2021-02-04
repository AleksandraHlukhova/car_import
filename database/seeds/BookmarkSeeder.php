<?php

use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bookmark::class, config('car_import.seeder_qty'))->create();
    }
}
