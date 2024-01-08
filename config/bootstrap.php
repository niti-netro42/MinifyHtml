<?php

use Cake\Core\Configure;

if (!Configure::check('Netro42.MinifyHtml.factory')) {
    Configure::write('Netro42.MinifyHtml.factory', 'WyriHaximus\HtmlCompress\Factory::constructFastest');
}
