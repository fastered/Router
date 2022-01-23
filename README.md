# Простой PHP Router


## Подключение
```php 
require_once('Router.php');
```

## Использование

для начала чтобы все запросы направлялись через нашу главную страницу index.php, создаем фаил .htaccess в корень проекта, 
в нем пишем:
```php
Options +FollowSymLinks -Indexes
RewriteEngine On

RewriteCond  %{REQUEST_FILENAME} !-d
RewriteCond  %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

определяем путь к нашим контролерам
```php
$root = __DIR__.'/’ ;
```
задаем какие кнтролеры загружать в массив, ключи которые являются нашим маршрутом 
```php
$routes =[
    '/' =>$root.'main.php',
    '/hi' =>$root.'hello.php',
    '/by' =>$root.'bye.php',
    '/val' =>$root.'validator.php',
];
```
задаем адрес скрипта 404, который будет загружать если маршрут в массиве не будет задан.
```php
$page_404 = $root.'404.php';
```
формируем наш объект, передаем масив с маршрутами и адрес скрипта 404.
```php
$router = new Router($routes, $page_404);
```
вызываем метод который будет нам подключать нужные контролеры 
```php
$router->includes_page();

```
