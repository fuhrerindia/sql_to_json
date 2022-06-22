# SQL TO JSON
A library for Yugal which input SQL query and returns data from MySQL DB/ MariaDB.
## Installation
- Run `yugal --install https://github.com/sinhapaurush/sql_to_json.git`
- Paste following code in `string.php` file.
  ```php
    //...
    $debug_mode = true; //'true' if in development mode, 'false' for relase mode.
    //...
  ```
 ## How to use
 ### dumo_sql
 ```dump_sql(mysqli_connection, sql_query)```
 Provide this function with mysqli_connection in first argument and sql query in second arguement.
 This will return response in JSON format. You can decode and modify response with `json_decode` function. It will provide you with error prompt in JSON if `$debug_mode` is `true` in `string.php`.
 
 ### debug_error
 ```debug_error(error_message);```
 This will return error message is `$debug_mode` is `true` in `string.php`, else will return "Error", in `string` data type.
