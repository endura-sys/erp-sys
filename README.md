# Sake ERP-System Documentation

## Discription
Sake ERS-System is designed for helping Sake Retail Company to maintain Warehouse Items.
This [bootstrap tamplete](https://zuramai.github.io/mazer/) was used to **design** the web-pages and **php** for the backend

## Database
For visualization purpose, Database Relationship Model is available [here](database/database_model.jpg).
</br>
Please insert [this SQL file](database/import_database.sql) into your Database Server, to create Database with all the tables.
</br>
`function OpenCon(){...}` Connects Server with the Database </br>
`function CloseCon(){...}` Closes Connection with the Database
> `mysqli_connect("localhost", "root", "root", "sakedb");` can also be used to connect

All the tables in the Database are listed in the order of importing (from top to bottom)


```
$result = $conn->query($sql);
```

The code below with the function `query()` is used for submitting the filled form to the Database; where `$sql` is variable for SQL code and `$conn` is variable to store connection information with the Database

## User-Management
`$sql` variable is updated by the data entered into the form, where `method="post"`
### Create User
```
$sql="INSERT INTO table_name VALUES (values)";
```

### Update User
`$sql="UPDATE table_name SET old_data=new_data WHERE condition";`

### Delete User
```
$sql="DELETE FROM table_name WHERE condition";
```
### Position Management
Position managent is similar to *User Management*, where the same logic for **Create**, **Update** and **Delete** are used.


## Authorization

The code below keeps the user **logged in** until they **log out**, even if the user changes between web-pages
```
session_start();

if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index");
}
```

## Navigation Bar
The code below is used to indicate which page is currently opened
```
if ($currentPage == 'page_name') {echo "active";} else  {echo "noactive";}
```
This ***if*** statement is encoded in the ***class*** of the menu list
## Financial Management
Financial and Warehouse Management is mainly about Database Management

###  Sales
Users can create new Sale, and comfirm multiple existing Sales to Outbound. Checkbox is used to select multiple Sales and `$id[]` array stores *sale_id* of the selected items, afterwards they can be Confirmed with one click.
```
$N = count($id);
for($i=0; $i < $N; $i++){
	...
}
```
Inside ***for loop***  there is the code for inserting Data into database and Updating Stock quantity for selected product.

### Outbound
Users can view Outbound details where Sale IDs are shown for spesicific Outbound ID; and generate **pdf** file for **invoice**.

### Purchase
Same as **Sale**, users can create new Purchase, and comfirm multiple existing Purchases to Inbound. Checkbox is used to select multiple Purchases and `$id[]` array stores *purchasing_id* of the selected items, afterwards they can be Confirmed with one click.

### Inbound
Users can view Inboubd details where Purchasing IDs are shown for spesicific Inbound ID; and generate **pdf** file for **invoice**.

## PDF Generator
The source code for pdf generetor is borrowed from [here](https://github.com/HoldOffHunger/php-html-to-pdf).
</br>
The following functions are used to display the information retrived from Database:
```
addCompanyName()
addAdress()
addCompanyInfo()
Cell()
Ln()
addCostumerInfo()
addProductHeader()
addProductTotal()
addAccountInfo()
Output()
```
