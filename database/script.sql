-- Para Mysql

CREATE DATABASE php_mysql_crud;

use php_mysql_crud;

CREATE TABLE task(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE task;



-- Para Postgresql

CREATE TABLE task(
  id SERIAL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);