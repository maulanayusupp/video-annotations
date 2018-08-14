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
        $user = new User();
        $user->name = 'Maulana Yusup Abdullah';
        $user->email = 'maulanayusupp@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->role = 'admin';
        $user->save();
    }
}
