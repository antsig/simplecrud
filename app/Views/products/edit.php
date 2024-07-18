<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="my-4">Edit Product</h1>
    <form action="/products/update/<?= $product['id'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= $product['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price (Rp)</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="food" <?= $product['category'] == 'food' ? 'selected' : '' ?>>Food</option>
                <option value="beverages" <?= $product['category'] == 'beverages' ? 'selected' : '' ?>>Beverages</option>
                <option value="electronics" <?= $product['category'] == 'electronics' ? 'selected' : '' ?>>Electronics</option>
                <option value="clothes" <?= $product['category'] == 'clothes' ? 'selected' : '' ?>>Clothes</option>
                <option value="equipment" <?= $product['category'] == 'equipment' ? 'selected' : '' ?>>Equipment</option>
            </select>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?= $product['stock'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="/products" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
