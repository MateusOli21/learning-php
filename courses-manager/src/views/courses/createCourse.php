<?php
    include __DIR__ . '/../htmlStructure/htmlHead.php' 
?>

    <div class="container">
        <div class="jumbotron">
            <h1> <?= $title ?></h1>
        </div>

        <form action="<?= isset($course) ? "/persist-course-update?id=" . $course->getId() : '/persist-course' ?>" method="POST">
            <div class="form-group">
                <label for="name">Nome do curso</label>
                <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control"
                value="<?= isset($course) ? $course->getName() : '' ?>"/>
                
                
                <label for="description">Descrição</label>
                <input 
                type="text" 
                id="description" 
                name="description" 
                class="form-control"
                value="<?= isset($course) ? $course->getDescription() : '' ?>"/>
            </div>
            <button class="btn btn-primary"> <?= $buttonText ?></button>
        </form>
    </div>
        
<?php
    include __DIR__ . '/../htmlStructure/htmlCloseTags.php' 
?>