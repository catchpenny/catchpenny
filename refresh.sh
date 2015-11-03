mysql -uroot -proot -e "drop database catchpenny"
mysql -uroot -proot -e "create database catchpenny"
php /var/www/catchpenny/artisan migrate
php /var/www/catchpenny/artisan db:seed
