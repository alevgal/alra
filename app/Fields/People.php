<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class People extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $agents = new FieldsBuilder('people');

        $agents
            ->setLocation('post_type', '==', 'people');

        $agents
            ->addText('sub-title', [
                'label' => 'Sub Title'
            ])
            ->addText('education', [
                'label' => 'Education'
            ])
            ->addTextarea('short-description', [
                'label' => 'Short Description',
                'new_lines' => 'wpautop',
            ])
            ->addWysiwyg('practice_areas', [
                'label' => 'Practice Areas',
                'media_upload' => 0,
                'delay' => 1,
            ])
            ->addWysiwyg('recent_placements', [
                'label' => 'Recent Placements',
                'media_upload' => 0,
                'delay' => 1,
            ])
            ->addText('email', [
                'label' => 'Email'
            ])
            ->addText('phone', [
                'label' => 'Phone'
            ])
            ->addText('mobile', [
                'label' => 'Mobile Phone'
            ]);

        return $agents->build();
    }
}
