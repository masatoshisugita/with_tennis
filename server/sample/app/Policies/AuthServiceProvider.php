<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
use App\Ivent;
use App\Policies\Iventpolicy;

class AuthServiceProvider extends ServiceProvider
{
  protected $policies = [
    // 'App\Model' => 'App\Policies\ModelPolicy',
    Ivent::class => Iventpolicy::class,
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
  
  public function update(User $user, Ivent $ivent)
  {
    return $user->id === $ivent->user_id;
  }
}