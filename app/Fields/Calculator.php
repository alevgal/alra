<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Calculator extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $calculator = new FieldsBuilder('calculator');

        $calculator
            ->setLocation('page_template', '==', 'template-recruiters.blade.php');

        $calculator
            ->addGroup('sliders', [
                'label' => 'Sliders',
            ])
                ->addGroup('billing_revenue', [
                    'label' => 'Billing Revenue'
                ])
                    ->addText('label', [
                        'label' => 'Label'
                    ])
                    ->addNumber('min', [
                        'label' => 'Min Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 0,
                    ])
                    ->addNumber('max', [
                        'label' => 'Max Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 100,
                    ])
                    ->addNumber('start', [
                        'label' => 'Start Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 50,
                    ])
                    ->addNumber('step', [
                        'label' => 'Step',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'default_value' => 1,
                    ])
                    ->addSelect('format', [
                        'label' => 'Format',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'choices' => [
                            'number'    => 'Number',
                            'money'    => 'Money',
                        ],
                        'default_value' => ['number'],
                        'return_format' => 'value',
                        'placeholder' => '',
                    ])

                ->endGroup()
                ->addGroup('salary_package', [
                    'label' => 'Salary Package'
                ])
                ->addText('label', [
                    'label' => 'Label'
                ])
                ->addNumber('min', [
                    'label' => 'Min Value',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '33.3333%',
                    ],
                    'default_value' => 0,
                ])
                ->addNumber('max', [
                    'label' => 'Max Value',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '33.3333%',
                    ],
                    'default_value' => 100,
                ])
                ->addNumber('start', [
                    'label' => 'Start Value',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '33.3333%',
                    ],
                    'default_value' => 50,
                ])
                ->addNumber('step', [
                    'label' => 'Step',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '50%',
                    ],
                    'default_value' => 1,
                ])
                ->addSelect('format', [
                    'label' => 'Format',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '50%',
                    ],
                    'choices' => [
                        'number'    => 'Number',
                        'money'    => 'Money',
                    ],
                    'default_value' => ['number'],
                    'return_format' => 'value',
                    'placeholder' => '',
                ])

                ->endGroup()
                    ->addGroup('working_hours', [
                        'label' => 'Working Hours'
                    ])
                    ->addText('label', [
                        'label' => 'Label'
                    ])
                    ->addNumber('min', [
                        'label' => 'Min Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 0,
                    ])
                    ->addNumber('max', [
                        'label' => 'Max Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 100,
                    ])
                    ->addNumber('start', [
                        'label' => 'Start Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 50,
                    ])
                    ->addNumber('step', [
                        'label' => 'Step',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'default_value' => 1,
                    ])
                    ->addSelect('format', [
                        'label' => 'Format',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'choices' => [
                            'number'    => 'Number',
                            'money'    => 'Money',
                        ],
                        'default_value' => ['number'],
                        'return_format' => 'value',
                        'placeholder' => '',
                    ])
                ->endGroup()
                ->addGroup('non_revenue', [
                    'label' => 'None Revenue Activity'
                ])
                    ->addText('label', [
                        'label' => 'Label'
                    ])
                    ->addNumber('min', [
                        'label' => 'Min Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 0,
                    ])
                    ->addNumber('max', [
                        'label' => 'Max Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 100,
                    ])
                    ->addNumber('start', [
                        'label' => 'Start Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 50,
                    ])
                    ->addNumber('step', [
                        'label' => 'Step',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'default_value' => 1,
                    ])
                    ->addSelect('format', [
                        'label' => 'Format',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'choices' => [
                            'number'    => 'Number',
                            'money'    => 'Money',
                        ],
                        'default_value' => ['number'],
                        'return_format' => 'value',
                        'placeholder' => '',
                    ])
                ->endGroup()
                ->addGroup('commute', [
                    'label' => 'Commute'
                ])
                    ->addText('label', [
                        'label' => 'Label'
                    ])
                    ->addNumber('min', [
                        'label' => 'Min Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 0,
                    ])
                    ->addNumber('max', [
                        'label' => 'Max Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 100,
                    ])
                    ->addNumber('start', [
                        'label' => 'Start Value',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '33.3333%',
                        ],
                        'default_value' => 50,
                    ])
                    ->addNumber('step', [
                        'label' => 'Step',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'default_value' => 1,
                    ])
                    ->addSelect('format', [
                        'label' => 'Format',
                        'required' => 0,
                        'wrapper' => [
                            'width' => '50%',
                        ],
                        'choices' => [
                            'number'    => 'Number',
                            'money'    => 'Money',
                        ],
                        'default_value' => ['number'],
                        'return_format' => 'value',
                        'placeholder' => '',
                    ])
                ->endGroup()
            ->endGroup()
        ->addWysiwyg('data-bottom-text', [
            'label' => 'Left column bottom text',
            'media_upload' => 0,
            'delay' => 1,
        ])
        ->addWysiwyg('amplifier-bottom-text', [
            'label' => 'Amplifier bottom text',
            'media_upload' => 0,
            'delay' => 1,
        ]);

        return $calculator->build();
    }
}
