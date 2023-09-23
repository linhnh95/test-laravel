# Test Laravel project

#### Use `laravel blade` to complete run on the environment `PHP ^8.1`

#### List Product : `` /products``

#### Product Details: `` /products/:id``

#### Login: ``/login``

#### Manage Product: ``/manage``

#### Create Product: ``/manage/create``

#### Update Product: ``/manage/update/:id``


In the project, `Caching` and `Session` are used

Have written ``Unit tests`` for productRepository




# Running

### Step 1
Open Terminal

Running
``cp .env.example .env``
``php artisan key:generate``

### Step 2

Running
``composer install``

### Step 3

Running
``npm install``

### Step 4

Running
``php artisan migrate --seed``

### Step 5

Running
``npm run build``

### Step 6

Running
``php artisan serve``

### Step 7

Running
``php artisan storage:link``


### Step 8

Login with 

Account: `root@root.com` 
Password: `123456`


### Step 9

Testing with script
``php artisan test``
