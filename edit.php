<?php
$employees = simplexml_load_file('data/employee.xml');
if (isset($_POST['submitSave'])) {
    
    foreach ($employees as $employee) {
        if ($employee['id'] == $_POST['id']) {
            $employee->name = $_POST['name'];
            $employee->email = $_POST['email'];
            $employee->address = $_POST['address'];
            $employee->salary = $_POST['salary'];
            break;
        }
    }
    file_put_contents('data/employee.xml', $employees->asXML());
    header('location: index.php');
}

foreach ($employees as $employee) {
    
    if ($employee['id'] == $_GET['id']) {
        $id = $employee['id'];
        $name = $employee->name;
        $email = $employee->email;
        $address = $employee->address;
        $salary = $employee->salary;
        break;
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Project XML</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    

</head>

<body>
    <div class="container">
        <form action="#" method="POST">
            <label>ID Employee:</label><br>
            <input type="number" class="form-control" id="id" name="id" value="<?php echo $id; ?>"><br>
            <label>Name Employee:</label><br>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"><br>
            <label>Email Employee:</label><br>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"><br>
            <label>Address Employee:</label><br>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>"><br>
            <label>Salary Employee:</label><br>
            <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $salary; ?>"><br><br>
            <input class="btn btn-warning" type="submit" name="submitSave" value="Update Employee">
        </form>
    </div>

</body>

</html>