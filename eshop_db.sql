/*Database name is: eshopdb*/

CREATE TABLE PRODUCTS (
PROD_ID	INT(2) NOT NULL,
PROD_TITLE VARCHAR(50),
PROD_DESCRIPTION VARCHAR(100),
CONSTRAINT PRODUCTS_PRIMARY_KEY PRIMARY KEY (PROD_ID));

INSERT INTO PRODUCTS VALUES (1,'Gaming Headsets','Gaming Headsets are ideal for improving gaming experience.');
INSERT INTO PRODUCTS VALUES (2,'Wireless Chargers','Do not worry about staying without battery.These chargers are very useful.');
INSERT INTO PRODUCTS VALUES (3,'Waterproof Phone Cases','These cases are very handy to carry your smartphone.');
INSERT INTO PRODUCTS VALUES (4,'Bluetooth Speakers','Would you like to talk on the phone while driving?You can do that now in an easy way!');
INSERT INTO PRODUCTS VALUES (5,'Smart Watches','Are you a true sports fan?Smart watches are there to take control of your workout tunes!');

CREATE TABLE PRODUCT_ITEM (
PROD_ITEM_ID INT(2) NOT NULL,
ITEM_TITLE VARCHAR(100),
ITEM_PRICE DOUBLE(8,2),
ITEM_DESCRIPTION VARCHAR(200),
ITEM_IMAGE VARCHAR(20),
PROD_ID INT(2) NOT NULL,
CONSTRAINT PRODUCTS_ITEM_PRIMARY_KEY PRIMARY KEY (PROD_ITEM_ID),
CONSTRAINT PRODUCTS_ITEM_FOREIGN_KEY FOREIGN KEY (PROD_ID) REFERENCES PRODUCTS (PROD_ID));

INSERT INTO PRODUCT_ITEM VALUES(1,'Playstation VR','390.00','Playstation Virtual Reality Headsets provide a very high sound and video quality,particularly when playing 3D games.','psvr.gif',1);
INSERT INTO PRODUCT_ITEM VALUES(2,'Sony Wireless Stereo Headset 2.0','90.98','Sony Wireless Stereo Headsets do not only have a unique design but they are also compatible with every device.','sonystereo.gif',1);
INSERT INTO PRODUCT_ITEM VALUES(3,'Spartan Gear PS4','59.99','You will be able to face any opponent thanks to the comfort and sound quality of Spartan Gear Bluetooth Headset.','spartan.gif',1);
INSERT INTO PRODUCT_ITEM VALUES(4,'Sony PS4 Platinum Wireless Headset','179.99','Sony PS4 Platinum Wireless Headsets provide excellent communication with your teammates.','sonyplatinum.gif',1);
INSERT INTO PRODUCT_ITEM VALUES(5,'Turtle Beach Stealth 520','149.99','Turtle Beach Stealth 520 Headsets thanks to its great battery provide up to 15 hours gaming completely wirelessly!','turtlebeach.gif',1);

INSERT INTO PRODUCT_ITEM VALUES(6,'Anker PowerPort Qi 10 Charger','20.00','The Anker PowerPort Qi can charge some devices faster than a standard wireless charger.','anker.gif',2);
INSERT INTO PRODUCT_ITEM VALUES(7,'Satechi Charger','25.00','This charger has a stylish design and it can also protect your phone and prevent it from sliding around.','satechi.gif',2);
INSERT INTO PRODUCT_ITEM VALUES(8,'FLI Charger','70.00','Unlike most Qi chargers on the market,FLI chargers don’t have to be placed in a specific orientation in order to work.','fli.gif',2);
INSERT INTO PRODUCT_ITEM VALUES(9,'Choetech Iron Stand','20.00','Choetech Iron Stand can work with any Qi-compatible smartphone and you can add receivers or cases to phones like the iPhone.','choetech.gif',2);
INSERT INTO PRODUCT_ITEM VALUES(10,'Montar Air Car Mount','60.00','Montar has created an excellent cradle for the car with built-in Qi wireless charging.','montar.gif',2);

INSERT INTO PRODUCT_ITEM VALUES(11,'Insten Waterproof Case','5.69','Insten Waterproof Cases are compatible with Samsung Galaxy S7,iPhone 6 and 5S HTC Desire smartphones.','insten.gif',3);
INSERT INTO PRODUCT_ITEM VALUES(12,'Dry Pak Waterproof Case','12.60','Dry Pak Waterproof Cases have stylus holder on front with clear TPU back.','drypak.gif',3);
INSERT INTO PRODUCT_ITEM VALUES(13,'JETech Universal Waterproof Case','5.50','JETech Universal Waterproof Cases fit all smarthones up to 6.0" diagonal size.','jetech.gif',3);
INSERT INTO PRODUCT_ITEM VALUES(14,'Dirt Snow Proof Protective Case','10.95','Dirt Snow Proof Protective Cases are lighweight,durable and rugged.','dirtsnow.gif',3);
INSERT INTO PRODUCT_ITEM VALUES(15,'Ozark Trail Waterproof Case','2.94','Ozark Trail Waterproof Cases are touchscreen-friendly.','ozark.gif',3);

INSERT INTO PRODUCT_ITEM VALUES(16,'Logitech Bluetooth Speaker','147.00','Logitech Bluetooth Speakers are known for their water resistance and gesture controlls.','logitech.gif',4);
INSERT INTO PRODUCT_ITEM VALUES(17,'KEF Muo Bluetooth Speaker','350.00','The KEF Muo is a gorgeous compact wireless speaker crafted from metal.','kefmuo.gif',4);
INSERT INTO PRODUCT_ITEM VALUES(18,'JBL Clip 2 Portable Speaker','54.00','The recently launched JBL Clip 2 has a battery that can last up to eight hours.','jbl.gif',4);
INSERT INTO PRODUCT_ITEM VALUES(19,'Libratone ZIPP Bluetooth Speaker','296.00','The redesigned Libratone ZIPP is one of the most stylish portable wireless speakers available today.','libratone.gif',4);
INSERT INTO PRODUCT_ITEM VALUES(20,'AmazonBasics Nano Portable Speaker','15.00','This tiny Bluetooth speaker by AmazonBasics is cute, compact, and splash-resistant.','amazon.gif',4);

INSERT INTO PRODUCT_ITEM VALUES(21,'Fitbit Blaze Smart Fitness Watch','216.52','Fitbit Blaze syncs automatically and wirelessly to 200+ leading iOS, Android and Windows devices using Bluetooth 4.0 wireless technology.','fitbitblaze.gif',5);
INSERT INTO PRODUCT_ITEM VALUES(22,'Pebble Time Steel Smartwatch','84.99','This smartwatch includes Pebble Health, a built-in activity and sleep tracker with daily reports and weekly insights.','pebble.gif',5);
INSERT INTO PRODUCT_ITEM VALUES(23,'Samsung Gear S3 Frontier SM-R760','324.99','This smasrtwatch is compatible with Android 4.4 (KitKat) and later with 1.5GB RAM.','samsung.gif',5);
INSERT INTO PRODUCT_ITEM VALUES(24,'ASUS ZenWatch 2 Smartwatch','89.99','ASUS ZenWatch 2 Smartwatch has built-in Wi-Fi which extends the range and connectivity with your phone.','asus.gif',5);
INSERT INTO PRODUCT_ITEM VALUES(25,'Apple Watch Series 2 Smartwatch','379.00','This smartwatch consists of watchOS 3,accelerometer,gyroscope,light sensor,activity tracker,heart monitor,microphone and speaker,bluetooth.','apple.gif',5);

CREATE TABLE COUNTVOTES (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  VOTEONETIMEID VARCHAR(100) NOT NULL,
  LIKEVOTE INT(11) NOT NULL,
  DISLIKEVOTE INT(11) NOT NULL,
  CONSTRAINT COUNTVOTES_PRIMARY_KEY PRIMARY KEY (ID)
);

CREATE TABLE USERS (
USERID INT(10) NOT NULL AUTO_INCREMENT,
FIRSTNAME VARCHAR(100) NOT NULL,
LASTNAME VARCHAR(100) NOT NULL,
AGE VARCHAR(20) NOT NULL,
GENDER VARCHAR(10) NOT NULL,
PHONE VARCHAR(50) NOT NULL,
EMAIL VARCHAR(100) NOT NULL,
PASS VARCHAR (100) NOT NULL,
SALT BINARY (64) NOT NULL,
SPEOFFER VARCHAR(200),
CONSTRAINT USERS_PRIMARY_KEY PRIMARY KEY (USERID)
);

CREATE TABLE store_shoppertrack (
ORDER_ITEM_ID INT(10) NOT NULL AUTO_INCREMENT,
SESSION_ID VARCHAR(32),
SEL_ITEM_ID INT,
SEL_ITEM_QTY SMALLINT,
DATE_ADDED DATETIME,
CONSTRAINT ORDER_ITEMS_PRIMARY_KEY PRIMARY KEY (ORDER_ITEM_ID)
);

CREATE TABLE ORDERS (
ORDERS_ID INT(10) NOT NULL AUTO_INCREMENT,
ADDRESS VARCHAR(50) NOT NULL,
ZIP VARCHAR(10) NOT NULL,
EMAIL VARCHAR(100) NOT NULL,
TOTALPRICE DOUBLE(8,2) NOT NULL,
ORDER_DATE DATETIME,
CONSTRAINT ORDERS_PRIMARY_KEY PRIMARY KEY (ORDERS_ID)
);