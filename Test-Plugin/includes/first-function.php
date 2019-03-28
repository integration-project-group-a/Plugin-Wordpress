<?php
/**
 * Created by PhpStorm.
 * User: Temp
 * Date: 3/27/2019
 * Time: 20:38
 *
 * Create new database table
 *
 *
 */

// Add new create tabel function


//version variable
global $custom_db_version;
$custom_db_version = '1.0';

//function to create the custom table
function create_customdb () {
	global $wpdb;
	global $custom_db_version;

	$table_name = $wpdb->prefix . "customdb";

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id int(10) NOT NULL AUTO_INCREMENT,
		firstname varchar(30) NOT NULL,
		lastname varchar(30) NOT NULL,
		email varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		birthday date NOT NULL,   
		phonenumber varchar(20) NOT NULL,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";


	//dbDelta examines the current table structure, compares to desired structure and modifies if necessary, this automatic
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta(  $sql );

	add_option( 'custom_db_version', $custom_db_version );
}

//function to insert values into created table
function insert_customdb ($fname, $lname,$email,$password,$birthday,$phonenumber) {

	global $wpdb;
	$table_name = $wpdb->prefix . 'customdb';

	//prepare statement of query is used for security reasson
	$wpdb->query(
		$wpdb->prepare(
			"
				INSERT INTO $table_name
				( firstname, lastname, email, password, birthday, phonenumber, time )
				VALUES (%s, %s, %s, %s ,%s,%s, %s)
			",
			// arrya is usefull when we do not know number of arguments until runtime
			array(
			$fname,
			$lname,
			$email,
			$password,
			$birthday,
			$phonenumber,
			current_time( 'mysql' )
			)
		)
	);
}