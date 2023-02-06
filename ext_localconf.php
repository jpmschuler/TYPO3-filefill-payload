<?php
defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['filefill']['resourceHandler']['staticbinaries'] = [
    'title' => 'Static binary resources',
    'handler' => \Jpmschuler\FilefillPayload\Resource\Handler\StaticBinariesResourceHandler::class,
    'config' => [
        'label' => 'List of file extensions for replacement with staticBinaries',
        'config' => [
            'type' => 'input',
            'default' => '7z,avi,ext,flv,mov,mp4,pdf,rar,rm,webm,zip',
        ],
    ],
];
