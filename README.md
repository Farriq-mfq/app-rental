# APP RENTAL

## Description
APLIKASI BERBASIS WEB UNTUK MANAJEMEN RENTAL/PENYEWAAAN MOBIL

## Usage

### Installing

Clone repo
```bash
git clone https://github.com/Farriq-mfq/app-rental.git rental
```

Setup
```bash
cd rental
composer install
npm run build
cp .env.example .env
php artisan key:generate
```

Database
```bash
php artisan migrate
php artisan db:seed
```

Running
```bash
php artisan serve
```
