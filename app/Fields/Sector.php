<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Sector extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $sectorCategories = new FieldsBuilder('sector');

        $sectorCategories
            ->setLocation('taxonomy', '==', 'sector');

        $sectorCategories
            ->addText('title', [
                'label' => 'Title',
            ])
            ->addWysiwyg('title_right', [
                'label' => 'Title right',
                'delay' => 1,
                'media_upload' => 0,
            ])
            ->addPostObject('people', [
                'label' => 'People',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'post_type' => ['people'],
                'taxonomy' => [],
                'allow_null' => 0,
                'multiple' => 1,
                'return_format' => 'object',
                'ui' => 1,
            ]);

        return $sectorCategories->build();
    }
}
