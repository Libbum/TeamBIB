<?php

function teambib_parse_headers($headers) {
    $header_list = array();
    foreach($headers as $key => $value) {
        $header = explode(':', $value, 2);
        if(isset($header[1])) {
            $header_list[trim($header[0])] = trim($header[1]);
        } else {
            $header_list[] = $value;
            if(preg_match("#HTTP/[0-9\.]+\s+([0-9]+)#", $value, $out))
                $header_list['reponse_code'] = intval($out[1]);
        }
    }
    return $header_list;
}

function teambib_get_collection() {
    $url = 'https://api.zotero.org/groups/';
    $url .= get_option('group-id');
    $url .= '/collections/';
    $url .= get_option('collection-id');
    $url .= '/items?';
    $arguments = array(
        'since'  => get_option('last-checked-version'),
        'format'  => 'json',
    );
    $url_parameters = array();
    foreach ($arguments as $key => $value){
        $url_parameters[] = $key.'='.$value;
    }
    $url = $url.implode('&', $url_parameters);

    $options = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Authorization: Bearer " . get_option('auth') . "\r\n" . //
                      "Zotero-API-Version: 3\r\n"
        )
    );

    $context = stream_context_create($options);

    $collection = file_get_contents($url, false, $context);

    $response = teambib_parse_headers($http_response_header);
    return array('latest_version' => $response['Last-Modified-Version'],
                 'url_debug' => $url,
                 'collection' => $collection);
}


?>
