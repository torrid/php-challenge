#!/bin/bash 

# This needs a running system, connects to the mariadb container, does the migration sql 
# and dumps the changed DB into the .db_dump/0-challenge.sql file. 

DIRECTORY=$(cd $(dirname "$0") && pwd)

docker exec -it php-challenge_db_1 mariadb challenge < $DIRECTORY/challenge.sql 
docker exec -it php-challenge_db_1 mariadb-dump challenge > $DIRECTORY/../.db_dumps/0-challenge.sql 
