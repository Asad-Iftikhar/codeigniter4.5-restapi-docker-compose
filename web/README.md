## CodeIgniter 4.5 REST API Integration with JWT
This toolkit is for people who like to build web REST API's with token based structure like JWT using PHP. Its goal is to enable you to develop api much faster than you could if you were writing code from scratch, by providing a template for your workings with the REST API with JWT based tokens.

*********************
**Release Information**
*********************
This repo contains in-development code for future releases.

*********
**Features**
*********

1. Complete REST API control
2. JWT based access tokens
3. CRUD operations
4. Register/Login/Regenerate Token Mechanism
5. Proper Authentication
6. Validation control
7. DB migration given
8. Routing handled
9. Postman collection added

***********
**Setup Instruction**
***********

- Rename `env` to `.env` and tailor for your app.
- Go to the directory where you have `composer.json` and run the following command: `composer install`.
- Change `JWT_SECRET_KEY` & `JWT_TIME_TO_LIVE` according to your need.
- Change `app.baseURL` in .env
- Change DB credentials accordingly in .env
- Create a database with the same name in MySQL.
- Run command `php spark migrate` to create database tables from CI Migration. 
- Open postman and import `RESTAPI_JWT_CI.postman_collection.json`.
- Register a User.
- Login with that user to get the `access_token`.
- To perform crud operations you have to supply the `access_token` in `Authorization->Type->Bearer Token` for authorization with other data in body section.
- If `access_token` expired, you can also regenerate `access_token` by providing `email`.
- create your own public and private keys and replace them with your service code keys
`web/app/Config/Services.php`
  ```html
   openssl genpkey -algorithm RSA -out private_key.pem -aes256
  ```
  ```html
  openssl rsa -pubout -in private_key.pem -out public_key.pem
  ```
> [!IMPORTANT]
> Initially `access_token` has been set for 60 minute.

> [!WARNING]
> `JWT_SECRET_KEY` must be changed for your own protection in production environment.

> [!TIP]
> Either way, running `install` when a `composer.lock` file is present resolves and installs all dependencies that you listed in `composer.json`, but Composer uses the exact versions listed in `composer.lock` to ensure that the package versions are consistent for everyone working on your project.

***********************
**Postman Calls & Methods**
***********************

### Register & Login

POST : [https://YOUR_LOCAL_SITE_NAME/register](https://YOUR_LOCAL_SITE_NAME/register)

|Body     |
|---------|
|name     |
|email    |
|password |

POST : [https://YOUR_LOCAL_SITE_NAME/login](https://YOUR_LOCAL_SITE_NAME/login)

|Body     |
|---------|
|email    |
|password |

![https://imgur.com/a/dhGd7MW](https://i.imgur.com/QgZyscb.png "Postman Login API Check")


### Token Regeneration

POST : [https://YOUR_LOCAL_SITE_NAME/reGenToken](https://YOUR_LOCAL_SITE_NAME/reGenToken)

|Body     |
|---------|
|email    |

![https://imgur.com/eztIRpq](https://i.imgur.com/eztIRpq.png "Regeneration of Token after expires")

*******************
Server Requirements
*******************

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](https://www.php.net/manual/en/mbstring.requirements.php) if you plan to use the HTTP\CURLRequest library
- [mysqli](https://www.php.net/manual/en/mysqli.requirements.php) if you plan to use the HTTP\CURLRequest library

*******************
References
*******************

- [linkedin](https://www.linkedin.com/in/asad-iftikhar91/)
