## This project is a web application built with the Laravel framework and Livewire library.

To run the required packages run the following command 

`composer update`

`npm install`

Make sure you have a database ready and update the following configs in env file 

```
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_database_name

DB_USERNAME=your_database_username

DB_PASSWORD=your_database_password
```
Run the database migrations.

`php artisan:migrate`

To run the project 

`pwa-asset-generator splash.png --background "#ababab" --favicon --padding "0 0" -a images/icons -i ./index.html -m ./manifest.json ./images/icons`

`npm run dev`


