<?php
    include __DIR__ . '/../htmlStructure/htmlHead.php' 
?>

    <div class="container">
        <div class="jumbotron">
            <h1> <?= $title ?></h1>
        </div>

        <form action="/validate-create-account" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control"/>
                
                
                <label for="password">Senha</label>
                <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-control"/>
            </div>
            <button class="btn btn-primary"> <?= $buttonText ?></button>
        </form>
    </div>

<?php
    include __DIR__ . '/../htmlStructure/htmlCloseTags.php' 
?>