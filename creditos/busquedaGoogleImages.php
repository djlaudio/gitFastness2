<?php
    include "simple_html_dom.php";
    $search_query = $_POST['textoBusqueda'];
    $search_query = urlencode( $search_query );
    $html = file_get_html( "https://www.google.com/search?q=$search_query&tbm=isch" );
    $image_container = $html->find('div#rcnt', 0);
    $images = $image_container->find('img');
    $image_count = 2; //Enter the amount of images to be shown
    $i = 0;
    foreach($images as $image){
        if($i == $image_count) break;
        $i++;
        // DO with the image whatever you want here (the image element is '$image'):
        echo $image;
    }