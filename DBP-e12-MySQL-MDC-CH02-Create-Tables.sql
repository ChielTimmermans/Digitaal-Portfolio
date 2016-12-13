/********************************************************************************/
/*																				                                      */
/*	Kroenke and Auer - Database Processing (12th Edition) Chapter 02          	*/
/*																				                                      */
/*	Marcia's Dry Cleaning [MDC-CH2] Project Create Tables	 		                  */
/*																				                                      */
/*	Theses are the MySQL 5.5 SQL code solutions				                          */
/*                                                                              */
/********************************************************************************/

CREATE TABLE CUSTOMER(
		CustomerID		Int				    NOT NULL AUTO_INCREMENT,
		FirstName 		Char(25)	    NOT NULL,
		LastName		  Char(25)	    NOT NULL,
		Phone			    Char(12) 	    NOT NULL,
		Email			    Char(100)	    NULL,
		CONSTRAINT		CustomerPK    PRIMARY KEY(CustomerID)
		);


CREATE TABLE INVOICE(
		InvoiceNumber       Int				   NOT NULL,
		CustomerNumber      Int				   NOT NULL,
		DateIn			        Date	   	   NOT NULL,
		DateOut			        Date  	 	   NULL,
		TotalAmount         Numeric(8,2)	NULL,
		CONSTRAINT		InvoicePK			PRIMARY KEY (InvoiceNumber),
		CONSTRAINT  	Invoice_Cust_FK 	FOREIGN KEY(CustomerNumber)
							REFERENCES CUSTOMER(CustomerID)
                  ON UPDATE NO ACTION
								  ON DELETE NO ACTION
		);

CREATE TABLE INVOICE_ITEM(
		InvoiceNumber     Int				    NOT NULL,
		ItemNumber		    Int				    NOT NULL,
		Item              Char(50)	    NOT NULL,
		Quantity		      Int				    NOT NULL DEFAULT 1,
		UnitPrice		      Numeric(8,2)	NULL,
		CONSTRAINT		InvoiceItemPK	PRIMARY KEY(InvoiceNumber, ItemNumber),
		CONSTRAINT		Invoice_Item_FK	FOREIGN KEY(InvoiceNumber)
							REFERENCES INVOICE(InvoiceNumber)
								ON UPDATE CASCADE
								ON DELETE CASCADE
		);

/********************************************************************************/




