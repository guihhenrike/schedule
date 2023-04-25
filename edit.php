<?php
    include_once("templates/header.php");
    include_once("templates/footer.php");
?>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Editar Contato</h1>
        <form action="<?=$BASE_URL?>config/process.php" id="create-form" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact['id'] ?>">

            <div class="form-group">
                <label for="name">Nome do Contato</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $contact['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do Contato</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o nome" value="<?= $contact['phone'] ?>" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações</label>
                <textarea name="observations" class="form-control" id="observations" cols="30" rows="3" placeholder="Digite as Observações"><?= $contact['observations'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

<?php
    include_once("templates/footer.php");
?>
