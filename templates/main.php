<div class="container">
    <h2>Каталог</h2>
</div>

<pre><?= var_dump($position); ?></pre>

<ul>
    <?php foreach ($position as $position): ?>
        <li>
            <span><?= htmlspecialchars($position['']); ?></span>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

