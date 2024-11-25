<?php
// Đọc dữ liệu từ file JSON hoặc khởi tạo mảng mặc định
$products = json_decode(file_get_contents('products.json'), true);

// Xử lý các hành động (thêm, sửa, xóa)
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'add') {
        // Thêm sản phẩm
        $newProduct = [
            "id" => count($products) > 0 ? end($products)['id'] + 1 : 1,
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "description" => $_POST['description'],
            "quantity" => $_POST['quantity']
        ];
        $products[] = $newProduct;
    } elseif ($_GET['action'] === 'edit') {
        // Sửa sản phẩm
        foreach ($products as &$product) {
            if ($product['id'] == $_POST['id']) {
                $product['name'] = $_POST['name'];
                $product['price'] = $_POST['price'];
                $product['description'] = $_POST['description'];
                $product['quantity'] = $_POST['quantity'];
                break;
            }
        }
    } elseif ($_GET['action'] === 'delete') {
        // Xóa sản phẩm
        foreach ($products as $key => $product) {
            if ($product['id'] == $_POST['id']) {
                unset($products[$key]);
                break;
            }
        }
    }

    // Lưu dữ liệu lại vào file JSON
    file_put_contents('products.json', json_encode($products));
    // Reload trang để tránh submit lại form
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Shopi</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="container mt-5">
    <h2 class="text-center">Product Management</h2>

    <!-- Danh sách sản phẩm -->
    <table class="table table-striped mt-4">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td>$<?= $product['price'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td>
                    <a href="#editProductModal" class="edit btn btn-warning btn-sm"
                       data-toggle="modal"
                       data-id="<?= $product['id'] ?>"
                       data-name="<?= $product['name'] ?>"
                       data-price="<?= $product['price'] ?>"
                       data-description="<?= $product['description'] ?>"
                       data-quantity="<?= $product['quantity'] ?>">
                        Edit
                    </a>
                    <a href="#deleteProductModal" class="delete btn btn-danger btn-sm"
                       data-toggle="modal"
                       data-id="<?= $product['id'] ?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Nút thêm sản phẩm -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Add Product</button>
</div>

<!-- Modal thêm sản phẩm -->
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="index.php?action=add">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                    <input type="number" name="price" class="form-control mt-2" placeholder="Price" step="0.01" required>
                    <textarea name="description" class="form-control mt-2" placeholder="Description" required></textarea>
                    <input type="number" name="quantity" class="form-control mt-2" placeholder="Quantity" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal sửa sản phẩm -->
<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="index.php?action=edit">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <input type="text" name="name" id="edit-name" class="form-control" required>
                    <input type="number" name="price" id="edit-price" class="form-control mt-2" step="0.01" required>
                    <textarea name="description" id="edit-description" class="form-control mt-2" required></textarea>
                    <input type="number" name="quantity" id="edit-quantity" class="form-control mt-2" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal xóa sản phẩm -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="index.php?action=delete">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="delete-id">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="bg-dark text-white mt-4 py-3">
    <div class="container text-center">
        <p>TLU Store</p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('.edit').on('click', function () {
        $('#edit-id').val($(this).data('id'));
        $('#edit-name').val($(this).data('name'));
        $('#edit-price').val($(this).data('price'));
        $('#edit-description').val($(this).data('description'));
        $('#edit-quantity').val($(this).data('quantity'));
    });

    $('.delete').on('click', function () {
        $('#delete-id').val($(this).data('id'));
    });
</script>
</body>
</html>

