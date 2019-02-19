<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 2)->create()->each(function ($user) {
            $verifyToken = bcrypt(str_shuffle('abcde'));
            // Remove '/' so there will be no problem when calling url
            $verifyToken = str_replace('/', '', $verifyToken);
            Mail::to($user->email)->send(new \App\Mail\VerifyAccount(
                $user->name, $verifyToken
            ));
        });
    }
}
