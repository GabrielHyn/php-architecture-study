<html>

<head>
    <link href="/css/app.css" rel="stylesheet">

    <title>Stock Controller</title>
</head>

<body>
    <div class="container">
        <h1>Products Listing</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Description</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= $p->name ?></td>
                        <td><?= $p->value ?></td>
                        <td><?= $p->description ?></td>
                        <td><?= $p->quantity ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>