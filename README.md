
# How to use
1. Run migrations: `php artisan migrate:fresh --seed`
2. Start server: `php artisan serve`
3. Use API endpoints:
   - POST /api/register - Register new user
   - POST /api/login - Login user
   - POST /api/logout - Logout user
   - GET /api/user - Authenticated user
   - GET /api/products - Gets all products
   - GET /api/wishlist - Get user's wishlist
   - POST /api/wishlist - Add product to wishlist/also updates wishlist product quantity
   - POST /api/wishlist/remove - Remove product from wishlist
   - POST /api/wishlist/clear - Clear wishlist
4. Testing:
    - Run tests: `php artisan test`
    - LoginTest - `tests/Auth/LoginTest`
    - RegisterTest - `tests/Auth/RegisterTest`
    - WishlistTest - `tests/WishlistTest`
