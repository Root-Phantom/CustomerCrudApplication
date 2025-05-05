# Customer Management System 🚀

A comprehensive customer management system built with Laravel that allows you to efficiently manage customer information, including soft delete functionality and a trash system.

## ✨ Features

- **Customer CRUD Operations**
  - Create, read, update, and delete customers
  - Soft delete functionality
  - Trash management system
  - Restore or permanently delete items

- **Search & Filter**
  - Search customers by name, email, phone, or bank account number
  - Sort customers (newest to oldest / oldest to newest)
  
- **User Interface**
  - Clean and responsive design
  - Bootstrap-powered UI
  - Font Awesome icons
  - Success/info alerts

## 🛠️ Built With

- **Backend**: Laravel (PHP)
- **Frontend**: Bootstrap 5, Font Awesome
- **Database**: MySQL
- **Features**: Soft Delete, Route Model Binding, Factories, Migrations

## 📋 Prerequisites

```bash
PHP >= 8.1
Composer
MySQL
```

## 🚀 Installation

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/customer-management-system.git
   cd customer-management-system
   ```

2. Install dependencies
   ```bash
   composer install
   npm install
   ```

3. Set up environment file
   ```bash
   cp .env.example .env
   ```

4. Configure database in `.env` file
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=customer_management
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

5. Generate application key
   ```bash
   php artisan key:generate
   ```

6. Run migrations
   ```bash
   php artisan migrate
   ```

7. Seed database (optional)
   ```bash
   php artisan db:seed
   ```

8. Run the application
   ```bash
   php artisan serve
   ```

## 📚 Usage

### Customer Management

#### Create Customer
Navigate to `/customer/create` to add a new customer with the following information:
- First Name
- Last Name
- Email
- Phone
- Bank Account Number
- About

#### Edit/View Customer
- Click the edit icon (✏️) to modify customer details
- Click the eye icon (👁️) to view customer information

#### Delete Customer
Click the trash icon (🗑️) to soft delete a customer. They will be moved to trash.

### Trash Management

#### Access Trash
Click the trash icon in the customer list header to view deleted customers.

#### Restore Customer
In trash view, click the undo icon (↩️) to restore a deleted customer.

#### Permanent Delete
Click the trash icon (🗑️) in trash view to permanently delete a customer.

## 🔄 Routes

| Route | Method | Description |
|-------|--------|-------------|
| `/` | GET | Redirect to customer list |
| `/customer` | GET | List all customers |
| `/customer/create` | GET | Show create form |
| `/customer` | POST | Store new customer |
| `/customer/{id}/edit` | GET | Show edit form |
| `/customer/{id}` | PUT | Update customer |
| `/customer/{id}` | DELETE | Soft delete customer |
| `/customer/trash` | GET | List deleted customers |
| `/customer/{id}/restore` | PATCH | Restore deleted customer |
| `/customer/{id}/forcedelete` | DELETE | Permanently delete customer |

## 🏗️ Database Structure

The `customers` table includes:
- `id` - Primary key
- `first_name` - Customer's first name
- `last_name` - Customer's last name
- `email` - Customer's email address
- `phone` - Customer's phone number
- `bank_account_number` - Bank account number
- `about` - Additional information
- `image` - Customer's image (optional)
- `deleted_at` - Soft delete timestamp
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

## 🧪 Testing

### Factories

The project includes Customer factories for testing:

```php
// Create a regular customer
Customer::factory()->create();

// Create a soft-deleted customer
Customer::factory()->deleted()->create();
```

### Seeding

Run seeders with:
```bash
php artisan db:seed --class=CustomerSeeder
```

## 📂 Project Structure

```
app/
├── Http/
│   └── Controllers/
│       └── CustomerController.php
├── Models/
│   └── Customer.php
database/
├── factories/
│   └── CustomerFactory.php
├── migrations/
│   └── create_customers_table.php
resources/
├── views/
│   └── customer/
│       ├── index.blade.php
│       ├── trash.blade.php
│       ├── create.blade.php
│       └── edit.blade.php
public/
└── images/
    └── customers/
```

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📜 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Laravel documentation
- Bootstrap team
- Font Awesome project
- Contributors and testers

## 📧 Contact

Your Name - [@yourusername](https://twitter.com/byte_sniper) - email@example.com

Project Link: [https://github.com/yourusername/customer-management-system]([https://github.com/yourusername/customer-management-system](https://github.com/Root-Phantom/CustomerCrudApplication)

---

⭐️ From [yourusername](https://github.com/Root-Phantom)
