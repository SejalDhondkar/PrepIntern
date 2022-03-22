## PrepIntern - Laravel Vue SPA

PrepIntern is an internship portal SPA made using Laravel and Vue.js. 

https://user-images.githubusercontent.com/60104803/159467875-54efe034-d35e-4e25-8110-c0e481943457.mp4



### Features

- Role based authentication with 3 user roles: Student, Employer and Admin
- Dedicated dashboards for each user role
- Students can add preferences, academic and professional details, apply for internships, view applications
- Student portal has an automated Resume generator where the resume can be edited before submission of application.
- Employers can post internships, view applications, shortlist or select students, view resumes.
- Admin panel comes with full control of website including verification of employers and internships before being published on the portal

## Technology Stack

- Laravel (php framework for backend)
- Vue.js (javascript framework for frontend)
- Vuetify (Vuejs frontend design library)

## Prerequires

- PHP 7 
- Composer
- NodeJs
- MySQL

## Installation

- Clone the repository
```bash
https://github.com/SejalDhondkar/PrepIntern.git
```
- Install back dependencies with `composer install`
- Install front dependencies with `npm i`
- Create a new database in your local server.
- [Download](https://drive.google.com/file/d/1tWdLPDJPeB6uiKd8mDOs0sF8imlGwxmQ/view?usp=sharing) the env file and copy in the web-app folder. Rename it as `.env` and add following informations:
    - Database credentials (`DB_DATABASE`, `DB_PORT`, ...)
    - Application url (`APP_URL`). Either virtual host address if you configure one, either address form the command `php artisan serve`
- Launch migrations with `php artisan migrate --seed`
- Build front with `npm run dev`

- If you did'nt set a virtual host, launch application with the `php artisan serve` command. By default, application will be served at `http://127.0.0.1:8000`

## Usage

Log in as admin with `admin@test.com:admin` or as user with `user@test.com:secret` or register as a student or employer.





