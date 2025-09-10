# Booking App

A Laravel + Vue + Tailwind booking application.

## Quick Setup Steps

Follow these steps to get the app running locally.

### Prerequisites

- PHP 8.4+
- Composer
- Node.js 18+ and npm
- MySQL 8+
- Git

#
### 1. Clone the repository
git clone git@github.com:Magicard/booking-app.git

cd booking-app
#

#
### 2. Install PHP dependencies
composer install
#

#
### 3. Install Node dependencies
npm install
#

#
### 4. Configure environment
cp .env.example .env

php artisan key:generate

Edit `.env` and set your database credentials:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=booking_app

DB_USERNAME=root

DB_PASSWORD=secret
#
### 5. Run migrations and seed database

php artisan migrate --seed
#
### 6. Build frontend assets
npm run build
#
### 7. Start the application
php artisan serve

http://127.0.0.1:8000 in your browser.
#
### 8. API Endpoints
GET /api/bookings – List all bookings

GET /api/bookings?filter[week]=YYYY-MM-DD – Filter bookings by week

POST /api/bookings – Create a new booking
#
### Notes
- Ensure the database is running before migrating.
- Reset database if needed:
php artisan migrate:fresh --seed
- Vue frontend automatically fetches bookings and supports filtering by week.
