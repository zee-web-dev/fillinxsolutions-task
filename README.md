```
# This is a demo task done for the position of full stack laravel developer.

This repository contains an example implementation of a this task that utilizes the repository pattern and scope filters to retrieve and filter products.

The API allows you to retrieve a list of products with optional category and price filters applied. The repository pattern provides a modular and testable structure, while the scope filters in the model allow for easy query filtering.

## Requirements

- PHP >= 7.4
- Laravel >= 8.0
- Composer

## Installation

1. Clone the repository:

```bash
git clone https://github.com/zee-web-dev/fillinxsolutions-task.git
```

2. Navigate to the project directory:

```bash
cd fillinxsolutions-task
```

3. Install the dependencies using Composer:

```bash
composer install
```

4. Create a copy of the `.env.example` file and rename it to `.env`:

```bash
cp .env.example .env
```

5. Generate a new application key:

```bash
php artisan key:generate
```

6. Configure your database connection in the `.env` file:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run the database migrations:

```bash
php artisan migrate
```

8. Start the development server:

```bash
php artisan serve
```

The API is now up and running at `http://localhost:8000`.

## Usage

### Get Products

To retrieve a list of products, make a `GET` request to the `/api/products` endpoint.

#### Parameters

- `category` (optional): Filter the products by category.
- `price` (optional): Filter the products by price less than or equal to the specified value.

#### Example Requests

Retrieve all products:
```
GET /api/products
```

Retrieve products in the "boots" category:
```
GET /api/products?category=boots
```

Retrieve products with a price less than or equal to 80000:
```
GET /api/products?price=80000
```

```
Feel free to modify the `README.md` file to match your specific project structure, naming conventions, and additional instructions if needed.
