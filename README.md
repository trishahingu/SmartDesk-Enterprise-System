# 🚀 SmartDesk Enterprise System

> An Enterprise Task & Workforce Management System built with Laravel 12 following modern software engineering practices including REST APIs, Docker, Queues, Security Hardening, AI Integration, Monitoring, and Production-ready architecture.

---

# 📖 Project Overview

SmartDesk Enterprise System is a web-based enterprise management platform designed to simplify project management, employee management, attendance tracking, leave management, reporting, AI assistance, analytics, and administrative operations.

The project was developed as part of an Advanced Development Internship focusing on enterprise software architecture and production-ready Laravel development.

---

# 🎯 Objectives

- Build a scalable enterprise management system.
- Apply Laravel best practices and SOLID principles.
- Improve application architecture and maintainability.
- Prepare the application for production deployment.
- Implement enterprise-level security and monitoring.
- Containerize the application using Docker.
- Develop production-ready REST APIs.

---

# ✨ Features

## Dashboard

- Modern Admin Dashboard
- Project Statistics
- Employee Statistics
- Task Statistics
- Analytics Overview

## Employee Management

- Add Employees
- Update Employees
- Delete Employees
- Search Employees

## Project Management

- Create Projects
- Update Projects
- Delete Projects
- Project Progress Tracking

## Task Management

- Create Tasks
- Assign Tasks
- Task Status
- Comments

## Attendance Management

- Employee Attendance
- Daily Records

## Leave Management

- Leave Requests
- Approve / Reject Leave

## Timesheet Module

- Employee Timesheets
- Working Hours

## Company Management

- Company CRUD Module

## Invoice Module

- Invoice List
- PDF Invoice Download

## AI Assistant

- Gemini AI Integration
- AI Content Generation

## Reports

- PDF Export
- Excel Export

## Analytics

- Dashboard Analytics

## Activity Logs

- User Activity Tracking

## Payment Module

- Razorpay Integration

## Subscription Module

- Subscription Management

---

# 🛠 Technology Stack

### Backend

- Laravel 12
- PHP 8.2

### Frontend

- Blade
- Bootstrap 5
- JavaScript

### Database

- MySQL

### Cache

- Redis

### Queue

- Laravel Queue

### AI

- Google Gemini API

### Payments

- Razorpay

### PDF

- DomPDF

### Export

- Laravel Excel

### Containerization

- Docker
- Docker Compose

---

# 📂 Project Structure

```
app/
bootstrap/
config/
database/
docker/
public/
resources/
routes/
storage/
tests/
```

---

# 🔐 Security Features

- Authentication
- Authorization
- Request Validation
- Rate Limiting
- Audit Logging
- Secure File Upload
- CSRF Protection
- XSS Protection
- SQL Injection Prevention

---

# 🌐 REST API

API Versioning

```
/api/tasks
/api/projects
/api/comments
/api/ai

/api/v2/tasks
/api/v2/projects
/api/v2/comments
/api/v2/ai
```

---

# ⚡ Performance Optimizations

- Repository Pattern
- Service Layer
- Queue Processing
- Database Optimization
- Redis Cache Ready
- Optimized Eloquent Queries

---

# 📊 Monitoring & Logging

- Laravel Log System
- Activity Logs
- Queue Logging
- Error Monitoring

---

# 🐳 Docker Support

Includes

- Dockerfile
- Docker Compose
- PHP
- MySQL
- Redis

Run using

```bash
docker-compose up --build
```

---

# 💻 Installation

Clone repository

```bash
git clone https://github.com/trishahingu/SmartDesk-Enterprise-System.git
```

Go into project

```bash
cd SmartDesk-Enterprise-System
```

Install dependencies

```bash
composer install

npm install
```

Copy environment

```bash
cp .env.example .env
```

Generate key

```bash
php artisan key:generate
```

Configure database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartdesk
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations

```bash
php artisan migrate
```

Start server

```bash
php artisan serve
```

---

# 🧪 Testing

Run Feature Tests

```bash
php artisan test
```

---

# 📸 Screenshots

> Add screenshots of:

- Login
- Dashboard
- Projects
- Employees
- Tasks
- Attendance
- Companies
- AI Assistant
- Invoice
- Analytics

---

# 📄 Documentation

The project includes

- Technical Documentation
- Database Optimization Report
- API Documentation
- Docker Configuration
- Deployment Guide
- Testing Report

---

# 🚀 Deployment

The application has been containerized using Docker and prepared for production deployment.

Deployment configuration includes

- Dockerfile
- Docker Compose
- MySQL
- Redis
- Environment Configuration

---

# 📌 Internship Assignment Coverage

✔ Code Refactoring

✔ Database Optimization

✔ Redis Cache Configuration

✔ Queue Processing

✔ REST API Enhancement

✔ Security Hardening

✔ Docker Containerization

✔ Automated Testing

✔ Monitoring & Logging

✔ Technical Documentation

✔ Final Code Review

---

# 👩‍💻 Developer

**Trisha Hingu**

B.Sc. Information Technology

Vanita Vishram Women's University

---

# 📄 License

This project was developed for educational and internship purposes.
