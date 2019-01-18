<?php

$router->get('', 'TodoController@get');
$router->post('todos', 'TodoController@add');
$router->patch('todos/{id}', 'TodoController@update');
$router->get('todos/{id}/delete', 'TodoController@delete');
$router->post('todos/toggle-all', 'TodoController@toggle');
$router->post('todos/clear-completed', 'TodoController@clear');
$router->get('todos/filter-completed', 'TodoController@filterCompleted');
$router->get('todos/filter-not-completed', 'TodoController@filterNotCompleted');