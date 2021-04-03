-- USUARIO

-- login
DELIMITER $$
CREATE PROCEDURE login(IN username VARCHAR(50), IN passwordU VARCHAR(50))
BEGIN
   SELECT * FROM user WHERE user = username AND password = passwordU;
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