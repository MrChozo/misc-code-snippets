<?php
$serializedString = 'a:48:{s:14:"REDIRECT_HTTPS";s:2:"on";s:20:"REDIRECT_SSL_TLS_SNI";s:14:"www.macore.com";s:15:"REDIRECT_STATUS";s:3:"200";s:5:"HTTPS";s:2:"on";s:11:"SSL_TLS_SNI";s:14:"www.macore.com";s:9:"HTTP_HOST";s:14:"www.macore.com";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"551";s:14:"HTTP_SEC_CH_UA";s:66:""Not)A;Brand";v="99", "Microsoft Edge";v="127", "Chromium";v="127"";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:23:"HTTP_SEC_CH_UA_PLATFORM";s:9:""Windows"";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:21:"HTTP_SEC_CH_UA_MOBILE";s:2:"?0";s:15:"HTTP_USER_AGENT";s:125:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:11:"HTTP_ORIGIN";s:22:"https://www.macore.com";s:19:"HTTP_SEC_FETCH_SITE";s:11:"same-origin";s:19:"HTTP_SEC_FETCH_MODE";s:4:"cors";s:19:"HTTP_SEC_FETCH_DEST";s:5:"empty";s:12:"HTTP_REFERER";s:42:"https://www.macore.com/categories/checkout";s:20:"HTTP_ACCEPT_ENCODING";s:23:"gzip, deflate, br, zstd";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"en-US,en;q=0.9";s:11:"HTTP_COOKIE";s:183:"CAKEPHP=v45ce6vqoho0tf4flgd28q5ni0; _gid=GA1.2.1286453693.1723283070; large_order_notice=clicked; _ga_EJRT2Z3NZK=GS1.1.1723283070.2.1.1723283610.0.0.0; _ga=GA1.1.1096900248.1722466826";s:4:"PATH";s:60:"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin";s:16:"SERVER_SIGNATURE";s:60:"<address>Apache Server at www.macore.com Port 443</address> ";s:15:"SERVER_SOFTWARE";s:6:"Apache";s:11:"SERVER_NAME";s:14:"www.macore.com";s:11:"SERVER_ADDR";s:11:"172.16.20.5";s:11:"SERVER_PORT";s:3:"443";s:11:"REMOTE_ADDR";s:14:"72.199.212.154";s:13:"DOCUMENT_ROOT";s:31:"/var/www/macore.com/app/webroot";s:14:"REQUEST_SCHEME";s:5:"https";s:14:"CONTEXT_PREFIX";s:0:"";s:21:"CONTEXT_DOCUMENT_ROOT";s:31:"/var/www/macore.com/app/webroot";s:12:"SERVER_ADMIN";s:18:"[no address given]";s:15:"SCRIPT_FILENAME";s:41:"/var/www/macore.com/app/webroot/index.php";s:11:"REMOTE_PORT";s:5:"62397";s:12:"REDIRECT_URL";s:32:"/categories/ajax_review_checkout";s:21:"REDIRECT_QUERY_STRING";s:35:"url=categories/ajax_review_checkout";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:35:"url=categories/ajax_review_checkout";s:11:"REQUEST_URI";s:32:"/categories/ajax_review_checkout";s:11:"SCRIPT_NAME";s:10:"/index.php";s:8:"PHP_SELF";s:10:"/index.php";s:18:"REQUEST_TIME_FLOAT";d:1723283893.533;s:12:"REQUEST_TIME";i:1723283893;}';

print_r(unserialize($serializedString, ['allowed_classes' => TRUE]));




// Because I got a "Notice: unserialize(): Error at offset 1562 of 2599 bytes in ..." message
/*

$offset = 1562; // The offset mentioned in the error message

// Check if the offset is within the string length
if ($offset < strlen($serializedString)) {
    echo "Character at offset $offset: " . $serializedString[$offset] . PHP_EOL;
    echo "Context around offset $offset: " . substr($serializedString, max(0, $offset - 10), 20) . PHP_EOL;
} else {
    echo "Offset $offset is out of bounds for the given serialized string." . PHP_EOL;
}


*/