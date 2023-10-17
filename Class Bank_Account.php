<?php
require 'Person.php';
$person = new Person($conn);
$persons = $person->readPersons();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bank Display</title>
</head>
<body>
    <h1>Bank Account</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Balance</th>
            <th>Account_Type</th>
        </tr>
        <?php foreach ($persons as $person) { ?>
        <tr>
            <td><?php echo $person['account_ID']; ?></td>
            <td><?php echo $person['account_name']; ?></td>
            <td><?php echo $person['balance']; ?></td>
            <td><?php echo $person['account_type']; ?></td>
            
        </tr>
        <?php } ?>
    </table>
    </body>
</html>