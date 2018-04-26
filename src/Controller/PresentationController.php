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
                'admin' => $admin
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
