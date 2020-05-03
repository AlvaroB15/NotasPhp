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
  -- created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  -- 218314ef88a26eec4696998743fc71739693cd49b883c63d50b6cef6cd7573e0
  created_at Timestamp without Time zone DEFAULT CURRENT_TIMESTAMP
);