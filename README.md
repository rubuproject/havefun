# 🎯 tugas login dan portofolio sederhana

A minimalist, elegant portfolio website built with **PHP**, featuring a secure session-based authentication system.

## ✨ Features

- **Secure Login System** - PHP Session-based authentication with password hashing
- **Protected Pages** - Portfolio only accessible after login
- **Minimalist Design** - Clean, modern UI with smooth animations
- **Responsive Layout** - Mobile-friendly design
- **Easy to Extend** - Ready for database integration (MySQL)

## 🚀 Quick Start

### Requirements
- PHP 7.4+
- No database required (demo uses hardcoded users)

### Installation

1. Clone the repository:
```bash
git clone https://github.com/rubuproject/php-portfolio.git
cd php-portfolio
```

2. Start the PHP development server:
```bash
php -S localhost:8000
```

3. Open in browser:
```
http://localhost:8000/login.php
```

## 🔐 Demo Credentials

| Field | Value |
|-------|-------|
| Username | `admin` |
| Email | `admin@example.com` |
| Password | `Secret123!` |

## 📁 Project Structure

```
/
├── config.php              # Session & auth configuration
├── login.php               # Login form page
├── process_login.php       # Login processing endpoint
├── logout.php              # Logout handler
├── portfolio.php           # Protected portfolio page
├── assets/
│   ├── css/
│   │   └── style.css       # Minimalist design styles
│   ├── js/
│   │   └── script.js       # Animations & interactions
│   └── images/
│       └── profile.svg     # Avatar placeholder
└── README.md
```

## 🎨 Design Highlights

- **Color Scheme**: Minimalist with purple accent (#6c63ff)
- **Typography**: Inter (body) + Poppins (headings)
- **Animations**: Smooth fade-in effects on scroll
- **Responsive**: Breakpoints at 900px and 720px
- **Accessibility**: Semantic HTML, proper contrast ratios

## 🔒 Security Features

- ✅ Password hashing with `password_hash()`
- ✅ Session security: httponly, samesite=Lax
- ✅ Output escaping with `htmlspecialchars()`
- ✅ CSRF-ready structure
- ✅ No sensitive data in frontend

## 🛠️ Customization

### Add New Users
Edit `config.php` and add to the `$users` array:
```php
[
    'username' => 'john',
    'email' => 'john@example.com',
    'name' => 'John Doe',
    'role' => 'Designer',
    'password' => password_hash('YourPassword123!', PASSWORD_DEFAULT),
]
```

### Migrate to Database
Replace the `$users` array in `config.php` with database queries:
```php
$result = $pdo->query("SELECT * FROM users WHERE username = ?");
```

### Customize Portfolio Content
Edit `portfolio.php` to add your own:
- Skills
- Projects
- Social links
- Contact information

## 📱 Responsive Breakpoints

- **Desktop**: Full 3-column grid for projects
- **Tablet (≤900px)**: Hero section stacks vertically
- **Mobile (≤720px)**: Single column layout

## 🚀 Future Enhancements

- [ ] Database integration (MySQL/PostgreSQL)
- [ ] User registration page
- [ ] Password reset functionality
- [ ] Profile editing
- [ ] Project detail pages
- [ ] Contact form with email
- [ ] Dark mode toggle
- [ ] Admin dashboard

## 📝 License

MIT License - feel free to use this for personal or commercial projects.

## 👨‍💻 Author

Created as a professional portfolio template for developers and students.

---

**Ready to deploy?** This project is production-ready with basic security measures. For production use, ensure HTTPS is enabled and consider adding CSRF tokens.
