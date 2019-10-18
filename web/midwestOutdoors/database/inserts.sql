INSERT INTO "state" (id, name) VALUES (DEFAULT, 'Idaho');
INSERT INTO "state" (id, name) VALUES (DEFAULT, 'Utah');
INSERT INTO "state" (id, name) VALUES (DEFAULT, 'California');

INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Rexburg', 1);
INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Provo', 2);
INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Los Angeles', 3);

INSERT INTO hotel (id, name, description, address, city_id) VALUES (DEFAULT, 'SpringHill Suites', 'Estabelecido em 2019 por operarios ferroviarios da massa', '123 S. 460 W', 1);
INSERT INTO hotel (id, name, description, address, city_id) VALUES (DEFAULT, 'Super 8', 'Estabelecido em 2019 por operarios ferroviarios da massa', '123 S. 460 W', 2);
INSERT INTO hotel (id, name, description, address, city_id) VALUES (DEFAULT, 'Four Seasons Hotel', 'Estabelecido em 2019 por operarios ferroviarios da massa', '123 S. 460 W', 3);

INSERT INTO picture (url, name, hotel_id) VALUES ('https://www.yellowstoneteton.org/media/spring-hill-suites-rexburg-thumb_72274_73659.jpg', 'Spring Hill', 1);
INSERT INTO picture (url, name, hotel_id) VALUES ('https://d3vhvq4fea7n1x.cloudfront.net/original/aff.bstatic.com/images/hotel/max500/133/13343163.jpg', 'Super 8', 2);
INSERT INTO picture (url, name, hotel_id) VALUES ('https://www.fourseasons.com/alt/img-opt/~70.1530.0,0000-241,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/LAX/LAX_905_original.jpg', 'Four Seasons Hotel', 3);
