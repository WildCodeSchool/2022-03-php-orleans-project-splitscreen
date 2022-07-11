
# Project SplitScreen

Website for the association SplitScreen


## Tech Stack

Built With:
- PHP 8.1
- Symfony 6
- Boostrap 5.1
- MySQL 8.0
- Composer
- Yarn



## Installation

Prerequisites:
- Yarn
- Composer
- Symfony
- php/zip ext

Clone the project

```bash
git clone git@github.com:WildCodeSchool/2022-03-php-orleans-project-splitscreen.git
```

Install packages

```bash
composer install
yarn install
yarn encore dev
```

Create your .env.local file by making a copy of the .env file.

Configure your database in .env.local:

```bash
# DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=8.0&charset=utf8mb4"
```

Configure your mailer in .env.local:

```bash
# MAILER_DSN=null://null
```

Run symfony command:

```bash
symfony console doctrine:database:create
symfony console doctrine:migration:migrate
```



## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd project-SplitScreen
```

Load the fixtures

```bash
symfony console doctrine:fixture:load
```

Start the server

```bash
  symfony serve
```



## Deployment

Some files are used to manage automatic deployments (using tools as Caprover, Docker and Github Action). Please do not modify them.

* [captain-definition](/captain-definition) Caprover entry point
* [Dockerfile](/Dockerfile) Web app configuration for Docker container
* [docker-entry.sh](/docker-entry.sh) shell instruction to execute when docker image is built
* [nginx.conf](/ginx.conf) Nginx server configuration
* [php.ini](/php.ini) Php configuration

## Authors

Wild Code School trainers team,
Wild Code School Orléans, team SplitScreen.

## License

MIT License

Copyright (c) 2019 aurelien@wildcodeschool.fr

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

## Acknowledgments

