# 📝 Laravel Blog Project

A simple and robust CRUD application built with Laravel 11, demonstrating clean database migrations, Eloquent ORM relationships, and dynamic form handling.

---

## ✨ Features
* **Full CRUD Operations:** Create, Read, Update, and Delete blog posts seamlessly.
* **Eloquent ORM Relationships:** Implemented a **One-to-Many** relationship connecting Users and Posts via `user_id`.
* **Database Factories & Seeding:** Quick database population with fake user and post data using Laravel Tinker for testing purposes.
* **Responsive Layout:** Clean, structured front-end interfaces styled with Bootstrap 5 and powered by the Blade templating engine.
* **Safe Navigation Operators:** Protected views against missing relationships using optional chaining (`?->`) to prevent runtime crashes.

---

## 🛠️ Tech Stack
* **Backend:** Laravel 11 / PHP 8.2+
* **Database:** MySQL / phpMyAdmin
* **Frontend:** Blade Templates, Bootstrap 5

---

## 🚀 Installation & Local Setup

### 1. Clone the repository
```bash
git clone <YOUR_REPOSITORY_URL>
cd study
```

### 2. Install dependencies
```bash
composer install
```

### 3. Environment Configuration
Copy the environment template file to create your own configuration:
```bash
cp .env.example .env
```
Open the newly created `.env` file and configure your database settings locally:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Migration & Seeding
Run the core migrations to build your tables, then jump into Tinker to inject testing records:
```bash
php artisan migrate:fresh

# Open the interactive Tinker shell
php artisan tinker
```
Inside the Tinker prompt, execute the following factory commands sequentially to populate your tables:
```php
\App\Models\User::factory()->count(5)->create();
\App\Models\Post::factory()->count(10)->create();
exit
```

### 5. Start the local server
```bash
php artisan serve
```
Open your web browser and navigate to: `http://127.0.0`

---

## 📂 Architecture & Key Relations

### Post Model (`app/Models/Post.php`)
Manages the child side of the relationship, allowing each post to pull its specific creator profile.
```php
public function user(): BelongsTo
{
    return \$this->belongsTo(User::class, 'user_id');
}
```

### User Model (`app/Models/User.php`)
Manages the parent side of the relationship, enabling users to easily query all associated articles.
```php
public function posts(): HasMany
{
    return \$this->hasMany(Post::class, 'user_id');
}
```
