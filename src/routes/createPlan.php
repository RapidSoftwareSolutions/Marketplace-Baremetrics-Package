<?php
$app->post('/api/Baremetrics/createPlan', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'sourceId', 'planId', 'name', 'currency', 'amount', 'interval', 'intervalCount']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] .$post_data['args']['sourceId']. '/plans';
    $params = [
        'apiKey' => 'apiKey',
        'oid'=> 'planId',
        'name'=> 'name',
        'currency'=> 'currency',
        'amount'=> 'amount',
        'interval'=> 'interval',
        'interval_count'=> 'intervalCount'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'POST', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});