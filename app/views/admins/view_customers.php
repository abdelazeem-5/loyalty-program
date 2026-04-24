<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Customers</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-4">
    <h2 class="mb-4">All Customers</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th style="width: 120px;">Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($customers as $c): ?>
            <tr>
                <td><?= $c['customer_id'] ?></td>
                <td><?= htmlspecialchars($c['name']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>

                <td>
                    <a href="/loyalty-program/public/admins/delete_customer?id=<?= $c['customer_id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this customer?')">
                       Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/loyalty-program/public/admins/dashboard" class="btn btn-secondary mt-3">← Back</a>
</div>

</body>
</html>
