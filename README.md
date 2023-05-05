# Laravel E2E Helpers

This package is a collection of helpers routes for Laravel E2E testing with frameworks like [Playwright](https://playwright.dev/).

It adds the following routes to your application in `local` and `testing` environments:

* `POST /_testing/artisan` - Run an artisan command
* `POST /_testing/truncate` - Truncate all tables
* `POST /_testing/factory` - Create a model factory
* `POST /_testing/query` - Run a database query
* `POST /_testing/select` - Run a database select query

## Installation

You can install the package via composer:

```bash
composer require --dev hyvor/laravel-e2e-helpers
```

## Usage

### Example Usage with Javascript

```js
fetch('/_testing/artisan', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(INPUT_DATA),
})
```

### Run artisan commands

`POST _testing/artisan` route allows you to run artisan commands from your tests. For example, you can run `php artisan migrate:fresh` before each test. It accepts two parameters:

- `command` - The artisan command to run
- `parameters` - The parameters to pass to the command (array/object, optional)

```json
{
    "command": "migrate:fresh",
    "parameters": ["--seed"]
}
```

This route returns the exit code and the output of the command in JSON format:

```json
{
    "code": 0,
    "output": ""
}
```

### Truncate all tables

Truncating all tables is faster than running `migrate:fresh` command. You can use `POST /_testing/truncate` route to truncate all tables. It accepts an optional `except` parameter which is an array of table names to exclude from truncation.

```jsonc
{
    "connections": [] // optional
}
```

### Create a model factory

You can use `POST /_testing/factory` route to create a model factory. It accepts the following parameters:

- `model` - The model class name (if the model class name starts with `App\Models\`, you can omit it)
- `count` - The number of models to create (optional, default: 1). If count is set (even if it's 1), it returns an array of models. Otherwise, it returns a single model.
- `attributes` - The attributes to set (optional)

The following example creates a single `App\Models\User` model with the `name` attribute set to `John Doe`, and returns it in JSON format:

```json
{
    "model": "User",
    "attributes": {
        "name": "John Doe"
    }
}
```

The following example creates 5 `App\Models\User` models and returns them as an array in JSON format:

```json
{
    "model": "User",
    "count": 5
}
```

### Run a database query

You can use `POST /_testing/query` route to run a database query. It accepts the following parameters:

- `query` - The query to run
- `connection` - The database connection to use (optional)

```json
{
    "query": "UPDATE users SET name = 'John Doe' WHERE id = 1",
    "connection": "mysql"
}
```

### Run a database select query

You can use `POST /_testing/select` route to run a database select query. It accepts the following parameters:

- `query` - The query to run
- `connection` - The database connection to use (optional)

It returns the result as an array of objects in JSON format.

```json
{
    "query": "SELECT * FROM users WHERE id = 1",
    "connection": "mysql"
}
```