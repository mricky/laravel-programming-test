Expected Outcome

1. First Init Demo Shopping Cart Init Data
2. Render On View 
   - action delete
   - action edit qty
   - action update discount 
3. User want to add middleware, developer add middleware login
  - check guest
  - check member can add cart
Steps
1. Login/Logout init middleware  
2. Unitesting UserController
3. Init Model Product, Cart
4. Init Service Product, User, Cart
5. Unitesting
6. Integrate to View
8. Manual Testing

DevOps
- pipeline deploy ok
- unitesting ok
- pull main ok



CMD Debug
 vendor/bin/phpunit
 php artisan tinker
 $service = new App\Services\Impl\UserServiceImpl;