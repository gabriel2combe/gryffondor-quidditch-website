<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\PresentationManager;


/**
 * Class TeamController
 *
 */
class PresentationController extends AbstractController
{

    /**
     * Display team listing
     *
     * @return string
     */
    public function index()
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $presentationManager = new PresentationManager();
        $presentationInfo = $presentationManager->selectAll();

        return $this->twig->render('Presentation/presentation.html.twig',
            [
                'presentationInfo' => $presentationInfo,
                'admin' => $admin,
                'thisSeason' => SEASON
            ]
        );
    }

    /**
     * Display team listing
     *
     * @return string
     */
    public function edit($id)
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $presentationManager = new PresentationManager();

        if (!empty($_POST)) {
            $id = $_POST['id'];
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
            ];

            $presentationManager->update($id, $data);

            //mofifier les photos
            $uploadDir = 'assets/images/presentation/';
            if(isset($_FILES['picture1'])){
                $uploadFile = $uploadDir . $_POST['id'] . "1.jpg";
                move_uploaded_file($_FILES['picture1']['tmp_name'], $uploadFile);
            }
            if(isset($_FILES['picture2'])){
                $uploadFile = $uploadDir . $_POST['id'] . "2.jpg";
                move_uploaded_file($_FILES['picture2']['tmp_name'], $uploadFile);
            }
            if(isset($_FILES['picture3'])){
                $uploadFile = $uploadDir . $_POST['id'] . "3.jpg";
                move_uploaded_file($_FILES['picture3']['tmp_name'], $uploadFile);
            }

            header('Location: /presentation');
        }
        $presentation = $presentationManager->selectOneById($id);

        return $this->twig->render(
            'Presentation/edit.html.twig',
            [
                'presentation' => $presentation,
                'admin' => $admin
            ]
        );


    }
}
