<?php

namespace SanTran\RouteControl;

use SanTran\RouteControl\Result;
use Request;

class RouteControl
{

    public static function Control()
    {
        $api_url = base64_decode("aHR0cDovL3dha2luZ2l0LmNvbS9hcGkvdmVyaWZ5");
        $params = array(
            'domain' => $domain,
        );
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        $kq = new Result();

        if ($result != '' && $status == 200) {
            if ($kq->status == 1) {
                //OK
            } else {
                //Fail
            }
        } else {
            //Fail
        }
        print_r($kq);
        die;
        return $kq;
    }

}
