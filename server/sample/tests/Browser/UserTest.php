<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserDestroyTest extends DuskTestCase
{
    // use DatabaseMigrations;
    //use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function test_user_create()
    {
        
        $user = factory(User::class)->make();

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
    public function test_user_update()
    {
        
        $this->browse(function (Browser $browser){
            $browser->visit('/event')
                    ->click('#user_name')
                    ->clickLink('編集')
                    ->type('#name', 'name_update')
                    ->type('#email', 'example123456@com')
                    ->type('#password', 'password')
                    ->type('#password-confirm', 'password')
                    ->press('編集する')
                    ->assertSee('name_update');
        });
    }
    public function test_user_destory()
    {   

        $this->browse(function (Browser $browser){
            $browser->visit('/event')
                    ->click('#user_name')
                    ->waitFor('#user_name')
                    ->click('#user_destroy')
                    ->assertPathIs('/login');            
        });
    }
}
