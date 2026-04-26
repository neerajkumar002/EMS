<?php
include_once(__DIR__ . "/../config/Database.php");
include_once("./Employee/Employee.php");


function generateEmpId()
{
    return 'EM' . rand(1000, 9999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database();
    $employee = new Employee($db->conn);

    $empId = generateEmpId();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $position = $_POST["position"];
    $department = $_POST["department"];
    $salary = $_POST["salary"];
    $joining_date = $_POST["joining_date"];
    $status = $_POST["status"];


    $employee->addEmployee($empId, $name, $email, $phone, $address, $position, $department, $salary, $joining_date,  $status);


    header("Location:../admin/add_employee.php");
}





?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4>Add Employee</h4>
            </div>

            <div class="card-body">

                <form action="add_employee.php" method="POST">

                    <!--  Personal Info -->
                    <h5 class="mb-3">Personal Information</h5>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>

                    <hr>

                    <!--   Job Info -->
                    <h5 class="mb-3">Job Information</h5>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Position</label>
                            <input type="text" class="form-control" name="position">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Department</label>
                            <select class="form-control" name="department">
                                <option value="">Select Department</option>
                                <option>HR</option>
                                <option>IT</option>
                                <option>Sales</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Salary</label>
                            <input type="number" class="form-control" name="salary">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Joining Date</label>
                            <input type="date" class="form-control" name="joining_date">
                        </div>
                    </div>

                    <hr>

                    <!--   Status -->
                    <h5 class="mb-3">Status</h5>

                    <div class="mb-3">
                        <select class="form-control" name="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <button class="btn btn-dark">Save Employee</button>
                    <a href="./employee_list.php" class="btn btn-secondary">Back</a>

                </form>

            </div>
        </div>

    </div>

</body>

</html>