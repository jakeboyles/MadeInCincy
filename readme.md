MadeInCincy
===========

MadeInCincy is a map application that plots and shows all of cincinnatis startup and tech businessess.

## Setup
Pull down the repo using git
```
git clone git@github.com:jakeboyles/MadeInCincy.git
```

Move into the directory and use composer and npm to download the necessary dependencies

```
cd MadeInCincy
composer install
npm install
```

If you get an error from npm, try installing gulp globally first.

```
npm install --global gulp
npm install
```

Copy the `.env.example` file and call it `.env`.  Fill out the necessary environment variables to match your local development environment.

Next, run the migrations and seed you database.

```
php artisan migrate --seed
```

Lastly, use gulp to move all assets into the appropriate folders in the public directory.  It is best to use gulp to watch these directories if you plan on adding something to them.

```
gulp watch
```

## Gotchas
Right now we have to modify the searchable trait file to get it to work with lumen:


Just replace the getDatabaseDrive() function with whats below, the file is: /vendor/nicolaslopezj/searchable/src/SearchableTrait.php line 80.

protected function getDatabaseDriver() {
    return 'mysql';
}