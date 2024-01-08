<?php declare(strict_types=1);

namespace Netro42\MinifyHtml\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;
use function Netro42\MinifyHtml\compress;

/**
 * Class MinifyHtmlHelper
 * @package Netro42\MinifyHtml\View\Helper
 */
class MinifyHtmlHelper extends Helper
{
    /**
     * @var array
     */
    protected $mimeTypes = [
        'text/html',
        'text/xhtml',
    ];

    public function afterLayout()
    {
        if ((
                !Configure::read('debug') ||
                Configure::read('Netro42.MinifyHtml.debugOverride')
            ) &&
            in_array($this->_View->getResponse()->getType(), $this->mimeTypes)
        ) {
            $content = $this->_View->fetch('content');
            $content = compress($content);
            $this->_View->assign('content', $content);
        }
    }
}
