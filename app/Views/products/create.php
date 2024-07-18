<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="my-4">Add Product</h1>
    <form action="/products/store" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price (Rp)</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="food">Food</option>
                <option value="beverages">Beverages</option>
                <option value="electronics">Electronics</option>
                <option value="clothes">Clothes</option>
                <option value="equipment">Equipment</option>
            </select>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="/products" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
