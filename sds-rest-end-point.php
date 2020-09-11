<?php
/**
 * SDS Rest Endpoint
 *
 * This is the file action file for the form that triggers our OAuth2 user password
 * flow and sends lead information on over to the SDS Dealer Salesforce API.
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

require_once "SDSRestEndPoint.php";
// run the process submit POST data to class
$SDSRestEndPoint = new SDSRestEndPoint();
