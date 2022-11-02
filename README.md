## PROCEDURAL PHP CRUD

- Connect to your database in : /php_crud/php/includes/database-inc.php
- CREATE DATABASE bibliothque;
- CREATE table livre (
  id_livre INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  titre VARCHAR(200) NOT NULL,
  auteur VARCHAR(128),
  pages INT(11)
  );
