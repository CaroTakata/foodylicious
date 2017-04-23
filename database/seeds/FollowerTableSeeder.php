<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class FollowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $follow = User::find(3);

        $user->following()->attach($follow->id);

        $user = User::find(2);
        $follow = User::find(1);

        $user->following()->attach($follow->id);

        $user = User::find(1);
        $follow = User::find(2);

        $user->following()->attach($follow->id);

        $user = User::find(3);
        $follow = User::find(4);

        $user->following()->attach($follow->id);
    }
}
