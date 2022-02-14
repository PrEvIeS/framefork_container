USE framework;

CREATE TABLE users
(
    id            INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    name          VARCHAR(30)      NOT NULL,
    last_name     VARCHAR(30)      NOT NULL,
    second_name   VARCHAR(30)      NOT NULL,
    date_of_birth DATE             NOT NULL
);
CREATE TABLE user_groups
(
    id   INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    name VARCHAR(50)      NOT NULL
);
CREATE TABLE group_of_users
(
    id       INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    user_id  INTEGER          NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ,
    group_id INTEGER     NOT NULL,
    FOREIGN KEY (group_id) REFERENCES user_groups (id)
);