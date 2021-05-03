drop database morning;
create database morning;
use morning;

CREATE TABLE user (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    surname varchar(100),
    dtBirthday date,
    email varchar(100),
    user varchar(50),
    password varchar(50),
    type int(1)
);

CREATE TABLE team (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    description varchar(256),
    fk_userId int
);

CREATE TABLE board (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    description varchar(256),
    fk_teamId int
);

CREATE TABLE list (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(35),
    fk_boardId int,
    l_order int(2)
);

CREATE TABLE card (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    description varchar(256),
    dtDelivery date,
    fk_listId int,
    c_order int(2)
);

CREATE TABLE checklist (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    fk_cardId int,
    ch_order int(2)
);

CREATE TABLE tasks (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    finished int(1),
    fk_checkListId int,
    t_order int(2)
);

CREATE TABLE userTeam (
    fk_userId int,
    fk_teamId int
);

CREATE TABLE userBoard (
    fk_userId int,
    fk_boardId int,
    owner varchar(50)
);

CREATE TABLE userCard (
    fk_userId int,
    fk_cardId int
);

CREATE TABLE teamEmail (
    fk_teamId int,
    fk_emailId int,
    PRIMARY KEY (fk_teamId, fk_emailId)
);

CREATE TABLE email (
    id int PRIMARY KEY,
    email varchar(100),
    fk_teamId int
);
 
 # posso fazer essa conexão ?
 
ALTER TABLE board ADD CONSTRAINT FK_email_1
    FOREIGN KEY (fk_teamId)
    REFERENCES team (id);

ALTER TABLE team ADD CONSTRAINT FK_team_2
    FOREIGN KEY (fk_userId)
    REFERENCES user (id);
 
ALTER TABLE board ADD CONSTRAINT FK_board_2
    FOREIGN KEY (fk_teamId)
    REFERENCES team (id)
    ON DELETE RESTRICT;
 
ALTER TABLE list ADD CONSTRAINT FK_list_2
    FOREIGN KEY (fk_boardId)
    REFERENCES board (id)
    ON DELETE RESTRICT;
 
ALTER TABLE card ADD CONSTRAINT FK_card_2
    FOREIGN KEY (fk_listId)
    REFERENCES list (id)
    ON DELETE RESTRICT;
 
ALTER TABLE checklist ADD CONSTRAINT FK_checklist_2
    FOREIGN KEY (fk_cardId)
    REFERENCES card (id)
    ON DELETE CASCADE;
 
ALTER TABLE tasks ADD CONSTRAINT FK_tasks_2
    FOREIGN KEY (fk_checkListId)
    REFERENCES checklist (id)
    ON DELETE CASCADE;
 
ALTER TABLE userTeam ADD CONSTRAINT FK_userTeam_1
    FOREIGN KEY (fk_userId)
    REFERENCES user (id)
    ON DELETE RESTRICT;
 
ALTER TABLE userTeam ADD CONSTRAINT FK_userTeam_2
    FOREIGN KEY (fk_teamId)
    REFERENCES team (id)
    ON DELETE RESTRICT;
 
ALTER TABLE userBoard ADD CONSTRAINT FK_userBoard_1
    FOREIGN KEY (fk_userId)
    REFERENCES user (id)
    ON DELETE RESTRICT;
 
ALTER TABLE userBoard ADD CONSTRAINT FK_userBoard_2
    FOREIGN KEY (fk_boardId)
    REFERENCES board (id)
    ON DELETE RESTRICT;
 
ALTER TABLE userCard ADD CONSTRAINT FK_userCard_1
    FOREIGN KEY (fk_userId)
    REFERENCES user (id)
    ON DELETE SET NULL;
 
ALTER TABLE userCard ADD CONSTRAINT FK_userCard_2
    FOREIGN KEY (fk_cardId)
    REFERENCES card (id)
    ON DELETE SET NULL;
 
ALTER TABLE teamEmail ADD CONSTRAINT FK_teamEmail_2
    FOREIGN KEY (fk_teamId)
    REFERENCES team (id);
 
ALTER TABLE teamEmail ADD CONSTRAINT FK_teamEmail_3
    FOREIGN KEY (fk_emailId)
    REFERENCES email (id);

create user mornode@localhost identified by 'master';
grant select, insert, update, delete, execute on morning.* to mornode@localhost;










