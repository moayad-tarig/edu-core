# Learning Management System (LMS)

## Overview
This Learning Management System (LMS) allows users to purchase and watch courses online. It includes separate dashboards for users, admins, and instructors. The system supports real-time notifications, secure payments, and a robust course management system.

## Features
- **Authentication System:** Two separate authentication systems for users and admins.
- **Course Management:** CRUD operations for courses, including creation, updating, deletion, and management.
- **Notifications:** Real-time notifications for users and instructors.
- **Email System:** Ability to send emails to users for various updates.
- **Page Builder:** Create and manage custom pages for the platform.
- **Payment Integration:** Supports PayPal and Stripe for secure transactions.
- **Video Management:** Courses support video playback via Video.js.
- **Rich Text Editor:** TinyMCE integration for course content creation.

## Technologies Used
- **Backend:** Laravel (PHP)
- **Frontend:** JavaScript, jQuery, AJAX
- **Queue Management:** Laravel Queue
- **Mailing System:** Laravel Mail
- **Reusable Components:** Laravel Traits

## Packages Used
- **Notifications:** Flashirf (PHP & JS), Notyf (JS)
- **Icons:** Tabler Icons (Webfont CDN)
- **File Management:** Laravel File Manager
- **UI Enhancements:** SweetAlert2 (NPM), Select2 (JS)
- **File Sharing:** ezShare (JS)
- **Payment Gateways:** Laravel PayPal, Stripe PHP
- **Video Player:** Video.js
- **Text Editor:** TinyMCE

## Installation & Setup
```sh
# Clone the repository
git clone <repository-url>
cd lms-system

# Install dependencies
composer install
npm install

# Set up the environment file
cp .env.example .env
# Configure database settings in .env
# Set up mail settings
# Configure payment gateway credentials

# Generate application key
php artisan key:generate

# Run migrations and seed the database
php artisan migrate --seed

# Start the development server
php artisan serve
```

## Usage
- Users can register, purchase courses, and watch videos.
- Instructors can create and manage courses.
- Admins can manage users, instructors, and courses.
- Notifications appear in real-time for important updates.

## Contributing
Feel free to submit issues and pull requests to enhance the system.

## License
This project is licensed under the MIT License.

