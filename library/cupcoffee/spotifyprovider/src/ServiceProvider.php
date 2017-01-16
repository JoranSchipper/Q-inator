<?php

namespace CupCoffee\SpotifyProvider;


use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class ServiceProvider extends BaseServiceProvider
{
	public function boot()
	{
		Route::group(['prefix' => 'spotify', 'middleware' => ['web']], function() {
			Route::get('/authorization', function() {
				if (!Session::has('spotify.auth.origin')) {
					Session::flash('spotify.auth.origin', URL::previous());
				} else {
					Session::reflash();
				}

				return Socialite::with('spotify')->scopes([
					// TODO: move the scopes to a more general config
					'playlist-modify-public',
					'playlist-modify-private'
				])->redirect();
			})->name('spotify.auth');

			Route::get('/authorization/callback', function() {
				$user = Socialite::with('spotify')->user();

				Session::set('spotify.user', $user);
				Session::set('spotify.auth-time', time());

				if (Session::get('spotify.auth.origin')) {
					return redirect()->to(Session::get('spotify.auth.origin'));
				} else {
					return redirect('/');
				}
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