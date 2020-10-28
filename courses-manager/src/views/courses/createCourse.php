<?php
    include __DIR__ . '/../htmlStructure/htmlHead.php' 
?>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1> <?= $title ?></h1>
        </div>

        <form action="/save-course" method="POST">
            <div class="form-group">
                <label for="name">Nome do curso</label>
                <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control"/>
                
                
                <label for="description">Descrição</label>
                <input 
                type="text" 
                id="description" 
                name="description" 
                class="form-control"/>
            </div>
            <button class="btn btn-primary">Criar novo curso</button>
        </form>
    </div>
</body>
        
<?php
    include __DIR__ . '/../htmlStructure/htmlCloseTags.php' 
?>