# subway
Simple order system for organizations

Steps to install
(Tested on a fresh Ubuntu 18 only with docker and docker compose. Requires sudo level.)
```
git clone git@github.com:gonun13/subway.git

cd subway

./start
```

Running start will: 
Install laravel and all vendor dependencies, set permissions, fire docker, prepare laravel and run migrations.

## How to test

App available on: <your_ip>:8080
- email: admin@admin.dom
- password: secret

Phpmyadmin available on: <your_ip>:8081
- user: homestead
- password: secret

Access Admin Panel to create Meals and Users. Place orders at will.
Public view of all orders available at: <your_ip>:8080/public/orders

### Relevant info

Laravel migrations handle database generation but a subway.sql is available. You can find migrations and seeds in /database.

Most of the code is found in /app and views in /resources/views.


