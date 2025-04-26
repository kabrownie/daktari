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

## Project Structure

- `/app/Models/` — Models for Client and Program
- `/app/Http/Controllers/` — Controllers for handling logic
- `/resources/views/` — Blade templates for UI
- `/routes/web.php` — Web routes
- `/routes/api.php` — API routes

---

## Setup Instructions

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


## API Endpoint

Access client data through API:

GET /api/clients/{id}

Example response:

{
  "id": "CL-20250426-192234",
  "client_name": "John Doe",
  "sex": "Male",
  "age": 25,
  "telephone": "0712345678",
  "programs": [
    {"id": 1, "program_name": "TB"},
    {"id": 2, "program_name": "HIV"}
  ]
}


## Testing

### Power POint Presentation
https://docs.google.com/presentation/d/1PEIcariiv7tAR4hVJWXyJ94XUrACScqP0LbFDZgy9Xc/edit?usp=sharing

### Demo video**
https://drive.google.com/file/d/15eyJ47x6I9C9l9jCLVz56bDXKt1v3iHC/view?usp=sharing



### Author

Kevin Karanja Makono
