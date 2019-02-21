<?php

use Illuminate\Database\Seeder;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Player::class, 20)->create()->each(function ($player) {
            $team = \App\Team::inRandomOrder()->first();
            $player->team_id = $team->id;
            $player->save();
        });
    }
}
