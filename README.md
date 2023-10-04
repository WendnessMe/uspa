# USPA - Ultra Simple PHP API

As the name say by itself, it's a very simple API made in PHP. Since this was made for studying purposes, it's, of course, nothing fancy.
It has a basic routing system and only deal with GET requests (at least for now).

## Routes

In the `public/index.php` file there's a `$routes` array:

```php
$routes = [
  '/' => 'ApiController@index',
  '/api/get' => 'ApiController@getAll',
];
```
So to add a new route you just add it in the form of: `$key => 'Controller@Method'`.
The controllers are in the `src/Controllers/` directory.

## Running the project

Since this is a sipmle project that I was using just to play around with some concepts, I was using PHP built-in server. So it only takes a simple:

```
php -S localhost:8000
```

On the `public/` directory and the project is up and running.
I haven't tried yet running it using Apache or Nginx, but I was planning to containerize it with Docker when I get some free time.

### Responses

The `/` route return a simple sympathetic `Hi!` message.
The `/api/get` route returns a json with some dummy data on the SQLite database located on the `database/` directory.

## Possible to-do list

Some stuff that I might add sometime in the future, maybe.

- [ ] Containerize it with Docker
- [ ] Handle POST and other HTTP methods
- [ ] Improve routing system
- [ ] Add auth?
