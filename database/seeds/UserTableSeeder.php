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
                ['name' => 'Fernando Cantú', 'email' => 'fernandoc@gmail.com', 'password' => Hash::make('secret'), 'gender' => '1', 'birthdate' => '1994-03-14', 'avatar' => 'chefsito.jpg'],
                ['name' => 'Christina Sevilleja', 'email' => 'christinas@gmail.com', 'password' => Hash::make('secret'), 'gender' => '2', 'birthdate' => '1990-05-30', 'avatar' => 'apple.jpg'],
                ['name' => 'Omar Ríos', 'email' => 'omarr@gmail.com', 'password' => Hash::make('secret'), 'gender' => '1', 'birthdate' => '1996-11-17', 'avatar' => 'garfield.jpg'],
                ['name' => 'Iván López', 'email' => 'ivanl@hotmail.com', 'password' => Hash::make('secret'), 'gender' => '1', 'birthdate' => '1997-01-20','avatar' => 'gordon.jpg'],
        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
