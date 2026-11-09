
# Barangay Bulletin - Purok Genilla

Lab Activity 10 - Eloquent, Migrations & Seeding

**Student:** Red Isaac D. Genilla  
**Course:** Full-Stack Web Development

## Project Description

This project is a barangay bulletin website built using Laravel 12.
It allows residents to browse announcements, search by title,
filter by category, and view individual posts.

The project uses Eloquent ORM, SQLite, migrations, factories,
seeders, Blade, and Tailwind CSS.

## Features

- Display published bulletin posts
- Pinned announcements appear first
- Search posts by title
- Filter posts by category
- Pagination with 7 posts per page
- View counter for individual posts
- Draft posts are hidden from residents
- Responsive layout using Tailwind CSS

## Personalization

- Site Title: Barangay Bulletin - Purok Genilla
- Kagawad: Kagawad Red Genilla
- Email: kagawad.genilla@bulletin.test
- Posts Per Page: 7
- Reason: Genilla has 7 letters
- Custom Category: Events
- Pinned Post: Purok Genilla Clean-up Drive
- Birthday Post Date: 2026-09-15

The post categories are Announcement, Health, Peace & Order,
Ayuda, and Events.

## Database

The application uses SQLite.

After running the seeders, the database contains:

- 5 authors
- 40 published factory posts
- 10 draft posts
- 1 personalized pinned post

Total: 51 posts.

## How to Run

1. Install PHP dependencies:

```bash
composer install
```

2. Copy the environment file:

```bash
cp .env.example .env
```

3. Generate the application key:

```bash
php artisan key:generate
```

4. Configure SQLite in `.env`:

```env
DB_CONNECTION=sqlite
```

5. Create `database/database.sqlite` if it does not exist.

6. Run migrations and seeders:

```bash
php artisan migrate:fresh --seed
```

7. Install NPM dependencies:

```bash
npm install
```

8. Start Vite:

```bash
npm run dev
```

9. In another terminal, start Laravel:

```bash
php artisan serve
```

10. Open:

http://127.0.0.1:8000/posts

## Eloquent Demonstration

The file `docs/tinker.png` shows how Eloquent retrieves a post
using `find()`, modifies its title, and saves the changes
using `save()`.

## Technologies Used

- Laravel 12
- PHP
- SQLite
- Eloquent ORM
- Blade Templates
- Tailwind CSS v4
- Vite
- Faker

## Author

Red Isaac D. Genilla

