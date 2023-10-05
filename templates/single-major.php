<?php
	get_header();
?>

<main>
	<article>

	<?php the_title( '<div class="title"><h1>', '</h1></div>' ); ?>

	<?php if ( get_field( 'careers_advising_link' ) ) { ?>
						<button><a href="<?php the_field( 'careers_advising_link' ); ?>">Advising</a></button>
					<?php } ?>
					<button>Careers</button>

					<h3>Jobs by Industry</h3>

					<?php if ( get_field( 'industry_a_name' ) ) { ?>
						<h4><?php the_field( 'industry_a_name' ); ?></h4>
					<?php } ?>


					<?php
					if ( get_field( 'industry_a_entry_jobs' ) ) {
						?>
						<h5>Entry Level</h5>
						<ul>
						<?php
						myFunction( 'industry_a_entry_jobs' );
					}
					?>
					</ul>

	<?php
	if ( get_field( 'industry_a_experienced_jobs' ) ) {
		?>
		<h5>Experienced</h5>
		<ul>
		<?php
		myFunction( 'industry_a_experienced_jobs' );
	}
	?>
	</ul>

<?php if ( get_field( 'industry_b_name' ) ) { ?>
	<h4><?php the_field( 'industry_b_name' ); ?></h4>
<?php } ?>

<?php
if ( get_field( 'industry_b_entry_jobs' ) ) {
	?>
						<h5>Entry Level</h5>
						<ul>
	<?php
	myFunction( 'industry_b_entry_jobs' );
}
?>
</ul>

<?php
if ( get_field( 'industry_b_experienced_jobs' ) ) {
	?>
		<h5>Experienced</h5>
		<ul>
	<?php
	myFunction( 'industry_b_experienced_jobs' );
}
?>
</ul>

<?php if ( get_field( 'industry_c_name' ) ) { ?>
	<h4><?php the_field( 'industry_c_name' ); ?></h4>
<?php } ?>

<?php
if ( get_field( 'industry_c_entry_jobs' ) ) {
	?>
						<h5>Entry Level</h5>
						<ul>
	<?php
	myFunction( 'industry_c_entry_jobs' );
}
?>
</ul>

<?php
if ( get_field( 'industry_c_experienced_jobs' ) ) {
	?>
		<h5>Experienced</h5>
		<ul>
	<?php
	myFunction( 'industry_c_experienced_jobs' );
}
?>
</ul>


<?php
function myFunction( $fieldy ) {
	$i_array = get_field( $fieldy );
	$t_array = str_getcsv( $i_array, ';' );
	$arraylength = count( $t_array );

	for ( $x = 0; $x < $arraylength; $x++ ) {
			$inner_array = explode( ',', $t_array[ $x ] );
			$keys = array( $inner_array[0] );
			$values = array( $inner_array[1] );
			$array_assoc = array_combine( $keys, $values );
		foreach ( $array_assoc as $key => $value ) {
			echo "<li> $key - $value</li><br>";
		}
	}
};
?>


	</article>
</main>

<?php get_footer(); ?>
