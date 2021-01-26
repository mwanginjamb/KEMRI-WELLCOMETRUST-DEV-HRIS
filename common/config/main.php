<?php
 //use kartik\mpdf\Pdf;
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'KEMRI - ESS',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.softeboard.com',
                'username' => 'customer@softeboard.com',
                'password' => '@Customer1220#*',
                'port' => '587',
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:server=keklf-sql55\powerpivot;database=KEMRI_HRMIS_UAT', //KEKLF-SQL55\POWERPIVOT
            'username' => 'ess',
            'password' => 'ess123',
            'charset' => 'utf8',
        ],
        'nav' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:server=keklf-sql55\powerpivot;database=KEMRI_HRMIS_UAT', //172.16.12.185
            'username' => 'ess',
            'password' => 'ess123',
            'charset' => 'utf8',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => ['/plugins/jquery/jquery.js'],
                ]
            ]
        ],
        'navision' => [
            'class' => 'common\Library\Navision',
        ],
        'navhelper' => [
            'class' => 'common\Library\Navhelper',
        ],
        'recruitment' => [
            'class' => 'common\Library\Recruitment'
        ],
        'dashboard' => [
            'class' => 'common\Library\Dashboard'
        ],
        
    ],

];
