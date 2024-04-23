<?php

// We defined the web service functions to install.
$functions = array(
    'local_apisimples_external' => array(
            'classname'   => 'local_apisimples_external',
            'methodname'  => 'hello_world',
            'classpath'   => 'local/apisimples/externallib.php',
            'description' => 'Return Hello World FIRSTNAME. Can change the text (Hello World) sending a new text as parameter',
            'type'        => 'read',
    )
);

// We define the services to install as pre-build services. A pre-build service is not editable by administrator.
$services = array(
    'apisimplesservice' => array(
            'functions' => array ('local_apisimples_external'),
            'restrictedusers' => 0,
            'enabled'=>1,
    )
);