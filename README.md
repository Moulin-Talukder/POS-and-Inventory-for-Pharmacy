# POS and Inventory for Pharmacy

POS and Inventory for Pharmacy is a comprehensive Point of Sale (POS) system developed with PHP and Laravel. This system allows the management of POS operations, employees, customers, suppliers, employee salaries, product categories, products, shop expenses, orders, employee attendance, and sales reports.

## Table of Contents
- [Overview](#overview)
- [Highlighted Features](#highlighted-features)
- [User Features](#user-features)
- [Admin Features](#admin-features)
- [Installation](#installation)
- [Support](#support)
- [License](#license)

## Overview

POS and Inventory for Pharmacy is designed to streamline the management of pharmacy operations. The system enables efficient handling of various aspects of the business, ensuring smooth operations and better service delivery.

## Highlighted Features
- **User and Admin Panels:** Separate interfaces for users and administrators.
- **POS Management:** Comprehensive POS functionality.
- **Employee Management:** Manage employee details, attendance, and salaries.
- **Customer and Supplier Management:** Keep track of customers and suppliers.
- **Product and Category Management:** Manage product details and categories.
- **Expense Management:** Track shop expenses.
- **Order Management:** Handle customer orders efficiently.
- **Sales Reporting:** Generate detailed sales reports.

## User Features
- **POS System:** Process sales transactions efficiently.
- **Customer Management:** Add, edit, and manage customer information.
- **Order Management:** Create and manage orders.
- **Sales Reporting:** View and generate sales reports.

## Admin Features
- **Employee Management:** Add, edit, and manage employee details and attendance.
- **Salary Management:** Manage employee salaries.
- **Supplier Management:** Add, edit, and manage supplier information.
- **Product Management:** Add, edit, and manage product details and categories.
- **Expense Management:** Track and manage shop expenses.
- **Order Management:** Oversee and manage orders.
- **Sales Reporting:** Generate and view detailed sales reports.

## Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/Moulin-Talukder/POS-and-Inventory-for-Pharmacy.git
    ```

2. Navigate to the project directory:
    ```bash
    cd POS-and-Inventory-for-Pharmacy
    ```

3. Install the dependencies:
    ```bash
    composer install
    ```

4. Create a copy of the `.env` file:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Set up your database and update your `.env` file with the database credentials.

7. Run the database migrations:
    ```bash
    php artisan migrate
    ```

8. Serve the application:
    ```bash
    php artisan serve
    ```

## Support
For support, installation, and customization, please contact us at [support@pharmacy.com](mailto:support@pharmacy.com). We are committed to providing the best support to ensure your success.
