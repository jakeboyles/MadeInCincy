MadeInCincy is a map application that plots and shows all of cincinnatis startup and tech businessess. 



Right now we have to modify the searchable trait file to get it to work with lumen:


Just replace the getDatabaseDrive() function with whats below, the file is: /vendor/nicolaslopezj/searchable/src/SearchableTrait.php line 80.

protected function getDatabaseDriver() {
    return 'mysql';
}