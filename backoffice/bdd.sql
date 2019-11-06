DROP DATABASE backofficeNewworld;
CREATE DATABASE backofficeNewworld;
USE backofficeNewworld;

CREATE TABLE categorie(
  catId int primary key not null auto_increment,
  catLib varchar(50)
) engine=innodb charset=utf8;

CREATE TABLE item(
  itemId int not null auto_increment,
  catId int,
  itemLib varchar(50),
  itemContenu text,
  primary key(itemId, catId)
) engine=innodb charset=utf8;

ALTER TABLE item ADD foreign key (catId) references categorie (catId);
