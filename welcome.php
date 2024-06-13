<?php
session_start();

if ($_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page </title>
    <style>
    *{
        margin: 0;
        padding: 0;
    }
    
    body{
        width: 100%;
        height: 100%;
    }  
    .container{
        width: 100%;
        height: 100vh;
        background-color: #c9d6ff;
        background: linear-gradient(to right, #00C9FF, #92FE9D);
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        
    }
    button{
    background-color: #00C9FF;
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}
    </style>
</head>
<body>
    <div class="container">
    <h1>Hello everyone </h1>
    <pre>
        
This is just a demo welcome page for a login system using PHP. 

Thank you for visiting! 

Feel free to explore the features and functionality of the login system. If you encounter any issues or have any questions, don't hesitate to reach out to the support team. 

We hope you find this demo helpful and informative.

</pre>
<button><a style="text-decoration : none; color: white;" href="logout.php">Click Here</a> </button>
    </div>
    
</body>
</html>