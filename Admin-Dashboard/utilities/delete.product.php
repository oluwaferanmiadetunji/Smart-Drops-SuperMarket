<?php

include_once("config.php");
if (!isset($_GET['id']))
{
    echo "<script type='text/javascript'>
    alert('Delete Failed!');
    window.location= '../home.php';
    </script>";
    exit();
}

if ($conn->connect_error)
{
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

$sql = "DELETE FROM products WHERE product_id = ?";
if (!$result = $conn->prepare($sql))
{
    die('Query failed: (' . $conn->errno . ') ' . $conn->error);
}

if (!$result->bind_param('i', $_GET['id']))
{
    die('Binding parameters failed: (' . $result->errno . ') ' . $result->error);
}

if (!$result->execute())
{
    die('Execute failed: (' . $result->errno . ') ' . $result->error);
}

if ($result->affected_rows > 0)
{
    echo "<script type='text/javascript'>
    alert('Successfully deleted!');
    window.location= '../products.php';
    </script>";
    exit();
}
else
{
    echo "<script type='text/javascript'>
    alert('Delete Failed!');
    window.location= '../products.php';
    </script>";
    exit();
}
$result->close();
$conn->close();
