# Meal Attendance System

## Overview
The **Meal Attendance System** is a Laravel-based web application designed to streamline meal distribution during the international conference at Semcom College on 28-03-2025. It ensures efficient meal tracking through QR code-based validation.

## Features
- **Admin Panel**: Upload user details via Excel or manual entry (Name, Email, Phone, Category: Student, Guest, Faculty, etc.).
- **QR Code Generation**: Users receive food coupons via email as QR codes.
- **QR Code Scanning**: Volunteers validate meal access by scanning QR codes.
- **Invalid QR Handling**: If a QR code is invalid, a request is sent to the admin for reissuance.
- **User Categories**: Supports different user roles like students, guests, and faculty.

## Technology Stack
- **Backend**: Laravel
- **Database**: MySQL
- **Frontend**: Blade Templates / Vue.js (if applicable)
- **QR Code Generation**: Laravel QR Code Packages
- **Email Notification**: Laravel Mail

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/takshasalaliya/Meal-attendance
   cd meal-attendance-system
   ```
2. Install dependencies:
   ```sh
   composer install
   npm install
   ```
3. Set up environment variables:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure database in `.env` and run migrations:
   ```sh
   php artisan migrate
   ```
5. Start the application:
   ```sh
   php artisan serve
   ```

## Usage
- **Admin**: Upload user data, manage QR codes, and oversee meal distribution.
- **Volunteers**: Scan QR codes to validate meals.
- **Users**: Receive QR codes via email and present them for scanning.

## Admin Panel Credentials
- **Email**: admin@gmail.com
- **Password**: admin@123

## License
This project is licensed under the MIT License.

---

For any issues or contributions, feel free to submit a pull request or open an issue.
