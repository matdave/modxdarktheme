<?php
use xPDO\Transport\xPDOTransport;
use MODX\Revolution\modX;
/**
 * Ask if we set the new theme as current theme for the manager
 *
 * @package modxdarktheme
 * @subpackage build
 */

if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            $modx =& $object->xpdo;

            if( isset($options['set_default']) ){

                $modx->log(modX::LOG_LEVEL_INFO,'Set the theme as default for the manager...');

                /* Set the themme as default */
                $setting = $modx->getObject('modSystemSetting',array(
                    'key' => 'manager_theme',
                ));

                $value = $setting->get('value');
                if($value == 'default'){
                    $setting->set('value', 'darktheme');
                    $setting->save();
                }

                unset($settings, $setting, $value);
                $modx->log(modX::LOG_LEVEL_INFO,'Refresh your browser to view the trendy theme in action!');
            }
            break;
        /* Does not work */
        case xPDOTransport::ACTION_UNINSTALL:

            $modx =& $object->xpdo;

            $setting = $modx->getObject('modSystemSetting',array(
                'key' => 'manager_theme',
            ));
            $value = $setting->get('value');
            if($value == 'darktheme'){
                $setting->set('value', 'default');
                $setting->save();
            }
            unset($settings, $setting, $value);
            $modx->log(modX::LOG_LEVEL_INFO,'Refresh your browser to reload the default theme');
            break;
    }
}
return true;
