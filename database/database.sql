/* 
MYSQL
CREATE DATABASE IF NOT EXISTS api_test;
USE api_test;

CREATE TABLE users(
      id                int(255) auto_increment not null,
      email             varchar (255) NOT NULL,      
      name              varchar (50) NOT NULL,
      surname           varchar (100) NOT NULL,
      name_user         varchar (50) NOT NULL,
      password          varchar (255) NOT NULL,
      remember_token    varchar (255),
      created_ad        datetime DEFAULT NULL,
      CONSTRAINT fk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE TWEETS(
      id                int(255) auto_increment not null,
      descripcion       VARCHAR(250) NOT NULL,      
      ubicacion         varchar (255),
      created_ad        datetime DEFAULT NULL,
      fk_user           INTEGER NOT NULL,
      CONSTRAINT fk_tweet PRIMARY KEY(id),
      CONSTRAINT fk_users_tweet FOREIGN KEY (fk_user) REFERENCES USERS (id)
); */

/* 
POSTGRESQL
CREATE TABLE TWEETS(
      id serial CONSTRAINT pk_users PRIMARY KEY,
      descripcion       VARCHAR(250) NOT NULL,      
      ubicacion         varchar (255),
      created_ad        datetime DEFAULT NULL,
      fk_user           INTEGER NOT NULL,
      CONSTRAINT fk_users FOREIGN KEY (fk_user) REFERENCES USERS (id)ON DELETE CASCADE,
);

CREATE TABLE USERS(
      id serial CONSTRAINT pk_users PRIMARY KEY,
      email             varchar (255) NOT NULL,      
      name              varchar (50) NOT NULL,
      surname           varchar (100) NOT NULL,
      name_user         varchar (50) NOT NULL,
      password          varchar (255) NOT NULL,
      remember_token    varchar (255),
      created_ad        datetime DEFAULT NULL,
);
 */