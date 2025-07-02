CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  token VARCHAR(255),
  role ENUM('superadmin', 'user') DEFAULT 'user'
);

CREATE TABLE students (
  nim VARCHAR(100) PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100),
  phone VARCHAR(20),
  alamat VARCHAR(100)
);

INSERT INTO users (username, password, role)
VALUES ('superadmin', MD5('superadmin123'), 'superadmin');

INSERT INTO students (nim, name, email, phone, alamat)
VALUES ('230040168', 'I Kadek Nicho Andrew Oktariano', 'nicho@gmail.com', '085238291927', 'Denpasar'),
       ('230040153', 'I Nyoman Gede Wiadnyana Kusuma Putra', 'nyoman@gmail.com', '085282912953', 'Denpasar'),
       ('230040190', 'Ronaldino Da''rina', 'ronaldino@gmail.com', '082929110013', 'Denpasar')