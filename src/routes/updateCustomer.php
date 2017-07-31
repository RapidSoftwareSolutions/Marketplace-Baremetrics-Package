<?php
$app->post('/api/Baremetrics/updateCustomer', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'sourceId', 'customerId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] . $post_data['args']['sourceId'] . '/customers/' . $post_data['args']['customerId'];
    $post_data['args']['created'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['created']);
    $params = [
        'apiKey' => 'apiKey',
        'name' => 'name',
        'notes' => 'notes',
        'email' => 'email',
        'created' => 'created'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'PUT', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});