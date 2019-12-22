<?php
include 'inc/config.php';

$filter = ['status'=>'active'];
if (isset($_GET['status'])) {
    $filter['status'] = filter_input(
        INPUT_GET, 
        'status', 
        FILTER_SANITIZE_STRING
    );
}
$directory->selectListings($filter);

$title = "PHP Conferences";
require 'inc/header.php';

foreach ($directory->listings as $listing) {
    var_dump($listing);
    var_dump(get_class($listing));
    var_dump(is_a($listing, 'ListingBasic'));
    include 'views/list_item.php';
}

require 'inc/footer.php';