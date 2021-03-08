create database hi;

use hi;

create table hiru(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(32) NOT NULL
);

insert into hiru values(null,md5(2183129));
