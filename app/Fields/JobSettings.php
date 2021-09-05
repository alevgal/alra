<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class JobSettings extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $jobSettings = new FieldsBuilder('job_settings');

        $jobSettings
            ->setLocation('post_type', '==', 'job_listing');

        $jobSettings
            ->addTextarea('short_description', [
                'label' => 'Short description',
                'new_lines' => 'wpautop'
            ])
            ->addGroup('salary', [
                'label' => 'Salary'
            ])
                ->addText('from', [
                    'label' => 'From',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ])
                ->addText('to', [
                    'label' => 'To',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ])
            ->endGroup()
            ->addPostObject('agent', [
                'label' => 'Agent',
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
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ])
            ->addWysiwyg('special_offer', [
                'label' => 'Special offer',
                'media_upload' => 0,
                'delay' => 1,
            ]);

        return $jobSettings->build();
    }
}
