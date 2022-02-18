CREATE DATABASE IF NOT EXISTS framework;

CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';

GRANT ALL PRIVILEGES ON *.* TO 'dev'@'localhost' WITH GRANT OPTION;

CREATE USER 'dev'@'%' IDENTIFIED BY 'dev';

GRANT ALL PRIVILEGES ON *.* TO 'dev'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;

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
    user_id  INT(11) UNSIGNED NOT NULL,
    CONSTRAINT `fk_user_id`
        FOREIGN KEY (user_id) REFERENCES users (id)
            ON DELETE CASCADE,
    group_id INT(11) UNSIGNED NOT NULL,
    CONSTRAINT `fk_group_id`
        FOREIGN KEY (group_id) REFERENCES user_groups (id)
            ON DELETE CASCADE
);