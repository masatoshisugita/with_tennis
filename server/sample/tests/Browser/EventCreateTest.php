<?php

namespace Tests\Browser;

use App\User;
use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EventCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
            $user = factory(User::class,'user1')->create();
            $event = factory(Event::class,'event1')->make();

            $this->browse(function (Browser $browser) use ($user,$event){
                $browser->loginAs($user)->visit('/event/create')
                    ->type('#title', $event->title)
                    ->type('#place', $event->place)
                    ->type('#date', $event->date)
                    ->type('#detail', $event->detail)
                    ->clickLink('投稿する')
                    ->assertPathIs('/event/create');
            });
    }
}
