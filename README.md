
# Life 4 All Pharmacy - Web-based Pharmacy Product Management System

![Life 4 All Pharmacy Logo](assets/about.jpg)


A comprehensive web-based fictious pharmacy management system with an integrated public website for **Life 4 All Pharmacy**, a community pharmacy in Malta. This application provides complete inventory management, sales tracking, stock management, and user administration capabilities.

## 📋 Project Overview

**Life 4 All Pharmacy Management System** is a straightforward application designed to manage all relevant pharmacy product data. The system requires user authentication and provides multiple features for managing product categories, suppliers, products, stock, and sales. The primary focus is on **Sales Management** and **Stock Management**, with automatic stock deduction upon product sales.

### System Highlights
- **Multi-user Administration**: Role-based access control (Super Admin, Staff)
- **Real-time Inventory Management**: Automatic stock tracking and deduction
- **Comprehensive Sales System**: Track all product sales with automatic inventory updates
- **Expiry Date Monitoring**: Alert staff of products expiring within 3 days
- **Audit Trail**: Activity logging for all system operations
- **Database Backup**: Built-in backup functionality for data protection

## 📁 Project Structure

```
life4all-pharmacy/
│
├── admin-master/                     # Admin Management System
│   ├── index.php                    # Dashboard with statistics & expiry alerts
│   ├── login.php                    # Staff authentication
│   ├── logout.php                   # Session termination
│   ├── changepassword.php           # Password management
│   │
│   ├── user-record.php              # User management interface
│   ├── admin-record.php             # View all staff members
│   ├── add-admin.php                # Add new staff members
│   ├── edit-admin.php               # Edit staff details
│   ├── edit-profile.php             # User profile management
│   ├── edit-photo.php               # Staff photo upload
│   ├── Deactivate-activate-user.php # Staff status management
│   ├── delete-user.php              # Remove staff members
│   ├── view-staff.php               # Staff list with edit/delete capabilities
│   │
│   ├── add-category.php             # Category management
│   ├── delete-category.php          # Remove product categories
│   │
│   ├── add-supplier.php             # Supplier registration
│   ├── delete-supplier.php          # Remove suppliers
│   │
│   ├── add-product.php              # Add pharmacy products
│   ├── edit-product.php             # Modify product information
│   ├── delete-product.php           # Remove products
│   │
│   ├── add-sales.php                # Record product sales
│   ├── sales-record.php             # Sales history & reports
│   ├── delete-sales.php             # Remove sales records
│   │
│   ├── add-stock.php                # Stock intake management
│   ├── stock-record.php             # Stock inventory view
│   ├── delete-stock.php             # Remove stock entries
│   │
│   ├── activity-log.php             # System audit trail
│   ├── backup.php                   # Manual backup interface
│   ├── backup_db.php                # Backup execution
│   │
│   ├── topbar.php                   # Navigation & session includes
│   ├── sidebar.php                  # Admin menu navigation
│   ├── footer.php                   # Page footer includes
│   │
│   ├── database/
│   │   ├── connect.php              # MySQL PDO connection
│   │   └── connect2.php             # Secondary connection config
│   │
│   ├── db/
│   │   └── pharmacy.sql  # Database schema
│   │
│   ├── uploadImage/                 # Staff photo storage
│   │
│   └── plugins/                     # AdminLTE framework & libraries
│       ├── bootstrap/
│       ├── datatables/
│       ├── fontawesome-free/
│       ├── chartjs/
│       └── ... (other libraries)
│
├── assets/
│   ├── css/
│   │   └── style.css               # Main stylesheet (859+ lines) with CSS variables
│   ├── js/
│   │   └── main.js                 # Frontend functionality
│   ├── logo.png                    # Pharmacy logo
│   ├── favicon.ico                 # Site favicon
│   └── images/
│       └── products/               # Product images (41+ images)
│
├── Public Website Pages
│   ├── index.html                   # Home page with disclaimer modal
│   ├── about.html                   # About the pharmacy
│   ├── services.html                # Service offerings
│   ├── products.html                # Product catalog (41 products, 6 categories)
│   ├── detail.html                  # Product inventory details table
│   ├── contact.html                 # Contact information & form
│   └── privacy.html                 # Privacy policy (GDPR compliant)
│
├── Database & SQL Scripts
│   ├── add-product.sql              # 41 pharmaceutical products
│   ├── add-category.sql             # 9 product categories
│   ├── add-stock.sql                # 41 stock records
│   ├── update-product-images.sql    # Image path corrections
│   └── alter-password-column.sql    # Password column migration
│
└── README.md                         # This file
``
│   ├── js/
│   │   └── main.js                 # Frontend functionality
│   ├── logo.png                    # Pharmacy logo
│   ├── favicon.ico                 # Site favicon
│   └── images/
│       └── products/               # Product images (41+ images)
│
├── Public Website Pages
│   ├── index.html                   # Home page with disclaimer modal
│   ├── about.html                   # About the pharmacy
│   ├── services.html                # Service offerings
│   ├── products.html                # Product catalog
│   ├── contact.html                 # Contact information
│   ├── privacy.html                 # Privacy policy (GDPR compliant)
│   └── detail.html                  # Product inventory details
│
├── Database Schema
│   └── pharmacy.sql  # Complete database structure
│
└── README.md                         # This file
```

## 🌐 Public Website

The system includes a professional, responsive public website for pharmacy information and marketing:

- **Home** (`index.html`) - Hero section, mission, services overview, testimonials, disclaimer modal
- **About** (`about.html`) - Pharmacy history, values, team information
- **Services** (`services.html`) - Prescription dispensing, OTC medications, health advice, consultations, wellness
- **Products** (`products.html`) - Catalog of 41 pharmaceutical products organized into 6 categories
- **Product Details** (`detail.html`) - Comprehensive product inventory table with specifications
- **Contact** (`contact.html`) - Contact form, location map, opening hours, FAQ
- **Privacy** (`privacy.html`) - GDPR-compliant privacy policy

**Design Features:**
- Responsive (mobile-first) with Bootstrap 5.3
- Professional medical aesthetic with custom CSS variables
- Clean navigation and smooth scrolling
- Accessibility and SEO optimized
- Disclaimer popup on page load stating this is a fictitious website for educational purposes



### Authentication & Access Control

#### **Staff Login** (`admin-master/login.php`)
- Email-based authentication
- Password hashing with bcrypt (PASSWORD_DEFAULT)
- Session management with activity tracking
- IP address logging for security audit
- Activity log recording for each login

#### **Multi-User Support**
- **Super Admin**: Full system access, all management capabilities
- **Staff**: Restricted access based on assigned role
- User activation/deactivation (Deactivate-activate-user.php)
- User status tracking (Active/Inactive)

### 1. **Dashboard** (`index.php`)

**Features:**
- Welcome message with authenticated user information
- Real-time statistics cards:
  - Total products in inventory
  - Total product categories
  - Total suppliers
  - Total staff members
- **Expiry Alert System**: Automatic SMS/email notifications for products expiring within 3 days
- Quick action links to all management modules
- System information panel

### 2. **User Management** (`user-record.php`, `admin-record.php`, `add-admin.php`)

#### **Admin Record** (`admin-record.php`)
- View all staff members with details
- Staff photo display
- Role and status information
- Email and phone display
- User activation/deactivation toggle

#### **Add User** (`add-admin.php`)
- Create new staff member accounts
- Photo upload with validation (JPG, JPEG, PNG, WebP, GIF)
- Role assignment (Super Admin, Staff)
- Password hashing on account creation
- Duplicate email prevention

#### **Edit Admin** (`edit-admin.php`)
- Modify staff member information
- Update role and status
- Change staff assignment

#### **Edit Profile** (`edit-profile.php`)
- Staff can update their own profile information
- Name, contact, and address updates

#### **Edit Photo** (`edit-photo.php`)
- Staff photo upload and replacement
- Image validation and storage in uploadImage/ folder

#### **Deactivate/Activate User** (`Deactivate-activate-user.php`)
- Toggle user account status
- Prevent login of inactive users
- Activity logging of status changes

#### **Delete User** (`delete-user.php`)
- Remove staff members from system
- Confirmation dialog to prevent accidental deletion

#### **View Staff** (`view-staff.php`)
- Staff list with professional cards
- Each card displays: photo, name, role, email, phone, status
- Color-coded status badges
- Edit (green button) and Delete (red button) modals
- Quick action interface

### 3. **Category Management** (`add-category.php`, `delete-category.php`)

- **Add Category**: Create new product categories
- **List Categories**: View all product categories
- **Delete Category**: Remove unused categories with confirmation
- 9 default categories:
  - Prescription Medicines
  - Over-the-Counter Medicines
  - Vitamins & Supplements
  - Baby & Child Care
  - Medical Equipment & Supplies
  - Wellness & Personal Care
  - Women's Health
  - Men's Health
  - Senior Health

### 4. **Supplier Management** (`add-supplier.php`, `delete-supplier.php`)

- **Add Supplier**: Register new pharmaceutical suppliers
- **List Suppliers**: View all supplier information
- **Delete Supplier**: Remove suppliers from system
- Supplier details: Name, address, contact information

### 5. **Product Management** (`add-product.php`, `edit-product.php`, `delete-product.php`)

#### **Add Product** (`add-product.php`)
- Register new pharmacy products
- Fields: Product ID, Name, Category, Expiry Date, Quantity, Price, Photo
- Photo upload for product image
- Pre-populated with 41 pharmaceutical products

#### **Edit Product** (`edit-product.php`)
- Modify existing product information
- Update prices, quantities, expiry dates
- Change category assignment

#### **Delete Product** (`delete-product.php`)
- Remove discontinued products
- Confirmation dialog to prevent data loss

#### **Product Features**
- 41 pharmaceutical products pre-configured
- Organized into 6 product categories
- Detailed inventory information
- Automatic image path management

### 6. **Sales Management** (`add-sales.php`, `sales-record.php`, `delete-sales.php`)

#### **Sales Record** (`sales-record.php`)
- View complete sales history
- Search and filter sales by date, product, or quantity
- DataTables integration for sorting and pagination
- Product details linked to sales records
- Sales date and quantity tracking

#### **Add Sale** (`add-sales.php`)
- Record product sales transactions
- Select product and quantity sold
- **Automatic Stock Deduction**: System automatically reduces product quantity in inventory
- Sale date automatically recorded
- Price calculation based on product price

#### **Delete Sale** (`delete-sales.php`)
- Remove incorrect or cancelled sales records
- Confirmation required before deletion
- Potential stock adjustment upon deletion

#### **Key Feature**
- **Automatic Inventory Reduction**: When a sale is recorded, the stock quantity for that product is automatically deducted
- Real-time inventory updates
- No manual stock adjustment required after sale

### 7. **Stock Management** (`add-stock.php`, `stock-record.php`, `delete-stock.php`)

#### **Stock Record** (`stock-record.php`)
- View complete stock intake history
- Linked with product information
- Unit price and quantity tracking
- Stock date and supplier details
- DataTables with search and filtering

#### **Add Stock** (`add-stock.php`)
- Record new stock intake from suppliers
- Fields: Product, Stock Date, Unit Price, Quantity, Supplier
- Product selection from existing inventory
- Stock date tracking for audit trail

#### **Delete Stock** (`delete-stock.php`)
- Remove incorrect stock entries
- Confirmation before deletion

#### **Pre-populated Data**
- 41 stock records for all pharmacy products
- Realistic quantities and unit pricing
- Category-based organization

### 8. **Password Management** (`changepassword.php`)

- **Features**:
  - Staff can change their own passwords
  - Old password verification using password_verify()
  - New password hashing with PASSWORD_DEFAULT (bcrypt)
  - Password confirmation required
  - Activity logging of password changes
  - Auto-logout after successful password change

#### **Security Implementation**
- Uses PHP password_hash() for storage
- password_verify() for authentication
- No plain-text password comparisons
- Increased database column length (VARCHAR 255) for hash storage
- Timing-safe password verification

### 9. **Activity Log** (`activity-log.php`)

- Complete audit trail of system operations
- Records include:
  - User login/logout events
  - Password changes
  - Product additions/modifications
  - Sales transactions
  - Stock intake records
  - User management actions
- Timestamp on all activities
- User identification for accountability

### 10. **Database Backup** (`backup.php`, `backup_db.php`)

- **Manual Backup Interface** (`backup.php`)
- **Backup Execution** (`backup_db.php`)
- Full database export functionality
- File-based backup storage
- Downloadable backup files for data protection

### Navigation & Structure

#### **Sidebar Menu** (`sidebar.php`)
- Dashboard link
- User Management dropdown
- Category Management
- Supplier Management
- Product Management
- Sales Management
- Stock Management
- Settings (Change Password)
- Utilities (Activity Log, Backup)
- Logout

#### **Top Navigation Bar** (`topbar.php`)
- User authentication status
- Quick navigation
- Session management
- Current user information display

#### **Footer** (`footer.php`)
- Page structure completion
- Common footer elements


## 💻 Technology Stack

### Frontend
- **HTML5** - Semantic markup
- **CSS3** - Custom styling (859+ lines) with CSS variables
- **Bootstrap 5.3** - Responsive framework
- **Bootstrap 4 (AdminLTE)** - Admin panel framework
- **JavaScript (Vanilla)** - Core interactions
- **jQuery 3.6** - Form handling and animations
- **DataTables** - Advanced table sorting, searching, pagination
- **Font Awesome 6.4** - Icons (100+ icons)
- **Google Fonts** - Typography (Playfair Display, Source Sans Pro)

### Backend
- **PHP 7.0+** - Server-side logic
- **PDO (PHP Data Objects)** - Database abstraction layer
- **Prepared Statements** - SQL injection prevention

### Database
- **MySQL** - Relational database management
- **Database Name**: `pharmacy`
- **Tables**: 
  - `users` - Staff authentication & profiles
  - `tblproduct` - Product inventory (41 products)
  - `tblcategory` - Product categories (9 categories)
  - `tblsupplier` - Supplier information
  - `tblstock` - Stock intake history
  - `activity_log` - Audit trail
  - Additional supporting tables

### Security Features
- **Password Hashing**: bcrypt with PASSWORD_DEFAULT algorithm
- **Session Management**: PHP $_SESSION with login tracking
- **PDO Prepared Statements**: Protection against SQL injection
- **Email Validation**: Client-side and server-side verification
- **Activity Logging**: Complete audit trail of all operations
- **IP Address Tracking**: Login IP logging for security monitoring
- **User Status Management**: Activation/deactivation controls

## 🚀 Installation & Configuration

### System Requirements
- **Web Server**: Apache, Nginx, or compatible HTTP server
- **PHP**: 7.0+ with PDO MySQL extension enabled
- **MySQL**: 5.7+ or MariaDB 10.2+
- **Browser**: Modern browser with JavaScript support

### Database Setup

1. **Create Database**
   ```sql
   CREATE DATABASE pharmacy;
   ```

2. **Import Schema**
   ```bash
   mysql -u root -p pharmacy < admin-master/db/pharmacy.sql
   ```

3. **Populate Initial Data** (Optional)
   ```bash
   mysql -u root -p pharmacy < add-product.sql
   mysql -u root -p pharmacy < add-category.sql
   mysql -u root -p pharmacy < add-stock.sql
   ```

4. **Update Password Column** (For hashed passwords)
   ```bash
   mysql -u root -p pharmacy < alter-password-column.sql
   ```

### Database Connection Configuration

Edit `admin-master/database/connect.php`:
```php
define('DB_HOST','localhost');    // Database host
define('DB_USER','root');         // Database user
define('DB_PASS','');             // Database password
define('DB_NAME','pharmacy');     // Database name
```

### Local Testing with WAMP/XAMPP

1. **Extract Project**
   ```
   C:\wamp64\www\life4all-pharmacy\
   or
   C:\xampp\htdocs\life4all-pharmacy\
   ```

2. **Start Services**
   - Start Apache and MySQL via WAMP/XAMPP control panel

3. **Create Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Import the SQL schema from admin-master/db/

4. **Access Application**
   - Public Website: `http://localhost/life4all-pharmacy/`
   - Admin Login: `http://localhost/life4all-pharmacy/admin-master/login.php`

### Shared Hosting Deployment

1. **Upload Files via FTP**
   - Upload all files to public_html or www folder

2. **Create Database**
   - Use hosting control panel (cPanel, Plesk, etc.)
   - Create new MySQL database

3. **Import Database Schema**
   - Use phpMyAdmin provided by hosting
   - Import SQL files

4. **Configure Database Connection**
   - Update connect.php with hosting database credentials

5. **Set File Permissions**
   ```
   Directories: 755
   PHP Files: 644
   uploadImage/ folder: 755 (writable for photo uploads)
   ```

6. **Access Application**
   - Public Website: `https://yourdomain.com/`
   - Admin Panel: `https://yourdomain.com/admin-master/login.php`

### Default Credentials

#### **Staff Login** (`admin-master/login.php`)
- Email: Any registered staff email
- Password: Staff-assigned password (hashed in database)
- Initial setup: Create first admin via direct database insert

#### **Admin Dashboard** (`admin/login.php`)
- Username: `admin@life4allpharmacy.test`
- Password: `123456789!` 

### File Permissions

```
htdocs/
├── admin-master/
│   ├── uploadImage/           (755 - writable)
│   ├── database/              (755)
│   └── *.php                  (644)
├── admin/
│   └── *.php                  (644)
├── Permacy/
│   ├── uploadImage/           (755 - writable)
│   ├── database/              (755)
│   └── *.php                  (644)
├── assets/                     (755)
└── *.html                      (644)
```

### Timezone Configuration

Default timezone is set to 'Africa/Douala' in `admin-master/topbar.php`:
```php
date_default_timezone_set('Africa/Douala');
```

Update to your local timezone as needed.

## ⚙️ System Configuration & Customization

### SMS Alert Configuration

The system sends SMS alerts for products expiring within 3 days. Configure in `admin-master/index.php`:

```php
$username='info@life4allpharmacy.test';  // SMS service username (change the email to your own SMS service email or keep blank)
$password='Integax@2022xxxx';             // SMS service password (change the password to your own SMS service password or keep blank)
$sender='Life4All';                       // Sender ID (change to your prefered sender ID)
```

Update with your SMS provider credentials (e.g., Twilio, etc.)

### Email Configuration

To implement email notifications (for PHPMailer):
```php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
```

### Custom Branding

**Update Logo**
- Replace `assets/logo.png` with your pharmacy logo
- Update `assets/favicon.ico` for browser tab icon

**Customize Colors** in `assets/css/style.css`:
```css
:root {
    --primary-navy: #011C3B;      /* Main brand color */
    --secondary-blue: #007bff;    /* Accent color */
    --text-light: #666;
    --border-gray: #e0e0e0;
}
```

### Database Customization

**Add New Users (Staff)**
```sql
INSERT INTO users (fullname, email, password, phone, groupname, status, date_added)
VALUES ('John Doe', 'john@pharmacy.com', '$2y$10$...', '+356 1234 5678', 'Staff', 1, NOW());
```

Note: Password must be hashed using password_hash() function

**Add New Product Categories**
```sql
INSERT INTO tblcategory (ID, category_name)
VALUES (10, 'Custom Category');
```

**Add New Products**
```sql
INSERT INTO tblproduct (productID, product_name, category, expirydate, qty, price, photo)
VALUES ('99999', 'Product Name', 'Category', '2027-12-31', 50, 10.99, 'path/to/image.png');
```

## 🔒 Security & Best Practices

### Password Security
- Passwords are hashed using PHP's password_hash() function with PASSWORD_DEFAULT (bcrypt)
- Password verification uses password_verify() - timing-safe implementation
- Database password column: VARCHAR(255) to accommodate hash storage
- No plain-text password comparisons

### Data Protection
- SQL Injection Prevention: All database queries use PDO prepared statements
- Session Security: Login session tracking with timeout capabilities
- Activity Logging: Complete audit trail of all operations
- IP Tracking: Login IP addresses recorded for security monitoring
- User Status: Only active users can access the system

### Best Practices for Production
1. **Change Default Admin Credentials**
   - Update admin username and password in `admin/login.php`
   
2. **Enable HTTPS**
   - Use SSL/TLS certificates for all connections
   - Redirect HTTP to HTTPS

3. **Backup Regularly**
   - Use built-in backup functionality
   - Store backups securely off-site
   - Test restore procedures

4. **Monitor Activity Logs**
   - Review activity-log.php regularly
   - Set up alerts for suspicious activities

5. **Update Software**
   - Keep PHP, MySQL, and libraries updated
   - Apply security patches promptly

6. **Restrict File Uploads**
   - Currently accepts: JPG, JPEG, PNG, WebP, GIF
   - Validate file size and contents server-side

## 📊 Database Schema

### Users Table
```sql
CREATE TABLE users (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),         -- Hashed passwords
    phone VARCHAR(20),
    groupname VARCHAR(50),         -- 'Super Admin' or 'Staff'
    status INT,                    -- 1 = Active, 0 = Inactive
    photo VARCHAR(255),
    date_added DATETIME,
    last_ip VARCHAR(45),
    lastaccess DATETIME
);
```

### Products Table
```sql
CREATE TABLE tblproduct (
    productID INT,
    product_name VARCHAR(255),
    category VARCHAR(100),
    expirydate DATE,
    qty INT,
    price FLOAT,
    photo VARCHAR(255)
);
```

### Stock Table
```sql
CREATE TABLE tblstock (
    purchaseID INT,
    productID INT,
    stockDate DATE,
    drugName VARCHAR(255),
    unitPrice FLOAT,
    quantity INT
);
```

### Sales Table
```sql
CREATE TABLE sales (
    saleID INT PRIMARY KEY AUTO_INCREMENT,
    productID INT,
    saleDate DATE,
    productName VARCHAR(255),
    quantity INT,
    totalAmount FLOAT
);
```

### Activity Log Table
```sql
CREATE TABLE activity_log (
    logID INT PRIMARY KEY AUTO_INCREMENT,
    task VARCHAR(255),
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

## 📈 Key Features Summary

| Feature | Description |
|---------|-------------|
| **User Management** | Multi-user support with role-based access control |
| **Product Inventory** | Track 41+ pharmaceutical products with details |
| **Stock Management** | Record stock intake from suppliers with pricing |
| **Sales Tracking** | Record sales with automatic inventory deduction |
| **Expiry Alerts** | SMS notifications for products expiring within 3 days |
| **Activity Audit Trail** | Complete log of all system operations |
| **Password Security** | Bcrypt hashing with password_verify() verification |
| **Database Backup** | Built-in backup and restore functionality |
| **Photo Management** | Staff photo uploads with validation |
| **Responsive Design** | Works on desktop, tablet, and mobile devices |

## 🎯 Browser Support

- **Admin Panel**: Chrome, Firefox, Safari, Edge (latest versions)
- **Public Website**: All modern browsers including mobile
- **Minimum**: ES6 JavaScript support required

## 📝 Workflow Examples

### Staff Adding New Product
1. Login to admin-master/login.php
2. Navigate to Product Management → Add Product
3. Fill in product details (name, category, price, expiry date)
4. Upload product image
5. Click Save - product added to inventory

### Recording a Sale
1. Navigate to Sales Management → New Sale
2. Select product from dropdown
3. Enter quantity sold
4. System automatically:
   - Records the sale
   - Deducts quantity from stock
   - Updates inventory count
5. Sale appears in Sales Record

### Monitoring Expiring Products
- Dashboard displays products expiring within 3 days
- System automatically sends SMS alert to staff phone
- Alert includes product name, ID, and available quantity
- Staff can then plan for product disposal/replacement

### Backup & Recovery
1. Navigate to Utilities → Database Backup
2. Click "Backup Now"
3. Download backup file (auto-generated filename with timestamp)
4. Store backup securely
5. For recovery: Use phpMyAdmin to restore from SQL file

## 🐛 Troubleshooting

| Issue | Solution |
|-------|----------|
| Login fails after password change | Ensure database has VARCHAR(255) for password column. Run: `ALTER TABLE users MODIFY COLUMN password VARCHAR(255);` |
| SMS alerts not sending | Check SMS provider credentials in admin-master/index.php |
| Database connection error | Verify connect.php credentials match MySQL server settings |
| Photos not uploading | Check uploadImage/ folder permissions (755) and available disk space |
| Stock not deducting on sale | Verify tblstock table and sales logic in add-sales.php |

## 📊 Pre-populated Data

The system comes with sample data for testing:

**41 Pharmaceutical Products:**
- Prescription Medicines (4 products)
- Over-the-Counter Medicines (8 products)
- Vitamins & Supplements (8 products)
- Baby & Child Care (4 products)
- Medical Equipment & Supplies (4 products)
- Wellness & Personal Care (4 products)
- Women's Health (3 products)
- Men's Health (2 products)
- Senior Health (3 products)

**9 Product Categories** - Fully configured and linked to products

**41 Stock Records** - Sample inventory with realistic quantities and pricing

**Database Seeding Scripts:**
- `add-product.sql` - 41 pharmaceutical products organized by category
- `add-category.sql` - 9 product categories with IDs 5-13
- `add-stock.sql` - 41 stock records with realistic quantities and pricing
- `update-product-images.sql` - Image path corrections with "../" prefix
- `alter-password-column.sql` - Database schema migration for password hashing

## 📞 Support & Documentation

For specific module documentation, refer to inline code comments in PHP files:
- Database queries explained with comments
- Form validation logic documented
- Complex functions include usage notes
- Security implementations marked with comments

## ⚠️ Disclaimer

1. **Educational Project**: This system is created for learning and demonstration purposes

2. **Fictional Pharmacy**: All pharmacy data, staff information, and business details are fictional

3. **Not Medical Advice**: This system is for inventory management only - not intended for medical consultation or diagnosis

4. **Data Sensitivity**: In production deployment, ensure compliance with:
   - Malta Data Protection Act
   - EU GDPR regulations
   - Healthcare privacy laws

5. **Testing Data**: Pre-populated product and stock data is for testing only - replace with actual pharmacy data before production use

## 📄 License

This project is open-source and available for educational and commercial use. No specific restrictions apply.

## 🙏 Credits

- **Framework**: AdminLTE, Bootstrap 5
- **Database**: MySQL PDO
- **Icons**: Font Awesome
- **Fonts**: Google Fonts
- **Libraries**: jQuery, DataTables
- **Designed by**: Kizito Ngonye 

---
## For Question
- Contact me @ kizzy.ngo@gmail.com


**Last Updated**: February 4, 2026

For questions about admin features, refer to the sidebar help or check the activity logs for system operation records.
