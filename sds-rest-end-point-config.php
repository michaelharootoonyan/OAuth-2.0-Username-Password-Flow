<?php
/**
 * SDSRestEndPoint Configuration
 *
 * This is where the configurations are setup for the SDSRestEndPoint Class.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   SDSDealer
 * @author    Michael Harootoonyan <michaelharootoonyan@gmail.com>
 * @copyright 2020 Michael Harootoonyan
 * @license   https://github.com/michaelharootoonyan/blob/master/license.txt MIT
 * @link      https://github.com/michaelharootoonyan/OAuth-2.0-Username-Password-Flow
 */
namespace OAuth2UsernamePasswordFlow;

define("SDS_DEALER_NAME", "GoGreen Solar");
define("SDS_API_END_POINT_URL", "https://login.salesforce.com/services/oauth2/token");
define(
    "SDS_LEAD_API_END_POINT_URL",
    "https://sunpower.my.salesforce.com/services/apexrest/maxfitdesign/"
);
define("SDS_GRANT_TYPE", "password");
define("SDS_CLIENT_ID", "xxx");
define("SDS_CLIENT_SECRET", "xxx");
define("SDS_USERNAME", "xxx@email.com");
define("SDS_PASSWORD", "xxx");
define("HOMEPAGE_URL", "http://hiregogreen.com/");
