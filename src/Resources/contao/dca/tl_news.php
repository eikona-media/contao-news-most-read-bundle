<?php
/**
 * Contao - News most read bundle
 *
 * Created by MEN AT WORK Werbeagentur GmbH
 *
 * @copyright  MEN AT WORK Werbeagentur GmbH 2018
 * @author     Sven Meierhans <meierhans@men-at-work.de>
 */

/**
 * Extend palettes
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addLegend('read_count_legend', 'publish_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(
        [ 'read_count' ],
        'read_count_legend',
        PaletteManipulator::POSITION_APPEND
    )
    ->applyToPalette('default', 'tl_news');

/**
 * Add DCA field to track read count...
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['read_count'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_news']['read_count'],
    'inputType' => 'text',
    'eval'      => [ 'rgxp' => 'digit', 'tl_class' => 'w50' ],
    'sql'       => "int(11) unsigned NOT NULL DEFAULT '0'",
];
