<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #fff7e6;
            font-family: 'Arial', sans-serif;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            max-height: 120px;
        }

        .container {
            max-width: 700px;
            margin: 120px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            max-width: 100%;
            max-height: 400px;
            object-fit: contain;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 3px solid #d19a66;
        }

        h1 {
            color: #d19a66;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #6b4f30;
        }

        .btn {
            margin-top: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn-warning {
            background-color: #d19a66;
            border-color: #d19a66;
        }

        .btn-warning:hover {
            background-color: #b57d4c;
            border-color: #b57d4c;
        }

        .btn-danger {
            background-color: #c04938;
        }

        .btn-secondary {
            background-color: #9e7b52;
            border-color: #9e7b52;
        }

        .btn-secondary:hover {
            background-color: #7e6443;
        }
    </style>
</head>
<body>
    <img src="<?php echo e(asset('coffee-daily.png')); ?>" alt="Logo" class="logo">

    <div class="container">
        <h1><?php echo e($product->prod_name); ?></h1>

        <div class="text-center mb-4">
            <img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="Product Image" class="product-img">
        </div>

        <p><strong>Amount:</strong> <?php echo e($product->amount); ?></p>
        <p><strong>Price:</strong> ₱<?php echo e(number_format($product->price, 2)); ?></p>

        <div class="btn-group">
            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square"></i>&nbsp;&nbsp;Edit
            </a>

            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                    <i class="fa-solid fa-square-minus"></i>&nbsp;&nbsp;Delete
                </button>
            </form>

            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i>&nbsp;&nbsp;Back to List
            </a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-midterm-ericka\resources\views/products/show.blade.php ENDPATH**/ ?>