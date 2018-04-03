<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Joueur' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['add', '/joueur/add', 'GET'], // action, url, method
        ['edit', '/joueur/edit/{id:\d+}', 'GET'], // action, url, method
        ['show', '/joueur/{id:\d+}', 'GET'], // action, url, method
    ],
];
