# Project-UAS-REST-API
Project uas backend REST API

**Anggota Kelompok:**  
Ronaldino Da'rina (230040190)  
I Nyoman Gede Wiadnyana Kusuma Putra (230040153)  
I Kadek Nicho Andrew Oktariano (230040168)  

## 📁 Struktur Folder

```
rest-api-mahasiswa/
├── auth/
├── config/
├── middleware/
├── sql/
└── students/
```

## 🛠️ Requirement  
- Clone Repository ini  
- XAMPP (Apache + MySQL)
- PHP 7+ (sudah termasuk di XAMPP)
- Postman (untuk pengujian API)
- Web browser (opsional)

---

## 🚀 Cara Menjalankan

### 1. **Clone Repository**  
Clone repository ini dengan command: git clone https://github.com/arstd/Project-UAS-REST-API.git  
Buka path repository ini pada terminal  
Ketikkan command: **php -S localhost:8000**

### 2. **Jalankan Apache & MySQL**
Buka `XAMPP Control Panel`, klik **Start** pada:
- Apache
- MySQL

### 3. **Buat Database**
1. Buka `http://localhost/phpmyadmin`
2. Buat database dengan nama:
```
database_mahasiswa
```
3. Import file SQL:
   - Buka tab Import
   - Pilih file: `sql/init.sql`
   - Klik Import

---

## ✅ Tes API dengan Postman

### 🔐 LOGIN
**URL:**
```
POST http://localhost:8000/auth/login.php
```

**Body (raw JSON):**
```json
{
  "username": "superadmin",
  "password": "superadmin123"
}
```

**Response:**
```json
{ "token": "your_token_here" }
```

---

### 👤 CEK USER SAAT INI
**URL:**
```
GET http://localhost:8000/auth/me.php
```

**Headers:**
```
Authorization: Token yang didapat saat login
```

---

### 📄 CRUD MAHASISWA

#### 🔍 GET Semua Mahasiswa
```
GET http://localhost:8000/students/index.php
```

#### ➕ Tambah Mahasiswa
```
POST http://localhost:8000/students/store.php
```
**Body JSON:**
```json
{
  "nim": "230040111",  
  "name": "Nicho",
  "email": "nicho@example.com",
  "phone": "08123456789",
  "alamat": "Denpasar"
}
```

#### 📝 Edit Mahasiswa
```
PUT http://localhost:8000/students/update.php?nim=230040168
```

**Body JSON:**
```json
{
  "name": "Nicho Update",
  "email": "nicho@update.com",
  "phone": "08111111111"
  "alamat": "Denpasar"
}
```

#### ❌ Hapus Mahasiswa
```
DELETE http://localhost:8000/students/delete.php?nim=230040168
```

---

## ⚠️ Catatan

- Gunakan `Authorization` header pada semua endpoint (kecuali login).
- Format:
  ```
  Authorization: Token yang didapat saat login
  ```
---
