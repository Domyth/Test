<?php
require_once("db.php");
?>

<?php
$err = false;
if (count($_GET) > 0) {
    // vérification 
    $login = $_GET["login"];
    $pwd = $_GET["pwd"];

    $sql = "select * from user where Login = '" .$login. "' and Pwd = '" .$pwd. "'";
    echo $sql;

    $result = mysqli_query($conn, $sql);
    $myrow = $result->fetch_array();

    if ($myrow != null)
    {
        echo "<br/>vous etes bien connecté !!<br/><br/>";
        echo $myrow["ID"];
        echo "<br/><br/>";
    }
    else
    {
        $err = true;
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Connexion Little</title>
    <link href="css/header.css" rel="stylesheet">
    <link href="css/connect.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once("header.php");
    ?>
    <div class='connect'>
        <h1 style="text-align : center">Connexion</h1>
        <?php
            $messagePasOK = "<h4 style='text-align : center; color: red'>Identifiants incorrects</h4>"; 
            if ($err == true)
                echo $messagePasOK;
        ?>      
        <div class="clfo">
            <form action="connexion.php" method="GET">
                <div>Login : <input type="text" name="login" style="position:relative; left : 58px" /></div>
                <br />
                <div>Mot de passe : <input type="password" name="pwd" /></div>
                <br />
                <div><input type="submit" value="Connexion" style="position:relative; left : 80px" /></div>
            </form>
        </div>
    </div>
</body>

</html>