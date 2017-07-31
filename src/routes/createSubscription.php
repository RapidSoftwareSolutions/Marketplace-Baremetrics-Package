<?php
$app->post('/api/Baremetrics/createSubscription', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'sourceId', 'subscriptionId', 'startedAt', 'planId', 'customerId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] .$post_data['args']['sourceId']. '/subscriptions';
    $post_data['args']['startedAt'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['startedAt']);
    $post_data['args']['canceled_at'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['canceledAt']);
    $params = [
        'apiKey' => 'apiKey',
        'oid'=> 'subscriptionId',
        'started_at'=> 'startedAt',
        'canceled_at'=> 'canceledAt',
        'plan_oid'=> 'planId',
        'customer_oid'=> 'customerId',
        'addons'=> 'addons',
        'quantity'=> 'quantity',
        'discount'=> 'discount'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'POST', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});