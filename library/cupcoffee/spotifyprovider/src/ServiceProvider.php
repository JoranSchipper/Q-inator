<?php

namespace CupCoffee\SpotifyProvider;


use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class ServiceProvider extends BaseServiceProvider
{
	public function boot()
	{
		Route::group(['prefix' => 'spotify', 'middleware' => ['web']], function() {
			Route::get('/authorization', function() {
				return Socialite::with('spotify')->redirect();
			})->name('spotify.auth');

			Route::get('/authorization/callback', function() {
				$user = Socialite::with('spotify')->user();

				dump($user);
			})->name('spotify.auth.callback');
		});


	}

	public function register()
	{
		Event::listen(\SocialiteProviders\Manager\SocialiteWasCalled::class, 'SocialiteProviders\Spotify\SpotifyExtendSocialite@handle');

		$this->app->register(\SocialiteProviders\Manager\ServiceProvider::class);

		$this->app->bind('spotify', function() { return new Spotify; });
	}
}