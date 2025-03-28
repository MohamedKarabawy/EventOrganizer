# Event Organizer Laravel Project Setup

Welcome to the **Event Organizer** Laravel project! This guide will take you through the necessary steps to get the project running locally on your machine.

## Prerequisites

Before you begin, make sure your system meets the following requirements:

- **PHP Version**: 8.2 to 8.4
- **Composer**: PHP dependency manager
- **Database**: MySQL (via XAMPP/WAMP)
- **Laravel**: Version 12.x (this is the version for this project, but make sure the required version aligns with your system)

---

## Step 1: Install XAMPP/WAMP

You need to set up a local development environment with XAMPP or WAMP. Both include PHP, MySQL, and Apache.

### For XAMPP:

1. Go to the [XAMPP download page](https://www.apachefriends.org/index.html) and download the appropriate version for your operating system.
2. Run the installer and follow the instructions to install XAMPP.
3. After installation, open the **XAMPP Control Panel** and start **Apache** and **MySQL**.

### For WAMP:

1. Visit the [WAMP Server website](https://www.wampserver.com/en/) and download the latest version.
2. Follow the installation steps to set up WAMP on your system.
3. Once installed, launch WAMP and ensure that the **Apache** and **MySQL** services are running (the WAMP icon in the taskbar should turn green).

---

## Step 2: Install Composer

Composer is a dependency manager for PHP, which you'll need to install before setting up Laravel.

### Installation:

1. Download **Composer** from the [official website](https://getcomposer.org/download/).
2. Follow the installation instructions based on your operating system.
3. Once installed, open a terminal or command prompt and verify that Composer is working:

   ```bash
   composer --version
   ```

---

## Step 3: Clone the Project

Clone the EventOrganizer Laravel project from GitHub to your local machine:

```bash
git clone https://github.com/MohamedKarabawy/EventOrganizer.git
cd EventOrganizer
```

---

## Step 4: Configure the `.env` File

Laravel uses the `.env` file for environment settings like database configurations and application keys. 

1. In the root folder of the project, you’ll find a file named `.env.example`. Duplicate this file and rename it to `.env`.

   ```bash
   cp .env.example .env
   ```

2. Open the `.env` file in a text editor and configure the database settings:

   - **DB_CONNECTION**: Set to `mysql`
   - **DB_HOST**: Set to `127.0.0.1` (or `localhost`)
   - **DB_PORT**: Set to `3306` (default MySQL port)
   - **DB_DATABASE**: Set to your database name (e.g., `eventorganizer`)
   - **DB_USERNAME**: Set to `root` (default username in XAMPP/WAMP)
   - **DB_PASSWORD**: Set to an empty string if no password is set (default in XAMPP/WAMP)

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eventorganizer
DB_USERNAME=root
DB_PASSWORD=
```

---

## Step 5: Install Project Dependencies

Run `composer install` to install all the necessary dependencies for the project:

```bash
composer install
```

---

## Step 6: Run Migrations

To set up the database structure, run the migrations command. This will create the necessary tables in your database.

```bash
php artisan migrate
```

---

## Step 7: Seed Database with Default Data

If the project includes seed data (e.g., default events, users), you can seed the database by running:

```bash
php artisan db:seed
```

---

## Step 8: Start the Development Server

To start the Laravel development server and view the project in your browser, run the following command:

```bash
php artisan serve
```

This will start the server at `http://127.0.0.1:8000`. Open this URL in your browser to see the application.

---

## Step 9: Final Checklist

1. **Verify XAMPP/WAMP**: Make sure your Apache and MySQL services are running.
2. **Database Connection**: Ensure that the database connection in `.env` is configured correctly.
3. **Composer**: Verify that Composer is installed and working (`composer --version`).
4. **Migrations**: Check that your database schema is set up by running `php artisan migrate`.
5. **Seed Data**: If applicable, ensure that the database is populated with default data by running `php artisan db:seed`.

---

## Troubleshooting

- **Error: "SQLSTATE[HY000] [1045] Access denied for user"**: This error occurs when the database username and password in `.env` do not match your MySQL setup. Make sure you're using the correct credentials.
  
- **Error: "composer not recognized"**: If you see this error, ensure that Composer is added to your system's PATH.

- **Server not running after `php artisan serve`**: If the server doesn’t start, check if port `8000` is available. You can specify another port using the command `php artisan serve --port=8080`.

---

## Additional Notes

- **PHP Version**: Make sure you're using PHP version 8.2 to 8.4. You can check the PHP version by running:

   ```bash
   php -v
   ```

   If you need to update PHP, consider upgrading through XAMPP/WAMP or manually installing a compatible version.

- **Environment Variables**: The `.env` file is crucial for many Laravel features, such as mail configuration, queueing services, and more. Always check this file if you encounter issues.

---
