drop database if exists bG9yZF9vZl9zcWxfaW5qZWN0aW9u;
create database bG9yZF9vZl9zcWxfaW5qZWN0aW9u;

drop database if exists producers;
create database producers;

use producers;

create table producer(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(32) BINARY NOT NULL,
  value INT NOT NULL
);

insert into producer values(null, 'sso', 1);
insert into producer values(null, 'chyun', 2);
insert into producer values(null, 'Daeho', 3);
insert into producer values(null, 'Error403', 4);
insert into producer values(null, 'csh', 5);

use bG9yZF9vZl9zcWxfaW5qZWN0aW9u;

create table bG9zaV90(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(32) BINARY NOT NULL,
  secret_key VARCHAR(48) BINARY NOT NULL
);

insert into bG9zaV90 values(null, 'admin', 'debugCTF{y0u_ar3_l0rd_of_sq1_1nj3cti0n!}');
