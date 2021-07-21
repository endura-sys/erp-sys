# Sake ERP-System Documentation

## Discription
ERS-System is designed for ...
This [bootstrap tamplete](https://zuramai.github.io/mazer/) was used to **design** the web-pages and **php** for the backend

## Database

`function OpenCon(){...}` Connects Server with the Database </br>
`function CloseCon(){...}` Closes Connection with the Database
> `mysqli_connect("localhost", "root", "root", "sakedb");` can also be used to connect

All the tables in the Database are listed in the order of importing (from top to bottom)
|Table Name|Key Attributes|Notes|
|----|----|--|
|Customer|||
|Position|||
|Supplier|||
|Wine_list|||
|Stock|||
|Employee|||
|Account|||
|Purchase|||
|Sales|||
|Inbound|||
|Outbound|||
|Purchase_item_list|||
|Sale_item_list|||
|Inbound_item_list|||
|Outbound_item_list|||

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
This *if* statement is encoded in the *class* of the menu list
## Financial Management

###  Sales 

### Outbound

### Purchase

### Inbound


## PDF Generator