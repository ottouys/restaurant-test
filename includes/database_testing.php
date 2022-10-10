<?php 

/**
 * 
 * The below database/SQL crud statements is for illustrative purposes, and is untested.
 * 
 * DATABASE "restaurant_test" needs to exist on localhost
 *  > Basic creation details
 
  IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'restaurant_test')
  BEGIN
    CREATE DATABASE restaurant_test;
  END;
  GO
  
  USE restaurant_test;
  GO
  
 *
 */

// Estabilish DB Connection
function db_connection_setup()
{
  // Lets setup DB connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "restaurant_test";

  // Create connection
  $dbConnection = new mysqli($servername,$username, $password, $dbname);
  
  // Check connection
  if ($dbConnection->connect_error) {  
      die("Connection failed: "
          . $dbConnection->connect_error);
  } else{
    return $dbConnection;
  }
}

// Lets try create the table if not exists
function create_complaints()
{
  // Establish db connection
  $dbConnection = db_connection_setup();
  
  $query = "SELECT ID FROM COMPLAINTS";
  $result = mysqli_query($dbConnection, $query);
  
  if(empty($result)) {
      $query = "CREATE TABLE COMPLAINTS (
                ID int(11) AUTO_INCREMENT,
                EMAIL varchar(255) NOT NULL,                          
                FULL_NAME varchar(255) NOT NULL,                          
                COMPLAINT varchar(255) NOT NULL,                          
                PRIMARY KEY  (ID)
                )";
      $result = mysqli_query($dbConnection, $query);

      return "Table Created";
  } else{
    return "Table Exists";
  }
 
}

// Select all complaints from DB
function read_complaints()
{
  // Establish db connection
  $dbConnection = db_connection_setup();

  $query = "SELECT * FROM COMPLAINTS";
  $result = mysqli_query($dbConnection, $query);

  if(!empty($result)){
    return $result;
  } else{
    return "No complaints found.";
  }
}

// Insert new record into the DB
function insert_complaint()
{
   // Establish db connection
   $dbConnection = db_connection_setup();

   // Default data
   $emailAddr = 'ottouys@gmail.com';
   $fullName = 'Otto Uys';
   $complaint = 'Good job';

   $query = "INSERT INTO COMPLAINTS (EMAIL, FULL_NAME, COMPLAINT)
              VALUES ('$emailAddr', '$fullName', '$complaint');";

   $result = mysqli_query($dbConnection, $query);

   if(!empty($result)){
     return $result;
   } else{
     return "An error occured";
   }  
}