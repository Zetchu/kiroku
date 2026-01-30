Kiroku - Anime & Manga Tracker
==============================

Live Demo:[  https://kiroku-app.com](https://kiroku-app.com)

Kiroku (Japanese for record or log) is a modern web application for tracking your anime watching and manga reading progress. Built with Laravel 12 and Livewire 4, it features a comprehensive master catalog, reactive user lists, and a robust administration panel with automated background processing.

🚀 Features
-----------

### 🌟 Public & User Features

-   Trending Page: Caching-enabled welcome page displaying top-rated series from the Jikan API.

-   Master Catalog: Browse and search the entire database with instant, pagination-supported results (Powered by Livewire).

-   Personal Tracking: Users can maintain a "My List" with:

-   Status Tracking:  Watching, Completed, Plan to Watch

-   Progress Bars: Visual tracking of episodes/chapters.

-   Scoring: 1-10 rating system.

-   Reactive Filtering: The "My List" page uses Livewire to instantly filter by Type (Anime/Manga), Status, or Search terms without page reloads. Real-time statistics (Episodes Watched/Chapters Read) update automatically as you filter.

-   Community Interaction:

-   Post comments on series.

-   Automated Moderation: Comments are analyzed in the background for toxicity; admins are alerted immediately if bad language is detected.

-   Profile Management: Update profile details, change passwords, or securely delete accounts.

### 🛡️ Admin Features

-   Dedicated Admin Panel: Secured via Middleware (is_admin flag).

-   Dashboard: Real-time overview statistics for Series, Users, Genres, and Comments.

-   Smart Importer (Jikan API):

-   Fetch & Preview Workflow: A multi-step Livewire modal allows admins to fetch data from Jikan, preview the results in a data table, and confirm specific items before importing them to the database.

-   Idempotency: Handles duplicates automatically using updateOrCreate.

-   Data Management:

-   Export Data: Instantly export the entire series catalog to JSON for external use.

-   Soft Deletes: Safely delete series or reviews without losing data permanently. Defensive coding prevents "Ghost Record" crashes in user lists.

-   Image Handling: Automated download and optimization of cover images via Spatie Media Library.

* * * * *

📡 API Documentation
--------------------

Kiroku provides a public RESTful API for developers to access the series catalog externally.

### Endpoints

#### GET /api/series

Fetches a paginated list of all series in the database.

Parameters:

-   page (optional): Page number (default: 1)

-   per_page (optional): Number of items per page (default: 10, max: 100)

Example Request:

HTTP

GET https://kiroku-app.com/api/series?page=1&per_page=25

Response:

JSON
```json

{

  "data": [

    {

      "id": 1,

      "name": "Naruto",

      "type": "Anime",

      "episodes": 220,

      "image_url": "..."

    }

  ],

  "links": { ... },

  "meta": { ... }

}
```

* * * * *

🏗️ Infrastructure & DevOps
---------------------------

This project is deployed using a professional CI/CD and monitoring stack:

-   Hosting:  DigitalOcean Droplet (Ubuntu/Nginx).

-   Deployment: Automated via Laravel Forge (Push-to-Deploy).

-   Backups:

-   Automated daily backups configured via the Laravel Forge Scheduler.

-   Storage: Full database and filesystem snapshots are safely stored in DigitalOcean Spaces (S3-compatible storage).

-   Disaster Recovery: Capable of full system restoration from external archives.

-   Monitoring: Real-time error tracking and health checks provided by Flare.

* * * * *

🛠️ Tech Stack
--------------

-   Framework: Laravel 12 (PHP 8.3)

-   Frontend: Livewire 4, Alpine.js, Tailwind CSS v4

-   Database: MySQL 8

-   Testing: Pest PHP (Feature & Unit Testing with Mocking)

-   Key Packages:

-   spatie/laravel-medialibrary: Image manipulation.

-   spatie/laravel-backup: Database & file backups.

-   spatie/laravel-flare: Error reporting.

-   guzzlehttp/guzzle: API Requests.

* * * * *

📂 Key Functionalities & Logic
------------------------------

### 1\. External API Integration (Service Pattern)

The application consumes the Jikan API (MyAnimeList) using a dedicated JikanService.

-   Interface: Implements AnimeLibraryInterface to allow for easy swapping of data providers.

-   Caching: API responses are cached for 1 hour to prevent rate-limiting and improve speed.

-   Resilience: Try/Catch blocks ensure the app remains stable even if the external API is down.

### 2\. Livewire Search & Filtering

-   Refactored UX: Previously using standard controllers, the Master Catalog and User Lists have been refactored to Livewire Components.

-   Benefits: This provides an "App-like" feel with instant search results, dynamic pagination resets, and real-time statistic calculations without full page reloads.

### 3\. Asynchronous Jobs & Queues

To ensure high performance, heavy tasks are offloaded to background queues:

-   New User Alerts: Admins receive an email notification when a new user registers.

-   Content Moderation:  AnalyzeCommentForToxicityJob runs in the background to scan comments for banned words, keeping the UI snappy.

### 4\. Image Handling

Images are not stored as simple URLs. Kiroku downloads the asset to local storage/S3 and registers media conversions:

-   Preview: Cropped to 300x450 (List View).

-   Banner: Cropped to 600x900 (Detail View).

* * * * *

⚙️ Installation
---------------

### 1\. Clone the repository

```bash

git clone https://github.com/yourusername/kiroku.git

cd kiroku

```

### 2\. Install Dependencies

```bash

composer install

npm install

```

### 3\. Environment Setup

```bash

cp .env.example .env

php artisan key:generate

```

### 4\. Database Setup

Configure your database credentials in .env, then run migrations:

```bash

php artisan migrate --seed

```

The seeder will create a default admin account and sample data.

### 5\. Storage Linking

```bash

php artisan storage:link

```

### 6\. Run the Application

```bash

npm run build

php artisan serve

```

```bash

# In a separate terminal, run the queue worker

php artisan queue:work

```

* * * * *

🔑 Default Credentials
----------------------

-   Admin Email:  kraljicdavid4@gmail.com

-   Password:  admin100
