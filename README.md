# Invoice-Managment

# Getting started

## Installation

Clone the repository

    git clone https://github.com/ramo772/2grand-task.git

Switch to the repo folder

    cd Invoice-Managment
    
Install all the dependencies 

    composer install


Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the seeder
    php artisan db:seed
  
Start the local development server

    php artisan serve
    


