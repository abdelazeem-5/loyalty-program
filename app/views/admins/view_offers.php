<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Offers</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">

    <h2 class="mb-4">All Offers</h2>

    <?php if (empty($offers)): ?>
        <div class="alert alert-warning">No offers available.</div>
    <?php else: ?>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Offer ID</th>
                    <th>Merchant ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Created At</th>
                    <th style="width:120px;">Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?= $offer['offer_id'] ?></td>
                    <td><?= $offer['merchant_id'] ?></td>
                    <td><?= htmlspecialchars($offer['title']) ?></td>
                    <td><?= nl2br(htmlspecialchars($offer['description'])) ?></td>
                    <td><?= htmlspecialchars($offer['discount_value']) ?></td>
                    <td><?= $offer['created_at'] ?></td>

                    <td>
                        <a href="/loyalty-program/public/admins/delete-offer?id=<?= $offer['offer_id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this offer?');">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

    <a href="/loyalty-program/public/admins/dashboard" class="btn btn-secondary mt-3">← Back</a>

</div>

</body>
</html>