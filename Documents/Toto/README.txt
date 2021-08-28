Le projet fonctionne avec la version 7.4.11 de php.

Dans application => config => database, dans le tableau $db['default']
hostname = chemin vers le nom de l'hote ou se trouve votre DB
UserName = utilisateur ayant accès en lecture/écriture à la db
Password =  Mot de passe de l'utilisateur utilisé pour la connexion à la db (UserName)
port= le port sur lequel tourne mysql.

Créer une base de données MySQL ayant pour nom "gameshop" et procéder au restore du dump du fichier 
gameshop.sql accessible à la racine du répertoire.