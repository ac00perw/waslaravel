<?php

return [
    'team_types' => [
        'Individual' => 'Individual',
        'Family' => "Family",
        'Classroom' => "Classroom",
        'School' => "School",
        'Company' => "Company",
    ],
    'statuses' => [
		'created' => 'Created', //add teams at this level
		'active' => 'In Progress', //no team can be added after this
		'ended' => 'Over', //ended- process results
		'archived' => 'Archived',
    ]
];
/*
array('Individual', 'Family', 'Classroom', 'School', 'Company') )->default('Individual');
 */
?>