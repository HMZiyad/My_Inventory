CREATE DATABASE My_Inventory;

USE My_Inventory;

CREATE TABLE Customer (
    CustomerID INT PRIMARY KEY,
    CustomerName VARCHAR(50),
    CustomerAddress VARCHAR(100)
);

INSERT INTO Customer (CustomerID, CustomerName, CustomerAddress)
VALUES 
    (1, 'Henry Doe', '123 Main St'),
    (2, 'Joy Smith', '456 Elm St'),
    (3, 'David Johnson', '789 Broadway'),
    (4, 'Emis', '567 Oak Stt');


CREATE TABLE Employee (
    EmployeeID INT PRIMARY KEY,
    EmployeeName VARCHAR(50),
    Position VARCHAR(50),
    EmployeeAddress VARCHAR(50)
); 

INSERT INTO Employee (EmployeeID, EmployeeName, Position, EmployeeAddress)
VALUES
    (1, 'John Doe', 'Software Engineer', '123 Main St'),
    (2, 'Jane Smith', 'Marketing Specialist', '456 Oak St'),
    (3, 'Bob Johnson', 'Sales Representative', '789 Elm St'),
    (4, 'Alice Williams', 'HR Manager', '321 Pine St');


CREATE TABLE Supplier (
     SupplierID INT PRIMARY KEY AUTO_INCREMENT,
    SupplierName VARCHAR(50),
    ContactInfo VARCHAR(100),
    PaymentTerms VARCHAR(50),
    Category VARCHAR(50)
);

INSERT INTO Supplier (SupplierID, SupplierName, ContactInfo, PaymentTerms, Category)
VALUES
    (1, 'ABC Electronics', '123 Main St, Cityville, USA', 'Net 30', 'Electronics'),
    (2, 'XYZ Supplies', '456 Oak St, Townsville, USA', 'Net 15', 'Office Supplies'),
    (3, 'Global Foods', '789 Elm St, Villagetown, USA', 'Net 45', 'Food and Beverage'),
    (4, 'Fashion Trends', '321 Pine St, Hamletville, USA', 'Net 60', 'Apparel');

CREATE TABLE Category (
    CategoryID INT PRIMARY KEY,
    CategoryName VARCHAR(50),
    Total_product INT
);


INSERT INTO Category (CategoryID, CategoryName, Total_product)
VALUES
    (1, 'Electronics', 100),
    (2, 'Office Supplies', 150),
    (3, 'Food and Beverage', 200),
    (4, 'Apparel', 120);


CREATE TABLE Inventory (
    ProductID INT PRIMARY KEY,
    ProductName VARCHAR(50),
    ProductPrice INT,
    StockQuantity INT,
    ReorderLevel INT,
    ShelfLocation VARCHAR(50),
    LastRestockDate DATE,
    ExpiryDate DATE,
    SupplierID INT,
    FOREIGN KEY (SupplierID) REFERENCES Supplier(SupplierID)
);



INSERT INTO Inventory (ProductID, SupplierID, ProductName, ProductPrice, StockQuantity, ReorderLevel, ShelfLocation, LastRestockDate, ExpiryDate)
VALUES
    (1, 1, 'Product1', 100, 50, 10, 'A-1', '2023-01-15', '2023-12-31'),
    (2, 2, 'Product2', 150, 80, 20, 'B-2', '2023-02-20', '2024-06-30'),
    (3, 3, 'Product3', 200, 25, 5, 'C-3', '2023-03-25', '2023-11-15'),
    (4, 4, 'Product4', 120, 40, 15, 'D-4', '2023-04-10', '2024-03-01');    
   
CREATE TABLE Inventory_Transaction (
    TransactionID INT PRIMARY KEY,
    TransactionType VARCHAR(20),
    TransactionDate DATE,
    Quantity INT,
    TotalAmount DECIMAL(10, 2),
    CustomerID INT,
    ProductID INT,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
    FOREIGN KEY (ProductID) REFERENCES Inventory(ProductID)
);

INSERT INTO Inventory_Transaction (TransactionID, TransactionType, TransactionDate, Quantity, TotalAmount, CustomerID, ProductID)
VALUES
    (1, 'Sale', '2023-01-01', 5, 500.00, 1, 1),
    (2, 'Purchase', '2023-02-15', 2, 300.00, 2, 2),
    (3, 'Adjustment', '2023-03-10', 10, 100.00, 3, 3),
    (4, 'Sale', '2023-04-20', 3, 150.00, 4, 4);

-- Add an auto-incremented primary key column SupplierID to the existing table
USE My_Inventory;
ALTER TABLE Supplier
ADD COLUMN SupplierID INT AUTO_INCREMENT PRIMARY KEY FIRST;




SELECT * FROM Customer;
SELECT * FROM Employee;
SELECT * FROM Supplier;
SELECT * FROM Category;
SELECT * FROM Inventory_Transaction;
SELECT * FROM Inventory;

USE My_Inventory; 
-- Remove the existing Supplier table
DROP TABLE Supplier;


