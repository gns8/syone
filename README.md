# syone

### (0) Tested with:
* GNU bash, version 4.4.12(1)-release (x86_64-pc-linux-gnu)
* Composer version 2.3.10
* Symfony CLI version 5.4.12
* PHP 8.1.9
* Postgresql 9.6

### (1) SET UP env:
composer create-project symfony/website-skeleton syone  
EDIT your syone/.env

### (2) Add files
from https://github.com/gns8/syone/  

### (3) Up and running:
cd syone  
php ./bin/console doctrine:database:create  
php ./bin/console make:migration  
php ./bin/console doctrine:migrations:migrate  
symfony server:start  
