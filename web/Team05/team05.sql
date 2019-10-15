CREATE TABLE Scriptures (
    id SERIAL PRIMARY KEY,
    book VARCHAR(50) NOT NULL,
    chapter INT NOT NULL,
    verse INT NOT NULL,
    content TEXT NOT NULL
);

CREATE TABLE topic (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE library (
    topic_id INT,
    
);

INSERT INTO scriptures (book, chapter, verse, content)
    VALUES ('John', '1', '5', 'This then is the message which we have heard of him, and declare unto you, that God is light, and in him is no darkness at all.'),
    ('Doctrine and Covenants', '88', '49', 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
    ('Doctrine and Covenants', '93', '28', 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'),
    ('Mosiah', '16', '9', 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');