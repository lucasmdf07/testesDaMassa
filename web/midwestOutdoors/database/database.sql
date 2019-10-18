CREATE TABLE "state" (
	id 						SERIAL NOT NULL PRIMARY KEY,
	name 					VARCHAR(80) NOT NULL UNIQUE
);

CREATE TABLE city (
	id 						SERIAL NOT NULL PRIMARY KEY,
	name 					VARCHAR(80) NOT NULL,
	state_id 				INTEGER,
	FOREIGN KEY (state_id) REFERENCES "state"(id)
);

CREATE TABLE hotel (
	id 						SERIAL NOT NULL PRIMARY KEY,
	name 					VARCHAR(80) NOT NULL,
	description 			VARCHAR(600),
	address 				VARCHAR(80) NOT NULL,
	city_id 				INTEGER,
	FOREIGN KEY (city_id) REFERENCES city(id)
);

CREATE TABLE picture (
	url 					VARCHAR(200) NOT NULL PRIMARY KEY,
	name 					VARCHAR(80) NOT NULL,
	hotel_id 				INTEGER,
	FOREIGN KEY (hotel_id) REFERENCES hotel(id)
);

-- CREATE TABLE rating (
-- 	id 					SERIAL NOT NULL PRIMARY KEY,
-- 	reviewer_name 		VARCHAR(80) NOT NULL,
-- 	rating 				INTEGER NOT NULL,
-- 	description 		VARCHAR(200),
-- 	site_id 			INTEGER,
-- 	FOREIGN KEY (site_id) REFERENCES site(id)
-- );

