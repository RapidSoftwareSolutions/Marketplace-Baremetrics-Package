<?php
$app->post('/api/Baremetrics/showPlanBreakout', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'endDate', 'startDate', 'metric']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] . 'metrics/'.$post_data['args']['metric'].'/plans';
    $post_data['args']['startDate'] = explode(' ', $post_data['args']['startDate'])[0];
    $post_data['args']['endDate'] = explode(' ', $post_data['args']['endDate'])[0];
    $params = [
        'apiKey' => 'apiKey',
        'start_date' => 'startDate',
        'end_date' => 'endDate',
        'compare_to' => 'compareTo'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});