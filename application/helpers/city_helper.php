<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('getCitiesByLang')) {
    function getCitiesByLang()
    {
        $ci =& get_instance();
        $ci->load->database();
        $table  = 'cities';
        $ci->db->select('id , '.getCurrentLang().'');
        $cities = $ci->db->get($table);
        $data = [];
        
        foreach ($cities->result() as $val) {
            array_push($data, $val);
        }
        return $data;
    }
}


if (!function_exists('getCurrentLang')) {
    function getCurrentLang()
    {
        $ci =& get_instance();
        $ci->load->database();
        $setting_table = 'app_setting';
        $default_lang  = 'english';
        $data = $ci->db->get($setting_table)->row();
        if (!empty($data->language)) {
            $language = $data->language;
        } else {
            $language = $default_lang;
        }
        
        return strtolower($language);
    }
}
