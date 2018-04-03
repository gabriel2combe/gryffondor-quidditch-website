<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Joueur;
use Model\JoueurManager;

/**
 * Class JoueurController
 *
 */
class JoueurController extends AbstractController
{

    /**
     * Display joueur listing
     *
     * @return string
     */
    public function index()
    {
        $joueurManager = new JoueurManager();
        $joueurs = $joueurManager->selectAll();

        return $this->twig->render('Joueur/index.html.twig', ['joueurs' => $joueurs]);
    }

    /**
     * Display joueur informations specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $joueurManager = new JoueurManager();
        $joueur = $joueurManager->selectOneById($id);

        return $this->twig->render('Joueur/show.html.twig', ['joueur' => $joueur]);
    }

    /**
     * Display joueur edition page specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit joueur with id $id
        return $this->twig->render('Joueur/edit.html.twig', ['joueur', $id]);
    }

    /**
     * Display joueur creation page
     *
     * @return string
     */
    public function add()
    {
        // TODO : add a new joueur
        return $this->twig->render('Joueur/add.html.twig');
    }

    /**
     * Display joueur delete page
     *
     * @param  int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the joueur with id $id
        return $this->twig->render('Joueur/index.html.twig');
    }
}
