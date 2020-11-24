<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class,'user1')->create();
            $this->browse(function (Browser $browser) use ($user){
                $browser->loginAs($user)->visit('/ivent')
                    ->assertSee('ログアウト')
                    ->clickLink('ログアウト')
                    ->assertPathIs('/login');
            });

        });
    }
}
