# 📝 Laravel Blog Project

A complete, secure, and robust CRUD blog application built with Laravel, featuring custom manual authentication, route protection middleware, Eloquent ORM relationships, and responsive UI views.

---

## ✨ Features
* **Custom Authentication System:** Built from scratch with Register, Login, and Logout functionality using Laravel's `Auth` facade and secure password hashing (`bcrypt`).
* **Route Protection (Middleware):** Secured blog routes with `auth` and `guest` middleware, complete with custom flash redirect messages for unauthorized access attempts.
* **Full CRUD Operations:** Create, Read, Update, and Delete blog posts seamlessly.
* **Eloquent ORM Relationships:** Implemented a **One-to-Many** relationship connecting Users and Posts (`belongsTo` and `hasMany`) via `user_id`.
* **Database Factories & Seeding:** Quick database population with fake user and post data using Laravel Tinker for testing.
* **Clean & Custom UI:** Styled views using Bootstrap 5 for the main dashboard and a custom Emerald Green embedded CSS theme for authentication pages.

---

## 🛠️ Tech Stack
* **Backend:** Laravel 11 / 12, PHP 8.2+
* **Database:** MySQL / phpMyAdmin
* **Frontend:** Blade Templates, Bootstrap 5, Custom CSS3

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
Open the `.env` file and configure your local database settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Migration & Seeding
Run the migrations to build your tables, then use Tinker to generate sample records:
```bash
php artisan migrate:fresh

# Open the interactive Tinker shell
php artisan tinker
```
Inside the Tinker prompt, run:
```php
\App\Models\User::factory()->count(5)->create();
\App\Models\Post::factory()->count(10)->create();
exit
```

### 5. Start the local server
```bash
php artisan serve
```
Open your browser and navigate to: `http://127.0.0.1:8000` (You will be automatically redirected to the `/login` page).

---

## 📂 Architecture & Key Relations

### Authentication Controller (`app/Http/Controllers/AuthController.php`)
Handles user registration, session regeneration on login, and secure logout.

### Post Model (`app/Models/Post.php`)
```php
public function user(): BelongsTo
{
    return \$this->belongsTo(User::class, 'user_id');
}
```

### User Model (`app/Models/User.php`)
```php
public function posts(): HasMany
{
    return \$this->hasMany(Post::class, 'user_id');
}
```
