<?php

/** Create a database with same name as new user, and gives him all privileges
* @link https://www.adminer.org/plugins/#use
* @author Benoclock
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
*/
class AdminerOclock {
    public function head() {
        echo script_src('js/oclock.js');
    }

    public function name() {
        return '<a href="https://www.oclock.io/" id="h1">Oclock Adminer</a>';
    }

    /* Not working public function headers() {
        if (!empty($_POST['user-create-database'])) {
            // Get username
            $username = filter_input(INPUT_POST, 'user');

            // Get connection
            $db = connection();

            // And create database with same name
            $results = $db->query(create_database($username, 'utf8_general_ci'));
            print_r($results);exit;
        }
    }*/
}