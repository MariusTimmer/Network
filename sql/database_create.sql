-- Information
-- This SQL script creates the required tables in the database. So you need to
-- run it on your database before using the network. After this you have to do
-- the same with the database_initial.sql script.
-- Keep in mind that the database should be empty before running this script.

-- date 2017-03-26
-- author Marius Timmer

-- Create the user table
CREATE TABLE users (
    userid SERIAL,
    username VARCHAR(32) NOT NULL,
    status VARCHAR(1) NOT NULL DEFAULT '',
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    changed TIMESTAMP,
    CONSTRAINT pk_users PRIMARY KEY (userid),
    CONSTRAINT uc_username UNIQUE (username)
);

-- Create the credentials table which stores the password hashes
CREATE TABLE credentials (
    credential_id SERIAL,
    userid INTEGER NOT NULL,
    password_hash VARCHAR(256) NOT NULL,
    activation_hash VARCHAR(256) NOT NULL,
    active INTEGER DEFAULT 1,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    changed TIMESTAMP,
    CONSTRAINT pk_credentials PRIMARY KEY (credential_id),
    CONSTRAINT fk_credentials_users_userid FOREIGN KEY (userid) REFERENCING users(userid),
    CONSTRAINT uc_username UNIQUE (activation_hash)
);
