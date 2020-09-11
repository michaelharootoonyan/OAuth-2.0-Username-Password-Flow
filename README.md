# OAuth 2.0 Username Password Flow
 Integrated a Third Party Salesforce Application with the website using the OAuth 2.0 Username-Password Flow.  Written in PHP, following PSR-2 coding standards.

I wrote a REST endpoint in PHP and it is used in the form on the front-end in order to send over lead information and interact with the Salesforce Application.  Tested in salesforce sandbox before moving to the salesforce live environment.

[GoGreen Solar](http://hiregogreen.com/)

1. `index.php` this is where the form sits.  These field names match the SDS Dealer field names.  You must use the same field names when passing the payload string
```php
        $userPayload = '{"street": "' . $_POST['street'] . '",
            "city": "' . $_POST['city'] . '",
            "state": "' . $_POST['state'] . '",
            "postalCode": "' . $_POST['postalCode'] . '",
            "dealerName": "' . SDS_DEALER_NAME . '"
            }';
```
