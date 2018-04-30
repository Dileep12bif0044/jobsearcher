<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'first_name' => 'Deep',
            'last_name' => 'Singh',
            'email' => 'dileepk025@gmail.com',
            'user_type' => '1',
            'password' => bcrypt('dileep')
        ]);
        $user->save();

        $user = new \App\User([
            'first_name' => 'dileep',
            'last_name' => 'Kumar',
            'email' => 'dileepk025@yahoo.com',
            'user_type' => '2',
            'password' => bcrypt('dileep')
        ]);
        $user->save();
    }
}
