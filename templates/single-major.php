<?php
	get_header();
?>

<main>
	<article>

	<?php the_title( '<div class="title"><h1>', '</h1></div>' ); ?>

	<div class="toggle">

	<?php if ( get_field( 'careers_advising_link' ) ) { ?>
						<button><a href="<?php the_field( 'careers_advising_link' ); ?>">Advising</a></button>
					<?php } ?>
					<button>Careers</button>
	</div> <!--end toggle div -->

					<h3>Jobs by Industry</h3>

					<!-- Tab links -->
<div class="tab">
<?php if ( get_field( 'industry_a_name' ) ) { ?>
  <button class="tablinks" onclick="openCareer(event, 'IndustryA')"><?php the_field( 'industry_a_name' ); ?></button>
  <?php } ?>

  <?php if ( get_field( 'industry_b_name' ) ) { ?>
  <button class="tablinks" onclick="openCareer(event, 'IndustryB')"><?php the_field( 'industry_b_name' ); ?></button>
  <?php } ?>

  <?php if ( get_field( 'industry_b_name' ) ) { ?>
  <button class="tablinks" onclick="openCareer(event, 'IndustryC')"><?php the_field( 'industry_c_name' ); ?></button>
  <?php } ?>
</div>
					<?php if ( get_field( 'industry_a_name' ) ) { ?>
						<div id="IndustryA" class="tabcontent">
						<h4><?php the_field( 'industry_a_name' ); ?></h4>
					<?php } ?>


					<?php
					if ( get_field( 'industry_a_entry_jobs' ) ) {
						?>
						<h5>Entry Level</h5>
						<table>
							<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
							</tr>
						<?php
						myFunction( 'industry_a_entry_jobs' );
					}
					?>
					</table>
				

	<?php
	if ( get_field( 'industry_a_experienced_jobs' ) ) {
		?>
		<h5>Experienced</h5>
		<table>
		<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
							</tr>
		<?php
		myFunction( 'industry_a_experienced_jobs' );
	}
	?>
	</table>
	</div> <!--and tabcontent -->

<?php if ( get_field( 'industry_b_name' ) ) { ?>
	<div id="IndustryB" class="tabcontent">
	<h4><?php the_field( 'industry_b_name' ); ?></h4>
<?php } ?>

<?php
if ( get_field( 'industry_b_entry_jobs' ) ) {
	?>
						<h5>Entry Level</h5>
						<table>
						<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
							</tr>
	<?php
	myFunction( 'industry_b_entry_jobs' );
}
?>
</table>

<?php
if ( get_field( 'industry_b_experienced_jobs' ) ) {
	?>
		<h5>Experienced</h5>
		<table>
		<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
							</tr>
	<?php
	myFunction( 'industry_b_experienced_jobs' );
}
?>
</table>
</div> <!-- end tabcontent -->

<?php if ( get_field( 'industry_c_name' ) ) { ?>
	<h4><?php the_field( 'industry_c_name' ); ?></h4>
<?php } ?>

<?php
if ( get_field( 'industry_c_entry_jobs' ) ) {
	?>
	<div id="IndustryC" class="tabcontent">
						<h5>Entry Level</h5>
						<table>
						<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
							</tr>
	<?php
	myFunction( 'industry_c_entry_jobs' );
}
?>
</table>

<?php
if ( get_field( 'industry_c_experienced_jobs' ) ) {
	?>
		<h5>Experienced</h5>
		<table>
		<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
							</tr>
	<?php
	myFunction( 'industry_c_experienced_jobs' );
}
?>
</table>
</div> <!-- end tabcontent -->
<hr>

<h3>Alumni Data</h3>

<?php if ( get_field( 'employers' ) ) { ?>
	<h4>Employers Hiring URI Grads</h4>
						<?php pipelist( 'employers' ); ?>
					<?php } ?>

	<?php if ( get_field( 'grad_schools' ) ) { ?>
	<h4>Graduate Schools Enrolling Our Students</h4>
		<?php pipelist( 'grad_schools' ); ?>
	<?php } ?>

	<hr>
	<h3>Skills Employers Desire</h3>
	<h4>General competencies:</h4>
	<ul>
		<li>Critical thinking</li>
		<li>Communication</li>
		<li>Teamwork</li>
		<li>Leadership</li>
		<li>Technology</li>
		<li>Professionalism</li>
		<li>Career & self development</li>
		<li>Equity & inclusion</li>
	</ul>

	<?php if ( get_field( 'skills' ) ) { ?>
	<h4>Major specific competencies:</h4>
	<ul>
		<?php my_list( 'skills' ); ?>
	</ul>
	<?php } ?>

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

				$token = strtok( $value, '-' );
				var_dump( $token );

			while ( $token !== false ) {
				// $number[] = sprintf( $token );
				$new_value[] = " $ $token,000 ";
				$token = strtok( '-' );
			}
			$hi = implode( '-', $new_value );
			echo "<tr><td> $key </td><td>$ $value </td></tr><br>";
		}
	}

};

function moneyfy( $value ) {
	$token = strtok( $value, '-' );

	while ( $token !== false ) {
		$new_value[] = " $ $token,000 ";
		$token = strtok( '-' );
	}
}

function my_list( $name_field ) {
	$i_array = get_field( $name_field );
	$t_array = str_getcsv( $i_array, ',' );
	// var_dump( $t_array );
	$listlength = count( $t_array );

	for ( $x = 0; $x < $listlength; $x++ ) {
		echo "<li> $t_array[$x]</li>";
	}

}

function pipelist( $name_field ) {
	$i_array = get_field( $name_field );
	$t_array = str_getcsv( $i_array, ',' );
	$output = implode( ' | ', $t_array );
	echo $output;
}
?>


	</article>
</main>

<?php get_footer(); ?>
