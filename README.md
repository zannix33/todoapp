# ToDo List with Burndown Chart - Laravel, Vue.js
Basic todo list, that allows the user to register, log in, and create Todo tasks that are saved in their account. Includes dynamic burndown chart, that displays the number of tasks that were not yet completed at each minute in the last hour.

## Installation
**Clone the repo**
```
**Run composer install**
```
composer install
```
**Run npm install**
(node - v13 and npm - v6)
```
npm install
```
**Create .env**
```
cp .env.example .env
```
**Generate APP_KEY**
```
php artisan key:generate
```

**Configure MySQL connection details in .env**
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=yourDatabaseName
DB_USERNAME=yourDatabaseUsername
DB_PASSWORD=yourDatabasePassword
```
**Run database migrations**
```
php artisan migrate:reset
php artisan migrate
```
## Running the application
Run the application in a **Virtual Host**
