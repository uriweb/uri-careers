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
	echo $output;
}

function uri_careers_table_template( $entry, $experienced ) {
	$uri_careers_render_jobs = 'uri_careers_render_jobs';
	$tabledata = <<<table
					<h5>Entry Level</h5>
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
		<h5>Experienced</h5>
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


function render_skills() {
	$major = the_title( '', ' ', false );
	$uri_careers_skills_list = 'uri_careers_skills_list';

	$skills = <<<content
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
	<h4> $major specific competencies:</h4>
	<ul>
	{$uri_careers_skills_list('skills')}
	</ul>
	content;

	return $skills;
}
