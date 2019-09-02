<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = new User();
        // $user->name = 'Maulana Yusup Abdullah';
        // $user->email = 'maulanayusupp@gmail.com';
        // $user->password = bcrypt('asdfasdf');
        // $user->role = 'admin';
        // $user->save();

        $user = new User();
        $user->name = 'Client 1';
        $user->email = 'client1@mail.com';
        $user->password = bcrypt('loteknikk');
        $user->role = 'client';
        $user->save();

        $user = new User();
        $user->name = 'Client 2';
        $user->email = 'client2@mail.com';
        $user->password = bcrypt('loteknikk');
        $user->role = 'client';
        $user->save();

        $user = new User();
        $user->name = 'Client 3';
        $user->email = 'client3@mail.com';
        $user->password = bcrypt('loteknikk');
        $user->role = 'client';
        $user->save();
    }
}
