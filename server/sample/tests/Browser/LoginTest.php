<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class LoginTest extends DuskTestCase
{
    // use DatabaseMigrations;
    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser)use($user){
            $browser->visit('/login')
                ->type('email',$user->email)
                ->screenshot('email')
                ->type('password',$user->password )
                ->screenshot('password')
                ->press('ログインする')
                ->assertPathIs('/event');
        });
    }
    public function testLogout()
    {
            $this->browse(function (Browser $browser){
                $browser->visit('/event')
                    ->assertSee('ログアウト')
                    ->clickLink('ログアウト')
                    ->assertPathIs('/login');
            });

    }
}
