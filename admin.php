<?php
// SQL query to get all products from the "products" table
$stmt = $pdo->prepare('SELECT p.* FROM products p ORDER BY p.id ASC');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Products', 'products')?>

<h2>Products</h2>

<div class="links">
    <a href="index.php?page=adminproducts">Create Product</a>
</div>

<div class="content-block">
    <div class="table">
        <table style="text-align:center;" >
            <thead>
                <tr>
                    <td class="responsive-hidden">#</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Description</td>
                    <td class="responsive-hidden">Image</td>
                    <td class="responsive-hidden">Created</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="8" style="text-align:center;">There are no products</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr class="details" onclick="location.href='index.php?page=adminproducts&id=<?=$product['id']?>'">
                    <td class="responsive-hidden"><?=$product['id']?></td>
                    <td><?=$product['name']?></td>
                    <td><?=number_format($product['price'], 2)?></td>
                    <td><?=$product['quantity']?></td>
                    <td><?=$product['desc']?></td>
                    <td class="responsive-hidden">
                        <?php foreach (explode(',',$product['img']) as $img): ?>
                        <?php if ($img): ?>
                        <img src="../wickedwires/imgs/<?=$img?>" width="64" height="64" alt="<?=$img?>">
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="responsive-hidden"><?=date('F j, Y', strtotime($product['date_added']))?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?=template_footer()?>
