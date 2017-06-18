<?php

class Agil_Reviews_Block_Adminhtml_Reviews_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
   public function __construct()
   {
        parent::__construct();
        $this->setId('reviewsGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
   }

   protected function _prepareCollection()
   {
      $collection = Mage::getModel('agil_reviews/review')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
    }

   protected function _prepareColumns()
   {
       $this->addColumn('id',
             array(
                    'header' => 'ID',
                    'align' =>'center',
                    'width' => '50px',
                    'index' => 'id',
               ));

       $this->addColumn('order_id',
               array(
                    'header' => 'Order ID',
                    'align' =>'center',
                    'index' => 'order_id',
              ));
       
       $this->addColumn('delivery',
               array(
                    'header' => 'Delivery',
                    'align' =>'center',
                    'width' => '50px',
                    'index' => 'delivery',
              ));

       $this->addColumn('product',
               array(
                    'header' => 'Product',
                    'align' =>'center',
                    'width' => '50px',
                    'index' => 'product',
              ));
       
       $this->addColumn('customer_care',
               array(
                    'header' => 'Customer Care',
                    'align' =>'center',
                    'width' => '50px',
                    'index' => 'customer_care',
              ));
       
       $this->addColumn('comment',
               array(
                    'header' => 'Comment',
                    'align' =>'left',
                    'index' => 'comment',
              ));
       
       $this->addColumn('approved',
               array(
                    'header' => 'Approved',
                    'align' =>'center',
                    'width' => '50px',
                    'index' => 'approved',
                    'type'  => 'options',
                    'options' => array(0 => 'NO', 1 => 'SI'),
              ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
         return null;
    }
    
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
    
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('id');

        $this->getMassactionBlock()
                ->addItem('approve', array(
                    'label'=> Mage::helper('reviews')->__('Approve'),
                    'url'  => $this->getUrl('*/*/massApprove', array('' => '')),
                    'confirm' => Mage::helper('review')->__('Are you sure?')
                ))
                ->addItem('disapprove', array(
                    'label'=> Mage::helper('reviews')->__('Disapprove'),
                    'url'  => $this->getUrl('*/*/massDisapprove', array('' => '')),
                    'confirm' => Mage::helper('reviews')->__('Are you sure?')
                ));

        return $this;
    }
}