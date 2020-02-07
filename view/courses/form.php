<?php include __DIR__ . '/../inicio-html.php';
/** @var string $course  **/
?>

    <form action="/salvar-curso<?= isset($course) ? '?id=' . $course->getId() : ''; ?>" method="post">
        <div class="form-group">
            <label for="descricao">Description</label>
            <input type="text"
                   id="descricao"
                   name="descricao"
                   class="form-control"
                   value="<?= isset($course) ? $course->getDescricao() : '' ;?>">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>