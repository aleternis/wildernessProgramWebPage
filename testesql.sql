sql

database for topics (id, name, day, whoGoes(FK from user))

database for user and admin ([id],name(pk),password,type(int 0=user,1=admin))


create database club;
	use club;
	select database();

	create table user(id int not null, nickname varchar(20) not null, password varchar(15) not null, type int not null,
	PRIMARY KEY (nickname));

	create table event(id int not null, name varchar(40) not null, day date not null, peopleId int not null); 
		FOREIGN KEY (peopleId) REFERENCES user(id));


	ALTER TABLE event 
	ADD CONSTRAINT FK_id 
	FOREIGN KEY (peopleId) REFERENCES user(id) 
	ON UPDATE CASCADE
	ON DELETE CASCADE;	

	ALTER TABLE  `event` ADD  `info` TEXT NOT NULL AFTER  `name` ;
