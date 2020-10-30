<?php       

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;

class UpdateCourseController extends OutputHtmlController implements RequisitionControllerInterface{
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct(){
        $entityManagerFactory =  new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
    }

    public function processRequisition(): void{
        $id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /', true);
            return;
        }

        $course = $this->entityManager->getRepository(Course::class)->find($id);

        $path = 'createCourse.php';
        $data = [
            'course' => $course,
            'title' => 'Editar curso',
            'buttonText' => 'Editar'
        ];

        $this->renderHtml($path, $data);
    }
}