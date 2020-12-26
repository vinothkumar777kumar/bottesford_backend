<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->options('(:any)', 'OptionsController::options'); //one options method for all routes.

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HallbookingController::index');
	$routes->group('api',['namespace' => 'App\Controllers'],function($routes){
		// authendication
		$routes->post('register','AuthController::userregister');
		$routes->post('userlogin','AuthController::userlogin');

		// account activation
		$routes->get('register/activate/(:any)', 'AuthController::activate/$1');
		// get users 
		 $routes->get('user', 'Home::getAllUsers');
		 $routes->get('myaccount/(:any)', 'Home::getUsers/$1');
		 $routes->post('updatemyaccount','Home::updatemyaccount');
		 $routes->post('ticketbooking','TicketController::ticket_booking');
		 $routes->get('getuserticket/(:any)', 'TicketController::get_bookedtickets/$1');
		//  add teams
		$routes->post('addteam','TeamController::addteam');
		$routes->get('getteams', 'TeamController::getallteams');
		$routes->get('editteam/(:any)', 'TeamController::editteamsbyid/$1');
		$routes->post('updateteam','TeamController::updateteam');
		$routes->get('deleteteams/(:any)', 'TeamController::deleteteams/$1');
		

		// add player
		$routes->post('addplayer','TeamController::addplayer');
		$routes->get('getteamplayers/(:any)', 'TeamController::getteamplayers/$1');
		$routes->get('editteamplayer/(:any)', 'TeamController::editteamplayer/$1');
		$routes->post('updateteamplayer/(:any)','TeamController::updateteamplayer/$1');
		$routes->get('deleteplayerimage/(:any)', 'TeamController::deleteplayerimage/$1');
		$routes->get('deleteplayer/(:any)', 'TeamController::deleteplayer/$1');

			// sportshalluses api start
			$routes->get('getsportshalluses', 'SportshallusesController::getsportshalluses');
			$routes->post('addsportshalluses','SportshallusesController::addsportshalluses');
			$routes->get('editsportshalluses/(:any)', 'SportshallusesController::editsportshalluses/$1');
			$routes->post('updatesportshalluses','SportshallusesController::updatesportshalluses');
			$routes->get('deletesportshalluses/(:any)', 'SportshallusesController::deletesportshalluses/$1');
				// sportshalluses api end

		// get player
		
		$routes->get('getplayer/(:any)', 'TeamController::editteamplayer/$1');

		//match adding
		$routes->post('addmatch','MatchController::addmatch');
		$routes->get('getallmatch', 'MatchController::getallmatch');
		$routes->get('editmatch/(:any)', 'MatchController::editmatch/$1');
		$routes->get('deletematchimage/(:any)', 'MatchController::deletematchimage/$1');
		$routes->post('updatematch','MatchController::updatematch');
		$routes->get('deletematch/(:any)', 'MatchController::deletematch/$1');

		// not token api

		// user home screen
		$routes->get('nextmatch', 'MatchController::nextmatch');

		// update password users
		$routes->post('updatepassword','Home::update_mypassword');

		// book sports hall
		$routes->post('bookhall','HallbookingController::hallbooking');
		$routes->get('getsportshallbookdata/(:any)', 'HallbookingController::getbooksportsdata/$1');
		$routes->get('get_sportshallbooked', 'HallbookingController::gethallbookeddata');
		$routes->get('delethallbooking/(:any)', 'HallbookingController::deletehallbooking/$1');
		$routes->get('getsportshalldata/(:any)', 'HallbookingController::editsportshalldata/$1');
		$routes->post('updatesportshall','HallbookingController::updatesportshall');
		$routes->post('blockbook','HallbookingController::blockbook');

		
		

		// get users list
		$routes->get('users', 'Home::getallusers');

		// booked list api

		$routes->get('getmatchtickets/(:any)', 'TicketController::getTickets/$1');
		$routes->get('todaybookingtickets','TicketController::today_ticket_booking');

		// add match results
		
		$routes->post('addmatchresult','MatchResultController::addmatchresult');
		$routes->get('getallmatchresult', 'MatchResultController::getallmatchresult');
		$routes->get('editmatchresult/(:any)', 'MatchResultController::editmatchresult/$1');
		$routes->get('deletematchresultimage/(:any)', 'MatchResultController::deletematchresultimage/$1');
		$routes->post('updatematchresult','MatchResultController::updatematchresult');
		$routes->get('deletematchresult/(:any)', 'MatchResultController::deletematchresult/$1');

		// GET LAST MATCH RESULT
		$routes->get('getlastmatchresult', 'MatchResultController::getlastmatchresult');

		// get league table data
		$routes->get('getleaguetabledata', 'MatchResultController::getleaguetabledata');
		
		// team manager signup details
		
		$routes->post('managersignup','AuthController::managersignup');
		$routes->get('getdashboardcount/(:any)', 'TeamController::getteamplayerscount/$1');
		$routes->get('getmanagerteamplayers/(:any)', 'TeamController::getallteamplayers/$1');
		$routes->get('getmanagerallmatchdata/(:any)', 'TeamController::getallteammatch/$1');

		// get manager team data
		$routes->get('getmanagerteamdata/(:any)', 'TeamController::getmanagerteamdata/$1');
		

		// sportshall images
		$routes->post('sportshallimage','HallbookingController::sportshallimage');
		$routes->get('sportshallimage/(:any)','HallbookingController::getsportshallimage/$1');
		$routes->post('updatesportshallimage/(:any)','HallbookingController::updatesportshallimage/$1');
		$routes->get('deletesportshallimage/(:any)', 'HallbookingController::deletesportshallimage/$1');
		
		

		// blog 
		
		$routes->get('getallblog', 'BlogController::getallblog');
		$routes->post('addblog','BlogController::addblog');
		$routes->get('editblog/(:any)', 'BlogController::editblog/$1');
		$routes->post('updateblog/(:any)','BlogController::updateblog/$1');
		$routes->get('deleteblog/(:any)', 'BlogController::deletblog/$1');
		$routes->get('deleteblogimage/(:any)', 'BlogController::deleteblogimage/$1');

		// bionewsfeed
		$routes->get('getallbionewsfeed', 'BlogController::getallbionewsfeed');
		$routes->get('getteambionewsfeed/(:any)', 'BlogController::getteambionewsfeed/$1');
		$routes->post('addbionewsfeed','BlogController::addbionewsfeed');
		$routes->get('editbionewsfeed/(:any)', 'BlogController::editbionewsfeed/$1');
		$routes->post('updatebionewsfeed/(:any)','BlogController::updatebionewsfeed/$1');
		$routes->get('deletebionewsfeed/(:any)', 'BlogController::deletebionewsfeed/$1');
		$routes->get('deletebionewsfeedimage/(:any)', 'BlogController::deletebionewsfeedimage/$1');

			// users screen get active newsfeed
			$routes->get('getactivenewsfeeddata', 'BlogController::getactivenewsfeeddata');

		$routes->get('getmatchschedule', 'MatchController::getmatchschedule');


		// report generate
		$routes->get('getmatchticketreport/(:any)', 'TicketController::getmatchticketreport/$1');

			// get children
		
			$routes->get('getchild/(:any)', 'TeamController::getchild/$1');

			//paysubs add
			$routes->post('paysubs','TeamController::paysubs');
			$routes->post('paymembership','TeamController::paymembership');
			$routes->get('getpaysubs/(:any)', 'TeamController::getpaysubs/$1');
			$routes->get('getmembershipdata/(:any)', 'TeamController::getmembershipdata/$1');
			

			// socialclub 
			
			$routes->get('getallsocialclub', 'BlogController::getallsocialclub');
		$routes->post('addsocialclub','BlogController::addsocialclub');
		$routes->get('editsocialclub/(:any)', 'BlogController::editsocialclub/$1');
		$routes->post('updatesocialclub/(:any)','BlogController::updatesocialclub/$1');
		$routes->get('deletesocialclub/(:any)', 'BlogController::deletesocialclub/$1');
		$routes->get('deletesocialimage/(:any)', 'BlogController::deletesocialimage/$1');

		// users screen get social club
		$routes->get('getactivesocialclubdata', 'BlogController::getactivesocialclubdata');

		// user forgotpassword
		$routes->post('forgotpassword','AuthController::forgotpassword');
		$routes->post('resetpassword/(:any)', 'AuthController::resetpassword/$1');
		
		
			
		 
		 
	});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
