# BOOK AGAIN 

## Project setup
### Setup XAMPP for windows
```
https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/
```



### Clone the repo
```
git clone git@github.com:naveeeeeeen/BookAgain.git
```
place the "BookAgain" folders content in c:/xampp/htdocs/


### Setting up database

Import *bookagain.sql* from phpmyadmin.

### create env varialbles
Create a file named *envs.php* in your root directory.
files content: 
```
<?php
putenv("HOST=localhost");
putenv("USERNAME=root");
putenv("PASSWORD="); // mysql password. If none, leave blank.
putenv("DATABASE=bookagain");
?>
```

## Running the project

From your project root directory in your cmd/terminal run the following command.
```
php -S 127.0.0.1:8000
```
BYE!!
IM DONE WITH LIFE !!  :(