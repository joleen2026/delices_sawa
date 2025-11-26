# Utilise une image PHP avec serveur intégré
FROM php:8.2-cli

# Copie tout le projet dans le conteneur
COPY . /var/www/html

# Définit le dossier de travail
WORKDIR /var/www/html

# Expose le port utilisé par Render
EXPOSE 10000

# Démarre le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:10000"]
