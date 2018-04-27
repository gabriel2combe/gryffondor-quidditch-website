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
        ['edit', '/presentation/edit-{id}', 'GET'],
        ['edit', '/presentation/edit-{id}', 'POST'],

    ],
    'Player' => [ // Controller
        ['index', '/team', 'GET'], // action, url, method
        ['edit', '/team/edit-{id:\d+}', ['GET','POST']], // action, url, method
    ],
    'Game' => [ // Controller
        ['index2', '/calendar', 'GET'], // action, url, method
        ['add', '/calendar/add', ['GET','POST']], // action, url, method
        ['edit', '/calendar/edit-{id:\d+}', ['GET','POST']], // action, url, method

    ],
    'Contact' => [ // Controller
        ['index', '/contact', 'GET'], // action, url, method
        ['sendMail', '/contact', 'POST'], // action, url, method

        ['successful', '/successful', 'GET'], // action, url, method
        ['edit', '/contact/edit', ['GET', 'POST']], // action, url, method
    ],
    'Admin' => [ // Controller
        ['index', '/admin', 'GET'], // action, url, method
        ['login', '/admin', 'POST'], // action, url, method
        ['logout', '/logout', 'GET'], // action, url, method
    ],

];
