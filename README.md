<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

1.	CADRE GENERAL
Le projet consiste à développer un Site Web E-commerce dédiée à l’achat et la vente des voitures d’occasion.
La plateforme fournira un espace qui facilite la commercialisation desdits véhicules entre particuliers et professionnels, tout en y procurant un minimum de garantie assurée par un expert automobile en vue d’écarter le risque d’arnaque.   
Le développement sera conduit sous le Framework Laravel 8.

2.	ARCHITECTURE DU SITE
Le site est structuré en 6 rubriques (pages) accessibles à partir du menu principal :
1.	ACCUEIL 
2.	ACHETER 
3.	VENDRE 
4.	PANIER 
5.	EXPRESS 
6.	GESTIONNAIRE
7.	ADMINISTRATION
8.	EXPERT

Les rubriques citées sont alignées au milieu d’une barre horizontale placée en haut de la page principale.

3.	FONCTIONNEMENT
Seul le gestionnaire peut créer ou modifier les publications au niveau du Site Web.
Les visiteurs du Site Web n’ont le droit que d’en consulter les pages et proposer - via formulaire - des véhicules qu’ils souhaitent vendre.

3.1.	ACCUEIL :
Elle constitue la page principale et elle est automatique chargée à la visite du Site Web.
Cette page contient comme suit :
•	Une barre de recherche des véhicules, par :
-	Marque ;
-	Modèle ;
-	Ville ;
-	Transmission ;
-	Carburant.
•	Une grille 3 x 5 des véhicules récemment publiés :
-	Qui en font apparaitre les photos et les caractéristiques (marque, modèle, prix, transmission, carburant, catégorie et année de fabrication)
-	Avec possibilité d’ajouter les véhicules souhaités au panier ; 
-	Selon modèle ;
-	Chaque élément de la grille (Fiche Véhicule) doit être interactif au passage du curseur et afficher instantanément deux icônes cliquables :
	Icône 1 : diriger vers la page détail du véhicule ;
	Icône 2 : afficher une fenêtre qui contient des images du véhicule avec des choix différents (télécharger, partager, télécharger…)

•	Une liste des étapes de vente ;
•	Des fiches descriptives des avantages d'express  ;
•	Des fiches qui affichent la photo, le nom/prénom, le titre d’expertise et le numéro de téléphone portable des experts automobiles assignés ;
•	Un formulaire de contact ;
•	Les coordonnées de la Société, avec une zone de localisation sur Map.

3.2.	ACHETER :
Cette interface permet aux acheteurs potentiels de consulter et rechercher les voitures souhaitées selon les critères précités.
Elle est composée de :
•	Des cartes explicatives et descriptives – placées en haut de la page ;
•	Une barre de recherche, similaire à celle de la page d’accueil ;
•	Une grille qui affiche toutes les voitures disponibles.

3.3.	VENDRE :

Cette page permet à un visiteur de soumettre une demande de publication d’une voiture pour vente au niveau du Site Web.
Elle est formée de :
•	Cartes - positionnées en haut de la page – décrivant les avantages transactionnels du Site ;
•	Un formulaire pour renseigner les données d’identification du vendeur potentiel (nom, prénom, adresse email, numéro de téléphone et ville) ;
•	Un deuxième formulaire pour renseigner les informations concernant le véhicule à vendre (marque, modèle, matricule, année, transmission et carburant) ;
Un message confirmant l’envoi du formulaire doit s’afficher suite à la validation des formulaires par le vendeur. 
Tous les champs doivent être renseignés avant de pouvoir valider l’action d’envoi.

Les demandes sont listées par la suite au niveau d’une interface accessible par le gestionnaire, à partir de laquelle, ce dernier peut assurer le traitement de validation nécessaire.

3.4.	PANIER :
L’utilisateur du Site doit être capable de stocker dans un panier les véhicules qu’il souhaite enregistrés.
Il doit également avoir la possibilité de supprimer des véhicules de sa liste panier.

3.5.	EXPRESS 
L’interface d'Express permet aux visiteurs du site de rechercher des véhicules qui n’y existent pas en formulant une demande via formulaire.


3.6.	GESTIONNAIRE
Cette rubrique est accessible uniquement par le Gestionnaire.
Elle lui permet de gérer :
•	Les demandes ;
•	Les missions
Chacune de ces deux sous rubriques dispose de ses propres interfaces qui permettent de consulter, créer, modifier et supprimer les enregistrements selon le besoin.
3.7.	ADMINISTRATION
La partie Administration regroupe l’ensemble des interfaces à partir desquelles, le Gestionnaire peut gérer :
•	Les données (en création, modification et suppression) concernant :
-	Les véhicules ;
-	Les marques ;
-	Les modèles ;
-	Les types de carburants ;
-	Les types de transmissions ;
-	Les villes
-	Les couleurs
-	Les comptes

•	Les comptes utilisateurs.

3.8.	EXPERT
A travers ce menu, l'expert peut :
•	Consulter les missions qui lui ont été affectées par le gestionnaire ;
•	Corriger les données d’un véhicule proposés pour vente.

