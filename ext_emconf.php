<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'filefill payload',
    'description' => 'Supplying working binary files for EXT:filefill',
    'category' => 'plugin',
    'author' => 'Schuler, J. Peter M.',
    'author_email' => 'j.peter.m.schuler@uni-due.de.de',
    'state' => 'stable',
    'version' => '0.6.2',
    'constraints' => [
        'depends' => [
            'filefill' => '*',
            'typo3' => '8.7.0-12.1.99'
        ]
    ]
 ];
