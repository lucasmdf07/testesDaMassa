

CREATE TABLE scriptures.topics (
    topic_id SERIAL NOT NULL,
    topic_name varchar(60) NOT NULL,
    PRIMARY KEY (topic_id)
    );
    
INSERT INTO scriptures.topics (topic_name)
VALUES ('Faith'), ('Sacrifice'), ('Charity');

CREATE TABLE scriptures.topiclinking (
    topiclink_id SERIRAL NOT NULL,
    scripture_id int NOT NULL,
    topic_id int NOT NULL,
    PRIMARY KEY (topiclink_id),
    CONSTRAINT fk_scripture_id_1 FOREIGN KEY (scripture_id) REFERENCES scriptures (scripture_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT fk_toic_id_1 FOREIGN KEY (topic_id) REFERENCES topics (topic_id) ON DELETE NO ACTION ON UPDATE NO ACTION
    );

CREATE INDEX  fk_topiclinking_1_idx ON scriptures.topiclinking (scripture_id);
CREATE INDEX  fk_topiclinking_2_idx ON scriptures.topiclinking (topic_id);












