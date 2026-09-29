# 🎓 College Admission Portal

A web-based **College Admission Portal** developed using **PHP, MySQL, HTML, CSS, and JavaScript**. The system provides an online platform for students to explore available courses, submit admission applications, upload required documents, create an account, log in, and check their admission status.

Built as a full-stack academic project and designed to run locally using **WAMP Server**.

---

## 🛠️ Tech Stack

<div align="left">

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-Structure-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-Styling-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-Frontend-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![WAMP](https://img.shields.io/badge/WAMP-Local%20Server-5A9FD4?style=for-the-badge&logo=apache&logoColor=white)
![Apache](https://img.shields.io/badge/Apache-Web%20Server-D22128?style=for-the-badge&logo=apache&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-Version%20Control-181717?style=for-the-badge&logo=github&logoColor=white)

</div>

### 💻 Frontend
- HTML5
- CSS3
- JavaScript

### ⚙️ Backend
- PHP

### 🗄️ Database
- MySQL

### 🖥️ Local Development
- WAMP Server
- Apache

---

## 📋 Table of Contents

- [Quickstart](#quickstart)
- [Overview](#overview)
- [Features](#features)
- [Admission Workflow](#admission-workflow)
- [Database](#database)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Validation & Security](#validation--security)
- [Available Courses](#available-courses)
- [Future Enhancements](#future-enhancements)
- [Author](#author)

---

## ⚡ Quickstart

### 1. Clone the repository

```bash
git clone https://github.com/KARANVAGHELA423/Admission_Portal_Private_Clg.git
cd Admission_Portal_Private_Clg
```

### 2. Copy the project to WAMP

Place the project inside the WAMP `www` directory:

```text
C:\wamp64\www\Admission_Portal_Private_Clg
```

### 3. Start WAMP

Start **Apache** and **MySQL** from WAMP Server.

### 4. Configure the database

Open:

```text
http://localhost/phpmyadmin
```

Create the required database and import the SQL file from the `Database/` folder.

### 5. Open the application

Visit:

```text
http://localhost/Admission_Portal_Private_Clg/
```

---

## 🔍 Overview

The College Admission Portal provides an online admission workflow for students:

- **Input**: Student personal details, contact information, selected course and academic document
- **Processing**: Server-side validation and database operations
- **Storage**: Student admission information is stored in MySQL
- **Authentication**: Students can log in using their registered credentials
- **Dashboard**: Logged-in students can view their admission information
- **Status**: Students can check their admission/application status
- **Server**: PHP and Apache through WAMP Server

---

## ✨ Features

### 👨‍🎓 Student Features

- Online admission form
- Course listing and course details
- Student registration through admission form
- Student login
- Student dashboard
- Admission status checking
- Student logout
- Academic document upload
- User-friendly web interface

### 📝 Admission Form

The admission form collects information such as:

- Student name
- Mobile number
- Email address
- Password
- Selected course
- 10th/12th result document

### 📄 Document Upload

The application supports uploading the student's academic result document.

The admission form validates the uploaded file and restricts the supported document type and file size.

---

## 🔄 Admission Workflow

```text
┌─────────────────────┐
│      Home Page      │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│   Browse Courses    │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│   Admission Form    │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│ Enter Student Data  │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│ Upload Result PDF   │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│ Form Validation     │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│   MySQL Database    │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│    Student Login    │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│ Student Dashboard   │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│ Admission Status    │
└─────────────────────┘
```

---

## 🗄️ Database

The project uses **MySQL** for storing student admission information.

The database is accessed through the PHP database connection file:

```text
db.php
```

Typical information handled by the portal includes:

| Field | Description |
|---|---|
| Student Name | Name of the applicant |
| Mobile Number | Applicant contact number |
| Email | Student login/email identifier |
| Password | Student authentication credential |
| Course | Selected admission course |
| Result | Uploaded academic document |
| Status | Admission/application status |

> ⚠️ Keep database credentials private and do not commit real production credentials to GitHub.

---

## 📁 Project Structure

```text
Admission_Portal_Private_Clg/
│
├── Database/
│   └── Database / SQL files
│
├── assets/
│   └── Images and other assets
│
├── css/
│   └── Stylesheets
│
├── js/
│   └── JavaScript files
│
├── uploads/
│   └── Uploaded student documents
│
├── about.php
├── admission.php
├── contact.php
├── course-details.php
├── courses.php
├── db.php
├── footer.html
├── header.php
├── index.php
├── status.php
├── student-dashboard.php
├── student-login.php
├── student-logout.php
└── README.md
```

---

## ⚙️ Installation

### 1. Install WAMP Server

Install and run **WAMP Server** on your Windows system.

Make sure the WAMP icon is **green** and Apache/MySQL services are running.

### 2. Clone Repository

```bash
git clone https://github.com/KARANVAGHELA423/Admission_Portal_Private_Clg.git
cd Admission_Portal_Private_Clg
```

Or download the repository as a ZIP file and extract it.

### 3. Move Project to WAMP

Copy the project folder into:

```text
C:\wamp64\www\
```

Final location:

```text
C:\wamp64\www\Admission_Portal_Private_Clg
```

### 4. Start Apache and MySQL

Open WAMP Server and start:

```text
Apache
MySQL
```

### 5. Create Database

Open:

```text
http://localhost/phpmyadmin
```

Create the database required by the project.

### 6. Import SQL Database

Open the project's:

```text
Database/
```

folder.

Import the provided `.sql` file into the database using phpMyAdmin.

### 7. Configure Database Connection

Open:

```text
db.php
```

Set the database connection according to your local WAMP configuration.

Example:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admission_portal";
```

> The exact database name should match the database imported in phpMyAdmin.

### 8. Run the Project

Open:

```text
http://localhost/Admission_Portal_Private_Clg/
```

---

## 🚀 Usage

### Student Admission

1. Open the College Admission Portal.
2. Browse the available courses.
3. Open the admission form.
4. Enter the required student details.
5. Select the desired course.
6. Upload the required academic result document.
7. Submit the application.
8. The application information is stored in MySQL.

### Student Login

After registration, the student can log in using the registered credentials.

```text
Student Login
      ↓
Authentication
      ↓
Student Dashboard
      ↓
View Admission Information
      ↓
Check Admission Status
```

### Student Dashboard

The dashboard provides the authenticated student with access to their admission-related information.

---

## 🔐 Validation & Security

The project implements basic validation and security mechanisms including:

- Required field validation
- Student name validation
- Mobile number validation
- Email validation
- Password validation
- Duplicate email checking
- PDF document validation
- File size validation
- Prepared SQL statements
- PHP session-based authentication
- Protected student dashboard

### Recommended Production Improvements

For production deployment, the following improvements are recommended:

- Use `password_hash()` and `password_verify()` for passwords
- Add CSRF protection
- Add stronger session security
- Validate uploaded files using MIME types
- Generate unique filenames for uploaded documents
- Use HTTPS
- Store credentials in environment variables
- Add role-based access control
- Add server-side authorization for uploaded documents

---

## 📚 Available Courses

The admission form provides course options including:

- BE Computer Engineering
- BE Information Technology
- BE Mechanical Engineering
- BE Civil Engineering
- BE Electronics Engineering
- BE Electrical Engineering
- BE Chemical Engineering
- BE Artificial Intelligence & Data Science
- BE Cyber Security
- BE Automobile Engineering
- BE Mechatronics Engineering
- BE Biomedical Engineering

---

## 📸 Screenshots

Add application screenshots to a `screenshots/` folder:

```text
screenshots/
│
├── home.png
├── courses.png
├── admission.png
├── login.png
└── dashboard.png
```

Then display them in this section:

```markdown
### Home Page
![Home Page](screenshots/home.png)

### Courses
![Courses](screenshots/courses.png)

### Admission Form
![Admission Form](screenshots/admission.png)

### Student Login
![Student Login](screenshots/login.png)

### Student Dashboard
![Student Dashboard](screenshots/dashboard.png)
```

---

## 🎯 Project Objectives

- Digitize the college admission process
- Reduce manual paperwork
- Provide an online admission form
- Store student information in a database
- Allow online document submission
- Provide student authentication
- Provide admission status tracking
- Make the admission process easier for students

---

## 🔮 Future Enhancements

Possible future improvements include:

- 👨‍💼 Admin dashboard
- 📊 Admission analytics
- ✅ Application approval/rejection system
- 📧 Email notifications
- 📱 SMS notifications
- 💳 Online fee payment
- 🧾 Admission receipt generation
- 📄 PDF application generation
- 🔍 Advanced application search
- 🔐 Password reset
- ☁️ Cloud deployment
- 🔒 Advanced security
- 👥 Admin and student role management

---

## 🤝 Contributing

Contributions are welcome.

```bash
# Clone the repository
git clone https://github.com/KARANVAGHELA423/Admission_Portal_Private_Clg.git

# Enter the project
cd Admission_Portal_Private_Clg

# Create a new branch
git checkout -b feature/new-feature

# Add changes
git add .

# Commit changes
git commit -m "Add new feature"

# Push branch
git push origin feature/new-feature
```

Then create a Pull Request on GitHub.

---

## 👨‍💻 Author

Built by **Karan Vaghela** as a web development project for managing the college admission process.

GitHub: **[@KARANVAGHELA423](https://github.com/KARANVAGHELA423)**

---

## 📄 License

This project is developed for **educational and academic purposes**.

---

## ⭐ Support

If you find this project useful, consider giving the repository a ⭐ on GitHub.

**Repository:**

https://github.com/KARANVAGHELA423/Admission_Portal_Private_Clg

---

## 📌 Project Summary

> **College Admission Portal** is a PHP and MySQL-based web application that digitizes the college admission process. It allows students to browse courses, submit admission applications, upload academic documents, securely log in, view their admission information, and check their application status. The project is developed and tested locally using **WAMP Server**.
