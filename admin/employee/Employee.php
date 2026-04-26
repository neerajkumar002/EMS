<?php

class Employee
{

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    //methods
    //add employee
    public function addEmployee($empId, $name, $email, $phone, $address, $position, $department, $salary, $joining_date,  $status)
    {

        $query = "INSERT INTO employees (emp_id, name, email, phone, address, position, department, salary, joining_date, status) VALUES ('$empId', '$name', '$email', '$phone', '$address', '$position', '$department', '$salary', '$joining_date', '$status');";

        return $this->conn->query($query);
    }

    //delete employe
    public function deleteEmployee() {}

    //edit employee 
    public function editEmployee() {}

    //


}
