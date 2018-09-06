<?php

namespace DjurovicIgoor\LaraJsonResponse\Facades;

use Illuminate\Support\Facades\Facade;

class LaraJsonResponse extends Facade {
	
	/**
	 * Get the registered name of the component.
	 * @return string
	 */
	protected static function getFacadeAccessor() {
		
		return 'larajsonresponse';
	}
}
