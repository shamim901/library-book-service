<?php
return [
    'mode'                  => 'utf-8',
    'format'                => 'A4',
    'author'                => '',
    'subject'               => '',
    'keywords'              => '',
    'creator'               => 'Laravel Pdf',
    'display_mode'          => 'fullpage',
    'tempDir'               => base_path('../temp/')
];


return [
    'font_path'             => base_path('resources/fonts/'),
    'font_data' => [
                'solaimanlipi' => [
                    'R'  => 'SolaimanLipi.ttf',    // regular font
                    'B'  => 'SolaimanLipi.ttf',       // optional: bold font
                    'I'  => 'SolaimanLipi.ttf',     // optional: italic font
                    'BI' => 'SolaimanLipi.ttf', // optional: bold-italic font
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ]
                ]
];