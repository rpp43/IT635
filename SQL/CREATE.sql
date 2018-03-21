CREATE TABLE user(
userName varchar(255) NOT NULL,
userPass varchar(255) NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255) NOT NULL,
emailAddress varchar(255) NOT NULL,
type varchar(1) NOT NULL
);

CREATE TABLE cars (
  userName varchar(255) NOT NULL,
  make varchar(255) NOT NULL,
  model varchar(255) NOT NULL,
  year int NOT NULL,
  color varchar(255) NOT NULL,
  vin varchar(255) NOT NULL,
  PRIMARY KEY (vin),
CONSTRAINT fk_userName FOREIGN KEY (userName) REFERENCES user(userName)
);

CREATE TABLE comments(
userName varchar(255) NOT NULL,
vin varchar(255) NOT NULL,
comment varchar(500) NOT NULL,
FOREIGN KEY (userName) REFERENCES user(userName),
FOREIGN KEY (vin) REFERENCES cars(vin)
);

CREATE TABLE appt(
userName varchar(255) NOT NULL,
vin varchar(255) NOT NULL,
FOREIGN KEY (userName) REFERENCES user(userName),
FOREIGN KEY (vin) REFERENCES cars(vin)
);