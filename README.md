## PrepIntern - Laravel Vue SPA

PrepIntern is an imternship portal SPA (Single Page Application) with role-based authentication with Laravel and Vue.

## Prerequiries

- PHP 7
- Composer
- NodeJs
- MySQL

## Installation

- Clone the repository
```bash
git clone https://gitlab.com/internship-startup/web-app.git
```
- Install back dependencies
```bash
composer install
```
- Install front dependencies
```bash
npm i
```
- Create a new database in your local server.

- [Download](https://drive.google.com/file/d/1tWdLPDJPeB6uiKd8mDOs0sF8imlGwxmQ/view?usp=sharing) the env file and copy in the web-app folder. Rename it as `.env` and add following informations:
    - Database credentials (`DB_DATABASE`, `DB_PORT`, ...)
    - Application url (`APP_URL`). Either virtual host address if you configure one, either address form the command `php artisan serve`
- Launch migrations
```bash
php artisan migrate --seed
```
- Build front with 
```bash
npm run dev
```
- Download and import these sql files in your local server from [here](https://drive.google.com/drive/folders/1iBfwNbSbe4h3A2PffarILlBS5JpVfxQQ?usp=sharing)
    - cities
    - colleges
    - countries
    - degrees
    - internship_categories
    - internship_fields
    - Internship_profiles
    - skills
    - social_media_links
    - states
    - streams
    - type_of_internships


- If you did'nt set a virtual host, launch application with the `php artisan serve` command. By default, application will be served at `http://127.0.0.1:8000`

## Usage

Log in as admin with `admin@test.com:admin` or as user with `user@test.com:secret` or register as a student or employer.





