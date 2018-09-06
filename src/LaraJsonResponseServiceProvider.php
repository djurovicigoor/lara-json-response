<?php

namespace DjurovicIgoor\LaraJsonResponse;

use Illuminate\Support\ServiceProvider;

class LaraJsonResponseServiceProvider extends ServiceProvider {
	
	/**
	 * Perform post-registration booting of services.
	 * @return void
	 */
	public function boot() {
		
		$this->registerHelpers();
	}
	
	/**
	 * Register any package services.
	 * @return void
	 */
	public function register() {
		
		// Register the service the package provides.
		$this->app->singleton('laraResponse', function($app) {
			
			return new LaraJsonResponse;
		});
	}
	
	/**
	 * Get the services provided by the provider.
	 * @return array
	 */
	public function provides() {
		
		return ['larajsonresponse'];
	}
	
	/**
	 * Register helpers file
	 */
	public function registerHelpers() {
		
		// Load the helpers in app/Http/helpers.php
		if (file_exists($file = __DIR__ . '/Helpers/functions.php')) {
			require $file;
		}
	}
}