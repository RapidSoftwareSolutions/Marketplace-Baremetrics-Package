<?php
$app->post('/api/Baremetrics/createAnnotation', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'metric', 'date', 'global', 'userId', 'annotation']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url']. '/annotations';
    $post_data['args']['date'] = explode(' ',$post_data['args']['date'])[0];
    $params = [
        'apiKey' => 'apiKey',
        'metric'=> 'metric',
        'annotation'=> 'annotation',
        'date'=> 'date',
        'global'=> 'global',
        'user_id'=> 'userId'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'POST', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});