FROM php:8.2-apache

# MySQLi এক্সটেনশন ইনস্টল করা (ডাটাবেজ কানেকশনের জন্য)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# প্রজেক্টের সব ফাইল সার্ভারে কপি করা
COPY . /var/www/html/

# পোর্ট এক্সপোজ করা
EXPOSE 80
