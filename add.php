<?php 
    if(isset($_POST['submitSave']))
    {
        $employees = simplexml_load_file('data/employee.xml');
        $employee = $employees->addChild('employee');
        $employee->addAttribute('id', $_POST['id']);
        $employee->addChild('name', $_POST['name']);
        $employee->addChild('email', $_POST['email']);
        $employee->addChild('address', $_POST['address']);
        $employee->addChild('salary', $_POST['salary']);
        file_put_contents('data/employee.xml', $employees->asXML());
        header('location: index.php');
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Project XML</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> -->

</head>

<body>
    <div class="container">
        <form action="#" method="POST">
            <label >ID Employee:</label><br>
            <input type="number" class="form-control" id="id" name="id" ><br>
            <label >Name Employee:</label><br>
            <input type="text" class="form-control" id="name" name="name" ><br>
            <label >Email Employee:</label><br>
            <input type="email" class="form-control" id="email" name="email" ><br>
            <label >Address Employee:</label><br>
            <input type="text" class="form-control" id="address" name="address" ><br>
            <label >Salary Employee:</label><br>
            <input type="number" class="form-control" id="salary" name="salary" ><br><br>
            <input class="btn btn-primary" type="submit" name="submitSave" value="Add Employee">
        </form>
    </div>

</body>

</html>