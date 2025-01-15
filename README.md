## How to Run the Project

1. **Set Up the Database**
   - Open phpMyAdmin.
   - Create a new database (`blog`).
   - Select the new database and go to the Import tab.
   - Import the SQL file (`blog.sql`) located in the `Database_Access` folder in the root.



2. **Configure the Project**

   - Go to `admin` -> `config` -> `constant.php` file.
   - Update the database credentials:
     ```php
        define('ROOT_URL', 'http://localhost/blog/');
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'blog');
     ```

3. **Run the Project**
   - Place the project files in web server's root directory (`htdocs` for XAMPP).
   - Access the project in  browser (`http://localhost/blog`).
