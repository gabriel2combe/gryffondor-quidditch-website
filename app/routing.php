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
    'Home' => [ // Controller
        ['index', '/', 'GET'],
    ],
    'Presentation' => [ // Controller
        ['index', '/presentation', 'GET'],

    ],
    'Player' => [ // Controller
        ['index', '/team', 'GET'], // action, url, method

    ],
    'Game' => [ // Controller
        ['index2', '/calendar', 'GET'], // action, url, method
        ['add', '/calendar/add', 'GET'], // action, url, method
    ],
    'Contact' => [ // Controller
        ['index', '/contact', 'GET'], // action, url, method
        ['sendMail', '/contact', 'POST'], // action, url, method
    ],
    'AdminLogin' => [ // Controller
        ['index', '/admin', 'GET'], // action, url, method
        ['login', '/admin', 'POST'], // action, url, method
    ],

];
