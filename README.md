# Laravel CRUD

Build an API to manage products and categories with curd functionality

## API Reference

### Product CRUD

#### Get products

```http
  GET /api/products
```

#### Create an product

```http
  POST /api/products
```

| Parameter     | Type     | Description                            |
| :------------ | :------- | :------------------------------------- |
| `name`        | `string` | **Required**. Give an product name     |
| `description` | `string` | Give an product description            |
| `price`       | `string` | **Required**. Give an product price    |
| `category_id` | `int`    | **Required**. Give an product category |

#### Updaet an product

```http
  PUT /api/products/${id}
```

| Parameter     | Type     | Description                            |
| :------------ | :------- | :------------------------------------- |
| `name`        | `string` | **Required**. Give an product name     |
| `description` | `string` | Give an product description            |
| `price`       | `string` | **Required**. Give an product price    |
| `category_id` | `int`    | **Required**. Give an product category |

#### Display an single product

```http
  GET /api/products/${id}
```

#### Delete an single product

```http
  DELETE /api/products/${id}
```

### Category CRUD

#### Get categories

```http
  GET /api/categories
```

#### Create an categories

```http
  POST /api/categories
```

| Parameter     | Type     | Description                        |
| :------------ | :------- | :--------------------------------- |
| `name`        | `string` | **Required**. Give an product name |
| `description` | `string` | Give an product description        |

#### Updaet an product

```http
  PUT /api/categories/${id}
```

| Parameter     | Type     | Description                        |
| :------------ | :------- | :--------------------------------- |
| `name`        | `string` | **Required**. Give an product name |
| `description` | `string` | Give an product description        |

#### Display an single categories

```http
  GET /api/categories/${id}
```

#### Delete an single categories

```http
  DELETE /api/categories/${id}
```

## Deployment

To run this project

```bash
  cd /ba-system-laravel-crud
```

```bash
  rename .env.example to .env, and config database
```

```bash
  composer update
```

```bash
  php artisan migrate
```

```bash
  php artisan serve
```
