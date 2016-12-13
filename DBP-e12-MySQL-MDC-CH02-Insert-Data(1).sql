/********************************************************************************/
/*																				                                      */
/*	Kroenke and Auer - Database Processing (12th Edition) Chapter 02	     		  */
/*																				                                      */
/*	Marcia's Dry Cleaning [MDC-CH02] Project Create Tables	          		      */
/*																				                                      */
/*	Theses are the MySQL 5.5 SQL code solutions				                          */
/*																				                                      */
/********************************************************************************/

/*****  CUSTOMER Data   *********************************************************/

INSERT INTO CUSTOMER (FirstName, LastName, Phone, Email) VALUES(
	'Nikki', 'Kaccaton', '723-543-1233', 'Nikki.Kaccaton@somewhere.com');
INSERT INTO CUSTOMER (FirstName, LastName, Phone, Email) VALUES(
	'Brenda', 'Catnazaro', '723-543-2344', 'Brenda.Catnazaro@somewhere.com');
INSERT INTO CUSTOMER (FirstName, LastName, Phone, Email) VALUES(
	'Bruce', 'LeCat', '723-543-3455', 'Bruce.LeCat@somewhere.com');
INSERT INTO CUSTOMER (FirstName, LastName, Phone, Email) VALUES(
	'Betsy', 'Miller', '725-654-3211', 'Betsy.Miller@somewhere.com');
INSERT INTO CUSTOMER (FirstName, LastName, Phone, Email) VALUES(
	'George', 'Miller', '725-654-4322', 'George.Miller@somewhere.com');
INSERT INTO CUSTOMER (FirstName, LastName, Phone, Email) VALUES(
	'Kathy', 'Miller', '723-514-9877', 'Kathy.Miller@somewhere.com');
INSERT INTO CUSTOMER (FirstName, LastName, Phone, Email) VALUES(
	'Betsy', 'Miller', '723-514-8766', 'Betsy.Miller@elsewhere.com');


/*****  INVOICE Data   ************************************************************/

INSERT INTO INVOICE VALUES(
		2011001, 1, '2011-10-04', '2011-10-06', 158.50);
INSERT INTO INVOICE VALUES(
		2011002, 2, '2011-10-04', '2011-10-06', 25.00);
INSERT INTO INVOICE VALUES(
		2011003, 1, '2011-10-06', '2011-10-08', 49.00);
INSERT INTO INVOICE VALUES(
		2011004, 4, '2011-10-06', '2011-10-08', 17.50);
INSERT INTO INVOICE VALUES(
		2011005, 6, '2011-10-07', '2011-10-11', 12.00);
INSERT INTO INVOICE VALUES(
		2011006, 3, '2011-10-11', '2011-10-13', 152.50);
INSERT INTO INVOICE VALUES(
		2011007, 3, '2011-10-11', '2011-10-13', 7.00);
INSERT INTO INVOICE VALUES(
		2011008, 7, '2011-10-12', '2011-10-14', 140.50);
INSERT INTO INVOICE VALUES(
		2011009, 5, '2011-10-12', '2011-10-14', 27.00);


/*****  INVOICE_ITEM Data   ********************************************************/

INSERT INTO INVOICE_ITEM VALUES(2011001, 1, 'Blouse', 2,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2011001, 2, 'Dress Shirt', 5,  2.50);
INSERT INTO INVOICE_ITEM VALUES(2011001, 3, 'Formal Gown', 2, 10.00);
INSERT INTO INVOICE_ITEM VALUES(2011001, 4, 'Slacks-Mens', 10, 5.00);
INSERT INTO INVOICE_ITEM VALUES(2011001, 5, 'Slacks-Womens', 10, 6.00);
INSERT INTO INVOICE_ITEM VALUES(2011001, 6, 'Suit-Mens', 1,  9.00);
INSERT INTO INVOICE_ITEM VALUES(2011002, 1, 'Dress Shirt', 10, 2.50);
INSERT INTO INVOICE_ITEM VALUES(2011003, 1, 'Slacks-Mens', 5,  5.00);
INSERT INTO INVOICE_ITEM VALUES(2011003, 2, 'Slacks-Womens', 4,  6.00);
INSERT INTO INVOICE_ITEM VALUES(2011004, 1, 'Dress Shirt', 7,  2.50);
INSERT INTO INVOICE_ITEM VALUES(2011005, 1, 'Blouse', 2,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2011005, 2, 'Dress Shirt', 2,  2.50);
INSERT INTO INVOICE_ITEM VALUES(2011006, 1, 'Blouse', 5,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2011006, 2, 'Dress Shirt', 10, 2.50);
INSERT INTO INVOICE_ITEM VALUES(2011006, 3, 'Slacks-Mens', 10, 5.00);
INSERT INTO INVOICE_ITEM VALUES(2011006, 4, 'Slacks-Womens', 10, 6.00);
INSERT INTO INVOICE_ITEM VALUES(2011007, 1, 'Blouse', 2,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2011008, 1, 'Blouse', 3,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2011008, 2, 'Dress Shirt', 12, 2.50);
INSERT INTO INVOICE_ITEM VALUES(2011008, 3, 'Slacks-Mens', 8,  5.00);
INSERT INTO INVOICE_ITEM VALUES(2011008, 4, 'Slacks-Womens', 10, 6.00);
INSERT INTO INVOICE_ITEM VALUES(2011009, 1, 'Suit-Mens', 3,  9.00);


/*********************************************************************************/


