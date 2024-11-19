<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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

        h1 {
            color: #d19a66;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            font-weight: bold;
            color: #6b4f30;
        }

        input, .form-control {
            border: 1px solid #d19a66;
            border-radius: 5px;
        }

        input:focus, .form-control:focus {
            border-color: #b57d4c;
            box-shadow: none;
        }

        .img-preview {
            max-width: 200px;
            max-height: 200px;
            object-fit: contain;
            margin-bottom: 15px;
            border: 3px solid #d19a66;
            border-radius: 8px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #d19a66;
            border-color: #d19a66;
        }

        .btn-primary:hover {
            background-color: #b57d4c;
            border-color: #b57d4c;
        }

        .btn-secondary {
            background-color: #9e7b52;
            border-color: #9e7b52;
        }

        .btn-secondary:hover {
            background-color: #7e6443;
            border-color: #7e6443;
        }
    </style>
</head>
<body>
    <img src="<?php echo e(asset('coffee-daily.png')); ?>" alt="Logo" class="logo">

    <div class="container">
        <h1>Edit Product <i class="fas fa-edit"></i></h1>

        <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="form-group">
                <label for="prod_name"><i class="fas fa-tag"></i> Product Name</label>
                <input type="text" name="prod_name" class="form-control" value="<?php echo e(htmlspecialchars($product->prod_name)); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="amount"><i class="fas fa-cubes"></i> Amount</label>
                <input type="number" name="amount" class="form-control" value="<?php echo e(htmlspecialchars($product->amount)); ?>" required min="1">
            </div>
            
            <div class="form-group">
                <label for="price"><i class="fas fa-money-bill-wave"></i> Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo e(htmlspecialchars($product->price)); ?>" required min="1">
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Product Image</label>
                <div>
                    <?php if($product->image_path): ?>
                        <img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="Current Product Image" class="img-preview" id="imagePreview">
                    <?php else: ?>
                        <span>No Image Available</span>
                    <?php endif; ?>
                </div>
                <input type="file" name="image" class="form-control" id="imageInput">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Update Product</button>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary"><i class="fas fa-times-circle"></i> Cancel</a>
            </div>
        </form>
    </div>

    <script>
        // Preview selected image before uploading
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-midterm-ericka\resources\views/products/edit.blade.php ENDPATH**/ ?>