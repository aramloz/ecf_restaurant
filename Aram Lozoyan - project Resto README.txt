Documentation en Francais:
--------------------------
OS du PC du projet : Windows 11
Front-end : HTML 5 + CSS 3 + Javascript
Back-end : PHP
Base de données + serveur : Apache XAMPP (serveur de base de données MySQL et serveur Apache)

1-Installez XAMPP pour Windows 11 : https://www.apachefriends.org/download.html (emplacement d'installation : C:\xampp)
2-Demarrer le serveur Apache et MySQL à partir du tableau de bord XAMPP

A-DÉPLOIEMENT DE LA BASE DE DONNÉES
-------------------------------------
3-Ouvrez le "DDL et DML.txt", copiez le contenu dans le presse-papiers.
4-Ouvrir http://localhost/phpmyadmin/index.php ? et allez dans l'onglet "SQL", collez le contenu copié depuis "DDL et DML.txt" de l'étape 3 et cliquez sur "Exécuter" pour exécuter les commandes collées (ou ctrl + entrée).
	Le fichier "DDL et DML.txt" contient :
		a-tous les DDL (scripts de langage de définition de données) tels que la création de la base de données, de la table et de l'application des clés primaires et étrangères.
		b-tous les DML (scripts de langage de manipulation de données) où les données de chaque table ont été remplies (y compris les données de création de l'administrateur dans les tables concernées).
5-Création des étapes de l'administrateur (pas besoin d'exécuter de scripts supplémentaires ici car cela sera déjà couvert par les étapes 3 et 4, c'est uniquement pour expliquer) :
	a-Dans le "ecf_restaurant.quai_antique_utilisateur", le "utilisateur_admin" si la valeur est 1, cela signifie que l'utilisateur est un administrateur.
	b-Dans notre cas, le nom d'utilisateur admin est "admin@admin.com" et le mot de passe est "admin"

B-DÉPLOIEMENT DU FRONT ET DU BACK END : (peut-être nous le changerons plus tard en GIT)
6-Téléchargez le dossier compressé "htdocs" sur le bureau du PC sur lequel le projet doit être déployé et décompressez-le.
7-Copiez le dossier "htdocs" décompressé et collez-le dans : "C:\xampp\htdocs"
8-Effectuez un essai routier :
	a-Ouvrez votre navigateur internet et cliquez sur l'URL suivante : "http://localhost/home_page.php", vous devriez être redirigé vers la page d'accueil du site du restaurant "Quai Antique".
	b-Testez le login administrateur : Cliquez sur le bouton "s'identifier" en haut à gauche qui devrait vous rediriger vers la page de connexion admin.
	c-Entrez l'email de l'administrateur (admin@admin.com) et le mot de passe (admin) et cliquez sur "Connexion". Vous devriez être redirigé vers le panneau d'administration qui possède toutes les fonctionnalités d'administration requises dans le projet.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

Documenation in English:
------------------------
OS of the PC of the project: Windows 11
Front-end: HTML 5 + CSS 3 + Javascript
Back-end: PHP
Database + server: Apache XAMPP (MySQL database server & Apache server)

1-Install XAMPP for Windows 11: https://www.apachefriends.org/download.html (location of installation: C:\xampp)
2-Start the Apache server & MySQL from the XAMPP dashboard

A-DEPLOYMENT OF THE DATABASE
----------------------------
3-Open the "DDL and DML.txt", copy the content to the clipboard.
4-Open http://localhost/phpmyadmin/index.php? and go to the "SQL" tab, paste the content copied from "DDL and DML.txt" from step 3 and click on "Executer" to run the commands pasted (or ctrl + enter).
	The "DDL and DML.txt" file contains:
		a-all the DDL (data definition language scrips) such as the creation of the database, table, and application of primary and foreign keys.
		b-all the DML (data manipulation language scripts) where the data of each table was filled (including the administrator creation data in the relevant tables).
5-Creation of the administrator steps (no need to run any additional scripts here as it will be covered already by step 3 & 4, this is only to explain):
	a-In the "ecf_restaurant.quai_antique_utilisateur", the "utilisateur_admin" if value is 1, it means the user is an admin.
	b-In our case, the admin username is "admin@admin.com" and the password is "admin"

B-DEPLYOMENT OF THE FRONT AND BACK END: (maybe we change it later to GIT)
6-Download the "htdocs" zipped folder to the desktop of the PC that the project is to be deployed, and unzip it.
7-Copy the unzipped "htdocs" folder and paste it into: "C:\xampp\htdocs"
8-Run a test drive:
	a-Open your internet browser and hit the following URL: "http://localhost/home_page.php", you should be redirected to the homepage of the "Quai Antique" restaurant website.
	b-Test the administator login: Click on the "s'identifier" button on the top left which should redirect you to the admin login page.
	c-Enter the admin email (admin@admin.com) and password (admin) and click on "Sign in". You should be redirected to the admin panel which has all the admin functionalities required in the project.
