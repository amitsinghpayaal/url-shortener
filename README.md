# Please Check Out master branch
# URL Shortener Application

A modern, feature-rich URL shortening application built with Laravel 10, Jetstream, and Livewire. This application provides secure URL shortening capabilities with role-based access control, company management, and user invitation system.

## 🛠️ Technology Stack

- **Backend**: Laravel 10 (PHP 8.1+)
- **Frontend**: Livewire 3, Tailwind CSS, Vite, Bootstrap
- **Authentication**: Laravel Jetstream
- **Database**: MySQL
- **Styling**: bootstrap with Forms and Typography plugins

Before you begin, ensure you have the following installed on your system:

- **PHP**: 8.1 or higher
- **Composer**: Latest version
- **Node.js**: 16 or higher
- **NPM**: Latest version
- **Database**: MySQL 8.0+
- **Web Server**: Apache/Nginx (or use Laravel's built-in server)

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/amitsinghpayaal/url-shortener.git
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Environment Configuration

```bash
# Copy the environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Configure Database

Edit the `.env` file and update your database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. Seed the Database (Optional)

```bash
# Run all seeders
php artisan db:seed

# Or run specific seeders
php artisan db:seed --class=SuperAdminSeeder
php artisan db:seed --class=DemoCompanyAndUsersSeeder
```

### 8. Build Frontend Assets

```bash
# For development
npm run dev

# For production
npm run build
```

### 9. Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## 👥 Default Users

After running the seeders, you'll have the following default users:

### Super Admin
- **Email**: superadmin@urlshortener.com
- **Password**: superadmin
- **Role**: SuperAdmin

### Demo Company Admin
- **Email**: admin@urlshortener.com
- **Password**: admin
- **Role**: Admin

### Demo Company Member 1
- **Email**: member1@urlshortener.com
- **Password**: member1
- **Role**: Member

### Demo Company Member 2
- **Email**: member2@urlshortener.com
- **Password**: member2
- **Role**: Member

## 🔐 User Roles & Permissions

### SuperAdmin
- Can manage all companies and users
- Can create new companies
- Full system access

### Admin
- Can manage users within their company
- Can create and manage short URLs
- Can invite new users to their company

### Member
- Can create and view short URLs
- Limited to their company's data
