<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\User;

class EventUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_event_create()
    {
            $user = factory(User::class)->create();

            $this->browse(function (Browser $browser) use ($user){
                $browser->loginAs($user)->visit('/event/create')
                    ->type('#title', 'テニスしましょう')
                    ->type('#place', '東京都港区')
                    ->type('#date', '2020-10-10 12:00')
                    ->type('#detail', '初心者大歓迎です！')
                    ->press('投稿する')
                    ->assertPathIs('/event');
            });
    }
    public function test_event_update()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/event')
                    ->screenshot('aaa')
                    ->clickLink("詳細")
                    ->clickLink("編集")
                    ->type('#title', 'ダブルスしましょう')
                    ->type('#place', 'オールサムズ鎌ヶ谷')
                    ->type('#date', '2020-11-10 09:00')
                    ->type('#detail', '初心者大歓迎です！')
                    ->press('編集する')                 
                    ->assertSee('ダブルスしましょう');
        });
    }
    public function test_event_destroy()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/event')
                    ->clickLink("詳細")
                    ->press("削除")
                    ->assertPathIs('/event');
        });
    }
}
