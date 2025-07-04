<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function only_admin() {
    if (get_instance()->session->userdata('level') != 'Admin') {
        show_error('Unauthorized access', 403);
    }
}

function only_petugas() {
    $level = get_instance()->session->userdata('level');
    if ($level !== 'Petugas' && $level !== 'Admin') {
        show_error('Unauthorized access', 403);
    }
}
