<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <title>FTP AutoCommand</title>
</head>
<body>

    <!-- Input Form -->
    <form action="index.php" method="post">
        <!-- Type -->
        <select name="type" id="type">
            <option value="" disabled selected hidden>Type</option>
            <option value="ftp">ftp</option>
            <option value="sftp">sftp</option>
        </select><br>

        <!-- Command -->
        <select name="command" id="comm">
            <option value="" disabled selected hidden>Command</option>
            <option value="delete">Delete single file</option>
            <option value="get">Download single file</option>
            <option value="open">Open connection</option>           
            <option value="put">Receive single file</option>
        </select><br>

        <!-- Server -->
        <input typ="text" id="serv" name="server" placeholder="Server"><br>

        <!-- Port -->
        <input typ="text" id="port" name="port" placeholder="Port"><br>

        
        <!-- Username -->
        <input typ="text" id="uname" name="username" placeholder="Username"><br>

        <!-- Password
        <label for="password">Password:</label>
        <input typ="text" id="pword" name="password"><br>
        -->

        <!-- Local File -->
        <input typ="text" id="loc_file" name="localfile" placeholder="Local File"><br>

        <!-- Remote File -->
        <input typ="text" id="rem_file" name="remotefile" placeholder="Remote File"><br>
    <input type="submit" name="submit"><br><br>
    </form>

    <?php

        $final="Command will display here...";

        if (isset($_POST["command"]) && isset($_POST["type"])){
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
        } elseif (isset($_POST["submit"])){
            $final="Please select Type and Command dropdowns";
        }

        

        //echo $final;

    ?>

    <textarea readonly style="width:350px;"><?php echo $final;?></textarea>
    
</body>
</html>