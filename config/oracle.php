<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => '(DESCRIPTION =
                                (ADDRESS_LIST =
                                    (ADDRESS =
                                        (COMMUNITY = tcp.world)
                                        (PROTOCOL = TCP)
                                        (HOST = 192.168.10.16)
                                        (PORT = 1521)
                                    )
                                )
                                (CONNECT_DATA = (SID = PTPK)
                            )',
        'host'           => '192.168.10.16',
        'port'           => '1521',
        'database'       => 'PTPK',
        'username'       => 'ptpk',
        'password'       => 'ptpk6615',
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
        'edition'        => env('DB_EDITION', 'ora$base'),
    ],
];
