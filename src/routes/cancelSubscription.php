<?php
$app->post('/api/Baremetrics/cancelSubscription', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'sourceId', 'subscriptionId', 'canceledAt']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] .$post_data['args']['sourceId']. '/subscriptions/'. $post_data['args']['subscriptionId'].'/cancel';
    $post_data['args']['canceledAt'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['canceledAt']);
    $params = [
        'apiKey' => 'apiKey',
        'canceled_at' => 'canceledAt'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'PUT', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});