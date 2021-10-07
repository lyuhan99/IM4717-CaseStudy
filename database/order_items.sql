use f32ee;

create table order_items
(	
	orderid int unsigned not null,
  productid int unsigned not null,
	qty int not null,
  primary key (orderid, productid),
  order_date date not null
);
