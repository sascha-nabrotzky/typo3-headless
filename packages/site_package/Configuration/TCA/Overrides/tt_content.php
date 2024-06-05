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

// --div--; --> Registers a new Tab 
//  LLL:EXT:....; --> The title of the Tab which in this case it is placed under the Language folder of your extension
// The third part defines which fields are going to be displayed and in which sequence.
// --palettes--; --> Inserts the palette you have previously defined
// LLL:EXT:....;  --> The title of the Palette which in this case it is placed under the Language folder of your extension
// The name of your palette
$GLOBALS['TCA']['tt_content']['types']['site_package_newcontentelement'] = [
    'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
               --palette--;;general,
               --palette--;;headers,
               bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;;frames,
                --palette--;;appearanceLinks,
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