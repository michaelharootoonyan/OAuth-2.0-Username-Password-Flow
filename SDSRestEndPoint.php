<?php
/**
 * SDSRestEndPoint
 * 
 * Using the OAuth 2.0 Username-Password Flow in order to pass lead information
 * to the SDSDealer Salesforce Application. 
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   SDSDealer
 * @author    Michael Harootoonyan <michaelharootoonyan@gmail.com>
 * @copyright 2020 Michael Harootoonyan
 * @license   https://github.com/michaelharootoonyan/blob/master/licence.txt 
 * BSD Licence
 * @link      https://github.com/michaelharootoonyan/OAuth-2.0-Username-Password-Flow
 */
namespace OAuth2UsernamePasswordFlow;

class SDSRestEndPoint
{
    private $_postfields = null;
    public $payload      = null;

    /**
     * Handles the entire process once a user submits post data to the rest 
     * endpoint.
     * 
     * @return void
     */
    public function __construct()
    {
        include_once "sds-rest-end-point-config.php";
        $this->_postfields = "grant_type=" . SDS_GRANT_TYPE
        . "&client_id=" . SDS_CLIENT_ID
        . "&client_secret=" . SDS_CLIENT_SECRET
        . "&username=" . SDS_USERNAME
        . "&password=" . urlencode(SDS_PASSWORD);

        // sanitize user $_POST[] fields if they haven't filled this out 
        // correctly don't let them proceed.
        $this->_userSanitation();

        // pass the post fields the the SDS endpoint
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, SDS_API_END_POINT_URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postfields);
        curl_setopt(
            $ch, 
            CURLOPT_HTTPHEADER, 
            array('Content-Type: application/x-www-form-urlencoded')
        );

        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // json string
        $this->payload = curl_exec($ch);

        curl_close($ch);

        // get the access token and push the form fields data to the endpoint..
        $accessToken = $this->_getAccessToken();
        $this->_pushPostfieldsData($accessToken);
    }

    /**
     * Gets the access token from the returned payload from the OAuth2 Flow.
     * 
     * @return string
     */
    private function _getAccessToken()
    {
        $jsonArr = json_decode($this->payload);
        return $jsonArr->accessToken;
    }

    /**
     * Checks to see if user has passed valid input values.  Redirects them to 
     * the homepage.
     * 
     * @return void
     */
    private function _userSanitation()
    {
        $postalCode = $_POST['postalCode'];
        if (!(strlen($postalCode) == 5)) {
            header("Location: " . HOMEPAGE_URL);
        }
    }

    /**
     * Passes the lead information to the SDSDealer Salesforce Application.
     * 
     * @param string $accessToken the access token provided by the OAuth2 Flow
     * 
     * @return void
     */
    private function _pushPostfieldsData($accessToken)
    {
        // now authenticated at this point time for the 2nd part of the flow
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, SDS_LEAD_API_END_POINT_URL);

        // form payload
        $payload = '{"street": "' . $_POST['street'] . '",
            "city": "' . $_POST['city'] . '",
            "state": "' . $_POST['state'] . '",
            "postalCode": "' . $_POST['postalCode'] . '",
            "dealerName": "' . SDS_DEALER_NAME . '"
            }';

        // attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);


        //set the content type to application/json
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json', 
                'authorization: Bearer ' . $accessToken)
        );

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $jsonStr = curl_exec($ch);

        //close cURL resource
        curl_close($ch);


        $jsonArr = json_decode($jsonStr);
        header("Location: $jsonArr->redirectURL");
        exit();
    }
}
