# Changelog

All notable changes to `LaraJsonResponse` will be documented in this file.

##### Version 1.0.5

###### Added
- Laravel 13 support
- PHP 8.4 constructor property promotion in `LaraJsonResponse`
- Return type declarations on all methods
- Parameter type hints (`mixed`, `int`, `?int`) across all files
- Typed properties on `LaraJsonResponse` class
- Meaningful docblock descriptions on all methods
- Pint code formatter with PSR-12 preset

###### Changed
- Minimum PHP version set to `^8.2`
- `illuminate/support` constraint updated to `^10.0|^11.0|^12.0|^13.0`
- Simplified null coalescing in `globalResponse()` (`$code ?? $this->code`)

###### Removed
- Excess blank lines throughout source files
- Stale PhpStorm header comment from helper functions
- Unnecessary inline comments

##### Version 1.0.0

###### Added
- Everything

##### Version 1.0.1

###### Added
- git ignore file

###### Removed
- removed unnecessary files from project
