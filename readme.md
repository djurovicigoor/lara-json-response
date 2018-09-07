# LaraJsonResponse

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require djurovicigoor/larajsonresponse
```

## Usage

The base method is **laraResponse()**;
``` bash
    return laraResponse();
```
JSON response of this method will be:
``` bash
{
    "code": 200,
    "message": null,
    "data": null,
    "error": null
}
```
If you want to return success JSON response with data and status code 200, you have to use **laraResponse($message , $data)->success()**
``` bash
    $data = ['name' => 'John Doe', 'location' => 'unknown' , 'age' => 24];
	
    return laraResponse("My message." , $data)->success();
```
JSON response of this method will be:
``` bash
{
    "code": 200,
    "message": "My message.",
    "data": {
        "name": "John Doe",
        "location": "unknown",
        "age": 24
    },
    "error": null
}
```
If you want to return error JSON response with message, ERROR and status code 400, you have to use **laraResponse($message , NULL , $error)->error()**
``` bash
    return laraResponse('My message.' , NULL , "TYPE_OF_ERROR")->error();
```
JSON response of this method will be:
``` bash
{
    "code": 400,
    "message": "My message.",
    "data": null,
    "error": "TYPE_OF_ERROR"
}
```
If you want to return unauthorized JSON response response with 401 status code, you have to use **laraResponse($message)->unAuthorized()**
``` bash
    return laraResponse('This action is unauthorized.')->unAuthorized();
```
JSON response of this method will be:
``` bash
{
    "code": 401,
    "message": "This action is unauthorized.",
    "data": null,
    "error": null
}
```
If you want to return forbidden JSON response response with 403 status code, you have to use **laraResponse($message)->forbidden()**
``` bash
    return laraResponse('Forbidden!')->forbidden();
```
JSON response of this method will be:
``` bash
{
    "code": 403,
    "message": "Forbidden!",
    "data": null,
    "error": null
}
```
If you want to return not found JSON response with 404 status code , you have to use **laraResponse($message)->notFound()**
``` bash
    return laraResponse('Not Found!')->notFound();
```
JSON response of this method will be:
``` bash
{
    "code": 404,
    "message": "Not Found!",
    "data": null,
    "error": null
}
```
And finaly you can use **laraResponse($message)->customCode($yourCustomCode)** to return JSON response with yout custom code;
``` bash
return laraResponse('My custom status code!')->customCode($yourCustomCode);
```
JSON response of this method will be:
``` bash
{
    "code": $yourCustomCode,
    "message": "My custom status code!",
    "data": null,
    "error": null
}
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email djurovic.igoor@gmail.com instead of using the issue tracker.

## Credits

- [Djurovic Igor][link-author]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/djurovicigoor/larajsonresponse.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/djurovicigoor/larajsonresponse.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/djurovicigoor/larajsonresponse/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/djurovicigoor/larajsonresponse
[link-downloads]: https://packagist.org/packages/djurovicigoor/larajsonresponse
[link-travis]: https://travis-ci.org/djurovicigoor/larajsonresponse
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/djurovicigoor
[link-contributors]: ../../contributors]