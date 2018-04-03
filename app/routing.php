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
    'Player' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['add', '/player/add', 'GET'], // action, url, method
        ['edit', '/player/edit/{id:\d+}', 'GET'], // action, url, method
        ['show', '/player/{id:\d+}', 'GET'], // action, url, method
    ],
];
