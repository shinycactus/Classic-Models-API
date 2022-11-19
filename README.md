# Classic Models API

Based on the sample database, with some changes taken from https://www.mysqltutorial.org/mysql-sample-database.aspx

## General ToDo:

Create a Status table to be used for order status'

Refactor status column orders table to use an ID from the status table above

Refactor OrderDetails to OrderItems

Refactor ProductLines to ProductCategory

Refactor various columns as see fit

Add user roles for Employee login

Remove order_line_number form order_details table

Remove users table

## Controllers/Routes/Policies ToDo:

All read/write/update routes and controller methods, covered by policies for each one where applicable
