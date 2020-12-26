# Codelex Bank

Banking web application that allows authorized users to create accounts in different currencies, transfer money from one account to another with currency conversion without commission.
Also, users have the option to enable two-factor authentication.

##### Built with:
- Laravel
- MySQL
- Tailwind CSS

![](CodelexBank.gif)

### Prerequisites

1. PHP 7.4 or above
2. Composer 1.10 or above
3. npm v12 or above

### Installation and Setup
1. Clone this repository from Github - `git clone https://github.com/jurispetrovs/codelex-bank.git`.
2. Install your composer dependencies on the application: `composer install`.
3. Install all the necessary npm dependencies: `npm install && npm run dev`
4. Copy the `.env.example` file and rename it `.env`.
5. Set up your `.env` file.
6. In order to generate an `APP_KEY` for your `.env` file, you can use the command: `php artisan key:generate`.
8. Create an empty MySQL database.
8. Run `php artisan migrate` to migrate tables to your database.
9. Launch the project with command: `php artisan serve`.
10. Open page `http://127.0.0.1:8000/` in your browser.
