<?php
$app->post('/api/Baremetrics/showSummary', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'endDate', 'startDate']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] . 'metrics';
    $post_data['args']['startDate'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['startDate']);
    $post_data['args']['endDate'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['endDate']);
    $params = [
        'apiKey' => 'apiKey',
        'start_date' => 'startDate',
        'end_date' => 'endDate'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});