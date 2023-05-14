<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTP AutoCommand</title>
</head>
<body>

    <!-- Input Form -->
    <form action="index.php" method="post">
        <!-- Type -->
        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="ftp">ftp</option>
            <option value="sftp">sftp</option>
        </select><br>

        <!-- Command -->
        <label for="command">Command:</label>
        <select name="command" id="comm">
            <option value="delete">Delete single file</option>
            <option value="get">Download single file</option>
            <option value="open">Open connection</option>           
            <option value="put">Receive single file</option>
        </select><br>

        <!-- Server -->
        <label for="server">Server:</label>
        <input typ="text" id="serv" name="server"><br>

        <!-- Port -->
        <label for="port">Port:</label>
        <input typ="text" id="port" name="port"><br>

        
        <!-- Username -->
        <label for="username">Username:</label>
        <input typ="text" id="uname" name="username"><br>

        <!-- Password
        <label for="password">Password:</label>
        <input typ="text" id="pword" name="password"><br>
        -->

        <!-- Local File -->
        <label for="localfile">Local File:</label>
        <input typ="text" id="loc_file" name="localfile"><br>

        <!-- Remote File -->
        <label for="remotefile">Remote File:</label>
        <input typ="text" id="rem_file" name="remotefile"><br>
    <input type="submit"><br><br>
    </form>

    <?php

        $final="";
        $command=$_POST["command"];
        // echo $command;

        if ($command=="open"){
            if ($_POST["type"]=="ftp"){
                $final="ftp " . $_POST["server"] . " " . $_POST["port"];
            } elseif($_POST["type"]=="sftp"){
                $final="sftp -oPort=" . $_POST["port"] . " " . $_POST["username"] . "@" . $_POST["server"];
            }
        } elseif ($command=="get"){
            $final="get " . $_POST["localfile"] . " " . $_POST["remotefile"];
        } elseif ($command=="put"){
            $final="put " . $_POST["remotefile"] . " " . $_POST["localfile"];
        } elseif ($command=="delete"){
            $final="delete " . $_POST["remotefile"];
        }

        //echo $final;

    ?>

    <textarea readonly style="width:350px;"><?php echo $final;?></textarea>
    
</body>
</html>