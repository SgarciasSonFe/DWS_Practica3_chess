INSERT INTO T_Players (ID,name,email,password) values(1,"Paquito","play1@gmail.com","pato"),(2,"Jugador2","play2@gmail.com","patos"),(3,"Manolito","play3@gmail.com","patoso"),(4,"Juan","jan@gmail.com","torso"),(5,"Repi","repi@gmail.com","pastoso");
INSERT INTO T_Matches (title,white,black,startDate) 
	values("Prueba 1",1,3,"2023-11-30 16:33:33");
INSERT INTO T_Matches (title,white,black,startDate,endDate,winner,state) 
	values("Prueba 2",3,2,"2023-12-12 15:33:30","2023-12-12 17:10:20","","Tablas"),("Partida oficial",5,3,"2023-12-12 20:12:33","2023-12-13 17:10:24","Blancas","Jaque mate");
    
insert into T_Board_Status (IDGame,board) values
((select ID from T_Matches where ID = 1),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 1),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,X,PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 1),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,X,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 1),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,X,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 1),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,X,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW");

insert into T_Board_Status (IDGame,board) values
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,QuB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,QuB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,QuW,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,QuB,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,KnB,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,PaW,PaW,PaW,PaW,X,PaW,X,PaW,RoW,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,X,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,KnB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,PaW,PaW,PaW,PaW,X,PaW,X,PaW,RoW,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,X,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,KnB,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,PaW,PaW,PaW,X,PaW,X,PaW,RoW,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,X,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,KnB,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,PaW,PaW,PaW,X,PaW,X,PaW,RoW,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,X,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,KnB,X,X,X,PaW,X,X,X,X,X,X,X,RoW,X,X,X,X,PaW,X,X,X,PaW,PaW,PaW,X,PaW,X,PaW,X,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,X,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,RoW,X,X,X,X,KnB,X,X,X,PaW,PaW,PaW,X,PaW,X,PaW,X,KnW,BiW,X,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 2),"RoB,X,BiB,X,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,X,RoW,X,X,X,PaW,PaW,PaW,X,PaW,X,PaW,X,KnW,BiW,X,KiW,BiW,KnW,RoW");

insert into T_Board_Status (IDGame,board) values
((select ID from T_Matches where ID = 3),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 3),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 3),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,X,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW"),
((select ID from T_Matches where ID = 3),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,X,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,KnW,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,PaB,PaB,PaB,X,X,X,PaB,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,KnW,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,PaB,PaB,PaB,X,X,X,PaB,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,BiW,X,PaW,X,X,X,X,X,X,X,X,KnW,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,PaB,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,BiW,X,PaW,X,X,X,X,X,X,X,X,KnW,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,PaB,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,BiW,X,PaW,X,X,X,X,X,KnW,X,X,KnW,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,X,BiW,QuW,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,X,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,PaB,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,X,PaB,X,X,X,X,X,BiW,X,PaW,X,BiB,X,X,X,KnW,X,X,KnW,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,X,BiW,QuW,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,X,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,PaB,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,X,KnW,X,X,X,X,X,BiW,X,PaW,X,BiB,X,X,X,KnW,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,X,BiW,QuW,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,X,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,PaB,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,X,KnW,X,X,X,X,X,BiW,X,PaW,X,X,X,X,X,KnW,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,X,BiW,BiB,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,X,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,X,X,BiW,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,X,KnW,X,X,X,X,X,X,X,PaW,X,X,X,X,X,KnW,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,X,BiW,BiB,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,X,QuB,X,BiB,KnB,RoB,PaB,PaB,PaB,X,KiB,BiW,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,X,KnW,X,X,X,X,X,X,X,PaW,X,X,X,X,X,KnW,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,X,BiW,BiB,KiW,X,X,RoW"),
((select ID from T_Matches where ID = 3),"RoB,X,X,QuB,X,BiB,KnB,RoB,PaB,PaB,PaB,X,KiB,BiW,PaB,PaB,X,X,KnB,PaB,X,X,X,X,X,X,X,KnW,KnW,X,X,X,X,X,X,X,PaW,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,X,PaW,PaW,PaW,RoW,X,BiW,BiB,KiW,X,X,RoW");

/* 
RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,
PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,
X,X,X,X,X,X,X,X,
X,X,X,X,X,X,X,X,
X,X,X,X,X,X,X,X,
X,X,X,X,X,X,X,X,
PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,
RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW
*/