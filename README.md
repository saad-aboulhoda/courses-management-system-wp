# Courses Management System with WordPress

This project is built with WordPress and themosis framework. It allows users to manage courses and their associated
lessons, including adding, updating, deleting, and sorting lessons within each course.

## Features

- Add, update, and delete courses
- Add, update, and delete lessons within courses
- Sort lessons by lesson number within each course
- Search lessons by title or description
- Paginate lessons with customizable items per page
- ...

## Technologies Used

- PHP
- JavaScript
- Vue.js
- themosis framework
- NPM
- Composer

## Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/n1akai/wordpress-theme-dev
   ```
   then:
   ```sh
   cd wordpress-theme-dev
   ```

2. **Install PHP dependencies:**

   ```sh
   composer install
   ```

3. **Install JavaScript dependencies:**

   ```sh
   npm install
   ```

4. **Set up the environment:**

   Copy the `.env.sample` file to `.env` and update the necessary environment variables.
    ```sh
    cp .env.sample .env
   ```
   
5. **Generate the application key:**
    ```sh
    php artisan key:generate
   ```

 6. **Start the development server and visit the link to start WordPress Installation:**
    ```sh
    php artisan serve
    
7. **Run the migrations:**
    ```sh
    php artisan migrate
   ```

8. **Change api `baseUrl` in `config.js` file (default is `http://127.0.0.1:8000/api`):**
    ```sh
    resources/js/config.js
   ```

9. **Build the front-end assets:**
    ```sh
    npm run dev
   ```

## Usage

1. **Start the development server:**
    ```sh
    php artisan serve
   ```
   
2. **Access the application:**
   Open your browser and go to `http://127.0.0.1:8000`.

 ## If you're using Ubuntu or any Linux OS make sure make these files writable:
 - `storage`
 - `bootstrap/cashe`
 - `htdocs/content`

## Contributing

1. Fork the repository.
2. Create a new branch `(git checkout -b feature-branch)`.
3. Make your changes.
4. Commit your changes `(git commit -m 'Add some feature')`.
5. Push to the branch `(git push origin feature-branch)`.
6. Open a pull request.
