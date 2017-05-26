<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
                ['name' => 'Fernando Cantú', 'email' => 'fernandoc@gmail.com', 'password' => Hash::make('secret'), 'gender' => '1', 'avatar' => 'apple.jpg'],
                ['name' => 'Christina Sevilleja', 'email' => 'christinas@gmail.com', 'password' => Hash::make('secret'), 'gender' => '2', 'avatar' => 'chefsito.jpg'],
                ['name' => 'Omar Ríos', 'email' => 'omarr@gmail.com', 'password' => Hash::make('secret'), 'gender' => '1', 'avatar' => 'garfield.jpg'],
                ['name' => 'Iván López', 'email' => 'ivanl@hotmail.com', 'password' => Hash::make('secret'), 'gender' => '1', 'avatar' => 'gordon.jpg'],
        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
