<p align="center">laravel Api Project</p>
</p>

## About project
This project displays a range of products that belong to a particular Categoy 
api for this project achieves the principle of DRY "Don't Repeat Yourself"
we make a trait that contain functions it returns message and status code and use it in controller 

##Quik Setup
    1-Run git clone https://github.com/ahmedtawfik74/laravel-api-project-.git laravelApi 
    2-Create a MySQL database for the project
    3-From the projects root run cp .env.example .env
    4-create DB file in phpmyadmin
    5-Configure your .env file like database configuration
    6-From project root run following commands:-
            -php artisan migrate:fresh
            -php artisan db:seed
            -composer update
            
