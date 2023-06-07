# Laravel Comments

## Comments package for Laravel


Using this package, you can easily activate comments for your models.


## Installation 

Install via Composer:

```
composer require imanborumand/laravel-comments
```


Now for publish migrations run:

```
php artisan migrate
```

Also publish the config file with the following command:

```
php artisan vendor:publish --tag="laravel-comment"
```

# Usage

To use, just use trait `Imanborumand\LaravelComments\Traits\HasComment` in your models.

```
use Imanborumand\LaravelComments\Traits\HasComment;

class Article extends Model
{
    use HasComment;
}
```

```
$article = Article::first();

$article->storeComment('this is the first article!'); 
```

This package will use the authenticated user by default. Of course, if you wish, you can save a favorite user as a comment sender as follows.

```
$article->storeComment('Hello, world!', user: User::first());
```

You can also add a child comment as follows:

```
$article->storeComment('Hello, world!', parent: Comment::find(10));
```


