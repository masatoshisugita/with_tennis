<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\User;
use App\Event;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentCreateTest extends DuskTestCase
{
    // use DatabaseMigrations;
    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_comment_create()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class,'event1')->create();
        $comment = factory(Comment::class,'comment1')->make();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit($user)->visit('/event')
                    ->clickLink("詳細")
                    ->type('#content','参加します')
                    ->press('コメントする')
                    ->assertSee('詳細画面');
        });
    }
}
