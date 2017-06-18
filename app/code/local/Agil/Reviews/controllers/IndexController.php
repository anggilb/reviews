<?php

class Agil_Reviews_IndexController extends Mage_Core_Controller_Front_Action {       
    public function indexAction() {
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');
        $list = Mage::getModel('agil_reviews/review')->getCollection()->getData();
        Mage::register('list', $list);
        $this->renderLayout();
    }

    public function addAction() {
        $order_id = $this->getRequest()->getParam('order_id');
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');
        Mage::register('order_id', $order_id);
        $this->renderLayout();
    }

    public function postAction()
    {
        $params = $this->getRequest()->getParams();
        if ($params) {
            try {
                $review = Mage::getModel('agil_reviews/review');

                $error = false;

                if (!Zend_Validate::is(trim($params['order_id']) , 'NotEmpty')) {
                    $error = true;
                }
                $review->setOrderId($params['order_id']);

                if (!Zend_Validate::is(trim($params['delivery']) , 'NotEmpty')) {
                    $error = true;
                }
                $review->setDelivery($params['delivery']);

                if (!Zend_Validate::is(trim($params['product']) , 'NotEmpty')) {
                    $error = true;
                }
                $review->setProduct($params['product']);

                if (!Zend_Validate::is(trim($params['customer_care']), 'NotEmpty')) {
                    $error = true;
                }
                $review->setCustomerCare($params['customer_care']);

                if (!Zend_Validate::is(trim($params['comment']), 'NotEmpty')) {
                    $error = true;
                }
                $review->setComment($params['comment']);

                if ($error) {
                    throw new Exception();
                }

                $review->save();

                Mage::getSingleton('customer/session')->addSuccess(Mage::helper('reviews')->__('Your review has been successfully completed, please wait for your review to be published by one of our managers.'));
                $this->_redirect('*/*/');

                return;
            } catch (Exception $e) {
                Mage::getSingleton('customer/session')->addError(Mage::helper('reviews')->__('Unable to submit your review. Please, try again later'));
                $this->_redirect('*/*/');
                return;
            }

        } else {
            $this->_redirect('*/*/');
        }
    }
}
