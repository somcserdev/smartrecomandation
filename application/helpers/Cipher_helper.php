<?php
function signature($content_map, $security_) {
    $this->load->config('services/smart_recommend');
    $content = '';
    foreach ($content_map as $key => $value) {
        $content .= $key . $value;
    }
    return sha1($content);
}