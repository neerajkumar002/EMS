 <?php
    include_once(__DIR__ . "/../config/Database.php");
    include_once("./Employee/Employee.php");

    $db = new Database();
    $employee = new Employee($db->conn);

    $result =  $employee->getEmloyeesList();



    ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <title>Employee List</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>

 <body class="bg-light">

     <div class="container mt-5">

         <!--  Header -->
         <div class="d-flex justify-content-between align-items-center mb-4">
             <div>
                 <h3 class="mb-0">Employee Management</h3>
                 <small class="text-muted">Manage all employees</small>
             </div>
             <a href="add_employee.php" class="btn btn-dark">+ Add Employee</a>
         </div>

         <!--  Card -->
         <div class="card shadow-sm border-0">
             <div class="card-body">

                 <!--  Table -->
                 <div class="table-responsive">
                     <table class="table align-middle table-hover">
                         <thead class="table-dark">
                             <tr>
                                 <th>Emp ID</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Department</th>
                                 <th>Position</th>
                                 <th>Salary</th>
                                 <th>Status</th>
                                 <th class="text-center">Action</th>
                             </tr>
                         </thead>

                         <tbody>

                             <!-- row start -->

                             <?php if ($result->num_rows > 0): ?>
                                 <?php while ($row = $result->fetch_assoc()): ?>
                                     <tr>
                                         <td><?= $row['emp_id'] ?></td>
                                         <td><?= $row['name'] ?></td>
                                         <td><?= $row['email'] ?></td>
                                         <td><?= $row['phone'] ?></td>
                                         <td><?= $row['department'] ?></td>
                                         <td><?= $row['position'] ?></td>
                                         <td><?= $row['salary'] ?></td>
                                         <td>
                                             <span class="badge bg-success"><?= $row['status'] ?></span>
                                         </td>
                                         <td class="text-center">
                                             <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                             <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                                         </td>
                                     </tr>

                                 <?php endwhile; ?>
                             <?php endif; ?>

                             <!-- row end -->



                             <tr>
                                 <td>EM002</td>
                                 <td>Amit Verma</td>
                                 <td>amit@gmail.com</td>
                                 <td>9123456780</td>
                                 <td>IT</td>
                                 <td>Developer</td>
                                 <td>₹40,000</td>
                                 <td>
                                     <span class="badge bg-secondary">Inactive</span>
                                 </td>
                                 <td class="text-center">
                                     <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                     <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                                 </td>
                             </tr>

                         </tbody>

                     </table>
                 </div>

             </div>
         </div>

     </div>

 </body>

 </html>