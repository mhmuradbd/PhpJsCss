<?php
// get category data
// https://codex.wordpress.org/Function_Reference/get_category
$category = get_category(get_query_var('cat'));
$cat_ID = $category[0]->term_id;

// get current slug category ID
$catID = get_query_var( 'cat' );

$args = array('child_of' => get_query_var( 'cat' ));
$categories = get_categories( $args );
foreach($categories as $category) { 
    echo '<div>
    <a style="color: #393" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> 
    </div> ';
    echo '<p> Description:'. $category->description . '</p>';
    echo '<p> Post Count: '. $category->count . '</p>';  
}
?>
