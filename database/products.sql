use f32ee;

create table products
(	
	productid int primary key,
	name VARCHAR(40) not null,
	category VARCHAR(40) not null,
	price float(4,2) not null,
	qty_sold int not null
);

insert into products values
  (1, "Just Java", "Endless Cup", 2, 5),
  (2, "Cafe au Lait", "Single Shot", 2, 7),
  (3, "Cafe au Lait", "Double Shot", 3, 8),
  (4, "Iced Cappucino", "Single Shot", 4.75, 9),
  (5, "Iced Cappucino", "Double Shot", 5.75, 10);