DROP TABLE IF EXISTS courts;
DROP TABLE IF EXISTS games;
DROP TABLE IF EXISTS user_info;


CREATE TABLE courts(
	id	int not null auto_increment,
	courtname	varchar(40),
	courtloc	varchar(40),
	courtlat	int,
	courtlong	int,
	PRIMARY KEY(ID),
	CHECK (ID > 0),
) engine = InnoDB;


CREATE TABLE games(
	id	int not null auto_increment,
	gamename	varchar(40),
	gameloc		varchar(40),
	creator		varchar(20),
	datescheduled	date,
	players		int,
	skilllevel	varchar(20),
	FOREIGN KEY (gameloc) references courts(courtloc),
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
