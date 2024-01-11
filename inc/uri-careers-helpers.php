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
	$output = implode( '&nbsp; | &nbsp;', $t_array );
	return $output;
}

/**
 * Build the list of alumni data
 */
function uri_careers_render_alumni_data() {
	 $uri_employers = uri_careers_pipelist( 'employers' );
	$uri_grad_schools = uri_careers_pipelist( 'grad_schools' );
	$alumni_data = <<<head
	<h2 class="bigger-header">Where in the World are Rhody Graduates?</h2>
							<p>There are Rhody Graduates across the globe. Check out the exciting sampling of where our graduates continue learning and working.</p>
							<h2 class="bigger-header">Post-Graduation Trends</h2>
							<p>Many URI graduates continue learning and working at some of the top schools and organizations in the world.</p>
	head;

	$alumni_employers = <<<employers
							
								<h3>Top Employers Hiring Our Grads</h3>
							<div class="pipelist">
							{$uri_employers}
							</div>
							employers;

		$alumni_grad_school = <<<g_school
							<h3>Top Graduate Schools Enrolling Our Students</h3>
							<div class="pipelist">
							{$uri_grad_schools}
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
function uri_careers_table_template( $entry, $experienced ) {
	$uri_careers_render_jobs = 'uri_careers_render_jobs';
	$tabledata = <<<table
					<h3 class="job-level">Entry Level</h3>
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
		<h3 class="job-level">Experienced (10 years or more in the industry)</h3>
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
		table;

	return $tabledata;
}

/**
 * Output the list of skills
 */
function uri_careers_render_skills() {
	$major = the_title( '', ' ', false );
	$uri_careers_skills_list = 'uri_careers_skills_list';

	$skills = <<<content
	<div class="skills-columns">
	<p>Regardless of the major, employers want to hire recent grads who have developed career readiness competencies to be successful in the workforce. Ask your academic advisor which courses to enroll in that help develop  these essential competencies and ask your career education specialist (CES) for guidance including adding these keywords on your resume. In addition to those skills, the major specific skills are recommended by URI alumni.</p>
	<p>Across all majors, employers want to hire recent graduates who have developed career readiness competencies to be successful in the workforce. Ask your academic advisor which courses can lead to developing these skills. Your Career Readiness Specialist (CES) can help you add these keywords to your resume.</p>
	<h3>Career Readiness for All Majors:</h3>		
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
		<li>Career & self development</li>
		<li>Equity & inclusion</li>
	</ul>
	</div>
	</div>
	<h3 id="major_specific_head"> $major Specific Competencies:</h3>
	<p>These specific skills are recommended and ranked by URI alumni with this major.</p>
	<ol>
	{$uri_careers_skills_list('skills')}
	</ol>
	</div>
	content;

	return $skills;
}

/**
 * Build the cards
 */
function uri_careers_render_cards() {
	$card_1 = '[cl-card title="Center for Career and Experiential Education" body="The CCEE provides students with career resources and oppurtunities, from internships to resume guidance." img="http://d4.local/wp-content/uploads/2024/01/careers.jpg" link="https://web.uri.edu/career/"]';
	$card_2 = '[cl-card title="Academic Enhancement Center" body="The AEC operates peer-to-peer programs including the Writing Center, study workshops, and tutoring." img="http://d4.local/wp-content/uploads/2024/01/AEC.jpg" link="https://web.uri.edu/aec/"]';

	$card = <<<cards_content
	<div class="three-cards">
	<div class="wp-block-columns">
								<div class="wp-block-column">
								{$card_2}
</div>
<div class="wp-block-column">
{$card_1}
</div>
</div>
</div>
cards_content;
	return $card;
}
