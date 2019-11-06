<?php

require_once 'config/db.php';

class M_maininf extends Db {

    function return_maininf() {
        $sql = 'SELECT title, keywords, description, alt_logo, footer_cont FROM hotelmay';
        return $this->sql($sql);
    }

}

class M_marks extends Db {

    function return_mark_title($mark) {
        $sql = "SELECT title FROM marks WHERE name='$mark' LIMIT 1";
        return $this->sql($sql);
    }

    function return_mark_title_rus($mark) {
        $sql = "SELECT title_rus FROM marks WHERE name='$mark' LIMIT 1";
        return $this->sql($sql);
    }

    function return_mark_name($mark) {
        $sql = "SELECT name FROM marks WHERE title='$mark' LIMIT 1";
        return $this->sql($sql);
    }

    function return_model_title($model) {
        $sql = "SELECT title FROM models WHERE name='$model' LIMIT 1";
        return $this->sql($sql);
    }

    function return_model_title_min($model) {
        $sql = "SELECT model_name FROM models WHERE name='$model' LIMIT 1";
        return $this->sql($sql);
    }

    function return_marks_inf() {
        $sql = 'SELECT title, name FROM marks ORDER BY title ASC';
        return $this->sql($sql);
    }

    function  return_models_inf($mark) {
        $sql = "SELECT title, name, model_name FROM models WHERE mark_name = '$mark' ORDER BY model_name ASC";
        return $this->sql($sql);
    }

    function return_models_unique_list($mark) {
        $sql = "SELECT model_name, count(*) AS count_m FROM models WHERE mark_name = '$mark' GROUP BY model_name ORDER BY model_name ASC";
        return $this->sql($sql);
    }


}



class M_mats extends Db {

    function return_mats_inf() {
        $sql = 'SELECT title, name FROM mats WHERE visible = TRUE ORDER BY position ASC';
        return $this->sql($sql);
    }

    function return_mat_title($mat) {
        $sql = "SELECT title FROM mats WHERE name='$mat' LIMIT 1";
        return $this->sql($sql);
    }

    function return_materils_inf() {
        $sql = 'SELECT id, title, name, cost FROM materials WHERE visible = TRUE ORDER BY position ASC';
        return $this->sql($sql);
    }

    function return_material_title($material_id) {
        $sql = "SELECT title FROM materials WHERE id='$material_id' LIMIT 1";
        return $this->sql($sql);
    }

    function return_material_cost($material_id) {
        $sql = "SELECT cost FROM materials WHERE id='$material_id' LIMIT 1";
        return $this->sql($sql);
    }

    function return_edgings_inf() {
        $sql = 'SELECT title, name FROM edgings WHERE visible = TRUE ORDER BY position ASC';
        return $this->sql($sql);
    }

    function return_logos_inf() {
        $sql = 'SELECT id, title, name, cost FROM logos WHERE visible = TRUE ORDER BY position ASC';
        return $this->sql($sql);
    }

    function return_logo_title($logo_id) {
        $sql = "SELECT title FROM logos WHERE id='$logo_id' LIMIT 1";
        return $this->sql($sql);
    }

    function return_logo_cost($logo_id) {
        $sql = "SELECT cost FROM logos WHERE id='$logo_id' LIMIT 1";
        return $this->sql($sql);
    }

}



?>