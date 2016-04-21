DROP TABLE IF EXISTS courts;
DROP TABLE IF EXISTS games;
DROP TABLE IF EXISTS user_info;


CREATE TABLE courts(
	id	int not null auto_increment,
	courtname	varchar(40),
	courtlat	int(11),
	courtlong	int(11),
	PRIMARY KEY(ID),
	CHECK (ID > 0),
) engine = InnoDB;


CREATE TABLE games(
	id	int not null auto_increment,
	gamename	varchar(20),
	gameloc		varchar(20),
	creator		varchar(20),
	datescheduled	date,
	players		int(11),
	skilllevel	varchar(20),
	FOREIGN KEY (creator) references user_info(username),
	PRIMARY KEY(ID),
	CHECK (ID > 0),
) engine = InnoDB;


CREATE TABLE user_info(
	id	int not null auto_increment,
	username	varchar(20),
	password	varchar(20) not null,
	email		varchar(40),
	skilllevel	varchar(20),
	PRIMARY KEY(ID),
	CHECK (ID > 0),
) engine = InnoDB;
