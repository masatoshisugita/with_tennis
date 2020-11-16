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
        $users = [
            ['name' => '田中一郎',
             'email' => 'aaa@com',
             'password' => '11111111'],
            ['name' => '鈴木二郎',
             'email' => 'bbb@com',
             'password' => '22222222'],
            ['name' => '山田三郎',
             'email' => 'ccc@com',
             'password' => '33333333']
           ];

        foreach($users as $user) {
            \App\User::create($user);
        }
    }
}
