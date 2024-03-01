<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\user;
use App\Models\event;
use App\Models\tag;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
            ->count(100)
            ->make()
            ->each(function ($event) {

                $user = User::inRandomOrder()->first();
                $event->user()->associate($user);

                $event->save();

                $tags = Tag::inRandomOrder()->take(3)->get();
                $event->tags()->attach($tags);
            });
    }
}
