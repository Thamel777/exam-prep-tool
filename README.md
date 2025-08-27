<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Save My Exam (Laravel Project)

A Laravel-based web platform for accessing **O/L and A/L past papers, exam resources, timetables, and quizzes**.  
Originally migrated from a static HTML project into a structured Laravel application with authentication.

---

## ✨ Features
- **Homepage** with hero section and quick links.
- **Top header + Navigation bar + Footer** shared across all pages.
- **Auth system** (Login / Register) with Laravel Breeze.
- Role support: `admin` and `user`.
- Static resources for:
  - O/L & A/L Past Papers
  - MCQ Quizzes
  - Exam Timetables
  - Lecturer Panel
  - Checklists & Timelines

---

## 🛠️ Tech Stack
- [Laravel 11](https://laravel.com/)
- PHP 8.2+
- MySQL / MariaDB
- Tailwind CSS (via Laravel Breeze)
- Blade Templates
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) (role management)

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.2
- Composer >= 2.5
- Node.js >= 18 & npm >= 9
- MySQL or MariaDB

### Installation
```bash
# Clone repo
git clone https://github.com/<your-username>/<your-repo>.git
cd <your-repo>

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure DB in .env then run migrations
php artisan migrate --seed

# Start dev server
php artisan serve
npm run dev

