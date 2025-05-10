
# How to use
1. Clone and cd into repository/directory: `git clone https://github.com/Malurian-PHP/wishlist` & `cd wishlist`
2. Install Dependecies: `composer install`
3. Generate environment file: `cp .env.example .env`
4. Run migrations: 
    - First time: `php artisan migrate --seed`
    - Subsequent refreshes: `php artisan migrate:fresh --seed`
5. Start server: `php artisan serve`
6. Use API endpoints:
   - POST /api/register - Register new user
   - POST /api/login - Login user

   Routes below require Authorization | Authorization: `Bearer <token>`
   - POST /api/logout - Logout user
   - GET /api/user - Authenticated user
   - GET /api/products - Gets all products
   - GET /api/wishlist - Get user's wishlist
   - POST /api/wishlist - Add product to wishlist/also updates wishlist product quantity
   - POST /api/wishlist/remove - Remove product from wishlist
   - POST /api/wishlist/clear - Clear wishlist
7. Testing:
    - Run tests: `php artisan test`
    - LoginTest - `tests/Auth/LoginTest` Run using `php artisan test tests/Feature/Auth/LoginTest.php`
    - RegisterTest - `tests/Auth/RegisterTest` Run using `php artisan test tests/Feature/Auth/RegisterTest.php`
        Please note that the register test will fail if emaii already exists
    - WishlistTest - `tests/WishlistTest` Run using `php artisan test tests/Feature/WishlistTest.php`
