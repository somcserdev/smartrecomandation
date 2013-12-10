<?php
function signature($content_map) {
    $CI =& get_instance();
    $CI->load->config('security');
    $content = '';
    foreach ($content_map as $key => $value) {
        $content .= $key . $value;
    }
    $content .= 'security_key' . $CI->config->item('security_key');
    return sha1($content);
}