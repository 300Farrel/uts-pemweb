<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Bus TransUPN | TransUPN </title>
    <meta charset="UTF-8">
    <meta name="description" contents="Niagahoster">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <header>
        <h1 class="title">TransUPN</h1>
        <h3 class="desc">Website Bus TransUPN</h3>
        <nav id="navigation">
            <ul>
                <li><a href="index.php?page=bus">Bus</a></li>
                <li><a href="index.php?page=driver">Driver</a></li>
                <li><a href="index.php?page=kondektur">Kondektur</a></li>
            </ul>
        </nav>
    </header>
    <div id="contents">
        <?php 
        if(isset($_GET['page'])){
            $page = $_GET['page'];
 
            switch ($page) {
                case 'bus':
                include "bus.php";
                break;
                case 'driver':
                include "driver.php";
                break;
                case 'kondektur':
                include "kondektur.php";
                break;          
            }
        }
else{
            include "bus.php";
        }
        ?>
 
    </div>
    <footer>
        &copy Copyright TransUPN 2023 | Website Bus TransUPN
    </footer>
</body>
</html>