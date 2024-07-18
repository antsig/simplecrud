# Simple CRUD
 Simple CRUD (Create, Read, Update, Delete) using CodeIgniter 4.5.2 including Search and Filtering features.

## Requirement
* PHP 8.1 or newer
* XAMPP v3.3.0 or newer
* Text editor (VSCode or others)
* Composer
* Enabled "Intl" extension

## How to Install
Simply ways to use the application.

### Clone or download this repository
Clone the repository using VSCode or windows terminal
```
git clone https://github.com/antsig/simplecrud.git
composer  install
```
### Database setting
* open PHPMyAdmin, create new database.
* import .sql file on the root folder.
* open .env and configure the database information based on your own configuration
```
database.default.hostname = localhost
database.default.database = nama_database_anda
database.default.username = username_database_anda
database.default.password = password_database_anda
database.default.DBDriver = MySQLi
```
### How to Run
* open terminal with active directory to the project folder
* using php spark
 ```
php spark serve
```
* follow the link provided (default can be https://localhost:8080/ on terminal or simply copy-paste to your browser's address
* enjoy the application


