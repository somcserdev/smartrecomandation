<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Remote_model extends CI_Model {

    public function get_apps($cates) {
        $recommendation_list = array();
        try {
            $num = 4;
            if (count($cates) <= 1) {
                $num  = 20;
            }
            log_message('debug', 'category count is ' . count($cates));
            foreach ($cates as $categoryId) {
                log_message('debug', 'category : ' . $categoryId);
                $json = $this->get_category_data_list($categoryId, $num);
                log_message('debug', $json);
                $obj = json_decode($json);
                $recommendation_list = array_merge($recommendation_list, $obj->{'AppInfoList'});
            }
        } catch (Exception $ex) {
             log_message('error', $ex->getMessage());
        }

        $result['ResultCode'] = 1;
        $result['TotalCount'] = count($recommendation_list);
        $result['AppInfoList'] = $recommendation_list;
        return $result;
    }

    private function get_category_data_list($categoryId, $num = 4) {
        $query_map = array('appkey' => $this->config->item('app_key'),
            'categoryId' => $categoryId,
            'machineType' => 'LT26i',
            'method' => 'app.getCategoryDetailList',
            'returnNum' => $num,
            'startIndex' => '0');
        return $this->get_req_url($query_map);
    }

    private function get_req_url($query_map) {
        $server_url = $this->config->item('server_url');
        $this->load->library('http');
        $query_str = '';
        foreach ($query_map as $key => $value) {
            $query_str .= $key . '=' . $value . '&';
        }
        $query_str .= 'sig=' . signature($query_map);
        $server_url .= '?' . $query_str;
        return $this->http->get($server_url);
    }

}
