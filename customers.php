<?php
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/customer.php');

    $customer = new Customer();
    //Get all Customers
    $customers = $customer->getCustomers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Customers</title>
</head>
<body>
    <div class="container mt-4">
        <div class="btn-group">
            <a href="customers.php" class="btn btn-primary">Customers</a>
            <a href="transaction.php" class="btn btn-secondary">Transaction</a>
        </div>
        <hr>
        <h2>Customers</h2>
        <table class="table table-striped "> 
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $c): ?>
                    <tr>
                        <td><?php echo $c->id ?></td>
                        <td><?php echo $c->first_name ?> <?php echo $c->last_name ?></td>
                        <td><?php echo $c->email ?></td>
                        <td><?php echo $c->created_at ?></td>                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="index.php">Pay page</a>
    </div>
</body>
</html>