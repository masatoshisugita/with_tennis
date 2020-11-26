<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
use App\Event;
use App\Policies\Eventpolicy;

class AuthServiceProvider extends ServiceProvider
{
  protected $policies = [
    // 'App\Model' => 'App\Policies\ModelPolicy',
    Event::class => Eventpolicy::class,
  ];

/**
 * Register any authentication / authorization services.
 *
 * @return void
 */
  public function boot()
  {
    $this->registerPolicies();

  }
  
  public function update(User $user, Event $event)
  {
    return $user->id === $event->user_id;
  }
}