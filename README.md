# PHP & Architecture Study

A vanilla PHP project built to deconstruct and understand the architectural patterns used in modern frameworks like Laravel.

Instead of relying on framework, I implemented core concepts from scratch to see how they work under the hood.

## 🧠 Concepts Applied

**1. Design Patterns**

- **Factory Pattern (via Enums):** Centralized object creation for payment providers without messy `if/else` chains.
- **Strategy Pattern:** Using Interfaces (`PaymentMethodContract`) to swap between Paypal, Stripe, and Pix easily.

**2. Architecture**

- **Form Requests:** Created a manual validation layer to sanitize data (trim) and validate inputs before they reach the controller.
- **DTOs (Data Transfer Objects):** Ensuring strict typing for data moving between layers.
- **Service Layer:** Keeping controllers thin by delegating logic to dedicated services.

**3. Code Quality**

- **PSR-4:** Automated class loading with Composer.
- **PSR-12:** Adhering to strict coding standards using Laravel Pint.

## 📂 Structure Overview

The project follows a domain-driven structure to keep things organized:

```text
src/
├── Enums/           # Factories & Constants
├── Http/            # Controllers & Requests
├── Interfaces/      # Contracts
├── Services/        # Business Logic
└── ...
```

🚀 How to run

Prerequisites
To run this project, you need PHP 8.3+ and the following extensions:

* PHP 8.3+ (with `xml`, `mbstring`, and `zip` extensions)
* Composer

Clone the repo and install dependencies:

```
composer install
```

Start the PHP built-in server:

```
php -S localhost:8000
```

Open index.php (or access via browser) to see the flow in action.

This repository is part of my personal study roadmap on PHP Architecture.
