# Its Just PHP

A boilerplate/template for a vanilla PHP API, designed for simplicity, organization, and easy maintenance. This project provides a foundational structure for building RESTful APIs using plain PHP, without heavy frameworks

## Table of Contents

- Features

- Installation

- Prerequisites

- Setup Steps

- Web Server Configuration

- Usage (API Endpoints)

- Technologies Used

- Contributing

- License

### Features

- **Clean Architecture:** Separated concerns with dedicated directories for controllers, models, core utilities, and configurations.

- **Single Entry Point:** All requests are routed through `public/index.php` for centralized control.

- **Basic Routing**: A custom `Router` class to handle URL matching and dispatching to controller actions.

- **Request/Response Handling:** Dedicated classes for encapsulating HTTP requests and sending structured JSON responses.

- **Database Abstraction:** A simple `Database` wrapper using PDO for secure and efficient database interactions.

- **Composer Integration:** Autoloading for easy class management and potential third-party dependency inclusion.

- **Configurable:** Externalized application and database settings for easy environment management.

### Installation

#### Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP (version as specified in composer.json, e.g., ^7.4 or ^8.0)

- A web server (Apache with mod_rewrite enabled, or Nginx)

- MySQL/MariaDB or another compatible database server (SQLite is being used as default)

#### Setup Steps

1.  **Clone the Repository:**

    ```bash
    git clone https://github.com/xcvzmoon/its-just-php.git
    cd its-just-php
    ```

2.  **Install Composer Dependencies:**

    If you plan to use Composer for dependency management (highly recommended for autoload.php), run:

    ```bash
    composer install
    ```

    This will create the `vendor/` directory and the autoloader.

3.  **Configure Database:**

    - Create a new database for your API (e.g., your_database_name).

    - Update `app/config/database.php` with your database credentials:

      ```php
      // app/config/database.php
      return [
      'driver' => 'mysql',
      'host' => 'localhost',
      'database' => 'your_database_name', // <--- Update this
      'username' => 'your_db_username', // <--- Update this
      'password' => 'your_db_password', // <--- Update this
      'charset' => 'utf8mb4',
      'collation' => 'utf8mb4_unicode_ci',
      'prefix' => '',
      ];
      ```

    - Database Schema: Create your database tables. For example, for users:

      ```sql
      CREATE TABLE users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) UNIQUE NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      );
      ```

    (Add other table schemas as needed)

4.  **Configure Application Settings:**

    - Adjust general application settings in app/config/app.php:

      ```php
      // app/config/app.php
      return [
      'app_name' => 'Your API Name',
      'api_version' => '1.0',
      'debug_mode' => true, // Set to false in production
      'default_timezone' => 'Asia/Manila',
      // Add other settings like API keys, logging paths, etc.
      ];
      ```

5.  **Create Writable Log Directory:**

    Ensure the `storage/logs` directory exists and is writable by your web server:

    ```bash
    mkdir -p storage/logs
    chmod -R 775 storage/logs # Adjust permissions as necessary for your server
    ```

### Web Server Configuration

wip

### Technologies Used

- PHP

- PDO (PHP Data Objects)

- Composer (for dependency management and autoloading)

  (Add any other libraries or tools you integrate)

### Contributing

1. Contributions are welcome! Please follow these steps:

2. Fork the repository.

3. Create a new branch (git checkout -b feature/your-feature-name).

4. Make your changes.

5. Commit your changes (git commit -am 'Add new feature').

6. Push to the branch (git push origin feature/your-feature-name).

7. Create a new Pull Request.

### License

This project is open-sourced software licensed under the MIT license.
