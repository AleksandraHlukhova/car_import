Install the App:
1. Download the app - git clone https://github.com/AleksandraHlukhova/car_import.git 
2. Installs dependencies, download vendor folder - composer install 
3. Create .env file - copy .env.example .env
4. Generate key in .env file - php artisan key:generate
5. Create tables and make its seeding -  php artisan migrate:fresh --seed
6. Start the server - php artisan serve

App has:
1. Factories and Seeders
2. Customer registration and auth
3. Customer profile:
    1. Manager propositions for customer`s apply
    2. Products bookmarks
    3. --!! Cart for oders (in processing)
4. --!! Admin (block in processing):
    1. Auth
    2. Customer list
    3. Customer oders
    4. Paid orders
    5. Add new propositions for customer`s apply
5. --!! Telegramm notification 
6. --!! Price calculator
