drop database if exists simple_service;
create database simple_service;

use simple_service;

create table users(
  idx INT PRIMARY KEY AUTO_INCREMENT,
  id VARCHAR(10) BINARY NOT NULL,
  password VARCHAR(35) BINARY NOT NULL
);

create table board(
  idx VARCHAR(30) PRIMARY KEY NOT NULL,
  title VARCHAR(20) BINARY NOT NULL,
  contents VARCHAR(500) BINARY NOT NULL,
  time_c TIMESTAMP DEFAULT now(),
  view_c INT DEFAULT 0,
  writer VARCHAR(30) BINARY NOT NULL
);

insert into users values(null, "admin", "jfei3@!ifj3!jllaczzxvk53421@!jg");
insert into users values(null, "guest", "guest");
insert into board(idx, title, contents, writer) values(md5('ADMIN'), "Welcome!", "Write your story :)", "ADMIN");
