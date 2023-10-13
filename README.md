# Quickstart: Drupal app with FusionAuth

This repository contains a Drupal app that works with a locally running instance of [FusionAuth](https://fusionauth.io/), the authentication and authorization platform.

## Setup

### Prerequisites
- [Docker](https://www.docker.com): The quickest way to stand up FusionAuth. (There are [other ways](/docs/v1/tech/installation-guide/)),
- A local `AMP` (Apache, MySQL, PHP) stack: You can use any local AMP stack you like, but we recommend:
  - [WAMP](https://www.wampserver.com/en/download-wampserver-64bits/) for `Windows`, or; 
  - [AMPPS](https://ampps.com/docs/installing-ampps/installing-on-mac-os/) for `MacOS`.

NOTE: Drupal 10 requires `PHP 8.1.0 or higher` and `MariaDB 10.3.7+` or `MySQL/Percona 5.7.8+` in order to run.

### FusionAuth Installation via Docker

The root of this project directory (next to this README) are two files [a Docker compose file](./docker-compose.yml) and an [environment variables configuration file](./.env). Assuming you have Docker installed on your machine, you can stand up FusionAuth up on your machine with:

```
docker-compose up -d
```

The FusionAuth configuration files also make use of a unique feature of FusionAuth, called [Kickstart](https://fusionauth.io/docs/v1/tech/installation-guide/kickstart): when FusionAuth comes up for the first time, it will look at the [Kickstart file](./kickstart/kickstart.json) and mimic API calls to configure FusionAuth for use when it is first run. 

> **NOTE**: If you ever want to reset the FusionAuth system, delete the volumes created by docker-compose by executing `docker-compose down -v`. 

FusionAuth will be initially configured with these settings:

* Your client Id is: `e9fdb985-9173-4e01-9d73-ac2d60d1dc8e`
* Your client secret is: `super-secret-secret-that-should-be-regenerated-for-production`
* Your example username is `richard@example.com` and your password is `password`.
* Your admin username is `admin@example.com` and your password is `password`.
* Your fusionAuthBaseUrl is 'http://localhost:9011/'

You can log into the [FusionAuth admin UI](http://localhost:9011/admin) and look around if you want, but with Docker/Kickstart you don't need to.

### Drupal complete-application

The `complete-application` directory contains a Drupal app configured to authenticate with locally running FusionAuth.

In order to run the Drupal application, you should clone this repository and then copy the `complete-application` directory to the project root for your WAMP or AMPPS installation.

Rename the `complete-application` directory to `changebank` and then do the following:

Edit your operating system's host file and add the following entry:

```
127.0.0.1 dev.changebank.com
```
> **NOTE**: In windows, the host file is located at `C:\Windows\System32\drivers\etc\hosts` and at `/private/etc/hosts` on MacOS.

Edit the `httpd-vhosts.conf` Apache file for your web server and add the following entry:

```
#
<VirtualHost *:80>
  ServerName dev.changebank.com
  ServerAlias dev.changebank.com
  DocumentRoot "${INSTALL_DIR}/www/changebank/web/"
  <Directory "${INSTALL_DIR}/www/changebank/web/">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>
```

Next, we want to create a database for the Drupal application. Open the PHPMyAdmin page at http://localhost/phpmyadmin and create a new database named `changebank`. Select the `changebank` database and then click the `Import` tab. Click the `Choose File` button and select the `changebank.sql` file located in the `changebank` directory. Click the `Go` button to import the database.

Restart your web server. Once it has started up again, open a browser and navigate to http://dev.changebank.com. You should see the Drupal application running with the example database.

### Further Information

Visit https://fusionauth.io/quickstarts/quickstart-php-drupal-web for a step by step guide on how to build the Drupal integration with FusionAuth manually.

### Troubleshooting

* I get `This site can’t be reached  localhost refused to connect.` when I click the Login button

Ensure FusionAuth is running in the Docker container.  You should be able to login as the admin user, `admin@example.com` with the password of `password` at http://localhost:9011/admin