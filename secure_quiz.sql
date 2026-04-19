CREATE DATABASE secure_quiz;
USE secure_quiz;

create table results (
    id int primary key auto_increment,
    name varchar(255) ,
    course varchar(255) ,
    score int,
    time_sumitted datetime
);