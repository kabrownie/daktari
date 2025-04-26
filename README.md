# Daktari (Health Information System)

A basic health information management system for doctors to:
- Create health programs (e.g., TB, Malaria, HIV, etc.)
- Register new clients
- Enroll clients into one or more health programs
- Search for clients
- View detailed client profiles
- Expose client profiles via API for external system access

Built using **Laravel** and **Blade UI**.

---

## 📂 Project Structure

- `/app/Models/` — Models for Client and Program
- `/app/Http/Controllers/` — Controllers for handling logic
- `/resources/views/` — Blade templates for UI
- `/routes/web.php` — Web routes
- `/routes/api.php` — API routes

---

## 🛠️ Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/kabrownie/daktari
   cd daktari

2. **Install dependencies**
composer install
npm install
npm run dev

3. **Create and set up .env**

cp .env.example .env
php artisan key:generate

4. **Configure your database**
Update your .env with your MySQL settings.

5. **Run migrations**

php artisan migrate

6. **Start the server**
php artisan serve
7. **Access the app**
Visit http://localhost:8000

