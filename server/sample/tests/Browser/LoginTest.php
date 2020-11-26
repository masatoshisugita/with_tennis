<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $password = 'Password@1234';

        $user = factory(User::class,'user1')->create([
            'password' => Hash::make($password),
            'remember_token' => null
        ]);

        $this->browse(function (Browser $browser) use ($user, $password) {
            $browser->visit('/login')
                ->type('#email', $user->email)
                ->type('#password', $password)
                ->press('ログインする')
                ->assertPathIs('/event');
        });
    }
}
