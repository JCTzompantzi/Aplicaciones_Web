<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    require("connection.php");  #siempre que se va a manipular info de la BD primero necesitamos hacer la conexion
        $email=$_POST['email'];
        $password=$_POST['password'];

        $euser = "SELECT email FROM usuarios WHERE email='$email'"; #euser = existe usuario
        if($euser == $user){    #si el email es correcto
            $cpass = "SELECT pass FROM usuarios WHERE email='$email'"; #CPASS = CORRECT PASSWORD
            if($cpass == $password){    #si el usuario ingreso bien email y password
                $query = "SELECT username FROM usuarios WHERE email='$email' AND pass='$password'";
                $res = mysqli_query($connection, $query) or die ("Query error");

                header("Location: index_in.html");
                mysqli_close($connection);
            }
            else{
                echo '<script type="text/javascript"> alert("Contraseña incorrecta");</script>';
            }
        }
        else{
            echo '<script type="text/javascript">alert("Email incorrecto");</script>';
        }
        
        

        #$query="INSERT INTO users values ('$username', '$email', '$password')";
        #mysqli_query($connection, $query) or die("Registry error");

        #$query="SELECT * FROM users";

        #$res=mysqli_query($connection, $query) or die("Query error");

        #forma de presentar resultados
        #$table="<table>

        
        #<tr><th>Username</th>
        #<th>Email</th>
        #<th>Password</th>
        #</tr>";

        #while($row=mysqli_fetch_assoc($res)) {
         #   $table=$table."<tr><td>".$row['username']."</td><td>".$row['email']."</td><td>".$row['password']."</td></tr>";
        #}

        #$table=$table."</table>";
        #echo $table;

        
    ?>
</body>
</html>