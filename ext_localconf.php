<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

require_once(t3lib_extMgm::extPath($_EXTKEY) . '/Lib/MCAPI.class.php');

if(!defined('T3CHIMP_API_KEY')) {
    $global = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
    define('T3CHIMP_API_KEY', $global['apiKey']);
}

$TYPO3_CONF_VARS['BE']['AJAX'][$_EXTKEY] = t3lib_extMgm::extPath($_EXTKEY).'Lib/AjaxDispatcher.php:Tx_AjaxDispatcher->dispatch';
$TYPO3_CONF_VARS['FE']['eID_include'][$_EXTKEY] = t3lib_extMgm::extPath($_EXTKEY).'Lib/AjaxDispatcher.php';

Tx_Extbase_Utility_Extension::configurePlugin(
    $_EXTKEY,
    'subscription',
    array(
        'Subscriptions' => 'index,subscribe,unsubscribe'
    ),
    array(
        'Subscriptions' => 'index,subscribe,unsubscribe'
    )
);

function tx_t3chimp_debug() {
    $global = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['t3chimp']);
    return $global['debug'];
}