<?php

declare(strict_types=1);
defined('TYPO3') or die();

// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        // title
        'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang.xlf:site_package_newcontentelement_title',
        // plugin signature: extkey_identifier
        'value' => 'site_package_newcontentelement',
        // icon identifier
        'icon' => 'content-text',
        // group
        'group' => 'common',
        // description
        'description' => 'LLL:EXT:site_package/Resources/Private/Language/locallang.xlf:site_package_newcontentelement_description',
    ],
    'textmedia',
    'after'
);

// Adds the content element icon to TCA typeicon_classes
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['site_package_newcontentelement'] = 'content-text';

// Configure the default backend fields for the content element
$GLOBALS['TCA']['tt_content']['types']['site_package_newcontentelement'] = [
    'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
               --palette--;;general,
               header; Internal title (not displayed),
               bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
               --palette--;;hidden,
               --palette--;;access,
         ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],
    ],
];