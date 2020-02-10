<?php include __DIR__ . '/../inicio-html.php'; ?>
    <form action="/logar" method="post">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary">Log In</button>
    </form>
<?php include __DIR__ . '/../fim-html.php'; ?>