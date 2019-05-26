# Projet Smart_Leads du groupe 4 !

Smart_Leads est un projet développé en symfony 4.

Projet Smart_Leads du Groupe 4. Les membres sont MARTIN Thomas, AZI Sofiane, MINART Jean-Emile, IGUENANE Marc.

# Pré-Requis

- Wamp pour lancer le serveur.
- Un SGBD
- L'édition du fichier .env afin que l'application se connecte à votre SGBD


## Installation 

-  Télécharger le projet sur github ou clonez le dans votre invité de commande:
```bash
git@github.com:Migiway/Groupe4_Api_Back.git
```
-   Lancer l'invité de commande
-   Se placer dans le dossier du projet avec la commande :
```bash
cd CHEMIN_DU_PROJET
```
-   Installer le projet avec la commande :
```bash
composer install
```
-   Installer la base de données avec la commande :
```bash
php bin/console d:s:u --force
```
- Importer la base de données avec le fichier SQL a la racine du projet
-  Lancer le serveur avec la commande : 
```bash
php bin/console s:r
```


## Accès à l'application

Pour avoir accès à l'application rendez vous sur ce lien dans votre navigateur : [http://localhost:8000/admin/login](http://localhost:8000/admin/login)

Connectez vous pour avoir accès aux fonctionnalités de l'application

## Accès à l'api 
Pour avoir accès à l'api rendez vous sur ce lien depuis votre navigateur : http://localhost:8000/api/doc
