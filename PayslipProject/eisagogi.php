<?php
//Author: George Kostopoulos
//Created: 21-06-2025
?>
<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filepath = "your path ....." . $file;

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        die("The file was not found.");
    }
}
?>
<!DOCTYPE html>
<!-- Author: George kostopoulos - Date: 21-06-2025 -->
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' type='text/css' media='screen' href='style1.css?v=1234'>
    <script src='main.js'></script>
    <style>
        #btn2{
         background-color: lightgreen ;
          border-radius: 15px;
        }
        #btn1:hover{
            background: radial-gradient(circle,rgb(45, 132, 207),rgb(213, 174, 17));
        }
    </style>
</head>
<body id="body2">
    <p id="peisagogi1">Information Retrieval System</p>
        <?php
        if(isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        else {
            $username = "";
            $password = "";
        }
    ?>
    <div id="div3">
        <form id="fmd" method="post" action="">
             <label for ="username">Username</label>
            <input id="in1"type="text" name="username" value="<?php echo $username?>"required>
            <label for ="password">Password</label>
            <input id="in2" type="password" name="password" value="<?php echo $password?>"required>
            <button type="submit" id="btn1">Search</button>
        </form>
    </div>
<table id="tbl1">
  <tr>
    <th>IDENTITY</th>
    <th>NAME</th>
    <th>SURNAME</th>
    <th>Email</th>
    <th>MOBILE</th>
    <th>MONTH</th>
    <th>BIRTHDATE</th>
    <th>YEAR</th>
  </tr>
    <?php 

        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        $servername = "localhost";
        $usernamedb = "root";
        $passworddb = "";
        $db = "your_data_base";
        
        $conn = mysqli_connect($servername, $usernamedb, $passworddb, $db);
            
        if (!$conn) { echo "Connection failed!"; exit; }

        $query = "SELECT * FROM -your_table- WHERE identity='$username' AND mobile='$password'";

        if ($result = mysqli_query($conn, $query)) {
            
             $row = mysqli_fetch_assoc($result);
             while ($row)
            {
            echo "<tr>";
            echo "<td>" . $row['identity'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['surname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['mobile'] . "</td>";
            echo "<td>" . $row['month'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            if ($row['path'] != "") {
                echo "<td>
                    <form method='get'>
                        <input type='hidden' name='file' value='" . $row['path'] . "'>
                         <button  type='submit' id='btn2'>Download</button>
                    </form>
                     </td>";
            } else {
                   echo "<td>There is no file</td>";
                }
            echo "</tr>";
                $row = mysqli_fetch_assoc($result);
            }
            mysqli_free_result($result);
        } else {
            echo "Failed.";
        }

        mysqli_close($conn);
    ?>
   <?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']); 
    $filepath = "your path...." . $file;

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo "<p style='color:red;'>The file was not found.</p>";
    }
}
?>
    </table>
</body>
</html>

