

# About the project

This project is built using Laravel version 11, a modern PHP framework known for its elegant syntax and robust features, facilitating efficient web application development. The project utilizes MySQL as its database management system, Additionally, Laravel Cashier is integrated into the project to handle payment services

## Laravel Project Installation Setup
    Prerequisites
    PHP >= 8.2
    Composer
    Node.js & npm


## Steps

### 1. Clone the repository:
    git clone https://github.com/faisaltkr/stripe-charge.git
    cd stripe-charge



### 2. Install dependencies:

    composer install

### 3. Set up environment variables:
Copy the .env.example file to .env:

    cp .env.example .env

Update the .env file with your database and Uncomment Stripe credentials:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

    STRIPE_KEY=your-stripe-key
    STRIPE_SECRET=your-stripe-secret

### 4.Generate application key:

    php artisan key:generate

### 5. Run migrations and seed the database:

    php artisan migrate --seed


## Start server:

    php artisan serve

