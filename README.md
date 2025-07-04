# Projet de Déploiement WordPress avec Ansible et Docker

Ce projet a pour objectif d'automatiser le déploiement d'un site WordPress avec une base de données MariaDB sur des serveurs Ubuntu et Rocky Linux, en utilisant Ansible dans un environnement conteneurisé avec Docker.

## Structure du Projet

-   `docker-compose.yml`: Définit l'infrastructure du lab (1 contrôleur Ansible, 4 clients).
-   `ansible.cfg`: Fichier de configuration principal pour Ansible.
-   `inventory.yml`: Inventaire des serveurs cibles (les conteneurs clients).
-   `playbook-wordpress.yml`: Le playbook principal qui exécute le déploiement.
-   `roles/`: Contient les rôles Ansible.
    -   `wordpress_deploy/`: Le rôle principal pour le déploiement de WordPress.

## Guide de Démarrage Rapide

Suivez ces étapes pour lancer l'environnement et déployer WordPress.

### 1. Prérequis

-   [Docker Desktop](https://www.docker.com/get-started/) doit être installé et en cours d'exécution.

### 2. Lancement de l'environnement

Ouvrez un terminal à la racine de ce projet et lancez la commande suivante. Cela va construire et démarrer tous les conteneurs en arrière-plan.

```bash
docker compose up -d
```

### 3. Exécution du Déploiement Ansible

Une fois les conteneurs démarrés, vous pouvez lancer le playbook de déploiement.

1.  **Connectez-vous au conteneur de contrôle `ansible` :**

    ```bash
    docker compose exec ansible bash
    ```

    Vous êtes maintenant à l'intérieur du conteneur, dans le répertoire `/ansible`.

2.  **Lancez le playbook :**

    ```bash
    ansible-playbook playbook-wordpress.yml
    ```

    Ansible va maintenant se connecter à tous les clients et exécuter les tâches définies dans le rôle `wordpress_deploy`.

### 4. Vérification

Après une exécution réussie, vous pouvez vérifier que les sites WordPress sont accessibles dans votre navigateur :

-   **Client 1 (Ubuntu) :** `http://localhost:8083/wordpress`
-   **Client 2 (Ubuntu) :** `http://localhost:8084/wordpress`
-   **Client 3 (Rocky) :** `http://localhost:8085/wordpress`
-   **Client 4 (Rocky) :** `http://localhost:8086/wordpress`

Sur chaque page, vous devriez voir l'écran d'installation de WordPress.

### 5. Test de l'Idempotence

Pour vérifier que le rôle est bien idempotent (un critère clé), relancez simplement le playbook une seconde fois :

```bash
cd /ansible

ansible-playbook playbook-wordpress.yml
```

Le résumé final (`PLAY RECAP`) devrait afficher `changed=0` pour tous les clients, prouvant que rien n'a été modifié car tout était déjà en place.

### 6. Arrêt de l'environnement

Quand vous avez terminé, vous pouvez arrêter et supprimer tous les conteneurs et réseaux du lab avec la commande suivante :

```bash
docker compose down
```