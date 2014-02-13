<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>      	
	<?php the_excerpt(); // autop ?>
</li> <!-- #post-n -->