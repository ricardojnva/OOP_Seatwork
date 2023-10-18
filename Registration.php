<?php
    require 'Person.php';

    $person = new Person($conn);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['Register'])) {
            // JANEVA RICARDO //
            $Account_Name = $_POST['Account_Name'];
            $Balance = $_POST['Balance'];
            $Account_Type = $_POST['Account_Type'];
            $person->createPerson($Account_Name , $Balance , $Account_Type);
        } 
    }

    mysqli_close($conn);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS REGISTRATION</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Create Bank Account</h1>
    <form method="post" action="registration.php">
        <label for="Account_Name">Account Name:</label>
        <input type="text" id="Account_Name" name="Account_Name" required><br>

        <label for="Balance">Initial Balance:</label>
        <input type="number" id="Balance" name="Balance" step="0.01" required><br>

        <label for="Account_Type">Account Type:</label>
        <input type="text" id="Account_Type"  name="Account_Type" required><br>
        
        <input type="submit"  name="Register" value="Register">

    </form>
</body>
</html>