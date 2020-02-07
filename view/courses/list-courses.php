<?php include __DIR__ . '/../inicio-html.php';
/** @var array $courses  **/
?>

    <a href="/novo-curso" class="btn btn-primary mb-2">New Course</a>

    <ul class="list-group">
        <?php foreach ($courses as $course): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $course->getDescricao(); ?>
                <span>
                 <a href="/alterar-curso?id=<?= $course->getId(); ?>" class="btn btn-outline-info btn-sm">Update</a>
                <a href="/excluir-curso?id=<?= $course->getId(); ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>

<?php include __DIR__ . '/../fim-html.php'; ?>
