<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;
class tawktoPlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onAssetsInitialized' => ['onAssetsInitialized', 0]
        ];
    }
    public function onAssetsInitialized()
    {
        if ($this->isAdmin()) {
            return;
        }
        $siteId = trim($this->config->get('plugins.tawkto.siteId'));
        if ($siteId) {
            $init = "var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];
s1.async=true;
s1.src='https://embed.tawk.to/{$siteId}/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();";
            $this->grav['assets']->addInlineJs($init);
        }
    }
}
?>
