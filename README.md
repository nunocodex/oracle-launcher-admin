# Note

This project only manages the "Oracle Launcher" database.

# Pre Install

Copy this project to your root web source.

# Install

Follow the Laravel install/setup procedure.

# Post Install

Run command shell `composer install`
Run command shell `php artisan key:generate`
Run command shell `php artisan storage:link`

# Setup

Setup `.env` with vision database:

```
DB_VISION_HOST=127.0.0.1
DB_VISION_PORT=3306
DB_VISION_DATABASE=vision
DB_VISION_USERNAME=root
DB_VISION_PASSWORD=
```

# Create admin account

Run `php artisan orchid:admin {username} {email} {password}`
