1. Launch docker in the project
2. Go to the "store-app" container
3. Execute a command: php artisan migrate:fresh --seed. It'll run migrations and seeders to fill the database
4. Go go to the browser and paste http://localhost:3060/
5. Pass the registration procedure in the route: /register
6. You'll see routes. To authorize the app please press "Login route", then enter the following credentials:
   - for user:
     "email": "user@admin.com",
     "password": "12341234"
   - for admin:
     "email": "admin@admin.com",
      "password": "12341234"
Anyway full information about users you can see in the database. Also, you can register in the app with your credentials with USER ROLE
7. Then press the button 'Authorize' or you can press the 'lock symbol' next to every route
8. Enter in the opened window: Bearer then press "space" on the keyboard and insert your token
   (you can find it in the response body after you pass LOGIN PROCEDURE:"token": "11|f1O4eFeNWoWpIaj3czCJGJ4lqqQQVhGtj4rUaMIr07213bbe").
   For example: Bearer 11|f1O4eFeNWoWpIaj3czCJGJ4lqqQQVhGtj4rUaMIr07213bbe
9. You can check routes :)
