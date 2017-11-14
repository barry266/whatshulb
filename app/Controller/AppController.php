<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS . 'Entities/AccessToken.php');
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS . 'HttpClients/FacebookCurl.php');
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS . 'HttpClients/FacebookHttpable.php');
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS . 'HttpClients/FacebookCurlHttpClient.php');
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'FacebookSession.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'FacebookRedirectLoginHelper.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'FacebookRequest.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'FacebookResponse.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'FacebookSDKException.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'FacebookRequestException.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'FacebookAuthorizationException.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'GraphObject.php' );
require_once(APP . 'Vendor' . DS  . 'Facebook'  . DS .  'GraphSessionInfo.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	var $FB_User;
	public $components = array (
	    'Hashids' => array (
	        'salt' => 'de9257e48bad197eaae5148c52ce62acce0c8868',
	        'min_hash_length' => 0, // Optional
	        'alphabet' => '', // Optional
	    ),	    
	);
	
	
	public function beforeFilter() {
		
		if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
		//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above
		
	    // init app with app id (APPID) and secret (SECRET)
		FacebookSession::setDefaultApplication(APPID, SECRET);
		$helper = new FacebookRedirectLoginHelper( REDIRECT);
		$scope = array('email');
		
		if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) {
		  // Create new session from saved access_token
		  $session = new FacebookSession( $_SESSION['fb_token'] );
		
		    // Validate the access_token to make sure it's still valid
		    try {
		      if ( ! $session->validate() ) {
		        $session = null;
		      }
		    } catch ( Exception $e ) {
		      // Catch any exceptions
		      $session = null;
		    }
		} else {
		  // No session exists
		  try {
		    $session = $helper->getSessionFromRedirect();
		  } catch( FacebookRequestException $ex ) {
		
		    // When Facebook returns an error
		  } catch( Exception $ex ) {
		
		    // When validation fails or other local issues
		    echo $ex->message;
		  }
		}
		
		// Check if a session exists
		if ( isset( $session ) ) {
		
		  // Save the session
		  $_SESSION['fb_token'] = $session->getToken();
		
		  // Create session using saved token or the new one we generated at login
		  $session = new FacebookSession( $session->getToken() );
		
		  // Create the logout URL (logout page should destroy the session)
		  //$logoutURL = $helper->getLogoutUrl( $session, 'http://localhost/boostrapGallery' );
		  
		  
		  $request = new FacebookRequest( $session, 'GET', '/me' );
		  $response = $request->execute();
		  // get response
		  $this->FB_User = $response->getGraphObject()->asArray();
		  $isFBLogin = true;
		   		  
		} else {
		  // No session
		  $isFBLogin = false;
		  // Get login URL
		  
		}
		$loginUrl = $helper->getLoginUrl($scope);
		  
		$this->set('fb_link',$loginUrl);
	}




}
