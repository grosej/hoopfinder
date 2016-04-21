INSERT INTO courts (courtname, courtloc, courtlat, courtlong) VALUES ('Conte Forum', 42.33514, -71.16792);
INSERT INTO courts (courtname, courtloc, courtlat, courtlong) VALUES ('Rogers Park', 42.347881, -71.158812);
INSERT INTO courts (courtname, courtloc, courtlat, courtlong) VALUES ('Coolidge Park', 42.346223, -71.131297);

INSERT INTO games (gamename, gameloc, creator, datescheduled, players, skilllevel)
	VALUES ('pickupgame1', 'Conte Forum', 'joeschmoe', 21-04-2016, 10, 'Beginner');
INSERT INTO games (gamename, gameloc, creator, datescheduled, players, skilllevel)
	VALUES ('pickupgame2', 'Rogers Park', 'jordangrose', 22-04-2016, 8, 'Intermediate');
INSERT INTO games (gamename, gameloc, creator, datescheduled, players, skilllevel)
	VALUES ('Friday Pickup Game', '', 'benmorrison', 29-04-2016, 10, 'Advanced');
	
INSERT INTO user_info (username, password, email, skilllevel) VALUES ('joeschmoe', 'joe123', 'joe@example.com', 'Beginner');
INSERT INTO user_info (username, password, email, skilllevel) VALUES ('jordangrose', 'jpg123', 'grose@bc.edu', 'Intermediate');
INSERT INTO user_info (username, password, email, skilllevel) VALUES ('benmorrison', 'bmorr123', 'morrisht@bc.edu', 'Advanced');


