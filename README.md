# Mise en place de TP-FORMATION
- Utilisation de l'image docker de la formation pour la mise en place de la BDD et executer cette image
- Aller sur http://localhost:8081/ et se connecter avec le login et le mot de passe root
- créer une BDD 'tp-formation' interclassement : 'utf8mb4_general_ci'
- Créer un utilisateur pour cette BDD
- **Cloner le projet** `git clone https://github.com/dev-allan/tp-formation`

# A la racine du projet, 
- étape 1 : executer la commande `npm install`
- étape 2 : executer la commande `npm run watch`
- étape 3 : executer la commande `symfony server:start` qui lancera le projet sur le port 8000
- étape 4 : dans le fichier **.env**, *DATABASE_URL="mysql://symfony:bidule@127.0.0.1:3306/tp-formation?serverVersion=10.6.4-MariaDB-1:10.6.4&charset=utf8mb4"*, remplacer *symfony* par le login de l'utilisateur créer et *bidule* par son mot de passe
- étape 5 : executer la commande `php bin/console make:migration` pour générer un fichier de migration
- étape 6 : executer la commande `php bin/console doctrine:migrations:migrate` pour exécuter la migration


