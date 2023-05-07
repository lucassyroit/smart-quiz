CREATE DATABASE smart_quiz;
USE smart_quiz;

CREATE TABLE teams(
    team_id INT NOT NULL,
    teamnaam varchar(255) NOT NULL,
    PRIMARY KEY (team_id)
);

CREATE TABLE ronde(
    ronde_id INT NOT NULL,
    ronde_naam VARCHAR(100),
    PRIMARY KEY (ronde_id)
);

CREATE TABLE vragen(
    vraag_id INT NOT NULL,
    ronde_id INT NOT NULL,
    vraag VARCHAR(1000) NOT NULL,
    optie1 VARCHAR(100) NOT NULL,
    optie2 VARCHAR(100) NOT NULL,
    optie3 VARCHAR(100) NOT NULL,
    optie4 VARCHAR(100) NOT NULL,
    correct_antwoord VARCHAR(100) NOT NULL,
    PRIMARY KEY (vraag_id),
    FOREIGN KEY (ronde_id) REFERENCES ronde(ronde_id)
);

CREATE TABLE antwoorden(
    antwoord_id INT NOT NULL AUTO_INCREMENT,
    vraag_id INT NOT NULL,
    team_id INT NOT NULL,
    gegeven_antwoord VARCHAR(1000) NOT NULL,
    is_correct BOOLEAN,
    PRIMARY KEY (antwoord_id),
    FOREIGN KEY (vraag_id) REFERENCES vragen(vraag_id),
    FOREIGN KEY (team_id) REFERENCES teams(team_id)
);
