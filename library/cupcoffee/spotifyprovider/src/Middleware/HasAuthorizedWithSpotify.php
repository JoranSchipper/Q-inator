<?php
namespace CupCoffee\SpotifyProvider\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spotify;
use Session;

class HasAuthorizedWithSpotify
{
	public function handle(Request $request, Closure $next)
	{
		if (!Spotify::isAuthorized()) {
			Session::flash('spotify.auth.origin', $request->getUri());
			return redirect()->route('spotify.auth');
		}

		return $next($request);
	}
}