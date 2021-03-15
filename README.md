Install the App:
1. Download the app - git clone https://github.com/AleksandraHlukhova/car_import.git 
2. Installs dependencies, download vendor folder - composer install 
3. Create .env file - copy .env.example .env
4. Generate key in .env file - php artisan key:generate
5. Make symlink - php artisan storage:link
6. Create tables and make its seeding -  php artisan migrate:fresh --seed
7. Start the server - php artisan serve

!!!!!!!
Registration and logination usual users and admin make from general forms. Change value from 1 to 0 role column the users table to make admin.
!!!!!!!

App has:
1. Factories and Seeders
2. Customer registration and auth
3. Customer profile:
    1. Manager propositions for customer`s apply
    2. Products bookmarks
    3. Cart for oders
4. Admin:
    1. Auth
    2. Customer list
    3. Customer oders
    4. Products (add, update, delete)
    5. Add new propositions for customer`s apply

Link project on youtube: 
https://youtu.be/CsHja933nnE