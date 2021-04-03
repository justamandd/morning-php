create database morning;
use morning;

CREATE TABLE user (
    id int PRIMARY KEY auto_increment,
    name varchar(50),
    surname varchar(100),
    dtBirthday date,
    email varchar(100),
    user varchar(50),
    password varchar(50),
    isOn int(1),
    type int(1)
);

CREATE TABLE team (
    id int PRIMARY KEY auto_increment,
    name varchar(50),
    description varchar(256)
);

CREATE TABLE board (
    id int PRIMARY KEY auto_increment,
    name varchar(50),
    description varchar(256),
    fk_teamId int
);

CREATE TABLE list (
    id int PRIMARY KEY auto_increment,
    name varchar(35),
    fk_boardId int
);

CREATE TABLE card (
    id int PRIMARY KEY auto_increment,
    name varchar(50),
    description varchar(256),
    dtDelivery date,
    fk_listId int
);

CREATE TABLE checklist (
    id int PRIMARY KEY auto_increment,
    name varchar(50),
    fk_cardId int
);

CREATE TABLE task (
    id int PRIMARY KEY auto_increment,
    name varchar(50),
    finished int(1),
    fk_checkListId int
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
 
ALTER TABLE task ADD CONSTRAINT FK_task_2
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

create user mornode@localhost identified by 'master';
grant select, insert, update, delete, execute on morning.* to mornode@localhost;