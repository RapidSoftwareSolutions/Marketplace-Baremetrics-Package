<?php
$app->post('/api/Baremetrics/deleteAnnotation', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'annotationId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] . '/annotations/' . $post_data['args']['annotationId'];
    $params = [
        'apiKey' => 'apiKey',
        'responseCode' => '202'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'DELETE');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});