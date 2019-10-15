CREATE TABLE event (
	id SERIAL PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	location VARCHAR(100) NOT NULL
	"date" date
)

INSERT INTO event(name, location, "date") VALUES ("Color Run", "Awesome Place", 2018-4-19);


CREATE TABLE participant (
	id SERIAL PRIMARY KEY,
	name VARCHAR(100) NOT NULL
)

CREATE TABLE event_participant (
	
)