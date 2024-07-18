<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="my-4">Product Management</h1>
    <div class="row mb-3">
        <div class="col">
            <a href="/products/create" class="btn btn-primary">Add Product</a>
        </div>
        <div class="col-auto">
            <form action="/products" method="get" class="form-inline">
                <input type="text" name="search" class="form-control mr-2" placeholder="Search" value="<?= $search ?? '' ?>">
                <select class="form-control mr-2" name="category">
                    <option value="">Select Category</option>
                    <option value="food" <?= $category == 'food' ? 'selected' : '' ?>>Food</option>
                    <option value="beverages" <?= $category == 'beverages' ? 'selected' : '' ?>>Beverages</option>
                    <option value="electronics" <?= $category == 'electronics' ? 'selected' : '' ?>>Electronics</option>
                    <option value="clothes" <?= $category == 'clothes' ? 'selected' : '' ?>>Clothes</option>
                    <option value="equipment" <?= $category == 'equipment' ? 'selected' : '' ?>>Equipment</option>
                </select>
                <input type="number" name="min_price" class="form-control mr-2" placeholder="Min Price" value="<?= $min_price ?? '' ?>">
                <input type="number" name="max_price" class="form-control mr-2" placeholder="Max Price" value="<?= $max_price ?? '' ?>">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="/products" class="btn btn-secondary ml-2">Clear Filters</a>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Added Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="7" class="text-center">No items found in the database.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td><?= date('d-M-Y', strtotime($product['date_added'])) ?></td>
                        <td>
                            <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/products/delete/<?= $product['id'] ?>" method="post" style="display: inline-block;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                const confirmed = confirm('Are you sure you want to delete this product?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
</body>
</html>
