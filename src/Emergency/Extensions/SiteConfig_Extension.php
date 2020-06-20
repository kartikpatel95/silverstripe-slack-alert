<?php

namespace App\Emergency\Extensions;

use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\ArrayData;
use SilverStripe\View\SSViewer;
use TractorCow\Colorpicker\Color;
use TractorCow\Colorpicker\Forms\ColorField;

/**
 * Class SiteConfig_Extension
 * @package App\Emergency\Extensions
 */
class SiteConfig_Extension extends DataExtension
{
    private static $db = [
        'AlertMessage' => 'HTMLText',
        'AlertColor' => Color::class
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            FieldGroup::create([
                ColorField::create('AlertColor', 'Color'),
                HTMLEditorField::create('AlertMessage', 'Alert Message')
            ])->setTitle('Alert Section')
        );
    }

    public function getAlert()
    {
        return SSViewer::execute_template(
            'App\\Emergency\\Alert',
            ArrayData::create([
                'Message' => $this->owner->AlertMessage,
                'Color' => $this->owner->AlertColor
            ])
        );
    }
}
