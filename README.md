# Learning Laravel Sanctum

[![Laravel Sanctum](https://img.shields.io/badge/Laravel%20Sanctum-5.8-blue)](https://github.com/laravel/sanctum)

## Introduction
This is a task API which was developed as part of learning Laravel Sanctum.
The task API provides a RESTful API to manage tasks with [Laravel Sanctum](https://github.com/laravel/sanctum) as it authentication mechanism.
The API contains the basic CRUD operations, login, logout and register functionalities. 
## Getting Started

### Install
You need to install the [laravel/sanctum](https://github.com/laravel/sanctum) package to use this API.
```bash
composer require laravel/sanctum
```

### Run
```bash
php artisan serve
```

## Usage
The API has the following endpoints:
- **GET:** /api/tasks - Returns all tasks
- **POST:** /api/tasks - Creates a new task
- **GET:** /api/tasks/{id} - Returns a single task
- **PUT:** /api/tasks/{id} - Updates an existing task
- **DELETE:** /api/tasks/{id} - Deletes an existing task
- **GET:** /api/login - Logs in a user
- **GET:** /api/logout - Logs out a user
- **GET:** /api/register - Registers a new user

A user can only update or delete their own tasks.

## Request

### Create Task
When creating a task you need to pass the following parameters:
- name: The name of the task
- description: A description of the task
- priority: The priority of the task, either 'low', 'medium', or 'high'
- status: The status of the task, either 0 or 1 with 0 for 'in progress' and 1 for 'completed'.

Example:
```json
{
    "name": "Task 1",
    "description": "Description of task 1",
    "priority": "medium",
    "status": 0
}
```

### Update Task
When updating a task you need to pass the parameter you need to update:
- name: The name of the task
- description: A description of the task
- priority: The priority of the task, either 'low', 'medium', or 'high'
- status: The status of the task, either 0 or 1 with 0 for 'in progress' and 1 for 'completed'.

Example:
```json
{
   
    "status": 1
}
```
### Login
When logging in you need to pass the following parameters:
- email: The email of the user
- password: The password of the user
Example:
```json
{
    "email": "johndoe@test.com",
    "password": "passw0rD+" 
}
```

### Register
When registering you need to pass the following parameters:
- name: The name of the user
- email: The email of the user
- password: The password of the user. The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.
Example:
```json
{
    "name": "John Doe",
    "email": "johndoe@test.com",
    "password": "passw0rD+"
}
```
## Response

### Get Tasks

```json
{
    "data": [
        {
            "id": "4",
            "attributes": {
                "name": "Task 1",
                "description": "Description of task 1",
                "priority": "medium",
                "status": 0,
                "created_at": "2024-01-13T20:05:17.000000Z",
                "updated_at": "2024-01-13T20:05:17.000000Z"
            },
            "relationships": {
                "user": {
                    "id": "1",
                    "name": "John Doe",
                    "email": "johndoe@test.com"
                }
            }
        },
        {
            "id": "8",
            "attributes": {
                "name": "Task 2",
                "description": "Description of task 2",
                "priority": "low",
                "status": 1,
                "created_at": "2024-01-13T20:05:17.000000Z",
                "updated_at": "2024-01-13T20:05:17.000000Z"
            },
            "relationships": {
                "user": {
                    "id": "1",
                    "name": "John Doe",
                    "email": "johndoe@test.com"
                }
            }
        }
      ]
}
        

```

### Get Task

```json
{
    "task": {
        "id": "8",
        "attributes": {
            "name": "Task 1",
            "description": "Description of task 1",
            "priority": "low",
            "status": 0,
            "created_at": "2024-01-13T20:05:17.000000Z",
            "updated_at": "2024-01-13T20:05:17.000000Z"
        },
        "relationships": {
            "user": {
                "id": "1",
                "name": "John Doe",
                "email": "johndoe@test.com"
            }
        }
    }
}
```

### Create Task

```json
{
    "task": {
        "id": "8",
        "attributes": {
            "name": "Task 1",
            "description": "Description of task 1",
            "priority": "low",
            "status": 0,
            "created_at": "2024-01-13T20:05:17.000000Z",
            "updated_at": "2024-01-13T20:05:17.000000Z"
        },
        "relationships": {
            "user": {
                "id": "1",
                "name": "John Doe",
                "email": "johndoe@test.com"
            }
        }
    }
}
```
### Update Task
```json
{
    "task": {
        "id": "8",
        "attributes": {
            "name": "Test 1",
            "description": "Description of task 1",
            "priority": "low",
            "status": 1,
            "created_at": "2024-01-13T20:05:17.000000Z",
            "updated_at": "2024-01-13T20:05:17.000000Z"
        },
        "relationships": {
            "user": {
                "id": "1",
                "name": "John Doe",
                "email": "johndoe@test.com"
            }
        }
    }
}
```

### Delete Task
```json
{
    "data": "",
    "message": "Task deleted successfully",
    "status": "Request was successful."
}
```

### Login
```json
{
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "johndoe@test.com",
            "email_verified_at": null,
            "created_at": "2024-01-11T19:40:27.000000Z",
            "updated_at": "2024-01-11T19:40:27.000000Z"
        },
        "token": "7|6BcGraxg2DWcNvtIwEdi84lNawFfSXrAvUpxz4UVac716967"
    },
    "message": "Login successfully",
    "status": "Request was successful."
}
```

### Register
```json
{
    "data": {
        "user": {
            "name": "John Doe",
            "email": "johndoe@test.com",
            "updated_at": "2024-01-18T09:27:13.000000Z",
            "created_at": "2024-01-18T09:27:13.000000Z",
            "id": 1
        },
        "token": "8|7gEl9WBvJng0oGeoPbsLOgom9iPkZg5a5K7KN6XJ18936090"
    },
    "message": "User created successfully",
    "status": "Request was successful."
}
```
