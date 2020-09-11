<?php
namespace OAuth2UsernamePasswordFlow;

class SDSRestEndPoint
{
    private $postfields = null;
    public $payload    = null;

    public function __construct()
    {
        require_once "sds-rest-end-point-config.php";
        $this->postfields = "grant_type=".SDS_GRANT_TYPE
        ."&client_id=".SDS_CLIENT_ID
        ."&client_secret=".SDS_CLIENT_SECRET
        ."&username=".SDS_USERNAME
        ."&password=".urlencode(SDS_PASSWORD);

        // sanitize user $_POST[] fields if they haven't filled this out correctly don't let them proceed.
        $this->userSanitation();

        // pass the post fields the the SDS endpoint
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, SDS_API_END_POINT_URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postfields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // json string
        $this->payload = curl_exec($ch);

        curl_close($ch);

        // get the access token and push the form fields data to the endpoint
        $accessToken = $this->getAccessToken();
        $this->pushPostfieldsData($accessToken);
    }

    private function getAccessToken()
    {
        $json_arr = json_decode($this->payload);
        return $json_arr->accessToken;
    }

    private function userSanitation(){
        $postalCode = $_POST['postalCode'];
        if (!(strlen($postalCode) == 5)) {
            header("Location: http://hiregogreen.com/");
            exit();
        }
    }

    private function pushPostfieldsData($accessToken)
    {
        // we are now authenticated at this point time for the 2nd part of the flow
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, SDS_LEAD_API_END_POINT_URL);

        // form payload
        $payload = '{"street": "'.$_POST['street'].'",
            "city": "'.$_POST['city'].'",
            "state": "'.$_POST['state'].'",
            "postalCode": "'.$_POST['postalCode'].'",
            "dealerName": "'.SDS_DEALER_NAME.'"
            }';

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);


        //set the content type to application/json
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array('Content-Type:application/json', 'authorization: Bearer '.$accessToken)
        );

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $json_str = curl_exec($ch);

        //close cURL resource
        curl_close($ch);


        $json_arr = json_decode($json_str);
        header("Location: $json_arr->redirectURL");
        exit();
    }
}
