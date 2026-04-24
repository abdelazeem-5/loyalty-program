<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Merchants</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-4">
    <h2 class="mb-4">All Merchants</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th style="width:120px;">Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($merchants as $m): ?>
            <tr>
                <td><?= $m['merchant_id'] ?></td>
                <td><?= htmlspecialchars($m['name']) ?></td>
                <td><?= htmlspecialchars($m['email']) ?></td>

                <td>
                    <a href="/loyalty-program/public/admins/delete_merchant?id=<?= $m['merchant_id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this merchant?')">
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
