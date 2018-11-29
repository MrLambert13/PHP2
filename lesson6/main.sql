create table user
(
  id int primary key not null AUTO_INCREMENT,
  login varchar(255) not null,
  password varchar(255) not null,
  last_access timestamp,
  username varchar(30) not null
);
