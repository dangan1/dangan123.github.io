<?php

// ##########################  MARCO1 Hide All #######################
#  MARCO1 Hide All Version 4 For vBulletin powered Forums.
#  You didn't have a permission to add or edit any part in this code.
#  Product Version : 4.0
#  Coded By : MARCO1
// ########################### MARCO1 Hide All ######################

// ######################## SET PHP ENVIRONMENT ###########################
error_reporting(E_ALL & ~E_NOTICE);

// ##################### DEFINE IMPORTANT CONSTANTS #######################
define('NO_REGISTER_GLOBALS', 1);
define('THIS_SCRIPT', 'MARCO1_hide_all_version_checker.php');

// #################### PRE-CACHE TEMPLATES AND DATA ######################
$phrasegroups = array();
$specialtemplates = array();

// ########################## REQUIRE BACK-END ############################
require_once('./global.php');
require_once(DIR . '/includes/class_bbcode.php');
$bbcode_parser =& new vB_BbCodeParser($vbulletin, fetch_tag_list());

$this_script = 'MARCO1_hide_all_version_checker';

// ######################## CHECK ADMIN PERMISSIONS #######################
if (!can_administer('canadminusers'))
{
	print_cp_no_permission();
}

// ########################################################################
// ######################### START MAIN SCRIPT ############################
// ########################################################################
print_cp_header($vbphrase['awards']);

// Get Latest Version from vBulletin.org
$productVerCheckURL = "http://www.vbulletin.org/forum/misc.php?do=productcheck&pid=marcohideall";
$latestVersion = file_get_contents($productVerCheckURL);
$latestVersion = ereg_replace("[^A-Za-z0-9.]", "", $latestVersion );
$latestVersion = substr($latestVersion, 23);
$latestVersion = ereg_replace("[^0-9.]", "", $latestVersion );



// Begin Output

echo "Current Version:  4.0";
echo "<br />";
echo "Latest Version:  $latestVersion";
echo "<br />";
echo "<br />";

if ( $currentVersion > $latestVersion ) {
	echo "This is a beta build.";
	}
	
if ( $currentVersion == $latestVersion ) {
	echo "This build is current.";
	}
	
if ( $currentVersion < $latestVersion ) {
	echo "An updated version has been released.";
	}

// #############################################################################

print_cp_footer();

?>