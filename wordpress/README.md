# Multimatic WordPress Headless CMS

This repository contains a headless WordPress theme and all required plugins for use within it. It is meant to be paired with external single-page applications or UIs.

## Technologies Used

This repo relies on WordPress and has been mostly written from scratch. However, it features a select few third-party plugins, including:

- Advanced Custom Fields PRO
- Classic Editor

## Local Development

Local development features the use of Docker for an easy workflow.  Perform the following steps to get up and running:

**1. Copy the `example.docker-compose.yml` file**

While in the repository's root directory, run the following command to copy `example.docker-compose.yml` to `docker-compose.yml`.

```
cp example.docker-compose.yml docker-compose.yml
```

**2. Ensure all values within the new `docker-compose.yml` are correctly configured**

You should open the `docker-compose.yml` file and double check that all settings held within are correct, including that the ports used for PHPMyAdmin and the WordPress image are suitable for your environment.  Defaults are generally fine.

#### Important

One setting that you definitely need to ensure accuracy for is the `volumes` property on the `multimatic_wp_db` image. You need to ensure that the path located *before* the colon is accurate in regards to where you have placed your copy of the repository on your local machine.  For example, if the path to your local repository is `~/www/multimatic`, the line should read `- ~/www/multimatic/api:/var/www/html`.

**3. Build images and start Docker**

Run the following command to build everything necessary and start the Docker container as a daemon running in the background.

```
docker-compose up -D
```

**4.  Get your hands on an existing SQL dump and `/wp-content/uploads` folder from another developer -OR- follow the Fresh WordPress configuration steps below**

The easiest way to get up and running is to copy existing uploads and import an existing database from another developer using PHPMyAdmin, by default located at http://localhost:8181, into a database that corresponds to your `docker-compose.yml` configuration.  By default, the database should be named `wordpress`. If you would like to start from a fresh database, perform the following steps:

#### Fresh WordPress configuration

An empty database will need to be properly configured after being initialized to work in a headless capacity. Perform the following steps to get up and running fresh:

1. Navigate to `http://localhost:8080/wp-admin`
2. Create an account
3. Activate the Multimatic
4. Activate all plugins
5. Add a new page called `Home` and then set it as your front page in the `Settings -> Reading -> Your homepage displays` section
6. Change Permalinks to the 'Custom Structure' option and enter `/post/%postname%/`
7. Update your Site Address within `Settings -> General` to your Node app (default: http://localhost:3000)
8. Go to `Settings -> TRBL REST API Settings`. Enable endpoints for `Press` and `Pages`, and enable searching on `Pages` and `Press` as well.

From this point on, you should be all set. All REST API endpoints should be functional and ready to be consumed by a UI. To test, try and pull up the following route in your browser:

```
http://localhost:8080/wp-json/trbl-rest/v1/pages/home
```

You should receive a proper JSON response containing all homepage data.

## Deployment

Deployment is a bit different than local development. It is not recommended to serve WordPress via Docker images. Instead, WordPress should be installed on a WordPress-supported webserver and the contents of the root of this repository should be merged into the root of an existing WP install. From there, either import a database and copy existing files, or follow the above *Fresh WordPress configuration* steps.

## Help

[Baas Creative](https://baascreative.com) has designed and built this repository as well as its accompanying WordPress backend. For help regarding anything related to technical assistance or design consultation, please contact [info@baascreative.com](mailto:info@baascreative.com).
