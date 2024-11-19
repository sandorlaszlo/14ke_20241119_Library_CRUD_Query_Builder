BEGIN TRANSACTION;

DROP TABLE IF EXISTS "categories";
CREATE TABLE "categories" (
	"id"	INTEGER,
	"name"	TEXT NOT NULL UNIQUE,
	"created_at"	DATETIME DEFAULT CURRENT_TIMESTAMP,
	"updated_at"	DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY("id" AUTOINCREMENT)
);

DROP TABLE IF EXISTS "books";
CREATE TABLE "books" (
	"id"	INTEGER,
	"title"	TEXT NOT NULL,
	"author"	TEXT NOT NULL,
	"published_year"	INTEGER NOT NULL,
	"price"	REAL NOT NULL,
	"created_at"	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	"updated_at"	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	"category_id"	INTEGER,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("category_id") REFERENCES "categories"("id")
);


INSERT INTO "categories" VALUES (1,'Novel','2024-11-18 15:59:40','2024-11-18 15:59:40');
INSERT INTO "categories" VALUES (2,'Scientific','2024-11-18 15:59:40','2024-11-18 15:59:40');
INSERT INTO "categories" VALUES (3,'Fiction','2024-11-18 15:59:40','2024-11-18 15:59:40');
INSERT INTO "categories" VALUES (4,'Childrens Book','2024-11-18 15:59:40','2024-11-18 15:59:40');
INSERT INTO "categories" VALUES (5,'History','2024-11-18 15:59:40','2024-11-18 15:59:40');

INSERT INTO "books" VALUES (1,'The Great Gatsby','F. Scott Fitzgerald',1925,2999.99,'2024-11-18 15:41:48','2024-11-18 15:41:48',1);
INSERT INTO "books" VALUES (2,'To Kill a Mockingbird','Harper Lee',1960,3999.5,'2024-11-18 15:41:48','2024-11-18 15:41:48',1);
INSERT INTO "books" VALUES (3,'1984','George Orwell',1949,2500.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',1);
INSERT INTO "books" VALUES (4,'Pride and Prejudice','Jane Austen',1813,1999.95,'2024-11-18 15:41:48','2024-11-18 15:41:48',2);
INSERT INTO "books" VALUES (5,'The Catcher in the Rye','J.D. Salinger',1951,3200.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',2);
INSERT INTO "books" VALUES (6,'The Lord of the Rings','J.R.R. Tolkien',1954,4999.9,'2024-11-18 15:41:48','2024-11-18 15:41:48',3);
INSERT INTO "books" VALUES (7,'Harry Potter and the Philosophers Stone','J.K. Rowling',1997,4500.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',3);
INSERT INTO "books" VALUES (8,'The Hobbit','J.R.R. Tolkien',1937,3500.5,'2024-11-18 15:41:48','2024-11-18 15:41:48',4);
INSERT INTO "books" VALUES (9,'Animal Farm','George Orwell',1945,2300.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',4);
INSERT INTO "books" VALUES (10,'Moby Dick','Herman Melville',1851,2700.75,'2024-11-18 15:41:48','2024-11-18 15:41:48',5);
INSERT INTO "books" VALUES (11,'War and Peace','Leo Tolstoy',1869,3999.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',5);
INSERT INTO "books" VALUES (12,'The Odyssey','Homer',-800,2999.99,'2024-11-18 15:41:48','2024-11-18 15:41:48',1);
INSERT INTO "books" VALUES (13,'Crime and Punishment','Fyodor Dostoevsky',1866,3800.5,'2024-11-18 15:41:48','2024-11-18 15:41:48',1);
INSERT INTO "books" VALUES (14,'The Alchemist','Paulo Coelho',1988,4200.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',2);
INSERT INTO "books" VALUES (15,'The Da Vinci Code','Dan Brown',2003,3600.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',2);
INSERT INTO "books" VALUES (16,'Brave New World','Aldous Huxley',1932,2400.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',3);
INSERT INTO "books" VALUES (17,'The Road','Cormac McCarthy',2006,3100.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',3);
INSERT INTO "books" VALUES (18,'A Game of Thrones','George R.R. Martin',1996,5500.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',3);
INSERT INTO "books" VALUES (19,'Dune','Frank Herbert',1965,3700.0,'2024-11-18 15:41:48','2024-11-18 15:41:48',4);
INSERT INTO "books" VALUES (20,'Jane Eyre','Charlotte Brontë',1847,2800.99,'2024-11-18 15:41:48','2024-11-18 15:41:48',4);


COMMIT;
