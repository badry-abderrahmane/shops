Welcome to Nearby Shops
===================


Hey! This is the most simple and easy example to show the power of Laravel 5.5, VueJS 2.5 and Vuetify 0.17.
 > This application was coded following the instructions provided to complete the **Hidden founders coding challenge**.

----------


How to deploy
-------------

Nearby shops is a PHP & Javascript application, so you will need to have a well configured HTTP server. If not then you should configure one before going any further.

You will need to complete an easy 3 steps deployment process:

#### <i class="icon-file"></i> Step 1:  Clone & Install
You will need to clone this repository on your public directory:
```
git clone https://github.com/badry-abderrahmane/shops.git
```
The next thing to do is installing the required dependencies, run the following command :

```
composer install
```
And you need to generate a key for the application, you could do that by running:

```
php artisan key:generate
```

#### <i class="icon-file"></i> Step 2: Database

> **Note:**
> If you wish to use the existing **Test Database** keep the parameters as they are in the config file. It already contains the needed collections.

I did choose to implement a MongoDB database to keep it simple and clean. The database configuration is located in : **config/database.php**, you will need to set the "port" and "dsn" as below:
```
	'mongodb' => [
	            'driver'   => 'mongodb',
	            'port' => ,
	            'dsn' => '' => '',
	        ],
```

You will need also to run the migration command:
```
> php artisan migrate
```
You will need also to load the dump data for test running the command below
```
mongorestore --drop -d db_name -c collection_name path/file.bson
```
<<<<<<< HEAD
>As we are dealing with locations you should add a "2dsphere" index on the shops collection

=======
>>>>>>> 059858f9e07178995450cd1569fc8e272e711d9c

#### <i class="icon-file"></i> Step 3:  Deploy
You need to run this command below
```
> php artisan serv
```

Official documentation
-------------

**Laravel 5.5** :  [Official Guide](https://laravel.com/docs/5.5/installation)
**VueJs 2.5** :  [Official Guide](https://vuex.vuejs.org/en/)
**VuetifyJS 0.17** :  [Official Guide](https://vuetifyjs.com/)
