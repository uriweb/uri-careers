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
				if ( substr( $sal, -1 ) == '+' ) {
					$sal_trim = rtrim( $sal, '+' );
					$sal1 = "$ $sal_trim,000 +";
					array_push( $salary_array, $sal1 );
					$sal_range2 = implode( '  -  ', $salary_array );
				} else {
					$sal1 = "$ $sal,000";
					array_push( $salary_array, $sal1 );
					$sal_range2 = implode( '  -  ', $salary_array );
				}
			}
			$output2 = "<tr><td> $key </td><td> $sal_range2 </td></tr>";
		}
		$output3 .= $output2;
	}
	return $output3;
};
/**
 * Build the list of skills
 */
function uri_careers_skills_list( $name_field ) {
	$i_array = get_field( $name_field );
	$t_array = str_getcsv( $i_array, ';' );
	// var_dump( $t_array );
	$listlength = count( $t_array );
	global $output;

	for ( $x = 0; $x < $listlength; $x++ ) {
		$output .= "<li> $t_array[$x]</li>";
	}
	return $output;
}

/**
 * Parse the list of skills with a pipe as delimeter
 */
function uri_careers_pipelist( $name_field ) {
	$i_array = get_field( $name_field );
	$t_array = str_getcsv( $i_array, ';' );
	$output = implode( '&nbsp; &nbsp; | &nbsp; &nbsp;', $t_array );
	return $output;
}

/**
 * Build the list of alumni data
 */
function uri_careers_render_alumni_data() {
	 $uri_employers = uri_careers_pipelist( 'employers' );
	$uri_grad_schools = uri_careers_pipelist( 'grad_schools' );
	$major = the_title( '', ' ', false );
	$alumni_data = <<<head
							<h2 class="bigger-header">Where Can You Find URI Graduates?</h2>
							<p>Many alumni who majored in $major go on to pursue advanced degrees or careers across the globe. </p>
	head;

	$alumni_employers = <<<employers
							<div class="alumni-card">
								<h3>Top Employers Hiring Our Grads</h3>
							<div class="pipelist">
							<p>{$uri_employers}</p>
							</div>
							</div>
							employers;

		$alumni_grad_school = <<<g_school
							<div class="alumni-card">
							<h3>Top Graduate Schools Enrolling Our Students</h3>
							<div class="pipelist">
							<p>{$uri_grad_schools}</p>
							</div>
							</div>
							g_school;
		$output = $alumni_data;
	if ( get_field( 'grad_schools' ) ) {
		$output .= $alumni_grad_school;
	}
	if ( get_field( 'employers' ) ) {
			$output .= $alumni_employers;
	}

	return $output;
}

/**
 * Build the tables of data for top careers
 */
function uri_careers_table_template_entry( $entry ) {
	$uri_careers_render_jobs = 'uri_careers_render_jobs';
	$tabledata_entrylevel = <<<table_entry
					<h3 class="job-level">Entry Level - new to the industry</h3>
						<figure class="wp-block-table">
						<table style="width:80%">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
								</tr>
								</thead>
								{$uri_careers_render_jobs($entry)}
					</table>
					</figure>
					table_entry;

				return $tabledata_entrylevel;
}

function uri_careers_table_template_experienced( $experienced ) {
	$uri_careers_render_jobs = 'uri_careers_render_jobs';
		$tabledata_experiencedlevel = <<<table_experienced
		<h3 class="job-level">Experienced - typically 10 years or more in the profession</h3>
		<figure class="wp-block-table">
					<table style="width:80%">
					<thead>
							<tr>
								<th>Job Title</th>
								<th>Salary Range</th>
								</tr>
								</thead>
								{$uri_careers_render_jobs($experienced)}
					</table>
					</figure>
		table_experienced;

	return $tabledata_experiencedlevel;
}

/**
 * Output the list of skills
 */
function uri_careers_render_skills() {
	$major = the_title( '', ' ', false );
	$uri_careers_skills_list = 'uri_careers_skills_list';

	$skills = <<<content
	<div class="skills-columns">
	<p>Across all majors, employers want to hire recent graduates who have the core skills that lead to a successful career. Ask your academic advisor which courses introduce or build upon these 8 Career Readiness competencies. After that, your Career Education Specialist (CES) can help you demonstrate these acquired skills and experiences in your resume.</p>
	<div class="alumni-card">
	<h3>Career Readiness for all majors:</h3>		
	<div class="wp-block-columns">
		<div class="wp-block-column">	
		
	<ul>
		<li>Critical thinking</li>
		<li>Oral and written communication</li>
		<li>Teamwork</li>
		<li>Leadership</li>
		</ul>
		</div>
		<div class="wp-block-column">
		<ul>
		<li>Digital technology</li>
		<li>Professionalism</li>
		<li>Career and self development</li>
		<li>Equity and inclusion</li>
	</ul>
	</div>
	</div>
	</div>
	content;

	if ( get_field( 'skills' ) ) {
		$skills .= <<<spec_content
	<div class="alumni-card">
	<h3 id="major_specific_head"> $major skills:</h3>
	<p>These skills are recommended and ranked by URI alumni with this major.</p>
	<ol>
	{$uri_careers_skills_list('skills')}
	</ol>
	</div>
	</div>
	spec_content;
	}

	return $skills;
}

