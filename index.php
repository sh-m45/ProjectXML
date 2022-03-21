<?php
session_start();
if (isset($_GET['action'])) {
    $employees = simplexml_load_file('data/employee.xml');
    $id = $_GET['id'];
    $index = 0;
    $i = 0;
    foreach ($employees as $employee) {
        if ($employee['id'] == $id) {
            $index = $i;
            break;
        }
        $i++;
    }
    unset($employees->employee[$index]);
    file_put_contents('data/employee.xml', $employees->asXML());
}



$employees = simplexml_load_file('data/employee.xml');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Project XML</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <style>
        tr th {
            text-align: center;
            /* padding: 10px; */
        }

        tr td {
            text-align: center;
        }
    </style>
</head>

<body>


    <table border="1" class="table container mt-4">
        <tr class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Salary</th>
            <th scope="col">Option</th>
        </tr>
        <?php foreach ($employees as $employee) { ?>
            <tr class="" style="background-color:#f2f1ed">
                <!-- id between [''] because it is attribute in employee tag-->
                <td><?php echo $employee['id']; ?></td>
                <td><?php echo $employee->name; ?></td>
                <td><?php echo $employee->email; ?></td>
                <td><?php echo $employee->address; ?></td>
                <td><?php echo $employee->salary; ?></td>
                <td> <a href="edit.php?id=<?php echo $employee['id']; ?>" class="btn btn-warning px-4">Edit</a> |
                    <a href="index.php?action=delete&id=<?php echo $employee['id'] ?>" class="btn btn-danger " onclick="return confirm ('Are you sure you want to ?')">Delete</a>
                </td>
            </tr>
        <?php } ?>


    </table>
    <div class="container d-flex justify-content-end">
        <a href="add.php" class="btn btn-primary"> Add Employee </a>
    </div>

    <h3 style="text-align: center"><?php echo 'Number Of Employees: ' . count($employees); ?></h3>

    <div class="searchDiv mb-4 container ">
        <form method="POST">
            <input id="searchInput " name="searchInput" class="form-control" placeholder="If you need to search for a certain item of data" value=""/>
            <div style="display: flex; justify-content: end;" class="mt-3">
                <button type="submit" class="btn btn-primary" id="search" name="search"> Search Item </button>
            </div>
            
        </form>

    </div>

    <?php


     if (isset($_POST["search"])) {
    
        foreach ($employees as $employee) {
            if (strcmp($employee->name, $_POST['searchInput']) == 0) {
                echo "<center>
                <tr>
                <td> $employee[id] </td>
                <td>  $employee->name </td>
                <td>  $employee->email</td>
                <td>  $employee->address </td>
                <td>  $employee->salary </td>
                </tr> 
                </center>";
            }
            
         }
         
    
     }

    ?>
    <div class="d-flex justify-content-center mt-3" >
        <form method="POST">
            <button class="btn btn-outline-secondary mx-4" type="submit" name="next" >&lt; NEXT</button>
            <button class="btn btn-outline-secondary " type="submit" name="prev" >PREV &gt;</button>
        </form>
        
    </div>
    


     <?php
        
        $numEmp = count($employees);
        
        $id = isset($_SESSION["id"]) ? $_SESSION["id"] : 0; 

        if(isset($_POST['next']) && $_SESSION["id"] <= $numEmp )
        {
           
           $_SESSION['id'] = ++$id ;
           foreach($employees as $employee)
           {
               if($employee['id'] == $_SESSION['id'])
               {
                echo "<center>
                <tr>
                <td> $employee[id] </td>
                <td>  $employee->name </td>
                <td>  $employee->email</td>
                <td>  $employee->address </td>
                <td>  $employee->salary </td>
                </tr> 
                </center>";
                
               }
           }
        }

        if(isset($_POST['prev']) && $_SESSION["id"] > 0)
        {
           $_SESSION['id'] = --$id ;
           foreach($employees as $employee)
           {
               if($employee['id'] == $_SESSION['id'])
               {
                echo "<center>
                <tr>
                <td> $employee[id] </td>
                <td>  $employee->name </td>
                <td>  $employee->email</td>
                <td>  $employee->address </td>
                <td>  $employee->salary </td>
                </tr> 
                </center>";
                
               }
           }
        }

    ?> 
</body>

</html>