<img src="public/img/uuri.png" alt="Uuri Logo" width="100">

# Uuri - Open source time tracking

Uuri is a Laravel-based project management and time tracking system that helps you manage time entries per project efficiently.

## Features

- Client Management
- Project Tracking with start/end dates and rates
- Time Entry Management
- Billable vs Non-billable time tracking
- User-based access control
- Integration with Moneybird for invoicing

## Installation

1. Clone the repository:

```bash
git clone https://github.com/janyksteenbeek/uuri.git
cd uuri
```

2. Install dependencies:

```bash
composer install
```

3. Set up your environment:

```bash
cp .env.example .env
php artisan key:generate
```

4. Setup your database (use SQLite or change in `.env`) and run migrations:

```bash
touch database/database.sqlite
php artisan migrate
```

5. Build the assets

```bash
npm install
npm run build
```

6. Run the Scheduler every minute in a cron

```bash
php artisan schedule:run
```

7. Start the queue worker:

```bash
php artisan queue:work
```

### Supervisor configuration

You can use supervisor to run the queue worker.

```cnf
[program:uuri]
command=php artisan queue:work --queue=default
autostart=true
autorestart=true
user=www-data
directory=/var/www/uuri
numprocs=10
redirect_stderr=true
stdout_logfile=/var/log/uuri.log
```

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start uuri
```

## License

Uuri is licensed under the [MIT License](LICENSE) and is free to use, modify and distribute. A credit is

Dependencies may be subject to their own licenses.

## Security

If you discover any security-related issues, please email [opensource@janyk.dev](mailto:opensource@janyk.dev) instead of using the
issue tracker. All security vulnerabilities will be promptly addressed.
