<?php

include_once "$dir/utils/debug/debug.php";

/* make the API call */
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get(
        '/{page-id}/feed',
        '{access-token}'
    );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
$graphNode = $response->getGraphNode();
/* handle the result */


debug($graphNode);
?>