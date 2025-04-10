# RPG Framework

A lightweight and high-performance PHP framework designed for simplicity and flexibility.

## System Settings

System settings can be configured in the `settings.php` file. The main sections include:

   * Constants → Defines timezone, language, and debugging settings.

   * Database → Database connection details.

   * Defaults → Default settings for your project.

## Root Directory

Your project's root directory is `public`. The `index.php` inside this directory handles all routing. You can place your static assets such as CSS, JS, webfonts, images, `robots.txt`, and `sitemap.xml` in this directory.

## Installation

To get started with RPG Framework, clone the repository and upload it to your web server's root directory.

## Apache Configuration

RPG Framework includes an `.htaccess` file for Apache configuration in the `public` directory.

## Nginx Configuration

If you're using Nginx, you can use the following configuration to serve RPG Framework.

```
    server {
        listen 80;

        server_name localhost;
        root /var/www/html/rpg-framework/public;
     
        add_header X-Frame-Options "SAMEORIGIN";
        add_header X-Content-Type-Options "nosniff";
     
        index index.php;
     
        charset utf-8;
     
        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }
     
        location = /favicon.ico { access_log off; log_not_found off; }
        location = /robots.txt  { access_log off; log_not_found off; }
     
        error_page 404 /index.php;
     
        location ~ ^/index\.php(/|$) {
            fastcgi_hide_header X-Powered-By;

            include fastcgi_params;
            fastcgi_pass unix:/run/php-fpm/www.sock;

            fastcgi_index index.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        }
     
        location ~ /\.(?!well-known).* {
            deny all;
        }
    }
```

## Route Definition

In RPG Framework, routes are defined by creating PHP classes in the `app/controllers` directory. The file and class names should be in lowercase. The `main` method within the controller is automatically executed when the corresponding URL is accessed.

For the route `example.com/contact`, create the file: `app/controllers/contact.php`

Content of the file:

```
    class contact extends controller
    {
        public function main()
        {
            echo "Hello World!";
        }
    }
```

The controller class inherits from `app/base/controller.php`, which serves as a base controller. This allows you to avoid repeating commonly used methods across your pages.

## Defaults

Default settings are located in `system/settings.php`. You can modify these values to suit your needs. Two key variables are:

   * `$index`: The page that receives incoming requests to your website. If you want your homepage to be accessed via `example.com` or `example.com/index`, you don’t need to change the default value. However, you’ll need to create `app/controllers/index.php`.

   * `$not_found`: The page to be displayed when a route is not found. By default, this points to `not_found`. You can customize it by creating `app/controllers/not_found.php`.
