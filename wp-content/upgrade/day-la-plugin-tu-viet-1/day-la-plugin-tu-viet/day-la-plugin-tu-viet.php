<?php 
function edu_contact_methods( $contactmethods ) {
    // Add some fields
    $contactmethods['title'] = 'Title';
    $contactmethods['phone'] = 'Phone Number';
    $contactmethods['twitter'] = 'Twitter Name (no @)';
    // Remove AIM, Yahoo IM, Google Talk/Jabber if they're present
    // unset($contactmethods['aim']);
    // unset($contactmethods['yim']);
    // unset($contactmethods['jabber']);
    // make it go!
    return $contactmethods;
   }
   add_filter( 'user_contactmethods', 'edu_contact_methods', 10, 1 );