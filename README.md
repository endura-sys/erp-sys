# Sake ERP-System Documentation

## Discription
ERS-System is designed for ... 
This [bootstrap tamplete](https://zuramai.github.io/mazer/) was used to design the web-pages 

## Database

`function OpenCon(){...}` Connects Server with the Database
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
|Outbound_item)list|||

## User-Management
### Create User

### Update User

### Delete User

## Position Management

### Create Poistion

### Update Position


## Authorization

### Sign-Up

### Login

The code below keeps the user logged until they **log out**, even if the user changes between web-pages 
```
session_start();

if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index");
} 
 ```

## Navigation Bar

## Financial Management

###  Sales 

### Outbound

### Purchase

### Inbound


## PDF Generator