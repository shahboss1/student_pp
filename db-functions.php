<?php
/**
 * Created by PhpStorm.
 * User: SHABOSS
 * Date: 2/16/18
 * Time: 2:15 PM
 */

function conenct(){
    try {
//Instantiate a database object
        $dbh = new PDO(DB_DSN, DB_USERNAME,
            DB_PASSWORD);
        echo 'Still Connected to database!';
    } catch (PDOException $e) {
        echo $e->getMessage();
        return;
    }
}

function getStudents(){
    global $dbh;
//1. Define the query
    $sql = 'SELECT * FROM students ORDER BY LAST, FIRST';

//2. Prepare the statement
    $statement = $dbh->prepare($sql);

//3. Bind paramaters

//4. Execute the query
    $statement->execute();

//5. Get results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
    return $result;
}