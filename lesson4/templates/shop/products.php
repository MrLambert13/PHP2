<h1>Товары в категории</h1>

<ul id="list">
  <?php foreach ($prods as $product): ?>
    <li>
      <a href="/shop/product.php?id=<?= $product['id'] ?>">
        <?= $product['name'] ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
<button id="loadmore">Загрузить ещё</button>
