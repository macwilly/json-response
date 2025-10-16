<?php
require_once __DIR__ . "/vendor/autoload.php";

use MTW\ResponseClass\JsonResponse;

$student = array(
    'name' => 'John Doe',
    'course' => 'Web Development',
    'level' => "200",
    'collections' => ['books' => 'Intro to Composer', 'music' => 'Classical']
);


new JsonResponse('exception', '', $student);