<?php

namespace Tests\Browser;

use App\User;
use App\Ivent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IventCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
            $user = factory(User::class,'user1')->create();
            $ivent = factory(Ivent::class,'ivent1')->make();

            $this->browse(function (Browser $browser) use ($user,$ivent){
                $browser->loginAs($user)->visit('/ivent/create')
                    ->type('#title', $ivent->title)
                    ->type('#place', $ivent->place)
                    ->type('#date', $ivent->date)
                    ->type('#detail', $ivent->detail)
                    ->clickLink('投稿する')
                    ->assertPathIs('/ivent/create');
            });
    }
}
