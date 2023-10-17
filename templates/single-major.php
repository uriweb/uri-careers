<?php
	get_header();
?>

<main id="main">
	<article>

	<?php the_title( '<div class="title"><h1>', '</h1></div>' ); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="center">

	<?php
	if ( function_exists( 'uri_cl_shortcode_button' ) ) {
		$advising = get_field( 'careers_advising_link' );
		$career = get_permalink();
		echo do_shortcode( '[cl-button link="' . $advising . '" text="Advising"][cl-button link="' . $career . '" text="Careers" style="prominent"]' );

	}
	?>
	</div>

	

					<h3 class="jobs">Jobs by Industry</h3>





	<?php
	$myFunction = 'myFunction';
	if ( function_exists( 'uri_cl_shortcode_tabs' ) ) {
		if ( get_field( 'industry_a_name' ) ) {
			$industry_a = get_field( 'industry_a_name' );

			if ( get_field( 'industry_a_entry_jobs' ) || get_field( 'industry_a_experienced_jobs ' ) ) {
				$industry_a_jobs = table_template( 'industry_a_entry_jobs', 'industry_a_experienced_jobs' );
			}
			$build_shortcode .= '[cl-tab title="' . $industry_a . '"]' . $industry_a_jobs . '[/cl-tab]';
		}
		if ( get_field( 'industry_b_name' ) ) {
			$industry_b = get_field( 'industry_b_name' );

			if ( get_field( 'industry_b_entry_jobs' ) || get_field( 'industry_b_experienced_jobs ' ) ) {
				$industry_b_jobs = table_template( 'industry_b_entry_jobs', 'industry_b_experienced_jobs' );
			}
			$build_shortcode .= '[cl-tab title="' . $industry_b . '"]' . $industry_b_jobs . '[/cl-tab]';
		}
		if ( get_field( 'industry_c_name' ) ) {
			$industry_c = get_field( 'industry_c_name' );

			if ( get_field( 'industry_c_entry_jobs' ) || get_field( 'industry_c_experienced_jobs ' ) ) {
				$industry_c_jobs = table_template( 'industry_c_entry_jobs', 'industry_c_experienced_jobs' );
			}
			$build_shortcode .= '[cl-tab title="' . $industry_c . '"]' . $industry_c_jobs . '[/cl-tab]';
		}



		echo do_shortcode( '[cl-tabs]' . $build_shortcode . '[/cl-tabs]' );
	}
	?>

<hr>



<?php if ( get_field( 'employers' ) ) { ?>
	<h3>Alumni Data</h3>
	<h4>Employers Hiring URI Grads</h4>
						<?php pipelist( 'employers' ); ?>
					<?php } ?>

	<?php if ( get_field( 'grad_schools' ) ) { ?>
	<h4>Graduate Schools Enrolling Our Students</h4>
		<?php pipelist( 'grad_schools' ); ?>
	<?php } ?>

	<hr>

	<?php if ( get_field( 'skills' ) ) { ?>
		<?php
		$my_list = 'my_list';
		if ( function_exists( 'uri_cl_shortcode_panel' ) ) {
			$major_skills = <<<majorskills
	<ul>
	{$my_list( 'skills' )}
	</ul>
	majorskills;
			$major = the_title( '', ' ', false );

			echo do_shortcode(
			'[cl-panel title="Skills Employers Desire" img="http://d4.local/wp-content/uploads/2023/10/vecteezy_a-colorful-stack-of-textbooks-on-a-desk-background-with_29288801_805.jpg"]
			<h4>General competencies:</h4>
			<div class="wp-block-columns">
		<div class="wp-block-column">	
	<ul>
		<li>Critical thinking</li>
		<li>Communication</li>
		<li>Teamwork</li>
		<li>Leadership</li>
		<li>Technology</li>
		</ul>
		</div>
		<div class="wp-block-column">
		<ul>
		<li>Professionalism</li>
		<li>Career & self development</li>
		<li>Equity & inclusion</li>
	</ul>
	</div>
	</div>
	<h4>' . $major . 'specific competencies:</h4>
	' . $major_skills . '
	
		
		[/cl-panel]'
					);
		}
	}
	?>

<?php
if ( get_field( 'featured_story' ) ) {
	?>

<h4>Student/Alumni Story</h4>
	<?php
	the_field( 'featured_story' );
}
?>

<?php if ( function_exists( 'uri_cl_shortcode_card' ) ) { ?>
	<hr>
<div class="three-cards">
	<div class="wp-block-columns">
		<div class="wp-block-column">
			<?php echo do_shortcode( '[cl-card title="Center for Career & Experiential Education" body="" img="http://d4.local/wp-content/uploads/2023/10/Screenshot-2023-10-17-at-2.12.50 PM.png" link="https://web.uri.edu/career/" button="Learn More"]' ); ?>
		</div>
		<div class="wp-block-column">
			<?php echo do_shortcode( '[cl-card title="Academic Enhancement Center" body="" img="http://d4.local/wp-content/uploads/2023/10/Screenshot-2023-10-17-at-2.12.50 PM.png" link="https://web.uri.edu/aec/" button="Learn More"]' ); ?>
		</div>
		<div class="wp-block-column">
			<?php echo do_shortcode( '[cl-card title="Academic Advising" body="" img="http://d4.local/wp-content/uploads/2023/10/Screenshot-2023-10-17-at-2.12.50 PM.png" link="https://www.uri.edu" button="Learn More"]' ); ?>
		</div>
	</div>
	


</div>

	<?php
}





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
			$empty_array = array();

			$sal_range = explode( '-', $value );
			foreach ( $sal_range as $sal ) {
				$sal1 = "$ $sal,000";
				array_push( $empty_array, $sal1 );
				$hi = implode( '  -  ', $empty_array );
			}
			$output2 = "<tr><td> $key </td><td> $hi </td></tr><br>";
		}
		$output3 .= $output2;
	}
	return $output3;

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
		$output .= "<li> $t_array[$x]</li>";

	}
	return $output;
}

function pipelist( $name_field ) {
	$i_array = get_field( $name_field );
	$t_array = str_getcsv( $i_array, ',' );
	$output = implode( ' | ', $t_array );
	echo $output;
}

function table_template( $entry, $experienced ) {
	$myFunction = 'myFunction';
		$tabledata = <<<table
					<h5>Entry Level</h5>
						<figure class="wp-block-table">
						<table style="width: 50%; margin-left:2%">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
								</tr>
								</thead>
								{$myFunction($entry)}
					</table>
					</figure>
		<h5>Experienced</h5>
		<figure class="wp-block-table">
					<table style="width:50%; margin-left:2%;">
					<thead>
							<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
								</tr>
								</thead>
								{$myFunction($experienced)}
					</table>
					</figure>
		table;

		return $tabledata;
}
?>


	</article>
</main>

<?php get_footer(); ?>
