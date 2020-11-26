<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserRegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class,'user1')->make();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/register')
                ->type('#name', $user->name)
                ->type('#email', $user->email)
                ->type('#password', $user->password)
                ->type('#password-confirm', $user->password)
                ->press('登録')
                ->assertPathIs('/event');
        });
        
    }
}
