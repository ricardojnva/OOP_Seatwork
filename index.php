<?php
require 'Person.php';
$person = new Person($conn);
 // JANEVA RICARDO //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Withdraw'])) {
        $Account_Name = $_POST['Account_Name'];
        $Balance = $_POST['Cash'];
        $response = $person->withdraw($Account_Name, $Balance);
        echo $response;
    } elseif (isset($_POST['Deposite'])) {
        $Account_Name = $_POST['Account_Name'];
        $Balance = $_POST['Cash'];
        $response = $person->deposite($Account_Name, $Balance);
        echo $response;
    } elseif (isset($_POST['action']) && $_POST['action'] === 'inquire') {
        
        $Account_Name = $_POST['Account_Name'];
        $userDetails = $person->getUserDetails($Account_Name); 
    }
}

mysqli_close($conn);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANKING SYSTEM</title>
</head>
<body>
<form action="" method="POST">
<h1>TRANSACTION</h1>
    <label for="Account_Name">Name:</label>
    <input type="text" id="Account_Name" name="Account_Name" required><br><br>

    <label for="Balance">Cash:</label>
    <input type="text" id="Balance" name="Cash" required><br><br>

    <input type="submit" name="Withdraw" value="Withdraw">
    <input type="submit" name="Deposite" value="Deposite">
    <input type="submit" name="Inquire" value="Inquire">
    <input type="hidden" name="action" value="inquire">
</form>

<?php if (isset($userDetails)) { ?>
    <h2>Display Current Balance</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Balance</th>
            <th>Account_Type</th>
        </tr>
        <tr>
            <td><?php echo $userDetails['account_ID']; ?></td>
            <td><?php echo $userDetails['account_name']; ?></td>
            <td><?php echo $userDetails['balance']; ?></td>
            <td><?php echo $userDetails['account_type']; ?></td>
        </tr>
    </table>
<?php } ?>
</body>
</html>