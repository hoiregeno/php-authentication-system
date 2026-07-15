# Authentication System

A simple and secure website for user registration and login. Built safely using PHP, MySQL, and secure data handling to prevent unauthorized access.

## Features

* **Sign Up:** Create a new account securely.
* **Log In:** Access the system with existing credentials.
* **Protected Dashboard:** A private homepage that greets the user by their username.
* **Secure Log Out:** Fully ends the user session and redirects to the login page.
* **Styling Included:** Simple layout for all forms.

## File Structure

* `db.php` - Connects the website to the database.
* `index.php` - The main login page.
* `register.php` - The creation page.
* `dashboard.php` - The private page visible only after logging in.
* `logout.php` - Logs the user out safely.
* `style.css` - Controls how the pages look.

## Getting Started

Create the files above in a project folder and follow the steps below:

### 1. Database Setup
1. Open your database manager (like **phpMyAdmin**) and create a new database named `auth_system`.
2. Run the following SQL query to create the table:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 2. Configuration

```php
<?php
  $host = "localhost";
  $db_user = "root"; // Your database username
  $db_pass = "";     // Your database password
  $db_name = "auth_system";
?>
```

### 3. Run the Project

1. Move your project folder containing the files above into your local server directory (e.g., htdocs for XAMPP).
2. Started Apache and MySQL in your server control panel.
3. Open your browser and go to [http://localhost/php-authentication-system/index.php](http://localhost/php-authentication-system/index.php).
