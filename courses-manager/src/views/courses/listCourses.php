<?php
    include __DIR__ . '/../htmlStructure/htmlHead.php' ?>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1> <?= $title ?></h1>
        </div>

        <a href="/create-course" class="btn btn-primary mb-2">Adicionar curso</a>
        
        <ul class="list-group">
            <?php
                foreach($courses as $course): ?>
            <li class="list-group-item">
            <?= $course->getName(); ?>
            </li>
        
            <?php endforeach ?>
        </ul>
    </div>
</body>

<?php
    include __DIR__ . '/../htmlStructure/htmlCloseTags.php'  ?>
