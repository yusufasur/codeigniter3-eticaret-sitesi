<?php

function active($menu)
{
    $ci = get_instance();
    if ($ci->uri->segment(2) == $menu) {
        echo 'active';
    }
}

function postvalue($name)
{
    $ci = get_instance();
    return $ci->input->post($name, true);
}

function imageupload($name, $path, $allowed_types)
{
    $ci = get_instance();

    $config['upload_path'] = 'assets/uploads/'.$path.'/';
    $config['allowed_types'] = $allowed_types;
    $ci->upload->initialize($config);

    if ($ci->upload->do_upload($name)) {
        $image = $ci->upload->data();
        return $config['upload_path'] . $image['file_name'];
    }

    /*echo $ci->upload->display_errors();
    die;*/
}

function flash($type, $icon, $title, $message=null)
{
    $ci = get_instance();
    $flashmessage = "<div class=\"alert alert-$type alert-dismissible\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                  <h5><i class=\"icon fas fa-$icon\"></i> $title</h5>
                  $message
              </div>";

    $ci->session->set_flashdata('flashmessage', $flashmessage);
}

function flashread()
{
    $ci = get_instance();
    echo $ci->session->flashdata('flashmessage');
}

function back()
{
    return redirect($_SERVER['HTTP_REFERER']);
}

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    } else {
        return false;
    }
}

function deletebutton($table, $id)
{
    $ci = get_instance();
    if ($ci->session->userdata('deletefunction')) {
        echo '<a href="' . base_url("admin/sil/$table/$id") . '" class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i> Sil</a>';
    }
}

function sef($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);

    return $text;
}