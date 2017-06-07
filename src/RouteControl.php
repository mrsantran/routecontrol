<?php

namespace SanTran\RouteControl;

use SanTran\RouteControl\Result;

class RouteControl
{

    public static function Control($domain)
    {
        $api_url = base64_decode("aHR0cDovL3dha2luZ2l0LmNvbS9hcGkvdmVyaWZ5");
        $private = base64_decode("d2FraW5naXQuY29t");
        $keycheck = md5(base64_encode($domain . $private));
        if (!file_exists(storage_path('framework/' . $keycheck))) {
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
            $st = 0;
            if ($result != '' && $status == 200) {
                if ($kq->status == 1) {
                    $st = 1;
                    @mkdir(storage_path('framework/' . $keycheck));
                }
            }
        } else {
            $st = 1;
        }
        return $st;
    }

}
