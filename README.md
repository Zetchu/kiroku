Kiroku - Anime & Manga Tracker
==============================

**Kiroku** (Japanese for *record* or *log*) is a modern web application for tracking your anime watching and manga
reading progress. Built with **Laravel 12**, it features a comprehensive master catalog, personal user lists, and a
robust administration panel.

🚀 Features
-----------

### 🌟 Public & User Features

- **Trending Page:** Caching-enabled welcome page displaying top-rated series.

- **Master Catalog:** Browse and search the entire database of Anime and Manga.

- **Personal Tracking:** Users can maintain a "My List" with statuses (*Watching, Completed, Plan to Watch*), ratings (
  1-10), and episode/chapter progress.

- **Instant Filtering:** Client-side filtering (Alpine.js) for personal lists to instantly toggle between Anime/Manga or
  specific statuses.

- **Community:** Registered users can post comments and discuss series.

- **Profile Management:** Update profile details, change passwords, or delete accounts.

### 🛡️ Admin Features

- **Dedicated Admin Panel:** Secured via Middleware (`is_admin` flag).

- **Dashboard:** Overview statistics for Series, Users, Genres, and Comments.

- **Series CRUD:** Full management of series including **Image Uploads** (handled via Spatie Media Library) with
  automatic thumbnail generation.

- **Genre Management:** Create, Edit, and Delete genres.

- **Comment Moderation:** Admins can view and delete any user comment.

* * * * *

🛠️ Tech Stack
--------------

- **Backend:** PHP 8.3+, Laravel 12

- **Frontend:** Blade Templates, Tailwind CSS v4 (via CDN), Alpine.js

- **Database:** SQLite (Default) / MySQL

- **Media:** Spatie Laravel Media Library

- **Authentication:** Laravel Breeze

* * * * *

⚙️ Installation
---------------

Follow these steps to set up the project locally.

### 1\. Clone the Repository

Bash

```
git clone https://github.com/yourusername/kiroku.git
cd kiroku

```

### 2\. Install Dependencies

Bash

```
composer install
npm install

```

### 3\. Environment Setup

Copy the example environment file and generate your application key.

Bash

```
cp .env.example .env
php artisan key:generate

```

### 4\. Database Setup (SQLite)

Create the SQLite database file:

Bash

```
touch database/database.sqlite

```

*Note: If you prefer MySQL, update `DB_CONNECTION=mysql` in your `.env` file.*

### 5\. Run Migrations & Seed Data

This will create all tables and populate the database with the default **Admin Account** and sample data.

Bash

```
php artisan migrate:fresh --seed

```

### 6\. Link Storage

Create the symbolic link to allow public access to uploaded images.

Bash

```
php artisan storage:link

```

### 7\. Run the Application

Bash

```
npm run build
php artisan serve

```

The app will be available at `http://localhost:8000`.

* * * * *

🔑 Default Credentials
----------------------

The database seeder creates a default **Admin** account for testing:

- **Email:** `admin@test.com`

- **Password:** `admin100`

*You can also register a new account to test the standard user features.*

* * * * *

📂 Key Functionalities & Logic
------------------------------

### 1\. Image Handling (Polymorphic)

Images are not stored as simple text strings. Kiroku uses **Spatie Media Library** to handle file uploads.

- **Uploads:** Admins upload cover images via the Admin Panel.

- **Conversions:** The system automatically crops images to `300x450` (List View) and `600x900` (Detail View).

- **Fallback:** The `getImageUrl()` helper method ensures a valid image or placeholder is always displayed.

### 2\. Search & Filtering

- **Server-Side Search:** Used in the Admin Panel and Catalog to handle large datasets efficiently with Pagination.

- **Client-Side Filtering:** Used in "My List" (Alpine.js) to provide an instant, app-like experience for sorting
  personal entries.

### 3\. Authorization

- **Policies:** Users can only delete their *own* comments. Admins can delete *any* comment.

- **Middleware:** Admin routes are protected by a custom `IsAdmin` middleware that checks the database flag.