<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel URL Shortener

A simple Laravel-based URL shortener service that converts long URLs into short, user-friendly URLs. This service includes a frontend interface for ease of use and ensures proper redirection from the short URL to the original URL.

---

## **Features**
- **Shorten Long URLs:** Converts any valid long URL into a short, unique URL.
- **Redirection:** Automatically redirects users from the short URL to the original long URL.
- **Frontend Interface:** User-friendly form to input and generate short URLs.
- **Error Handling:** Handles invalid URLs and prevents duplicate short codes.
- **Security Measures:** Validates input URLs to prevent open redirects and malicious links.
- **Rate Limiting:** Prevents abuse by limiting the number of short URLs generated per user.

---

## **Technical Details**

### **Database Schema**
The project uses a MySQL database to store URL mappings:
- **`id`**: Auto-incrementing primary key.
- **`original_url`**: The original long URL (stored as `TEXT` to support very long URLs).
- **`short_code`**: A unique 6-character code for the short URL.
- **Timestamps**: Tracks creation and update times.

### **Key Considerations**
- **Uniqueness:** Ensures short URLs are unique with a retry mechanism.
- **Validation:** Validates input URLs using Laravel's `validate` method.
- **Short URL Length:** Fixed at 6 characters but configurable for future scalability.

---

## **Installation**

Follow these steps to set up the project locally:

### **1. Clone the Repository**
    ```bash
    git clone https://github.com/VOID-ALIF/url-shortener.git
    cd url-shortener


## 2. Install Dependencies

- Install Laravel dependencies using Composer:
    ```bash
        composer install

## 3. Configure Environment

- Create a **`.env`** file based on **`.env.example`**:
    ```bash
        cp .env.example .env
- Update the database settings in **`.env`**
    ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=url_shortener
        DB_USERNAME=root
        DB_PASSWORD=yourpassword

## 4. Generate Application Key

- Run the following command to generate the app key:
    ```bash
        php artisan key:generate

## 5. Run Database Migrations

- Setup the database schema:
    ```bash
        php artisan migrate
  
## 6. Start the Server

- Launch the Laravel development server:
    ```bash
        php artisan serve
The app will be accessible at **`http://127.0.0.01:8000`**.

## Usage

Frontend
1. Open the application in your browser at **`https://127.0.0.01:8000`**.
2. Enter a valid long URL in the input field and click "Shorten".
3. The generated short URL will be displayed and clicking it will redirect to the original URL.

## API Endpoints

- Create Short URL
  - Method: **`POST`**
  - Endpoint: **`/shorten`**
  - Payload:
    ```bash
    {
       "url": "https://example.com"
    }
   - Response:
     ```bash
     {
       "short_url": "https://127.0.0.1:8000/abc123"
     }
- Redirect
  - Method: **`GET`**
  - Endpoint: **`/abc123`**
  - Redirects to the original long URL

## Project Structure

- Frontend: Blade template at **`resources/views/shortener.blade.php`**
- Controller: URL shortening logic in **`app/Http/Controller/UrlShortenerController.php`**
- Model: ShortUrl model in **`app/Models/ShortUrl.php`**
- Routes: Defined in **`routes/web.php`**
- Database Migration: Located in **`database/migrations`**
In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Contributing

Contributions are welcome! Feel free to open issues or submit pull requests. [alif.rahman.c@gmail.com](mailto:alif.rahman.c@gmail.com).

## Local Setup for Contribution

- Fork the repository.
- Clone your forked repository:
    ```bash
       git clone https://github.com/VOID-ALIF/url-shortener.git
- Create a new branch:
     ```bash
        git checkout -b feature-branch-name
- Make your changes and test throughly.
- Push the branch and open a pull request.


## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT). See the LICENSE file for details.
