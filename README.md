# Bill Payments API

A simple RESTful API for managing a bill payments system built with Laravel.
Please make sure you have php installed in your system, at least 8.2

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/m4-programmer/bill-payments-api.git
   
2. Change directory to the project:
    ```bash
    cd bill-payments-api
    ```

3. Install dependencies:
    ```bash
    composer install
    ```

4. Copy the example environment file and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Run the database migrations:
    ```bash
    php artisan migrate
    ```
   
7. Start the development server:
    ```bash
    php artisan serve
    ```
   
## Testing
To run the tests, use the following command:
```bash
 php artisan test
```

## Api Documentation

Go to this link to access the api documentation
```bash    
https://documenter.getpostman.com/view/26916119/2sA3kPr5Wg
```

### Note

The application uses mysql so to run this app successfully, first make sure you have a mysql db in your system,
then go to the .env file and set up the following with your db configuration

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bill_payments
DB_USERNAME=root
DB_PASSWORD=your_password
```

