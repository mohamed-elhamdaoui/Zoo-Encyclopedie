🐾 Projet Web : Zoo Éducatif

Ce projet consiste à développer une application web interactive destinée à aider les enfants à apprendre les animaux du zoo, leurs habitats, leurs types alimentaires et leurs images de manière ludique et visuelle.

L’application propose une interface simple pour les enfants, ainsi qu’un espace de gestion pour administrer les données.

🎯 Objectifs du projet

Permettre aux enfants de découvrir les animaux grâce à des images et des descriptions.

Offrir des filtres pour rechercher les animaux par habitat ou type alimentaire.

Construire une base de données structurée pour gérer :

Les animaux

Les habitats

Mettre en place un Back-End capable de faire des actions CRUD (Create, Read, Update, Delete).

🗂️ Fonctionnalités principales
👶 Pour les utilisateurs (enfants)

Affichage des animaux avec image, nom, habitat et type alimentaire

Filtrage par habitat

Filtrage par type alimentaire

Visualisation simple et agréable

🧑‍💻 Pour l’administrateur

Ajouter un animal

Modifier un animal (y compris son image)

Supprimer un animal

Gérer les habitats (ajout, modification, suppression)

Voir la liste complète des animaux

🧱 Base de données
Table : animals

ID (clé primaire)

Nom

Type_alimentaire

Image

idHab (clé étrangère → habitats.idHab)

Table : habitats

idHab (clé primaire)

NamHab

Description_Hab

Relation :
👉 Un habitat peut avoir plusieurs animaux (1 → N)

🛠️ Technologies utilisées

PHP (Back-End)

MySQL (Base de données)

HTML / CSS / JS (Front-End simple)

🚀 État actuel

Création de la base de données

Scripts SQL (création, insertion, modification, suppression)

Relation entre les tables OK

Début de la structure du projet

Ce fichier README sera complété au fur et à mesure de l’avancement du projet.
