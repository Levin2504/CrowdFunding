<?php
$con = mysqli_connect("localhost", "root", "root");
if (!$con) {
    die('Could not connect: ' . 'mysqli_error()');
}
mysqli_select_db($con, "crowdfunding");
session_start();

//$user_name = $_SESSION["user_name"];
//$keyword = $_GET['keyword'];

//if ($user_name == "" || 'keyword' == "") {
//    header("Location:error.php");
//    exit;
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Result</title>
</head>
<body style="background-color: #3c3f41;font-family: 'Microsoft YaHei UI Light',sans-serif">

<div class="container">
    <div class="container" style="width: 400px;margin: auto;">
        <div style="height: 50px;margin-top: 50px" align="center">
            <h4 style="color: #c5c5c5;line-height: 50px;margin: 0" align="center">Search Result</h4>
        </div>
    </div>
    <div style="width: 1000px;background-color: #c6c6c6;border-radius: 10px;margin: 100px auto auto;">
        <div class="container" style="width: 800px;margin: 50px auto auto">
            <?php
            echo "<br />";
            //            $keyword = $_GET["keyword"];
            $keyword = "hardware";
            if ($keyword == null) {
                $result = mysqli_query($con, "SELECT * FROM project  NATURAL JOIN own  NATURAL JOIN user");
            } else {
                $result = mysqli_query($con, "SELECT * FROM project  NATURAL JOIN own  NATURAL JOIN user WHERE description LIKE '%{$keyword}%' OR project.project_name LIKE '%{$keyword}%'");
            }
            echo "Welcome: " . $_SESSION['user_name'];
            echo "<br />";
            echo "<div><h4>
                            <tab>" . "Project Name" . "</tab>
                            <tab style='position: absolute;left: 500px;'>" . "Category" . "</tab>
                            <tab style='position: absolute;left: 700px;'>" . "" . "</tab>
                            <tab style='position: absolute;left: 900px;'>" . "Price" . "</tab>
                            <tab style='float: right'>" . "Product Status" . "</tab>
                            </h4></div>";
            echo "<br />";
            while ($row = mysqli_fetch_array($result)) {
                $project_id = $row['project_id'];
                echo "<div><a href='project.php?project_id=$project_id' " . "style='text-decoration: none;color: black'>
                            <tab>" . $row['pname'] . "</tab>
                            <tab style='position: absolute;left: 1000px'>" . $row['pprice'] . "</tab>
                            <tab style='position: absolute;left: 1000px'>" . $row['pprice'] . "</tab>
                            <tab style='position: absolute;left: 1000px'>" . $row['pprice'] . "</tab>
                            <tab style='float: right'>" . $row['pstatus'] . "</tab>
                            </a></div>";
                echo "<br />";
            }
            mysqli_close($con);
            ?>
        </div>
    </div>
</div>


</body>
</html>