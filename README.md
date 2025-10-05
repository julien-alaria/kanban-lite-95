# Presentation de l'application

# Kanban Lite

Une application web simple de gestion de tickets sous forme de tableau **Kanban**, développée en PHP avec le design pattern MVC (Model-Vue-Controller), **HTML/CSS** et **Javascript** pour pour support du **Markdown** et manipulation des tickets par **drag & drop**.

# Fonctionnalités
- **création, édition et suppression de tickets**
- **Organisation des tickets pas statut: A faire / Encours / Terminé**
- **affichage des notes avec rendu Markdown**
- **manipulation des tickets par drag & drop**
- **Statut modifiable via menu déroulant**
- **Recherche de tickets par mots clés**
- **base de donnée locale avec SQLite**
- **structure MVC claire pour une meilleure organisation du code**

# Pré-requis

Avant d'exécuter l'application, assurez vous d'avoir:

- **PHP** (version 8.1+ recommandée)
- **SQLite3**
- **Un navigateur moderne**

L'application utilise Javascript côté client, aucune installation n'est requise.

## Dépendances front-end

Les fonctionnalités dynamiques utilisent les bibliothèques JavaScript suivantes (chargées via Content Delivery Network dans le HTML):

- **SimpleMDE** - éditeur de markdown
- **Marked.js** - conversion Markdown en HTML
- **DOMPurify** - sécurisation du rendu HTML

# Installation

1. **Cloner le dépôt GIT**

git clone https://github.com/julien-alaria/kanban_lite.git

2. **Lancer un serveur PHP local (depuis le dossier du projet)**

php -S localhost8000 -t public

le fichier index.php est le point d'entrée de l'application

3. **Accéder à l'application dans votre navigateur:**

http://localhost:8000

# Architecture du projet (MVC)

L'application suit le modèle MVC en séparant:

- **models :** la logique métier et les interactions avec la base SQLite
- **views :** les templates HTML partagés (header, footer, formulaire, affichage...)
- **controllers :** la gestion des requêtes utilisateur et de la logique de navigation
- **routeur :** gestion de la navigation et des actions via les URLs

# Captures d'écran de l'application

![presentation](kanban-lite_screenshot1.png)

# Arborescence du projet

Kanban_Lite/
│

├── controllers/

│   └── itemController.php

│

├── core/

│   ├── db.php

│   └── routeur.php

│

├── database/

│   ├── database.sqlite

│   └── init.sql

│

├── models/

│   └── itemModel.php

│

├── public/

│   ├── css/

│       └── style.css

│   └── index.php

│

├── views/

│   ├── footer.php

│   ├── form.php

│   ├── header.php

│   ├── items.php

│   ├── results.php

│   └── update.php

│

└── README.md

# Licence
Ce projet est open-source, sous licence MIT.
