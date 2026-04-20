# Eka PHP MVC Framework

> ⚡ Lightweight, production-ready PHP MVC framework built from scratch with zero dependencies.

Eka PHP MVC Framework is a modular, scalable, and high-performance framework developed without using any external libraries such as Laravel or Symfony. It is designed for real-world SaaS applications, admin panels, and custom web software systems.

---

## 🚀 Features

* ⚡ Advanced Router (SEO-friendly URLs with parameter support)
* 🧠 Clean MVC Architecture (Controller, Model, View separation)
* 🔐 Authentication & Middleware System
* 🗄️ PDO-based Database Layer (Query Builder style)
* 🌍 Multi-language Support (TR / EN with full UTF-8 compatibility)
* 📝 Logging System (/storage/logs/app.log)
* 🎨 Bootstrap 5 Ready UI
* 🔗 Dynamic Base URL (works on any domain automatically)
* 🧩 Modular and extendable architecture
* 🚫 No external dependencies

---

## 📦 Installation

1. Clone the repository:

```bash
git clone https://github.com/ekayazilim/eka-php-mvc-framework.git
```

2. Import database:

```
database/users.sql
```

3. Configure database settings:

```
config/database.php
config/app.php
```

4. Run the project directly from root directory

---

## 🔐 Default Login

Email: [admin@eka.com](mailto:admin@eka.com)
Password: 123456

---

## 🧠 Usage

* Add routes → `/routes/web.php`
* Create controllers → `/app/Controllers`
* Create models → `/app/Models`
* Middleware → `/app/Middlewares`

---

## 🏗️ Project Structure

```
/app
  /Controllers
  /Models
  /Views
  /Middlewares
  /Services

/core
/config
/routes
/lang
/storage
```

---

## 🛣️ Roadmap

* REST API module
* Advanced validation system
* Caching system
* SaaS multi-tenant architecture
* Role & permission system

---

## ⭐ Why this project?

This framework is based on real production systems and is actively used in multiple live projects. It is designed for developers who want full control, flexibility, and performance without relying on heavy frameworks.

---

## 🤝 Contributing

Pull requests are welcome. This project is actively maintained and will continue to evolve.

---


