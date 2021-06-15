<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Agents extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $agents = new FieldsBuilder('agents');

        $agents
            ->setLocation('post_type', '==', 'agents');

        $agents
            ->addText('sub-title', [
                'label' => 'Sub Title'
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
