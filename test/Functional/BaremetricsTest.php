<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');
class MailboxlayerTest extends BaseTestCase {

    public function testListMetrics() {

        $routes = [
            'showPlanBreakout',
            'showCustomers',
            'showSingleMetric',
            'showSummary',
            'getSingleEvent',
            'getEvents',
            'getSingleCharge',
            'createCharge',
            'getCharges',
            'getSingleUser',
            'getUsers',
            'deleteGoal',
            'getSingleGoal',
            'createGoal',
            'getGoals',
            'deleteAnnotation',
            'getAnnotation',
            'createAnnotation',
            'getAnnotations',
            'deleteSubscription',
            'cancelSubscription',
            'updateSubscription',
            'getSubscription',
            'createSubscription',
            'getSubscriptions',
            'deleteCustomer',
            'getCustomerEvents',
            'getCustomer',
            'updateCustomer',
            'createCustomer',
            'getCustomers',
            'deletePlan',
            'updatePlan',
            'getSinglePlan',
            'createPlan',
            'getPlans',
            'getSources',
            'getAccount'

        ];

        foreach($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Baremetrics/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }

}
