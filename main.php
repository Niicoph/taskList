<?php

session_start();
if(isset($_SESSION['username']) != "NicoP") {  // verifica si el usuario ha iniciado session. el isset() verifica si la variable SESSION esta iniciada.
    header("location:login.php");              // 'si la variable session es distinta de NicoP, entonces redirigi al login'
}
include("conection.php");

$objConection = new conection();                // inicia una instancia, conenctandose a la base de datos y recuperando la informacion. La almacena en $result                 
$result = $objConection->query("SELECT * FROM `table_tasks`");

if($_GET) {         // verifica si hay un metodo get(url). en caso de, recibe que y ejecuta la sentencia para eliminarlo.
    $id = $_GET['borrar'];
    $objConection = new conection(); 
    $sql = "DELETE FROM table_tasks WHERE `table_tasks`.`id` =" .$id;
    $objConection->execute($sql);
    header('location:main.php');
}

if($_POST) {  // verifica si hay un metodo post, en caso de, recibe la informacion y ejecuta la sentencia para agregarla a la tabla
    $inputTaskName = $_POST['taskName'];
    $inputTaskDescription = $_POST['taskDescription'];
    $objConection = new conection();
    $sql =  $sql="INSERT INTO `table_tasks` (`id`, `task_name`, `description`) VALUES (NULL, '$inputTaskName', '   $inputTaskDescription');";
    $objConection->execute($sql);
    header('location:main.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Personal Task List</title>
</head>
<body>

    <div class="container main-container">
        <h1>Personal Projects List</h1>
        <div class="child-container">
            <div class="form-container">
              <form action="main.php" method="post">
                 <label class="fs-4">Task Name:</label>
                 <br>
                 <input type="text" name="taskName" class="form-control">
                 <label class="fs-4">Task description:</label>
                 <br>
                 <textarea name="taskDescription" class="form-control"></textarea>
                 <br>
                 <input type="submit" value="Add task" class="btn btn-success">
              </form>
            </div>
            <div class="info-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach($result as $task) {  ?>  
                            <tr>
                                <td><?php echo $task['id']  ?></td>
                                <td><?php echo $task['task_name']  ?></td>
                                <td><?php echo $task['description']  ?></td>
                                <td> <a class="btn btn-danger" href="?borrar=<?php echo $task['id']; ?>">Delete</a> </td>
                            </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <br>
    <div class="container button-container">
       <a href="close.php"> <button class="btn btn-danger">Log out</button> </a>
    </div>
</body>
</html>