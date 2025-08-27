# Save My Exam – Laravel Project

A Laravel 12 application for managing **O/L and A/L past papers**, quizzes, lecturers, exam timetables, and more.  
Admins can upload PDF past papers via the dashboard, and users can browse and download them.

---

## 🚀 Requirements
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL (or MariaDB)
- Git

---

## ⚙️ Installation

### 1. Clone the repository
```bash
git clone <your-repo-url>.git
cd <your-project-folder>
```

### 2. Install dependencies
```bash
composer install
npm install
```

### 3. Environment setup
Copy `.env.example` into `.env`:
```bash
cp .env.example .env   # Linux/Mac
copy .env.example .env # Windows
```

Update `.env` with your local settings:
```dotenv
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=save_my_exam
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate app key
```bash
php artisan key:generate
```

### 5. Run migrations and seeders
This will create the schema and seed **subjects** (O/L & A/L) with their images.

```bash
php artisan migrate --seed
```

If you want to re-seed subjects later:
```bash
php artisan db:seed --class=SubjectSeeder
```

### 6. Storage symlink (for PDFs/images)
```bash
php artisan storage:link
```

### 7. Build assets
```bash
npm run dev     # for development
npm run build   # for production
```

### 8. Start the app
```bash
php artisan serve
```

Visit:
- `http://127.0.0.1:8000/ol-papers`
- `http://127.0.0.1:8000/al-papers`
- `http://127.0.0.1:8000/admin/papers` (admin only)

---

## 👤 User & Admin Setup

### Create a test user
```bash
php artisan tinker
>>> \App\Models\User::create([
...   'name' => 'Test User',
...   'email' => 'test@example.com',
...   'password' => bcrypt('Password@123'),
...   'email_verified_at' => now(),
... ]);
```

### Promote a user to admin
```bash
php artisan tinker
>>> $u = \App\Models\User::where('email','test@example.com')->first();
>>> $u->is_admin = true;
>>> $u->save();
```

Now this user can access `/admin/papers`.

### Reset password (if needed)
```bash
php artisan tinker
>>> $u = \App\Models\User::where('email','test@example.com')->first();
>>> $u->password = bcrypt('NewPassword@123');
>>> $u->save();
```

---

## 📂 Project Highlights

- **Subjects** are seeded with O/L and A/L categories and hero images.
- **Past Papers** can be uploaded by admin (PDF files stored in `storage/app/public/papers/...`).
- **Users** can browse by subject and download past papers.
- **Admin Dashboard** has sidebar navigation for managing papers and more features in the future.

---

## 🔧 Useful Commands

Clear caches:
```bash
php artisan optimize:clear
```

Check available routes:
```bash
php artisan route:list
```

Inspect subjects:
```bash
php artisan tinker
>>> \App\Models\Subject::pluck('slug','name');
```

Inspect papers:
```bash
php artisan tinker
>>> \App\Models\PastPaper::with('subject')->get(['id','title','year','subject_id']);
```

---

## ✅ Next Steps

- Add more admin dashboard modules (quizzes, lecturers, etc.).
- Add analytics for downloads.
- Add custom artisan command `php artisan user:make-admin <email>` for easier admin setup.

---

Happy coding! 🎉
