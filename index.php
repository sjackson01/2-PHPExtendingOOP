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

$test = new ListingFeatured(['description' => 'My description with 
<b>Good</b> tags and <a href="http://example.com"> Bad Tags </a>']);
var_dump($test);
var_dump(get_class($test));
var_dump(is_a($test, 'ListingBasic'));
var_dump($test->getStatus());

echo '<ul class="nav nav-tabs">';
echo '<li role="presentation"';
//If filter status is active set the class to active 
//Default behavior index.php 
if($filter['status'] == 'active') echo ' class="active"';
echo '><a href="index.php">Active';
echo '</a>';
echo '</li>';
//Display status if == $status
foreach($directory->getStatuses() as $status){
    echo '<li role ="presentation"';
    if($filter['status'] == $status) echo ' class="active"';
echo '><a href="index.php?status='.$status.'">';
echo ucwords($status).'</a>';
echo '</li>';
}
echo '</ul>';

foreach ($directory->listings as $listing) {
    include 'views/list_item.php';
}

require 'inc/footer.php';