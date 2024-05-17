# Vehicle Control
Vehicle Control is a web-based project that created using Laravel. The Vehicle Control focusess on vehicle control in nickel mining company. The aspects that can be monitored include vehicle, fuel, booking, driver, approval, and history. This website has three users or actors that can use it, namely Admin, Manager, and Director.

## Built With
- PHP version 8.1.6
- Laravel Framework version 10.21.0
- MySQL version 10.4.24
- [Corporate UI Dashboard Laravel](https://corporate-ui-dashboard-laravel.creative-tim.com)

## Installation ⚒️
Installing and running Vehicle Control is super easy, please Follow below steps and you will be ready to use it

1. Open the terminal in your root directory of Vehicle Control.
2. Use the following command to install the composer

```bash
composer install
```

3. Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)
   
5. Run the following command to generate the key

```bash
php artisan key:generate
```

5. By running the following command, you create the database tables and seed the roles and users tables

```bash
php artisan migrate
php artisan migrate --seed
```

6. To serve the application, you need to run the following command in the project directory

```bash
php artisan serve
```

7. Now navigate to the given address, and you will see Vehicle Control is running.🥳

## Usage
1. You can login with the following data
   - email : admin@email.com, password : 12345
   - email : manager@email.com, password : 12345
   - email : director@email.com, password : 12345
2. The admin can input and manage all data, including user data, driver data, vehicle data, and more. Meanwhile, the manager and director can only view all the data, such as booking data and vehicle data, and they can also change the approval status in the booking data.
3. First, admin will input booking, then notify the manager to approve it, after that notify director to approve it too

#### Note
For now, only the admin page has been created, but it is still possible to log in using other accounts because it has not yet been set up to allow multiple users to log in. In addition, the features that can be used are only for inputting, editing, and deleting data.