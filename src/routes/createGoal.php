<?php
$app->post('/api/Baremetrics/createGoal', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'metric', 'startAmount', 'endAmount', 'startDate', 'endDate', 'name']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url']. '/goals';
    $post_data['args']['startDate'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['startDate']);
    $post_data['args']['endDate'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['endDate']);
    $params = [
        'apiKey' => 'apiKey',
        'metric' => 'metric',
        'start_amount' => 'startAmount',
        'end_amount'=> 'endAmount',
        'start_date' => 'startDate',
        'end_date'=> 'endDate',
        'name' => 'name'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'POST', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});