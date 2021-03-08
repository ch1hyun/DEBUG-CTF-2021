drop database if exists hi; 
create database hi;

use hi;

create table hiru(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(32) NOT NULL,
  password VARCHAR(32) NOT NULL
);

insert into hiru values(null,'admin','hello');
insert into hiru values(null,'guest','guest');
