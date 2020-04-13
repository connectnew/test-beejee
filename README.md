Please update your docker and docker-compose to latest version.
````
docker-compose --compatibility up --build -d
docker exec -it mvc_l_b_db bash 
cd docker-entrypoint-initdb.d
mysql -u root -p mvc-l-b < mvc-l-b.sql
exit
docker exec -it mvc_l_b_php bash
composer install
exit
npm install
npm run build
````
