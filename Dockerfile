# Use the official PHP image with Apache (Web Server)
FROM php:8.0-apache

# Install the extension that allows PHP to talk to MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy all your project files (index.php, style.css, etc.) into the container
COPY . /var/www/html/

# Open port 80 (standard web port) so we can access it
EXPOSE 80