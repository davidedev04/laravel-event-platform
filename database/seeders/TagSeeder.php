<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\event;
use App\Models\tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tag::factory()->count(15)->create()->each(function ($tags) {

            $event = event::inRandomOrder()->limit(3)->get();
            $tags->events()->attach($event);
            $tags->save();
        });
    }
}
