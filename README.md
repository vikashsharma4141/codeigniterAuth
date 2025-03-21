# CodeIgniter Authentication System
#admin password-> admin123
## Project Overview
This is a **User Role-Based Authentication System** built using **CodeIgniter 4**. It includes Admin and User roles with a session-based login system.

## Features
- **User Authentication** (Login, Register, Logout)
- **Role-Based Access Control (RBAC)**
- **Admin Dashboard** (User Management, Last Login Details)
- **User Dashboard** (Profile, Last Login)
- **Session-Based Authentication** (No API Key Required)
- **Fully Functional UI** with Bootstrap
- **Database Integration with MySQL**

## Folder Structure
```
app/
 ├── Controllers/
 │   ├── AuthController.php
 │   ├── DashboardController.php
 ├── Models/
 │   ├── UserModel.php
 ├── Views/
 │   ├── auth/
 │   │   ├── login.php
 │   │   ├── register.php
 │   ├── admin/
 │   │   ├── dashboard.php
 │   ├── user/
 │   │   ├── dashboard.php
 │   ├── layouts/
 │   │   ├── header.php
 │   │   ├── footer.php
 │   │   ├── navbar.php
 │   │   ├── sidebar.php
 ├── Config/
 │   ├── Routes.php
 ├── Database/
 │   ├── Migrations/
 │   ├── Seeds/
```

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/vikashsharma4141/codeigniterAuth.git
   ```
2. Move to the project folder:
   ```sh
   cd Authproject
   ```
3. Install dependencies:
   ```sh
   composer install
   ```
4. Configure `.env` file:
   ```sh
   cp env .env
   php spark key:generate
   ```
5. Set up the database:
   - Create a database `authdb`
   - Import the SQL file `database/authdb.sql`
6. Run the application:
   ```sh
   php spark serve
   ```
7. Open in browser:
   ```sh
   http://localhost:8080
   ```

## Usage
- **Admin Login:** `admin@example.com` / `admin123`
- **User Login:** Register a new user via the signup page.

## API Routes
| Method | Route | Description |
|--------|--------|-------------|
| POST | `/login` | User Login |
| POST | `/register` | User Registration |
| GET | `/dashboard` | Dashboard View |
| GET | `/logout` | Logout |

## Contributing
Feel free to open issues or pull requests to improve this project.

## License
This project is open-source and available under the MIT License.
