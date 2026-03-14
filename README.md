# Laravel Notes API

A RESTful API for managing notes built with Laravel.

## Features

- Create notes
- View all notes
- Update notes
- Delete notes
- Search notes
- Pagination

## Tech Stack

- Laravel
- MySQL
- REST API
- Postman

## Endpoints

GET /api/notes  
POST /api/notes  
GET /api/notes/{id}  
PUT /api/notes/{id}  
DELETE /api/notes/{id}  
GET /api/notes/search?q=keyword

## Setup

git clone https://github.com/Gurjeets934/laravel-notes-api.git  
cd laravel-notes-api  
composer install  
php artisan migrate  
php artisan serve
