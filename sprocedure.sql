-- USUARIO

-- login
DELIMITER $$
CREATE PROCEDURE login(IN username VARCHAR(50), IN passwordU VARCHAR(50))
BEGIN
   SELECT * FROM user WHERE user = username AND password = md5(passwordU);
END $$
DELIMITER ;

-- delete user
DELIMITER $$
CREATE PROCEDURE deleteUser(IN idUser INT)
BEGIN
	DELETE FROM user WHERE id = idUser;
END $$
DELIMITER ;

-- find user
DELIMITER $$
CREATE PROCEDURE findUser(IN idUser INT)
BEGIN
	SELECT * FROM user WHERE id = idUser;
END $$
DELIMITER ;

-- list all
DELIMITER $$
CREATE PROCEDURE listAll()
BEGIN
	SELECT * FROM user; 
END $$
DELIMITER ;

-- count users
DELIMITER $$
CREATE PROCEDURE countUser()
BEGIN
	SELECT count(*) FROM user; 
END $$
DELIMITER ;

-- create user
DELIMITER $$
CREATE PROCEDURE createUser(
IN nameU VARCHAR(50),
IN surnameU VARCHAR(100), 
IN dtBirth DATE,
IN emailU VARCHAR(100),
IN userU VARCHAR(50),
IN passwordU VARCHAR(50),
IN typeU INT(1)
)
BEGIN
	INSERT INTO user (id, NAME, surname, dtBirthday, email, user, PASSWORD, TYPE)
	VALUES (NULL, nameU, surnameU, dtBirth, emailU, userU, md5(passwordU), typeU);
END $$
DELIMITER ;

-- update user
DELIMITER $$
CREATE PROCEDURE updateUser(
IN nameU VARCHAR(50),
IN surnameU VARCHAR(100), 
IN dtBirth DATE,
IN emailU VARCHAR(100),
IN userU VARCHAR(50),
IN passwordU VARCHAR(50),
IN typeU INT(1),
IN idU INT 
)
BEGIN
	UPDATE user SET NAME = nameU, surname = surnameU, dtBirthday = dtBirth, email = emailU, user = userU,
	PASSWORD = md5(passwordU), TYPE = typeU WHERE id = idU;
END $$
DELIMITER ;


-- Team

#vai ter que reformular
DELIMITER $$
CREATE PROCEDURE createTeam(
IN nameT VARCHAR(50),
IN descriptionT VARCHAR(256),
IN idU INT
)
BEGIN

	INSERT INTO team VALUES (NULL, nameT, descriptionT, idU);

END $$
DELIMITER ;

-- list all teams do user
DELIMITER $$
CREATE PROCEDURE listAllTeamsUser(IN userId INT)
BEGIN
	SELECT * FROM team WHERE fk_userId = userId;
END $$
DELIMITER ;
















