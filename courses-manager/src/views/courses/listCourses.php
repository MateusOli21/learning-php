<?php
    include __DIR__ . '/../htmlStructure/htmlHead.php' ?>

    <div class="container">
        <div class="jumbotron">
            <h1> <?= $title ?></h1>
        </div>

        <a href="/create-course" class="btn btn-primary mb-2">Adicionar curso</a>
        
        <ul class="list-group">
            <?php
                foreach($courses as $course): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $course->getName(); ?>

                <div class="buttons">
                    <a href="/update-course?id=<?= $course->getId() ?>" 
                        class="btn btn-info btn-sm">
                        Editar
                    </a>
                    <a href="/delete-course?id=<?= $course->getId() ?>" 
                        class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </div>
            </li>
        
            <?php endforeach ?>
        </ul>
    </div>

<?php
    include __DIR__ . '/../htmlStructure/htmlCloseTags.php'  ?>
