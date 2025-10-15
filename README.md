# Todo API

This is a simple **Laravel API** I built for a Todo list task.  
It performs all the basic **CRUD operations** (Create, Read, Update, Delete) using **MySQL** as the database.

---

## 🔹 What I Did
- Created a **Todo model**, **migration**, and **controller**  
- Added routes in `api.php` for:
  - Adding a new todo
  - Getting all todos
  - Getting one todo by ID
  - Updating a todo
  - Deleting a todo
- Connected the project to **MySQL** in the `.env` file  
- Tested all endpoints using **Postman**

---
WHAT I LEARN SO FAR

I set up a Laravel backend project from scratch.

I  learned how to connected Laravel to MySQL using .env for database credentials.

I created a Model (Todo) and Controller (TodoController) for CRUD operations.

I wrote clean API routes in routes/api.php.

I learned how to used Postman to test all endpoints (Create, Read, Update, Delete).

I learned how to use HTTP methods (GET, POST, PUT, DELETE) properly.

I debugged a 404 route issue and learned how to register custom routes in bootstrap/app.php.

I ran Artisan commands to migrate tables, clear cache, and list routes.

I verified API responses using JSON format in Postman.

## 🔹 API Endpoints

| Method | Endpoint | Description |
| **POST** | `/api/todos` | Add a new todo |
| **GET** | `/api/todos` | Get all todos |
| **GET** | `/api/todos/{id}` | Get one todo by ID |
| **PUT** | `/api/todos/{id}` | Update a todo |
| **DELETE** | `/api/todos/{id}` | Delete a todo |



🔹 Example in Postman
**POST** `/api/todos`

Body:
```json
{
  "title": "Buy groceries",
  "description": "Milk, eggs, bread"
}

Tools & Technologies Used:
Laravel
MYSQL
PHP
XAMPP
COMPOSER
POSTMAN
TERMINAL
CHROME
VSCODE