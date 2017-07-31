[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Baremetrics/functions?utm_source=RapidAPIGitHub_BaremetricsFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Baremetrics Package
Zero-setup subscription analytics and insights
* Domain: [Baremetrics](http://baremetrics.com)
* Credentials: apiKey

## How to get credentials: 
0. Go to [Baremetrics](https://baremetrics.com/)
1. Register or log in
2. Go to [Setting page](https://app.baremetrics.com/settings/api) to get your apiKey 



## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Baremetrics.getAccount
Get your account information

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key provided by Baremetrics

## Baremetrics.getSources
Get your sources information

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key provided by Baremetrics
| perPage| Number     | Number of results per page
| page   | Number     | Number of results page

## Baremetrics.getPlans
Get your plans information

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| perPage | Number     | Number of results per page
| page    | Number     | Number of results page

## Baremetrics.createPlan
Create new plan

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key provided by Baremetrics
| sourceId     | String     | id of the source
| planId       | String     | Your unique ID for the plan
| name         | String     | Your internal name for this plan. This will be displayed in the Plan Breakout section
| currency     | String     | The ISO code of the currency of this plan. E.G: usd
| amount       | Number     | How much is this plan? (In cents)
| interval     | Select     | Interval of the plan
| intervalCount| Number     | Count of the interval

## Baremetrics.getSinglePlan
Show single plan information

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| planId  | String     | Your unique ID for the plan

## Baremetrics.updatePlan
Update existing plan

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | id of the source
| planId  | String     | Your unique ID for the plan
| name    | String     | Your internal name for this plan. This will be displayed in the Plan Breakout section

## Baremetrics.getCustomers
Get your customers information

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| perPage | Number     | Number of results per page
| page    | Number     | Number of results page

## Baremetrics.createCustomer
Create new customer

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key provided by Baremetrics
| sourceId  | String     | ID of the source
| customerId| String     | Your unique ID for the customer
| email     | String     | Customer email
| name      | String     | Customer name
| name      | String     | Your own notes for this customer. These will be displayed in the profile
| created   | DatePicker | Y-m-d hh:mm:ss of when this customer was created. Defaults to now.

## Baremetrics.updateCustomer
Update existing customer

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key provided by Baremetrics
| sourceId  | String     | ID of the source
| customerId| String     | Your unique ID for the customer
| email     | String     | Customer email
| name      | String     | Customer name
| name      | String     | Your own notes for this customer. These will be displayed in the profile
| created   | DatePicker | Y-m-d hh:mm:ss of when this customer was created. Defaults to now.

## Baremetrics.getCustomer
Get existing customer

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key provided by Baremetrics
| sourceId  | String     | ID of the source
| customerId| String     | Your unique ID for the customer

## Baremetrics.getCustomerEvents
Get existing customer events

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key provided by Baremetrics
| sourceId  | String     | ID of the source
| customerId| String     | Your unique ID for the customer
| perPage   | Number     | Number of results per page
| page      | Number     | Number of results page

## Baremetrics.deleteCustomer
Delete existing customer

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key provided by Baremetrics
| sourceId  | String     | ID of the source
| customerId| String     | Your unique ID for the customer

## Baremetrics.getSubscriptions
Get your subscriptions information

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| perPage | Number     | Number of results per page
| page    | Number     | Number of results page

## Baremetrics.createSubscription
Create new subscription

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key provided by Baremetrics
| sourceId      | String     | ID of the source
| subscriptionId| String     | ID of the subscription
| startedAt     | DatePicker | Date time of when this subscription started
| canceledAt    | DatePicker | Date time of when this subscription was, or should be canceled. This cannot be changed, so only set this if you are certain you know when the subscription will end.
| planId        | String     | ID of the plan
| customerId    | String     | ID of the customer
| addons        | List       | Array of addons for this subscription
| quantity      | Number     | Quantity of the subscription
| discount      | Number     | Discount value (in the same currency as the plan)

## Baremetrics.getSubscription
Get existing subscription

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key provided by Baremetrics
| sourceId      | String     | ID of the source
| subscriptionId| String     | ID of the subscription

## Baremetrics.updateSubscription
Update existing subscription

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key provided by Baremetrics
| sourceId      | String     | ID of the source
| subscriptionId| String     | ID of the subscription
| occurredAt    | DatePicker | Date time of when this change occurred. Defaults to now
| planId        | String     | ID of the plan
| addons        | List       | Array of addons for this subscription
| quantity      | Number     | Quantity of the subscription
| discount      | Number     | Discount value (in the same currency as the plan)

## Baremetrics.cancelSubscription
Cancel existing subscription

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key provided by Baremetrics
| sourceId      | String     | ID of the source
| subscriptionId| String     | ID of the subscription
| canceledAt    | DatePicker | Date time of when this subscription was, or should be canceled.

## Baremetrics.deleteSubscription
Delete existing subscription

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key provided by Baremetrics
| sourceId      | String     | ID of the source
| subscriptionId| String     | ID of the subscription

## Baremetrics.getAnnotations
Get your annotations information

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key provided by Baremetrics
| perPage| Number     | Number of results per page
| page   | Number     | Number of results page

## Baremetrics.createAnnotation
Create new annotations

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key provided by Baremetrics
| metric    | String     | Which metric is this for?
| annotation| String     | The annotation text
| date      | DatePicker | The annotation date
| global    | Boolean    | Should this show on all graphs?
| userId    | String     | Who added this annotation?

## Baremetrics.getAnnotation
Show single annotation information

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key provided by Baremetrics
| annotationId| String     | Id of the annotations

## Baremetrics.deleteAnnotation
Delete single annotation

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key provided by Baremetrics
| annotationId| String     | Id of the annotations

## Baremetrics.getGoals
Get your goals information

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key provided by Baremetrics
| perPage| Number     | Number of results per page
| page   | Number     | Number of results page

## Baremetrics.createGoal
Create new goal

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key provided by Baremetrics
| metric     | String     | Metric of the goal
| startAmount| Number     | Start amount in cents
| endAmount  | Number     | End amount in cents
| startDate  | DatePicker | Start date of goal
| endDate    | DatePicker | End date of goal
| name       | String     | Name of goal

## Baremetrics.getSingleGoal
Get existing goal

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key provided by Baremetrics
| goalId| String     | ID of the goal

## Baremetrics.deleteGoal
Delete existing goal

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key provided by Baremetrics
| goalId| String     | ID of the goal

## Baremetrics.getUsers
Get your users information

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key provided by Baremetrics
| perPage| Number     | Number of results per page
| page   | Number     | Number of results page

## Baremetrics.getSingleUser
Get existing user

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key provided by Baremetrics
| userId| String     | ID of the user

## Baremetrics.getCharges
Get your charges information

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| perPage | Number     | Number of results per page
| page    | Number     | Number of results page

## Baremetrics.createCharge
Create new charge

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key provided by Baremetrics
| sourceId  | String     | ID of the source
| chargeId  | String     | Unique ID of the charge
| customerId| String     | ID of the customer
| currency  | String     | The ISO code of the currency of this plan. E.G: usd
| amount    | Number     | Charge amount (In cents)
| created   | DatePicker | Datetime of when this was created (defaults to now)
| status    | Select     | The status of this charge. Defaults to paid.

## Baremetrics.getSingleCharge
Get single charge

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| chargeId| String     | ID of the charge

## Baremetrics.getEvents
Get your events information

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| perPage | Number     | Number of results per page
| page    | Number     | Number of results page

## Baremetrics.getSingleEvent
Get single event

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key provided by Baremetrics
| sourceId| String     | ID of the source
| eventId | String     | ID of the event

## Baremetrics.showSummary
Get your summary metrics

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key provided by Baremetrics
| startDate| DatePicker | Start date for summary
| endDate  | DatePicker | End date for summary

## Baremetrics.showSingleMetric
Get single metrics information

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key provided by Baremetrics
| startDate| DatePicker | Start date for summary
| endDate  | DatePicker | End date for summary
| metricId | String     | Id of the metric
| compareTo| Number     | The number of days ago to compare results to

## Baremetrics.showCustomers
Returns a list of customers that make up this metric. For example, the upgrades metric will return all customers who have upgraded within the selected range. You can also see their MRR contribution.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key provided by Baremetrics
| startDate| DatePicker | Start date for summary
| endDate  | DatePicker | End date for summary
| metricId | String     | Id of the metric

## Baremetrics.showPlanBreakout
This allows you to break down a metric by plan, across a date range.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key provided by Baremetrics
| startDate| DatePicker | Start date for summary
| endDate  | DatePicker | End date for summary
| metricId | String     | Id of the metric

