<?php

if (!function_exists('requestClient')) {
    function requestClient($method, $path, $params = false)
    {
        $base_uri = env('API_URL', 'http://apis.ranbandokmaisod.com/api');
        $client = new GuzzleHttp\Client();

        if ($method == 'GET') {
            $params = $params ? http_build_query($params) : false;
            $res    = $client->request($method, $base_uri . '/' . $path . ($params ? '?' . $params : ''));
        } elseif ($method == 'POST') {
            $res = $client->request($method, $base_uri . '/' . $path, $params);
        } elseif ($method == 'PUT') {
            $res = $client->request($method, $base_uri . '/' . $path, $params);
        } else {
            return false;
        }

        $res = $res->getBody();
        $res = json_decode($res, true);

        return $res;
    }
}

if (!function_exists('alert')) {
    function alert($value, $die = false)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        if ($die) {
            die;
        }
    }
}

if (!function_exists('sdebug')) {
    function sdebug($value, $die = false)
    {
        if (isset($_GET['sdebug'])) {
            echo "<pre>";
            print_r($value);
            echo "</pre>";
            if ($die) {
                die;
            }

        }
    }
}

/**
 * Dump the given value and kill the script.
 *
 * @param  mixed  $value
 * @return void
 */
if (!function_exists('dump')) {
    function dump($value, $die = false)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        if ($die) {
            die;
        }

    }
}

/**
 * Print the given value and kill the script.
 *
 * @param  mixed  $value
 * @return void
 */
if (!function_exists('jsn')) {
    function jsn($value, $die = true)
    {
        // echo "<pre>";
        echo json_encode($value);
        //echo "</pre>";
        if ($die) {
            die;
        }

    }
}
