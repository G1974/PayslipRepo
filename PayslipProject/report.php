<?php
//Author: George Kostopoulos
//Created: 21-06-2025
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
</head>
<body id="bd">
<!-- Author: George kostopoulos - Date: 21-062025 -->
    <?php
        if(isset($_POST['username'], $_POST['password'])) {

            // Φτιάχνω μεταβλητές και βάζω τα στοιχεία της φόρμας
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        else {
            $username = "";
            $password = "";
        }
    ?>
     <div id="div2">
        <form id="fm" method="POST" action="basedb.php" >
            <fieldset id="fld1">
          <!--  <img id="pht1" src="ff.png"><br>-->
            <label for ="username">Username</label><br>
            <input type="text" name="username" value="<?php echo $username?>"required><br>
            <label for ="password">Password</label><br>
            <input type="password" name="password" value="<?php echo $password?>"required><br>
            <!--<input type="submit" name="submit" value="Υποβολή">-->
            <button type="submit" class="submit-btn">Είσοδος</button>
            </fieldset>
        </form>

    </div>

</body>
</html>

  