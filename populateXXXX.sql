INSERT INTO courts (courtname, courtlat, courtlong) VALUES ('Conte Forum', 42.33514, -71.16792);
INSERT INTO courts (courtname, courtlat, courtlong) VALUES ('Rogers Park', 42.347881, -71.158812);

INSERT INTO games (gamename, gameloc, creator, datescheduled, players, skilllevel)
	VALUES ('pickupgame1', 'Conte Forum', 'Joe Schmoe', 4/21/2016, 10, 'Beginner');
INSERT INTO games (gamename, gameloc, creator, datescheduled, players, skilllevel)
	VALUES ('pickupgame2', 'Rogers Park', 'Jordan Grose', 4/22/2016, 10, 'Beginner');
	
INSERT INTO user_info (username, password, email, skilllevel) VALUES ('joeschmoe', 'joe123', 'joe@example.com', 'Beginner');
INSERT INTO user_info (username, password, email, skilllevel) VALUES ('jordangrose', 'jpg123', 'grose@bc.edu', 'Beginner');


