<?php

class local_apisimples_external extends external_api {

    public static function hello_world_parameters() {
        return new external_function_parameters(
            array(
                'a' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'courseid' => new external_value(PARAM_INT, 'id of course', VALUE_OPTIONAL),
                            'name' => new external_value(PARAM_TEXT, 'multilang compatible name, course unique'),
                            'description' => new external_value(PARAM_RAW, 'group description text', VALUE_DEFAULT, 'new course description'),
                        )
                    )
                )
            )
        );
    }
    
    public static function hello_world_returns() {
        return new external_value(PARAM_TEXT, 'The welcome message + user first name');
    }

    public static function hello_world($a) {
        global $USER;
    
        //Parameter validation
        //REQUIRED
        $params = self::validate_parameters(self::hello_world_parameters(), array('a' => $a));
    
        //Context validation
        //OPTIONAL but in most web service it should present
        $context = get_context_instance(CONTEXT_USER, $USER->id);
        self::validate_context($context);
    
        //Capability checking
        //OPTIONAL but in most web service it should present
        if (!has_capability('moodle/user:viewdetails', $context)) {
            throw new moodle_exception('cannotviewprofile');
        }
    
        return $params['welcomemessage'] . $USER->firstname ;
    }





}