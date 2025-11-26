# Utilise PHP CLI officiel
FROM php:8.2-cli

# Installer les dépendances nécessaires pour PHP et MySQL
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Copier tout le projet dans le conteneur
COPY . /var/www/html

# Définir le dossier de travail
WORKDIR /var/www/html

# Expose le port utilisé par Render
EXPOSE 10000

# Commande pour démarrer le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:10000"]
