DELIMITER $$
CREATE PROCEDURE checkLogin(IN UN VARCHAR(18), IN P VARCHAR(256)) COMMENT "
--Description: checks if the user is already created.
--Tables: User
--Parameters: 
	[UN]=The username of the user.
    [P]=The encrpyted password of the user.
--Returns: 1 if true, 0 if false:
	[Q]=1/0"
 BEGIN
 SELECT COUNT(CASE WHEN UserName=UN AND UserPass=P THEN userid END) AS Q FROM Users;
 END; $$

DELIMITER $$
CREATE PROCEDURE getUser(IN UN VARCHAR(18), IN P VARCHAR(256)) COMMENT "
--Description: gets User info.
--Tables: User
--Parameters: 
	[UN]=The username of the user.
    [P]=The encrpyted password of the user.
--Returns: Query of the user:
	[Email]
    [CAdd]=CryptoAddress"
 BEGIN
 SELECT Email AS Email, CyrptoAddress AS CAdd FROM Users WHERE UserName=UN AND UserPass=P;
 END; $$
 
DELIMITER $$
CREATE PROCEDURE searchProducts(IN L VARCHAR(59)) COMMENT "
--Description: searches for products with titles like L.
--Tables: Product
--Parameters: 
	[L]=String to be compared
--Returns: Query of the user:
	[ID]=ProductID
	[Ttile]=ProductTitle
    [Description]=ProductDescription
    [Img]=ProductImg
    [Seller]=UserID"
 BEGIN
 SELECT ProductID AS ID, ProductTitle AS Title, ProductDescription AS `Description`, IFNULL(ProductImg, "no img") AS Img, UserName AS Seller FROM Product JOIN Users WHERE Product.UserID=Users.UserID AND ProductTitle LIKE L;
 END; $$

DELIMITER $$
CREATE PROCEDURE getProducts(IN UN VARCHAR(18), IN P VARCHAR(256)) COMMENT "
--Description: gets Products by User.
--Tables: Product, User
--Parameters: 
	[UN]=The username of the user.
    [P]=The encrpyted password of the user.
--Returns: Query of the user:
	[Title]=ProductTitle"
 BEGIN
 SELECT ProductTitle AS Title FROM Product WHERE (SELECT UserID FROM Users WHERE UserName=UN AND UserPass=P)=Product.UserID;
 END; $$
 
DELIMITER $$
CREATE PROCEDURE getProduct(IN id INT UNSIGNED) COMMENT "
--Description: gets Products by User.
--Tables: Product, User
--Parameters: 
	[id]=The id of the product.
--Returns: Query of the user:
	[Title]=ProductTitle
    [Description]=ProductDescription
    [Img]=ProductImg
    [Seller]=UserID"
 BEGIN
 SELECT ProductTitle AS Title, ProductDescription AS `Description`, IFNULL(ProductImg, "no img") AS Img, UserName AS Seller FROM Product JOIN Users WHERE Product.UserID=Users.UserID AND ProductID=id;
 END; $$

DELIMITER $$
CREATE PROCEDURE addProduct(IN UN VARCHAR(18), IN P VARCHAR(256), IN PT varchar(51), IN PD TEXT, IN PI varchar(256)) COMMENT "
--Description: searches for products with titles like L.
--Tables: Product
--Parameters: 
	[L]=String to be compared
--Returns: Query of the user:
	[Ttile]=ProductTitle
    [Description]=ProductDescription
    [Img]=ProductImg
    [Seller]=UserID"
 BEGIN
 DECLARE us INT UNSIGNED;
 SET us=(SELECT UserID FROM Users WHERE UserName=UN AND UserPass=P);
 INSERT INTO Product (ProductTitle, ProductDescription, ProductImg, UserID) VALUES (PT, PD, PI, us);
 END; $$
 
DELIMITER $$
CREATE PROCEDURE addUser(IN UN VARCHAR(18), IN P VARCHAR(256), IN E varchar(321), IN CA varchar(36)) COMMENT "
--Description: searches for products with titles like L.
--Tables: Product
--Parameters: 
	[L]=String to be compared
--Returns: Query of the user:
	[Ttile]=ProductTitle
    [Description]=ProductDescription
    [Img]=ProductImg
    [Seller]=UserID"
 BEGIN
 INSERT INTO Users (UserName, UserPass, Email, CyrptoAddress) VALUES (UN, P, E, CA);
 END; $$