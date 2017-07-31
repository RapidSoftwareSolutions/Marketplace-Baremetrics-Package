<?php
$app->post('/api/Baremetrics/updateSubscription', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'sourceId', 'subscriptionId', 'planId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] .$post_data['args']['sourceId']. '/subscriptions/'. $post_data['args']['subscriptionId'];
    $post_data['args']['occurredAt'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['occurredAt']);
    $params = [
        'apiKey' => 'apiKey',
        'occurred_at'=> 'occurredAt',
        'plan_oid'=> 'planId',
        'addons'=> 'addons',
        'quantity'=> 'quantity',
        'discount'=> 'discount'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'PUT', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});