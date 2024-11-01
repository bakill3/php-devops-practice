# Use the official PHP image with Apache
FROM php:8.1-apache

# Install necessary PHP extensions for PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql pgsql

# Set the ServerName to avoid warnings
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Expose port 80 to be accessible from the host
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
