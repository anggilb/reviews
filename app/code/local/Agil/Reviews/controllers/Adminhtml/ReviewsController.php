<?php
 
class Agil_Reviews_Adminhtml_ReviewsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Reviews'))->_title($this->__('Reviews'));
        $this->loadLayout();
        $this->_setActiveMenu('agil/reviews');
        $this->_addContent($this->getLayout()->createBlock('agil_reviews/adminhtml_reviews_grid'));
        $this->renderLayout();
    }
 
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('agil_reviews/adminhtml_reviews_grid')->toHtml()
        );
    }
    
    public function massApproveAction()
    {
        $ids = $this->getRequest()->getParam('id');
        if(!is_array($ids)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('reviews')->__('Please select review(s).'));
        } else {
            try {
                $model = Mage::getModel('agil_reviews/review');
                foreach ($ids as $id) {
                    $model->load($id)->setApproved(1)->save();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('reviews')->__('Total of %d record(s) were approved.', count($ids)));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }
    
    public function massDisapproveAction()
    {
        $ids = $this->getRequest()->getParam('id');
        if(!is_array($ids)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('reviews')->__('Please select review(s).'));
        } else {
            try {
                $model = Mage::getModel('agil_reviews/review');
                foreach ($ids as $id) {
                    $model->load($id)->setApproved(0)->save();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('reviews')->__('Total of %d record(s) were disapproved.', count($ids)));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }
}