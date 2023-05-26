/*Run on phpmyadmin sql tab*/
CREATE DATABASE joystick;
USE joystick;
CREATE TABLE `login`(id int NOT NULL AUTO_INCREMENT,
                    email varchar(50),
                    `password` varchar(50),
                    `role` varchar(5),
                    `name` varchar(50),
                    PRIMARY KEY (id)

 );
CREATE table collections(name varchar(50)  NOT NULL,
                   description varchar(100),
                   PRIMARY key (name)
                  );
CREATE table images(id int  NOT NULL AUTO_INCREMENT,
                   `name` varchar(50),
                    link varchar(50),
                    `description` varchar(100),
                    `collection` varchar(50),
                    audio varchar(50),                    
                    PRIMARY key (id),
                    FOREIGN key (`collection`) REFERENCES collections(name)
                  );                