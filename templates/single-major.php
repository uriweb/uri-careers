<?php
	get_header();
?>

<main>
	<article>

	<?php the_title( '<div class="title"><h1>', '</h1></div>' ); ?>

	<?php if ( get_field( 'careers_advising_link' ) ) { ?>
						<a href="<?php the_field( 'careers_advising_link' ); ?>">Advising link</a>
					<?php } ?>

					<h3>Jobs by Industry</h3>

					<?php if ( get_field( 'industry_a_name' ) ) { ?>
						<h4><?php the_field( 'industry_a_name' ); ?></h4>
					<?php } ?>

					<?php
					if ( get_field( 'industry_a_entry_jobs' ) ) {
						?>
						<h5>Entry Level</h5>
						<?php
						$i_array = get_field( 'industry_a_entry_jobs' );
						var_dump( str_getcsv( $i_array, ';' ) );
					}
					?>
	
	<?php
	if ( get_field( 'industry_a_experienced_jobs' ) ) {
		?>
						<h5>Experienced</h5>
		<?php
		$i_array = get_field( 'industry_a_experienced_jobs' );
		$t_array = str_getcsv( $i_array, ';' );
		// $inner_array = explode( ',', $t_array[0] );
		var_dump( $t_array );
		// echo  $t_array[1];
		// var_dump( $inner_array );
		$arraylength = count( $t_array );

		for ( $x = 0; $x < $arraylength; $x++ ) {
			$inner_array = explode( ',', $t_array[ $x ] );
			var_dump( $inner_array );
		}
	}
	?>


	</article>
</main>

<?php get_footer(); ?>
