<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M&M's Coffee - Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #fff7e6;
            font-family: 'Arial', sans-serif;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            max-height: 120px;
        }
        .header {
            text-align: center;
            margin-top: 140px;
        }
        .header h1 {
            color: #d19a66;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #d19a66;
            border-color: #d19a66;
        }
        .btn-primary:hover {
            background-color: #b57d4c;
            border-color: #b57d4c;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead {
            background-color: #d19a66;
            color: white;
        }
        .table-bordered {
            border: 2px solid #d19a66;
        }
        .product-img {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #d19a66;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #9e7b52;
        }
    </style>
</head>
<body>
    <img src="<?php echo e(asset('coffee-daily.png')); ?>" alt="Logo" class="logo">

    <div class="container mt-4">
        <div class="header">
            <h1>Our Coffee Products</h1>
            <p>Freshly brewed for you!</p>
        </div>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary mb-3">
            <i class="fa-solid fa-square-plus"></i>&nbsp;&nbsp;Add New Product
        </a>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($product->image_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="Product Image" class="product-img">
                                <?php else: ?>
                                    <span>No Image</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($product->prod_name); ?></td>
                            <td><?php echo e($product->amount); ?></td>
                            <td>₱<?php echo e(number_format($product->price, 2)); ?></td>
                            <td>
                                <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>&nbsp;&nbsp;View
                                </a>
                                <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>&nbsp;&nbsp;Edit
                                </a>
                                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fa-solid fa-square-minus"></i>&nbsp;&nbsp;Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 M&M's Coffee. Freshly Brewed with Love.</p>
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-midterm-ericka\resources\views/products/index.blade.php ENDPATH**/ ?>