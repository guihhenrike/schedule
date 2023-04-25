<?php
    include_once("templates/header.php");
    include_once("templates/footer.php");
?>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Adicionar Contato</h1>
        <form action="<?=$BASE_URL?>config/process.php" id="create-form" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome do Contato</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do Contato</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações</label>
                <textarea name="observations" class="form-control" id="observations" cols="30" rows="3" placeholder="Digite as Observações"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Contato</button>
        </form>
    </div>

<?php
    include_once("templates/footer.php");
?>
