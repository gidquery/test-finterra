<div class="container">
    <h2>Каталог</h2>
</div>

<pre><?= var_dump($position); ?></pre>

<ul>
    <?php foreach ($position as $value): ?>
        <li>
            <?= htmlspecialchars($value['position_name']); ?>
        </li>
    <?php endforeach; ?>
</ul>

