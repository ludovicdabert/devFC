#!/usr/bin/env bash

USERNAME='root'
PASSWORD=''
DBNAME='robot'
HOST='localhost'

USER_USERNAME='admin'
USER_PASSWORD='admin'

ENCODAGE='utf8mb4'
INTERCLASSEMENT='utf8mb4_unicode_ci'

ENV='.env'

MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET $ENCODAGE COLLATE $INTERCLASSEMENT;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and host='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)

# le pipe permet de récupérer la chaine des commandes SQL qui seront exécutées par mysql en mode administrateur
echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

# On lance maintenant les migrations et les seeders
echo "Migrations and seeders..."
php artisan migrate --seed