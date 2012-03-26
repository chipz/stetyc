
create table comments
(
com_id int primary key auto_increment,
 comment varchar(200), 
msg_id_fk int, 
foreign key (msg_id_fk) references messages(msg_id)
);