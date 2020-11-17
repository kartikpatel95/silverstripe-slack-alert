<?php

namespace Alert\Extensions;

use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\FieldType\DBVarchar;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;
use TractorCow\Colorpicker\Forms\ColorField;

/**
 * Class SiteConfig_Extension
 *
 * @package App\Emergency\Extensions
 */
class SiteConfig_Extension extends DataExtension
{

    /**
     * @var string[]
     */
    private static $db = [
        'AlertMessage' => 'HTMLText',
        'AlertColor' => DBVarchar::class . '(7)'
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.SlackAlert',
            FieldGroup::create([
                ColorField::create('AlertColor', 'Color')->addExtraClass('w-100'),
                HTMLEditorField::create('AlertMessage', 'Alert Message')->addExtraClass('w-100')
            ])->setTitle('Alert Section')
        );
    }

    /**
     * @return string
     */
    public function getAlert()
    {
        Requirements::css('kartikpatel95/silverstripe-slack-alert:client/dist/alert.css');
        Requirements::javascript('https://code.jquery.com/jquery-3.5.1.min.js');
        Requirements::javascript('kartikpatel95/silverstripe-slack-alert:client/dist/alert.js');

        return SSViewer::execute_template(
            'Alert\\Alert',
            ArrayData::create([
                'Message' => $this->owner->AlertMessage,
                'Color' => $this->owner->AlertColor
            ])
        );
    }
}
