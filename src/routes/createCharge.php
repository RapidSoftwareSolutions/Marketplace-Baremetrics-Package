<?php
$app->post('/api/Baremetrics/createCharge', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'chargeId', 'amount', 'currency', 'customerId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'].$post_data['args']['sourceId'] .'/charges';
    $post_data['args']['created'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['created']);
    $params = [
        'apiKey' => 'apiKey',
        'oid' => 'chargeId',
        'amount'=> 'amount',
        'currency'=> 'currency',
        'customer_oid'=> 'customerId',
        'created'=> 'created',
        'status'=> 'status'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'POST', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});