# Admin & Website Management System

A modern Laravel 12 web application with an interactive Admin Dashboard, Content Management (Blog & Testimonials), User Management, Visitor Country Analytics, and a Public Website with Contact Form spam protection.

---

## 🚀 Features

- **📊 Admin Analytics & Dashboard**: Real-time traffic, visitor analytics with country detection, and interactive charts powered by ApexCharts.
- **👥 User Management**: Full CRUD operations for administrator and user accounts.
- **📝 Blog Management**: Create, edit, and publish blog articles with categories, slugs, rich content, and featured image uploads.
- **💬 Testimonials Management**: Manage client and customer feedback.
- **🌐 Public Website & Blog**: Responsive public-facing landing page and blog reader (`/` and `/blog`).
- **🛡️ Spam Protection**: Contact form protected by rate limiting and Spatie Honeypot.
- **⚡ Modern Frontend Stack**: Powered by Bootstrap 5, Vite, SCSS, Boxicons, and jQuery DataTables.

---

## 📋 System Requirements

Ensure your development environment meets the following requirements:

- **PHP**: `>= 8.2` (with PDO, OpenSSL, Mbstring, Tokenizer, XML, Ctype, JSON, cURL, Fileinfo extensions enabled)
- **Composer**: `2.x`
- **Node.js**: `>= 18.x` & **NPM**: `>= 9.x`
- **Database**: SQLite (default), MySQL 8.0+, or MariaDB

---

## 🛠️ Step-by-Step Installation & Setup

### 1. Clone or Open the Repository
```bash
cd new-admin
```

### 2. Install Backend Dependencies
```bash
composer install
```

### 3. Install Frontend Dependencies
```bash
npm install
```

### 4. Set Up the Environment File
Copy the example environment configuration:

**On Windows (PowerShell / CMD):**
```powershell
copy .env.example .env
```

**On Linux / macOS:**
```bash
cp .env.example .env
```

### 5. Generate the Application Key
```bash
php artisan key:generate
```

### 6. Configure the Database
By default, the project is configured for **SQLite**.

#### Option A: Using SQLite (Default)
Ensure `DB_CONNECTION=sqlite` in `.env`. If `database/database.sqlite` does not exist, create it:

**On Windows (PowerShell):**
```powershell
New-Item -ItemType File -Path database/database.sqlite -Force
```

**On Linux / macOS / Bash:**
```bash
touch database/database.sqlite
```

#### Option B: Using MySQL
Update the database credentials in your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 7. Run Database Migrations & Seeders
Run all migrations and populate the database with default administrative users and demo records:
```bash
php artisan migrate --seed
```

### 8. Create the Storage Symlink
Required for uploaded blog featured images and public media assets:
```bash
php artisan storage:link
```

---

## 🏃 Running the Application

To run the application locally, start both the Laravel development server and the Vite asset bundler:

### 1. Start Laravel Backend Server
```bash
php artisan serve
```
The application will be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000).

### 2. Start Vite Frontend Development Server
In a separate terminal window:
```bash
npm run dev
```

For production asset compilation:
```bash
npm run build
```

---

## 🔐 Default Login Credentials

After running `php artisan migrate --seed`, you can log in at `http://127.0.0.1:8000/auth/login` using any of the seeded accounts:

| Name | Email | Password |
| :--- | :--- | :--- |
| **Avishka** | `avishkaariyarathna@gmail.com` | `12345678` |
| **John Field** | `jfieldfundraising@gmail.com` | `12345678` |

---

## 🧭 Application Routes Overview

- **Public Website**: `http://127.0.0.1:8000/`
- **Public Blog**: `http://127.0.0.1:8000/blog`
- **Admin Login**: `http://127.0.0.1:8000/auth/login`
- **Admin Dashboard**: `http://127.0.0.1:8000/dashboard`
- **User Management**: `http://127.0.0.1:8000/users`
- **Blog Posts Manager**: `http://127.0.0.1:8000/website/blog-posts`
- **Testimonials Manager**: `http://127.0.0.1:8000/website/testimonials`

---

## 🧰 Useful Artisan Commands

```bash
# Clear all cached configurations, routes, and views
php artisan optimize:clear

# Refresh database with fresh migrations and seed data
php artisan migrate:fresh --seed

# Re-link public storage
php artisan storage:link

# List all registered routes
php artisan route:list
```
