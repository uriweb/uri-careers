<?php

/**
 * URI CAREERS HELPER FUNCTIONS
 *
 * @package uri-careers
 */

function uri_careers_render_jobs( $field ) {
	$i_array = get_field( $field );
	$t_array = str_getcsv( $i_array, ';' );
	$arraylength = count( $t_array );
	$output3 = null;

	for ( $x = 0; $x < $arraylength; $x++ ) {
		$inner_array = explode( ',', $t_array[ $x ] );
		$keys = array( $inner_array[0] );
		$values = array( $inner_array[1] );
		$array_assoc = array_combine( $keys, $values );

		foreach ( $array_assoc as $key => $value ) {
			$salary_array = array();
			$sal_range = explode( '-', $value );

			foreach ( $sal_range as $sal ) {
				$sal1 = "$ $sal,000";
				array_push( $salary_array, $sal1 );
				$sal_range2 = implode( '  -  ', $salary_array );
			}
			$output2 = "<tr><td> $key </td><td> $sal_range2 </td></tr>";
		}
		$output3 .= $output2;
	}
	return $output3;
};

function uri_careers_skills_list( $name_field ) {
	$i_array = get_field( $name_field );
	$t_array = str_getcsv( $i_array, ',' );
	// var_dump( $t_array );
	$listlength = count( $t_array );
	global $output;

	for ( $x = 0; $x < $listlength; $x++ ) {
		$output .= "<li> $t_array[$x]</li>";
	}
	return $output;
}

function uri_careers_pipelist( $name_field ) {
	$i_array = get_field( $name_field );
	$t_array = str_getcsv( $i_array, ';' );
	$output = implode( '&nbsp; | &nbsp;', $t_array );
	return $output;
}

function uri_careers_render_alumni_data() {
	 $uri_employers = uri_careers_pipelist( 'employers' );
	$uri_grad_schools = uri_careers_pipelist( 'grad_schools' );
	$alumni_data = <<<head
	<h2 class="bigger-header">Alumni Data</h2>
	head;

	$alumni_employers = <<<employers
								<h3>Employers Hiring Our Grads</h3>
							<div class="pipelist">
							{$uri_employers}
							</div>
							employers;

		$alumni_grad_school = <<<g_school
							<h3>Graduate Schools Enrolling Our Students</h3>
							<div class="pipelist">
							{$uri_grad_schools}
							</div>
							g_school;
		$output = $alumni_data;
	if ( get_field( 'employers' ) ) {
			$output .= $alumni_employers;
	}
	if ( get_field( 'grad_schools' ) ) {
		$output .= $alumni_grad_school;
	}
	return $output;
}

function uri_careers_table_template( $entry, $experienced ) {
	$uri_careers_render_jobs = 'uri_careers_render_jobs';
	$tabledata = <<<table
					<h3>Entry Level</h3>
						<figure class="wp-block-table">
						<table style="width: 60%;">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
								</tr>
								</thead>
								{$uri_careers_render_jobs($entry)}
					</table>
					</figure>
		<h3>Experienced</h3>
		<figure class="wp-block-table">
					<table style="width:60%;">
					<thead>
							<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
								</tr>
								</thead>
								{$uri_careers_render_jobs($experienced)}
					</table>
					</figure>
		table;

	return $tabledata;
}


function uri_careers_render_skills() {
	$major = the_title( '', ' ', false );
	$uri_careers_skills_list = 'uri_careers_skills_list';

	$skills = <<<content
	<div class="skills-columns">
	<h3>General competencies:</h3>
			<div class="wp-block-columns">
		<div class="wp-block-column">	
	<ul>
		<li>Critical thinking</li>
		<li>Communication</li>
		<li>Teamwork</li>
		<li>Leadership</li>
		</ul>
		</div>
		<div class="wp-block-column">
		<ul>
		<li>Technology</li>
		<li>Professionalism</li>
		<li>Career & self development</li>
		<li>Equity & inclusion</li>
	</ul>
	</div>
	</div>
	<h3> $major specific competencies:</h3>
	<ul>
	{$uri_careers_skills_list('skills')}
	</ul>
	</div>
	content;

	return $skills;
}

function uri_careers_render_cards() {
	$card_1 = '[cl-card title="Center for Career & Experiential Education" body="" img="http://d4.local/wp-content/uploads/2023/10/Screenshot-2023-10-17-at-2.12.50 PM.png" link="https://web.uri.edu/career/" button="Learn More"]';
	$card_2 = '[cl-card title="Academic Enhancement Center" body="" img="http://d4.local/wp-content/uploads/2023/10/Screenshot-2023-10-17-at-2.12.50 PM.png" link="https://web.uri.edu/aec/" button="Learn More"]';

	$card = <<<cards_content
	<div class="three-cards">
	<div class="wp-block-columns">
								<div class="wp-block-column">
								{$card_1}
</div>
<div class="wp-block-column">
{$card_2}
</div>
</div>
</div>
cards_content;
	return $card;
}
