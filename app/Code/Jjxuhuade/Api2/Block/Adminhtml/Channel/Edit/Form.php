<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Custom Variable Edit Form
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Jjxuhuade\Api2\Block\Adminhtml\Channel\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $_systemStore;
    
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    /**
     * Getter
     *
     * @return \Magento\Variable\Model\Variable
     */
    public function getObj()
    {
        return $this->_coreRegistry->registry('current_obj');
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return \Magento\Variable\Block\System\Variable\Edit\Form
     */
    protected function _prepareForm()
    {
        $model=$this->getObj();
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $fieldset = $form->addFieldset('base', ['legend' => __('channel'), 'class' => 'fieldset-wide']);

        $fieldset->addField(
            'order_id',
            'text',
            [
                'name' => 'order_id',
                'label' => __('order_id'),
                'title' => __('order_id'),
                'required' => true,
                //'class' => 'validate-xml-identifier'
            ]
        );

        $fieldset->addField(
            'code',
            'textarea',
            ['name' => 'code', 'label' => __('code'), 'title' => __('code'), 'required' => true]
        );



        $fieldset->addField(
            'total',
            'text',
            [
                'name' => 'total',
                'label' => __('total'),
                'title' => __('total'),
                'required' => true,
                //'class'=>'integer',
                'class'=>'validate-number',
                //'class'=>'validate-email',
            ]
            
        );
        
        /**
         * Check is single store mode
         */
        if (!$this->_storeManager->isSingleStoreMode()) {
            $field = $fieldset->addField(
                'store_id',
                'select',
                [
                    'name' => 'store_id',
                    'label' => __('Store View'),
                    'title' => __('Store View'),
                    'required' => true,
                    'values' => $this->_systemStore->getStoreValuesForForm(false, true),
                ]
            );
            $renderer = $this->getLayout()->createBlock(
                'Magento\Backend\Block\Store\Switcher\Form\Renderer\Fieldset\Element'
            );
            $field->setRenderer($renderer);
        } else {
            $fieldset->addField(
                'store_id',
                'hidden',
                ['name' => 'store_id', 'value' => $this->_storeManager->getStore(true)->getId()]
            );
            $model->setStoreId($this->_storeManager->getStore(true)->getId());
        }
        
        $fieldset->addField(
            'status',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'status',
                'required' => true,
                'options' => ['disable','enable'],
            ]
        );


        $form->setValues($this->getObj()->getData())->addFieldNameSuffix('channel')->setUseContainer(true);

        $this->setForm($form);
        return parent::_prepareForm();
    }
}
