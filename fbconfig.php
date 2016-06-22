<?php /*
session_start();
// added in v4.0.0
require_once 'autoload.php';
require 'functions.php'; // Include functions
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1692271104370843','f40c10fa348761d86efc8bd1a0eb2b2f' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://www.anunciadoria.pe.hu/facebook_login/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
$graphObject = $response->getGraphObject();

    $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
     // $fbuname = $graphObject->getProperty('username');  // To Get Facebook Username
      $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
      $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
  
      $_SESSION['FBID'] = $fbid;           
     // $_SESSION['USERNAME'] = $fbuname;
        $_SESSION['FULLNAME'] = $fbfullname;
      $_SESSION['EMAIL'] =  $femail;
    echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
}
*/ ?>


<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
require 'functions.php'; // Include functions
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1692271104370843','f40c10fa348761d86efc8bd1a0eb2b2f' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://www.anunciadoria.pe.hu/facebook_login/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
      $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
      $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
      $femail = $graphObject->getProperty('email');    // To Get Facebook email ID

      $_SESSION['FBID'] = $fbid;           
      $_SESSION['FULLNAME'] = $fbfullname;
      $_SESSION['EMAIL'] =  $femail;
      checkuser ($fbid, $fbfullname, $femail); // Para atualizar DB locais

  header("Location: index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>
