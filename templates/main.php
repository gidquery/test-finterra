<h2 class="text">Категории</h2>
<?php foreach ($categories as $value): ?>
    <ul class="list-group">
        <li class="list-group-item align-items-center">
            <a href="index.php?id=<?= $value['id']; ?>">
                <?= htmlspecialchars($value['category_name']); ?></a>
            <span class="badge badge-primary badge-pill"><?= $value['COUNT(position_name)']; ?></span>
            <?php
            if ($_GET && $position && ($_GET['id'] === $value['id'])) {
                foreach ($position as $value): ?>
                    <ol>
                        <div><b><?= htmlspecialchars($value['position_name']); ?></b></div>
                    </ol>
                <?php endforeach; ?>
            <?php }; ?>
        </li>
    </ul>
<?php endforeach; ?>

<!-- Пагинация -->
<div class="centr">
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
</div>