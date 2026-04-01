ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY '321.qwerty';

CREATE DATABASE IF NOT EXISTS appx;
GRANT ALL PRIVILEGES ON appx.* To 'admin'@'%';