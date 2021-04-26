<?php
// Default input product values
$product = [
    'name' => '',
    'desc' => '',
    'price' => 0,
    'quantity' => 1,
    'date_added' => date('Y-m-d\TH:i:s'),
];
// Get all the images from the "imgs" directory
$imgs = glob('../imgs/*.{jpg,png,gif,jpeg,webp}', GLOB_BRACE);

if (isset($_GET['id'])) {
    // ID param exists, edit an existing product
    $page = 'Edit';
    if (isset($_POST['submit'])) {
        // Update the product
        $stmt = $pdo->prepare('UPDATE products SET name = ? WHERE id = ?');
        $stmt->execute([ $_POST['name'], $_GET['id'] ]);
        header('Location: index.php?page=admin');
        exit;
    }
    if (isset($_POST['delete'])) {
        // Delete the product and its images, categories, options
        $stmt = $pdo->prepare('DELETE p.* FROM products p WHERE p.id = ?');
        $stmt->execute([ $_GET['id'] ]);
        header('Location: index.php?page=admin');
        exit;
    }
} else {
    // Create a new product
    $page = 'Create';
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare('INSERT INTO products (name,desc,price,quantity,date_added) VALUES (?,?,?,?,?)');
        $stmt->execute([ $_POST['name'], $_POST['desc'], $_POST['price'], $_POST['quantity'], date('Y-m-d H:i:s', strtotime($_POST['date'])) ]);
        $id = $pdo->lastInsertId();
        header('Location: index.php?page=admin');
        exit;
    }
}
?>
<?=template_header($page . ' Product', 'products')?>

<h2><?=$page?> Product</h2>

<div class="content-block">

    <form action="" method="post" class="form responsive-width-100">

<label for="name">Name</label>
<input id="name" type="text" name="name" placeholder="Name" value="<?=$product['name']?>" required>

<label for="desc">Description (HTML)</label>
<textarea id="desc" name="desc" placeholder="Product Description..."><?=$product['desc']?></textarea>

<label for="price">Price</label>
<input id="price" type="number" name="price" placeholder="Price" min="0" step=".01" value="<?=$product['price']?>" required>

<label for="quantity">Quantity</span></label>
<input id="quantity" type="number" name="quantity" placeholder="Quantity" min="-1" value="<?=$product['quantity']?>" title="-1 = unlimited" required>

<label for="date">Date Added</label>
<input id="date" type="datetime-local" name="date" placeholder="Date" value="<?=date('Y-m-d\TH:i:s', strtotime($product['date_added']))?>" required>


        <div class="submit-btns">
 
            <input type="submit" name="submit" value="Submit">
            <?php if ($page == 'Edit'): ?>
            <input type="submit" name="delete" value="Delete" class="delete">
            <?php endif; ?>
        </div>

    </form>

</div>

<?=template_footer()?>
