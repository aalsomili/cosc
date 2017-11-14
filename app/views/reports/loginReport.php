<?php require_once '../app/views/templates/header.php' ?>

<h1> Login Reports! </h1>



 <div class='container'>
    <h2>Logs Activity</h2>

    <table class='table table-striped table-condensed'>
                <tr>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Login</th>
                    <th>Address</th>
                    <th>Success</th>
                </tr>

    <?php foreach ($data['logs'] as $log){?>
        <tr>
            <td><?=$log['date_time']?></td>
            <td><?=$log['username']?></td>
            <td><?=$log['isLogin']?></td>
            <td><?=$log['address']?></td>
            <td><?=$log['isSuccess']?></td>
        </tr>
    <?php } ?>
    </table>
</div>



	
<?php require_once '../app/views/templates/footer.php' ?>