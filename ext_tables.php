<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'New Years Header'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'New Years Header');

$extensionName = strtolower(t3lib_div::underscoredToUpperCamelCase($_EXTKEY));
$pluginName = strtolower('pi1');
$pluginSignature = $extensionName.'_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/NewYearsHeader.xml');



?>