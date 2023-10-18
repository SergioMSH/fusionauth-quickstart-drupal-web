# Quickstart: Drupal app with FusionAuth

This repository contains a Drupal app that works with a locally running instance of [FusionAuth](https://fusionauth.io/), the authentication and authorization platform.

## Setup

### Prerequisites
- [Docker](https://www.docker.com): The quickest way to stand up FusionAuth. (There are [other ways](/docs/v1/tech/installation-guide/))

NOTE: Drupal 10 requires `PHP 8.1.0 or higher` and `MariaDB 10.3.7+` or `MySQL/Percona 5.7.8+` in order to run.

### Installation

Clone this repository to your local machine and then enter the fusionauth-quickstart-php-drupal-web directory.

Open a bash terminal in the root of this directory and run the following command to pull the necessary Docker images:

```
docker-compose pull
```

Next, run the following command to start the Drupal and FusionAuth containers:

```
docker-compose up -d
```

If all is well, you should see the following running containers:

- `fusionauth-quickstart-php-drupal-web-web-1`: The Drupal container.
- `fusionauth-quickstart-php-drupal-web-db-1`: FusionAuth's PostrgreSQL database.
- `fusionauth-quickstart-php-drupal-web-db2-1`: Drupal's MySQL database.
- `fusionauth-quickstart-php-drupal-web-fusionauth-1`: The FusionAuth container.
- `fusionauth-quickstart-php-drupal-web-pma-1`: The phpMyAdmin container.
- `fusionauth-quickstart-php-drupal-web-search-1`: The Elasticsearch container.

If one of the containers fails to start, or you wish to reset the system, run the following commands to stop and remove all containers and volumes:

```
docker-compose kill
docker-compose rm -fv
docker-compose down -v
```

`docker-compose kill` stops all running containers, `docker-compose rm -fv` removes them and then `docker-compose down -v` removes the volumes.

You'll then need to re-run `docker-compose pull` and `docker-compose up -d` to start the containers again.


The FusionAuth configuration files make use of a unique feature of FusionAuth, called [Kickstart](https://fusionauth.io/docs/v1/tech/installation-guide/kickstart): when FusionAuth comes up for the first time, it will look at the [Kickstart file](./kickstart/kickstart.json) and mimic API calls to configure FusionAuth for use when it is first run. 

> **NOTE**: If you ever want to reset the FusionAuth system, delete the volumes created by docker-compose as we explained above by executing `docker-compose down -v`. 

FusionAuth will be initially configured with these settings:

* Your client Id is: `e9fdb985-9173-4e01-9d73-ac2d60d1dc8e`
* Your client secret is: `super-secret-secret-that-should-be-regenerated-for-production`
* Your example username is `richard@example.com` and your password is `password`.
* Your admin username is `admin@example.com` and your password is `password`.
* Your fusionAuthBaseUrl is 'http://localhost:9011/'

You can log into the [FusionAuth admin UI](http://localhost:9011/admin) and look around if you want, but with Docker/Kickstart you don't need to.

### Drupal complete-application

The `complete-application` directory contains the Drupal app configured to authenticate with locally running FusionAuth.

If the `fusionauth-quickstart-php-drupal-web-web-1` and `fusionauth-quickstart-php-drupal-web-db2-1` containers are running then it means the Drupal application is up, but we need to set a host name for it and import the supplied database.

#### Set a host name

Edit your operating system's host file and add the following entry:

```
127.0.0.1 dev.changebank.com
```
> **NOTE**: In windows, the host file is located at `C:\Windows\System32\drivers\etc\hosts` and at `/private/etc/hosts` on MacOS.

#### Import the database

Open a bash terminal in the root of the `fusionauth-quickstart-php-drupal-web` directory.

First we want to copy the database dump file located at ./db-backups into the db2 container. Run the following command to copy the file:

```
docker cp ./db-backups/changebank.sql fusionauth-quickstart-php-drupal-web-db2-1:/changebank.sql
```

Next, we want to import the database dump file into the database. Run the following command to import the database:

```
docker exec -i fusionauth-quickstart-php-drupal-web-db2-1 sh -c 'mysql -u drupal -pverybadpassword drupaldb < /changebank.sql'
```

For the above to take effect, restart your containers by running the following command:

```
docker-compose restart
```

### Accessing the Drupal App

You can now access the Drupal app by opening a browser and navigating to http://dev.changebank.com.

To login to the application with FusionAuth, click the Login button and then on the user login page located at http://dev.changebank.com/user/login you can click on the button labeled `Login with generic`.

That will redirect you to the FusionAuth login page where you can login with the following credentials:

* Username: `admin@example.com`
* Password: `password`

OR

* Username: `richard@example.com`
* Password: `password`

Once you login, you will be redirected back to the Drupal app's account page (http://dev.changebank.com/account) where you will see your username in the top right hand corner along with the logout button.

In the main navigation menu, you will see a link to the makechange page (http://dev.changebank.com/makechange) where you can navigate to and "make change" with the form located there and the account page will keep track of the last value you entered.

You're currently logged in as a user with the role of `authenticated user` which means you can only access the `account`, `makechange` and `home` pages.

If you want to explore the application with more depth as an admin user, you can do so by logging out and then entering the following credentials at the user login page:

* Username: `admin`
* Password: `admin`

If for whatever reason you want to change the credentials for the Drupal application's MySQL database, make sure to update the `settings.php` file located at `./complete-application/web/sites/default/settings.php` with the new credentials.

By default they are:

```php
$databases['default']['default'] = array (
  'database' => 'drupaldb',
  'username' => 'drupal',
  'password' => 'verybadpassword',
  'prefix' => '',
  'host' => 'fusionauth-quickstart-php-drupal-web-db2-1',
  'port' => '3307',
  'isolation_level' => 'READ COMMITTED',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'driver' => 'mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);
```



### Further Information

Visit https://fusionauth.io/quickstarts/quickstart-php-drupal-web for a step by step guide on how to build the Drupal integration with FusionAuth manually.

### Troubleshooting

* I get `This site can’t be reached  localhost refused to connect.` when I click the Login button

Ensure FusionAuth is running in the Docker container.  You should be able to login as the admin user, `admin@example.com` with the password of `password` at http://localhost:9011/admin