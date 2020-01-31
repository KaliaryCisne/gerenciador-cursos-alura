<?php include __DIR__ . '/../inicio-html.php';
/** @var string $cursos  **/
/** @var string $curso  **/
?>

    <form action="/salvar-curso<?= isset($curso) ? '?id=' . $curso->getId() : ''; ?>" method="post">
        <div class="form-group">
            <label for="descricao">Descricao</label>
            <input type="text"
                   id="descricao"
                   name="descricao"
                   class="form-control"
                   value="<?= isset($curso) ? $curso->getDescricao() : '' ;?>">
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>