<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>
    <?php
  
    
 
        if(isset($_COOKIE['login']))
        {
            echo "vous êtes déja connecté";
        }
        else
        {
            ?>
            <form action="./index.php?action=connectionRequest" method="post">
            <input type="text" name="login" id="login"> login
            <input type="password" name="password" id="password"> password
            <input type="submit"> 
            </form>
            <?php
        }
    

    ?>
</body>
</html>