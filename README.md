# Estore


Estore is an inventory management system in which users register and manage their inventory. Users can store, edit, and delete their product information. User can also generate Invoice against their products. 


Tools Required:

XAMPP or WAMPP server



Setup Database Connection

In browser Open “localhost/phpmyadmin/” and then create New Database. After creating database create 2 table named 

users ( `userID`, `userName`, `userEmail`, `userPassword`, `is_admin` ) and

products `productID`, `userID`, `productName`, `productDescription`, `productQTY`, `productPrice`) 

lastly, In config.ini file write your database Name against dbname and username and password if you have set them.
