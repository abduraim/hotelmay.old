<?php

require_once 'controller.php';



function v_mark_title($mark) {
    $var = new C_marks();
    $title_mark = $var->get_mark_title($mark);
    echo $title_mark['title'];
}

function v_model_title($model) {
    $var = new C_marks();
    $title_model = $var->get_model_title($model);
    echo $title_model['title'];
}

function v_model_title_min($model) {
    $var = new C_marks();
    $title_model_min = $var->get_model_title_min($model);
    echo $title_model_min['model_name'];
}

function v_mark_title_rus($mark) {
    $var = new C_marks();
    $mark_title_rus = $var->get_mark_title_rus($mark);
    echo $mark_title_rus['title_rus'];
}

function v_mark_title_list_for_input() {
    $var = new C_marks();
    $marks_list = $var->get_marks_list();

    for ($i = 0; $i < count($marks_list); $i ++) {
        echo '<option>';
        echo $marks_list[$i]['title'];
        echo '</option>';
    }
}

function v_marks_logo_list() {

    $var = new C_marks();
    $marks = $var->get_marks_list();
    for ($i = 0; $i < count($marks); $i++) {
        echo '<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">';
        echo '<a href="?page=catalog&mark='.$marks[$i]['name'].'">';
        echo '<img src="img/catalog/logos/'.$marks[$i]['name'].'.jpg" class="img-responsive center-block div_catalog_list_logo_img">';
        echo '</a>';
        echo '</div>';
    }

}


function v_marks_title_list() {

    $var = new C_marks();
    $marks = $var->get_marks_list();
    $half = intval(count($marks)/2);
    $s_old = null;



    echo '<div class="col-md-6">';

        for ($i = 0; $i < $half; $i++) {
            $s = mb_substr($marks[$i]['title'], 0, 1);

            if ($s_old != $s) {
                echo '<div class="font_size_large">';
                echo $s;
                echo '</div>';
            }

            echo '<a href="?page=catalog&mark='.$marks[$i]['name'].'">';
            echo $marks[$i]['title'];
            echo '</a>';
            echo '<br>';

            if ( null !== mb_substr($marks[$i+1]['title'], 0, 1) && $s !=  mb_substr($marks[$i+1]['title'], 0, 1) ) {
                echo '<br>';
            }

            if ( $i+1 == $half && $s == mb_substr($marks[$i+1]['title'], 0, 1) ) {
                $half ++;
            }

            $s_old = $s;
        }

    echo '</div>';





    echo '<div class="col-md-6">';

        for ($i = $half; $i < count($marks); $i++) {
            $s = mb_substr($marks[$i]['title'], 0, 1);

            if ($s_old != $s) {
                echo '<div class="font_size_large">';
                echo $s;
                echo '</div>';
            }

            echo '<a href="?page=catalog&mark='.$marks[$i]['name'].'">';
            echo $marks[$i]['title'];
            echo '</a>';
            echo '<br>';

            if ( isset($marks[$i+1]['title']) ) {
                if ( null !== mb_substr($marks[$i+1]['title'], 0, 1) && $s !=  mb_substr($marks[$i+1]['title'], 0, 1) ) {
                    echo '<br>';
                }
            }



            $s_old = $s;
        }

    echo '</div>';

}



function v_marks_title_list_for_main() {
    $var = new C_marks();
    $marks = $var->get_marks_list();
    $pts_cols = intval(count($marks)/3);
    $index = 0;


    for ($x = 1; $x <= 3; $x ++) {
        echo '<div class="col-xs-4">';

        for ($i = 0; $i < $pts_cols; $i ++) {
            echo '<a href="?page=catalog&mark='.$marks[$index]['name'].'">';
            echo $marks[$index]['title'];
            echo '</a>';
            echo '<br>';
            $index ++;
        }

        if ($x == 3 && $index < count($marks)) {
            for ($i = $index; $i < count($marks); $i ++) {
                echo '<a href="?page=catalog&mark='.$marks[$i]['name'].'">';
                echo $marks[$i]['title'];
                echo '</a>';
                echo '<br>';
            }
        }

        echo '</div>';
    }

}



function v_models_title_list($mark)
{

    $var = new C_marks();
    $models = $var->get_models_list($mark);
    $unique = $var->get_models_unique_list($mark);


    for ($i = 0; $i < count($models); $i++) {

        $need = $models[$i]['model_name'];
        $result = false;
        foreach ($unique as $key => $val) {
            if ($val['model_name'] == $need) {
                $result = $val['count_m'];
                break;
            }
        }

        if ($result < 2) {
            $mod = $models[$i]['name'];
            echo "<a href='?page=catalog&mark=$mark&model=$mod' class='btn btn-default'>";
            echo $models[$i]['model_name'];
            echo '</a>';
        } else {
            echo "<div class='btn-group'>";
            echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
            echo $models[$i]['model_name'];
            echo " <span class='caret'></span>";
            echo "</button>";
            echo "<ul class='dropdown-menu'>";

            for ($n = 0; $n < $result; $n++) {
                $mod = $models[$i + $n]['name'];
                echo "<li><a href='?page=catalog&mark=$mark&model=$mod'>";
                echo $models[$i + $n]['title'];
                echo '</a></li>';
            }

            $i = $i + $result-1;

            echo "</ul>";
            echo "</div>";
        }

    }

}



function v_models_img_list($mark) {

    $var = new C_marks();
    $models = $var->get_models_list($mark);

    for ($i = 0; $i < count($models); $i++) {
        $mod = $models[$i]['name'];

        echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">';
        echo "<a href='?page=catalog&mark=$mark&model=$mod'>";
        echo '<div class="div_models_imgblock">';
        echo "<img src='img/catalog/models/$mark/$mod.jpg' class='img-responsive div_models_imgblock_img'>";
        echo '<div class="cent div_models_imgblock_img_caption">';
        echo $models[$i]['title'];
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';

    }

}



function v_mats_list_block() {

    $var = new C_mats();
    $mats = $var->get_mats_list();

    for ($i = 0; $i < count($mats); $i++) {

        echo "<div class='col-xs-6 col-sm-6 col-md-3'>";
        echo "<a href='?page=catalog&mark=".$_GET['mark']."&model=".$_GET['model']."&product=".$mats[$i]['name']."'>";
        echo "<div class='div_product_block'>";
        echo "<div class='caption_title_all_n2'>".$mats[$i]['title']."</div>";
        echo "<img src='img/mats/".$mats[$i]['name'].".jpg' alt='".$mats[$i]['title']."' class='img-responsive'>";
        echo '</div>';
        echo '</a>';
        echo '</div>';


    }

}


function v_mat_title($mat) {

    $var = new C_mats();
    $mat = $var->get_mat_title($mat);
    echo $mat['title'];

}


function v_materials_list_block($mark, $model) {

    $var = new C_mats();
    $materials = $var->get_materials_list();


    if ( file_exists('img/examples/'.$mark.'/'.$model.'.jpg') ) {
        echo "<div class='row'>";
        echo "<img src='img/examples/".$mark."/".$model.".jpg' name='example_img' class='img-responsive div_item_img_main'>";
        echo '</div>';

        echo '<div class="row">';

        echo "<div class='col-xs-4 col-sm-3 col-md-6 col-lg-4 div_item_img_min_block'>";
        echo "<a href=\"javascript:l_image ('img/examples/".$mark."/".$model.".jpg')\">";
        echo "<img src='img/examples/".$mark."/".$model.".jpg' class='img-responsive div_item_img_min'>";
        echo '</a>';
        echo '</div>';
    } else {
        echo "<div class='row'>";
        echo "<img src='img/materials/".$materials[0]['name'].".jpg' name='example_img' class='img-responsive div_item_img_main'>";
        echo '</div>';

        echo '<div class="row">';


    }




    for ($i = 0; $i < count($materials); $i++) {

        echo "<div class='col-xs-4 col-sm-3 col-md-6 col-lg-4 div_item_img_min_block'>";
        echo "<a href=\"javascript:l_image ('img/materials/".$materials[$i]['name'].".jpg')\">";
        echo "<img src='img/materials/".$materials[$i]['name'].".jpg' class='img-responsive div_item_img_min'>";
        echo '</a>';
        echo '</div>';

    }

    echo '</div>';

}



function v_materials_list() {
    $var = new C_mats();
    $materials = $var->get_materials_list();

    for ($i = 0; $i < count($materials); $i++) {
        echo'<option value="'.$materials[$i]['id'].'">'.$materials[$i]['title'].'</option>';
    }
}

function v_materials_property($prop) {
    $var = new C_mats();
    $materials = $var->get_materials_list();
    echo $materials[0][$prop];
}

function v_materials_count() {
    $var = new C_mats();
    $materials = $var->get_materials_list();
    echo count($materials);
}

function v_materials_array_json() {
    $var = new C_mats();
    $materials = $var->get_materials_list();
    $json = json_encode($materials);
    echo $json;
}

function v_material_cost($material_id) {
    $var = new C_mats();
    $material_cost = $var->get_material_cost($material_id);
    return $material_cost['cost'];
}


function v_edgings_list() {
    $var = new C_mats();
    $edgings = $var->get_edgings_list();

    for ($i = 0; $i < count($edgings); $i++) {
        echo'<option>'.$edgings[$i]['title'].'</option>';
    }
}

function v_logos_list() {
    $var = new C_mats();
    $logos = $var->get_logos_list();

    for ($i = 0; $i < count($logos); $i++) {
        echo'<option value="'.$logos[$i]['id'].'"">'.$logos[$i]['title'].'</option>';
    }
}

function v_logos_array_json() {
    $var = new C_mats();
    $logos = $var->get_logos_list();
    $json = json_encode($logos);
    echo $json;
}

function v_logo_cost($logo_id) {
    $var = new C_mats();
    $logo_cost = $var->get_logo_cost($logo_id);
    return $logo_cost['cost'];
}

function v_basket_badge($basket) {
    if (count($basket) > 0) {
        echo '<span class=\'badge\'>';
        echo count($basket);
        echo '</span>';
    }
}

function v_basket_table($basket) {

/*    echo '<pre>';
    print_r($basket);
    echo '</pre>';*/

    $var = new C_marks();
    $var_mat = new C_mats();

    $summary = 0;

    echo '<table width=\'100%\' border=\'1\'>';
    echo '<tr>';
    echo '<th>№</th>';
    echo '<th>Наименование</th>';
    echo '<th>Материал</th>';
    echo '<th>Окантовка</th>';
    echo '<th>Логотипы</th>';
    echo '<th>Стоимость</th>';
    echo '<th>Кол-во</th>';
    echo '<th>Сумма</th>';
    echo '</tr>';

    for ($i = 0; $i < count($basket); $i ++) {
        $n = $i+1;

        $mark = $var->get_mark_title($basket[$i]['mark']);
        $model = $var->get_model_title($basket[$i]['model']);
        $mat = $var_mat->get_mat_title($basket[$i]['product']);
        $material = $var_mat->get_material_title($basket[$i]['material']);
        $logo = $var_mat->get_logo_title($basket[$i]['logo']);

        echo '<tr>';
        echo '<td align=\'center\'>'.$n.'</td>';
        echo '<td>'.$mat['title'].' для '.$mark['title'].' '.$model['title'].'</td>';
        echo '<td>'.$material['title'].'</td>';
        echo '<td>'.$basket[$i]['edging'].'</td>';
        echo '<td>'.$logo['title'];
        if ($basket[$i]['logo_pts'] > 0) { echo ' (x'.$basket[$i]['logo_pts'].')'; }
        echo '</td>';
        echo '<td align=\'right\'>'.$basket[$i]['cost'].' руб.</td>';
        echo '<td align=\'center\'>'.$basket[$i]['pts'].'</td>';
        echo '<td align=\'right\'>'.$basket[$i]['cost']*$basket[$i]['pts'].' руб.</td>';
        echo '</tr>';

        $summary += $basket[$i]['cost']*$basket[$i]['pts'];

    }

    echo '<tr>';
    echo '<td colspan=\'7\'>Итого</td>';
    echo '<td align=\'right\'>'.$summary.' руб.</td>';
    echo '</tr>';
    echo '</table>';

}


function v_basket_table_xs($basket) {

    $var = new C_marks();
    $var_mat = new C_mats();

    $summary = 0;

    for ($i = 0; $i < count($basket); $i ++) {
        $n = $i+1;

        $mark = $var->get_mark_title($basket[$i]['mark']);
        $model = $var->get_model_title($basket[$i]['model']);
        $mat = $var_mat->get_mat_title($basket[$i]['product']);
        $material = $var_mat->get_material_title($basket[$i]['material']);
        $logo = $var_mat->get_logo_title($basket[$i]['logo']);

        echo '<div class="row div_basket_block_order_xs add_margin_bottom">';
        echo '<div class="col-xs-12">';
        echo $n.'. '.$mat['title'].' для '.$mark['title'].' '.$model['title'].', материал "'.$material['title'].'", цвет окантовки "'.$basket[$i]['edging'].'"';

        if ($basket[$i]['logo'] == 1) {
            echo '. '.$logo['title'].'.';
        } else {
            echo ' + '.$logo['title'].' (х'.$basket[$i]['logo_pts'].')';
        }

        echo '</div>';
        echo '<div class="col-xs-4"><strong>х'.$basket[$i]['pts'].'</strong></div>';
        echo '<div class="col-xs-8 right">Стоимость: '.$basket[$i]['cost']*$basket[$i]['pts'].' руб.</div>';
        echo '</div>';

        $summary += $basket[$i]['cost']*$basket[$i]['pts'];

    }

    echo '<div class="col-xs-12 right"><strong>ИТОГО: '.$summary.' руб.</strong></div>';

}

?>