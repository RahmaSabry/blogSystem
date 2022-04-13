# Overview

---

- [First Section](#section-1)

<a name="section-1"></a>
## overview

welcome to API Blog System.. 🦊

<a name="section-2"> ROLES </a>
there is 3 roles in system 
* admin
* user 
* managr 

manager have permission to CRUD users and blogs 

admin have permission to CRUD all blogs . 

user have permission to CRUD his own blogs.

<a name="section-3"> intallation 
 </a>
after clone this repo plaease run these commands 

```php 
composer install
```
```php 
php artisan migrate
```
```php 
php artisan db:seed
```

<a name="section-3">run the system </a>
```php 
php artisan db:seed
```
using PostMan you can login to accualy user and get the token

route : /api/login
* body
```php
{
    "email":"manager@gmail.com",
    "password":123456
}
```
* add blog 
route : api/blogs
```php
{
     "title": "new blog",
    "description": "new blog for testing",
}
```

