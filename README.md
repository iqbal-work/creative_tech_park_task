# 🛒 Product Management App (Laravel + Inertia + Vue + Tailwind)

A modern full-stack CRUD app for managing products with multiple categories — powered by **Laravel**, **Inertia.js**, **Vue 3**, **TypeScript**, and **Tailwind CSS**.

## 🚀 Features

- ✅ Add, edit, and delete categories
- ✅ Add, edit, and delete products
- ✅ Assign multiple categories per product
- ✅ Typed props and forms (TypeScript)
- ✅ Fully styled with Tailwind CSS
- ✅ Responsive UI with clean grid/table layout
- ✅ Built with Laravel 10+, Vue 3, and Vite

---

## 📦 Tech Stack

| Layer       | Tech            |
|-------------|------------------|
| Backend     | Laravel 10       |
| Frontend    | Vue 3 + TypeScript |
| Routing     | Inertia.js       |
| Styling     | Tailwind CSS     |
| Build Tool  | Vite             |

---

## 🛠️ Installation

```bash
# 1. Clone the repo
git clone https://github.com/iqbal-work/creative_tech_park_task.git
cd creative_tech_park_task

# 2. Install PHP & JS dependencies
composer install
npm install && npm run build

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Setup database
php artisan migrate --seed

# 5. Start development server
composer run dev

# 6. APP_URL 
http://localhost:8000

# 7. Login Credentials
Email: admin@example.com
Password: 12345678

