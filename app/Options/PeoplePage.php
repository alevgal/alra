<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class PeoplePage extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Page settings';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'people-page';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'People Page Settings';

    /**
     * The option page permission capability.
     *
     * @var string
     */
    public $capability = 'edit_theme_options';

    /**
     * The option page menu position.
     *
     * @var int
     */
    public $position = PHP_INT_MAX;

    /**
     * The slug of another admin page to be used as a parent.
     *
     * @var string
     */
    public $parent = 'edit.php?post_type=people';

    /**
     * The option page menu icon.
     *
     * @var string
     */
    public $icon = null;

    /**
     * Redirect to the first child page if one exists.
     *
     * @var boolean
     */
    public $redirect = true;

    /**
     * The post ID to save and load values from.
     *
     * @var string|int
     */
    public $post = 'options';

    /**
     * The option page autoload setting.
     *
     * @var bool
     */
    public $autoload = true;

    /**
     * Localized text displayed on the submit button.
     *
     * @return string
     */
    public function updateButton()
    {
        return __('Update', 'acf');
    }

    /**
     * Localized text displayed after form submission.
     *
     * @return string
     */
    public function updatedMessage()
    {
        return __('People Page Updated', 'acf');
    }

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $agentsPage = new FieldsBuilder('agents_page');

        $agentsPage
            ->addText('agents-title', [
                'label' => 'Page title'
            ])
            ->addText('agents-sub-title', [
                'label' => 'Page sub title'
            ])
            ->addGroup('agents_bottom_section', [
                'label' => 'Bottom Section',
                'instructions' => '',
                'layout' => 'block',
            ])
            ->addTextarea('text_top',  [
                'label' => 'Text top',
                'new_lines' => 'br',
            ])
            ->addTextarea('text_bottom', [
                'label' => 'Text bottom',
                'new_lines' => 'br',
            ])
            ->addRepeater('buttons', [
                'label' => 'Buttons',
                'layout' => 'block',
                'button_label' => 'Add Button',
                'min' => 0,
                'max' => 2,
            ])
            ->addText('text', [
                'label' => 'Text',
                'wrapper' => [
                    'width' => '40%',
                ],
            ])
            ->addText('link', [
                'label' => 'Link',
                'wrapper' => [
                    'width' => '40%',
                ],
            ])
            ->addSelect('style', [
                'label' => 'Style',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '20%',
                ],
                'choices' => [
                    'light-blue' => 'Blue',
                    'transparent'   => 'Transparent'
                ],
                'default_value' => [],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ])
            ->endRepeater()
            ->endGroup();

        return $agentsPage->build();
    }
}
