# Sunflower Photo Gallery

A beautiful, responsive photo gallery application built with Laravel and Filament PHP, featuring a Pinterest-style masonry layout and comprehensive admin panel.

## Features

- **Pinterest-Style Masonry Layout**: Responsive grid with 2 columns on mobile and 3 columns on desktop
- **Animate On Scroll (AOS)**: Smooth scroll animations for engaging user experience
- **Image Failover**: Automatic fallback to 404.png when images fail to load
- **Filament Admin Panel**: Complete CRUD interface for managing gallery images
- **Dark Mode Support**: Fully responsive design with light/dark themes
- **Lazy Loading**: Optimized image loading for better performance
- **Hover Effects**: Smooth zoom and title overlays on images
- **SEO Optimized**: Proper meta tags and descriptions

## Tech Stack

- **Backend**: Laravel 12
- **PHP**: 8.2.4
- **Admin Panel**: Filament v5
- **Frontend**: Livewire 4 + Flux UI Free v2
- **Styling**: Tailwind CSS v4
- **Animations**: AOS (Animate On Scroll)
- **Testing**: Pest 3
- **Code Quality**: Laravel Pint

## Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL 8.0+ / PostgreSQL 12+ / SQLite 3.8+
- Web server (Apache, Nginx, or PHP built-in server)

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd sample
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   ```
   
   Edit `.env` and configure your database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sunflower_gallery
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the database**
   ```bash
   php artisan db:seed --class=GallerySeeder
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```

8. **Build assets**
   ```bash
   npm run build
   ```

9. **Start development server**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` to see the gallery.

## Admin Panel

- **URL**: `http://localhost:8000/admin`
- **Email**: diskominfosatik@serangkab.go.id
- **Password**: password

**Admin Features**:
- Upload and manage gallery images
- Edit image metadata (title, description, alt text)
- Control sort order
- Toggle image visibility (active/inactive)
- Bulk delete operations
- Responsive table with thumbnails

## Project Structure

```
sample/
├── app/
│   ├── Filament/
│   │   └── Resources/
│   │       └── GalleryImages/
│   │           ├── GalleryImageResource.php
│   │           ├── Schemas/
│   │           │   └── GalleryImageForm.php
│   │           ├── Tables/
│   │           │   └── GalleryImagesTable.php
│   │           └── Pages/
│   ├── Http/Controllers/
│   │   └── GalleryController.php
│   └── Models/
│       └── GalleryImage.php
├── database/
│   ├── migrations/
│   │   └── 2026_02_16_000000_create_gallery_images_table.php
│   ├── seeders/
│   │   └── GallerySeeder.php
│   └── factories/
│       └── GalleryImageFactory.php
├── public/
│   ├── assets/
│   │   ├── sunflower.svg
│   │   └── 404.png
│   └── storage/
│       └── galleries/  (Gallery images stored here)
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   ├── views/
│   │   ├── gallery.blade.php
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   └── simple.blade.php
│   │   └── partials/
│   │       └── head.blade.php
└── routes/
    └── web.php
```

## Hosting

### Shared Hosting (cPanel, Plesk, etc.)

1. **Upload files**
   - Upload all files to `public_html` or your document root
   - Ensure `.htaccess` is included for routing

2. **Configure environment**
   ```bash
   # In your hosting control panel or SSH
   cp .env.example .env
   ```
   
   Edit `.env` with production database credentials:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   
   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

3. **Generate application key**
   ```bash
   php artisan key:generate
   ```

4. **Install dependencies**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm install --production
   ```

5. **Run migrations**
   ```bash
   php artisan migrate --force
   ```

6. **Seed database (optional)**
   ```bash
   php artisan db:seed --class=GallerySeeder --force
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```
   - If symbolic links aren't allowed, create a manual link or use `php artisan storage:link --relative`

8. **Build assets**
   ```bash
   npm run build
   ```

9. **Set permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   chmod -R 644 public/build
   ```

10. **Configure web server**
    - Ensure document root points to `public` directory
    - Enable mod_rewrite for Apache
    - Set proper PHP version (8.2+)

### VPS / Cloud Server (DigitalOcean, AWS, Google Cloud)

1. **Prepare server**
   ```bash
   # Update packages
   sudo apt update && sudo apt upgrade -y
   
   # Install required packages
   sudo apt install -y nginx php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-curl php8.2-zip php8.2-gd php8.2-bcmath mariadb-server mariadb-client
   
   # Install Composer
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   
   # Install Node.js
   curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
   sudo apt install -y nodejs
   ```

2. **Clone repository**
   ```bash
   cd /var/www
   sudo git clone <repository-url> sunflower-gallery
   cd sunflower-gallery
   sudo chown -R www-data:www-data .
   ```

3. **Install dependencies**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm install
   ```

4. **Configure database**
   ```bash
   sudo mysql -u root -p
   
   CREATE DATABASE sunflower_gallery;
   CREATE USER 'gallery_user'@'localhost' IDENTIFIED BY 'your_strong_password';
   GRANT ALL PRIVILEGES ON sunflower_gallery.* TO 'gallery_user'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

5. **Configure environment**
   ```bash
   cp .env.example .env
   nano .env  # or use your preferred editor
   ```

6. **Generate key and migrate**
   ```bash
   php artisan key:generate
   php artisan migrate --force
   php artisan db:seed --class=GallerySeeder --force
   php artisan storage:link
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Configure Nginx**
   ```nginx
   server {
       listen 80;
       server_name yourdomain.com;
       root /var/www/sunflower-gallery/public;
       index index.php;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location ~ \.php$ {
           include fastcgi_params;
           fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
           fastcgi_index index.php;
       }

       location ~ /\.(?!well-known).* {
           deny all;
       }
   }
   ```

9. **Configure PHP-FPM**
   ```ini
   # /etc/php/8.2/fpm/pool.d/www.conf
   user = www-data
   group = www-data
   listen = /var/run/php/php8.2-fpm.sock
   listen.owner = www-data
   listen.group = www-data
   ```

10. **Start services**
    ```bash
    sudo systemctl restart php8.2-fpm
    sudo systemctl restart nginx
    sudo systemctl enable php8.2-fpm
    sudo systemctl enable nginx
    ```

11. **Set up SSL (recommended)**
    ```bash
    sudo certbot --nginx -d yourdomain.com
    ```

### Platform as a Service (Heroku, Vercel, Laravel Forge)

#### Heroku

1. **Prepare Heroku app**
   ```bash
   heroku create sunflower-gallery
   ```

2. **Add database**
   ```bash
   heroku addons:create heroku-postgresql:mini -a sunflower-gallery
   ```

3. **Set environment variables**
   ```bash
   heroku config:set APP_ENV=production APP_DEBUG=false -a sunflower-gallery
   heroku config:set APP_KEY=$(php artisan key:generate --show) -a sunflower-gallery
   ```

4. **Deploy**
   ```bash
   git push heroku main
   ```

5. **Run migrations**
   ```bash
   heroku run php artisan migrate --force -a sunflower-gallery
   heroku run php artisan db:seed --class=GallerySeeder --force -a sunflower-gallery
   heroku run php artisan storage:link -a sunflower-gallery
   ```

#### Laravel Forge

1. **Connect server**
   - Log in to Forge
   - Add your server

2. **Create site**
   - Click "Create Site"
   - Select your server
   - Set domain and PHP version (8.2+)

3. **Install repository**
   - Select "Repository" installation type
   - Connect your Git repository
   - Select branch (usually `main` or `production`)

4. **Configure deployment**
   - Enable "Quick Deploy"
   - Set deployment script:
     ```bash
     cd /home/forge/default
     php artisan migrate --force
     php artisan storage:link
     php artisan db:seed --class=GallerySeeder --force
     npm run build
     ```

5. **Add database**
   - Click "Database" tab
   - Create new database
   - Copy credentials to `.env` via Forge UI

6. **Deploy**
   - Click "Deploy Now"
   - Monitor deployment logs

## Performance Optimization

1. **Enable OPcache**
   ```ini
   ; /etc/php/8.2/fpm/php.ini
   opcache.enable=1
   opcache.memory_consumption=128
   opcache.max_accelerated_files=10000
   opcache.revalidate_freq=60
   ```

2. **Configure queue workers**
   ```bash
   php artisan queue:work --tries=3 --timeout=90
   ```

3. **Enable caching**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

4. **Optimize composer**
   ```bash
   composer dump-autoload --optimize
   ```

## Security Recommendations

1. **Environment variables**
   - Never commit `.env` file
   - Use strong database passwords
   - Set `APP_ENV=production` in production
   - Set `APP_DEBUG=false` in production

2. **File permissions**
   ```bash
   chmod 600 .env
   chmod -R 755 storage bootstrap/cache
   ```

3. **HTTPS**
   - Always use HTTPS in production
   - Configure SSL certificates (Let's Encrypt is free)

4. **Regular updates**
   ```bash
   composer update
   npm update
   ```

5. **Monitor logs**
   ```bash
   tail -f storage/logs/laravel.log
   ```

## Troubleshooting

### Images not displaying
- Check storage link: `php artisan storage:link`
- Verify file permissions: `chmod -R 755 public/storage`
- Check `.env` `APP_URL` is correct

### Admin panel not accessible
- Verify Filament routes: `php artisan route:list | grep admin`
- Check admin user exists in database
- Clear cache: `php artisan config:clear && php artisan route:clear`

### Styles not loading
- Rebuild assets: `npm run build`
- Clear browser cache
- Check `APP_URL` in `.env`

### 404 errors
- Ensure web server document root points to `public` directory
- Check Nginx/Apache configuration
- Verify routing: `php artisan route:list`

## Testing

Run the test suite:
```bash
php artisan test
```

Run specific tests:
```bash
php artisan test --filter=GalleryTest
```

## License

This project is open-source software available under the MIT license.

## Support

For issues and questions, please refer to:
- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)

---

Built with ❤️ using Laravel and Filament PHP
