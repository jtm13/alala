CREATE TABLE users (
UserID int unsigned unique not null auto_increment comment "The user id",
UserName varchar(31) not null comment "The username of the user",
UserPass varchar(256) not null comment "The encrypted password",
Email varchar(321) not null comment "The email (max is 320) of the user",
CyrptoAddress varchar(71) not null comment "The cryptocurrency address for payments",
primary key(UserID)
) comment "Table of all the users";

CREATE TABLE product (
ProductID int unsigned unique not null auto_increment comment "The product id",
ProductTitle varchar(51) not null comment "The title of the product",
ProductImg varchar(256) comment "The image of the product (not required)",
ProductDescription TEXT comment "The Text of the product (not required)",
UserID int unsigned not null comment "The user id of the user that posted the product",
primary key(ProductID),
foreign key (UserID) REFERENCES Users(UserID)
) comment "Table of products to buy from";

CREATE TABLE reviews (
ReviewID int unsigned not null auto_increment unique comment "The review id",
UserID int unsigned not null comment "The id of the user that posted it",
ReviewText TEXT not null comment "The text for the given review",
Rating tinyint not null comment "If the commenter liked the event or product",
ProductID int unsigned not null comment "The id for the product the review is for",
primary key(ReviewID),
constraint UsID foreign key(UserID) REFERENCES Users(UserID),
constraint ProdID foreign key(ProductID) REFERENCES Product(ProductID)
) comment "Table of reviews for various products";

CREATE TABLE wishlists (
WishListID int unsigned not null auto_increment unique comment "The wishlist id",
UserID int unsigned not null comment "The id of the user that wanted it",
ProductID int unsigned not null comment "The id for the review the comment is for",
primary key(WishListID),
constraint User_ID foreign key(UserID) REFERENCES Users(UserID),
constraint Produst_ID foreign key(ProductID) REFERENCES Product(ProductID)
) comment "Table of reviews for various products";