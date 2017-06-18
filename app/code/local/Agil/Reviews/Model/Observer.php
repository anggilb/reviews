<?php

class Agil_Reviews_Model_Observer {
    public function sendReviewMail() {
        $days =  Mage::getStoreConfig('reviews/general/number_days');

        date_default_timezone_set('Europe/Madrid');
        $fromDate         = gmdate("Y-m-d H:i:s", gmmktime(0, 0, 0, gmdate("m"), gmdate("d") - $days, gmdate("Y")));
        $toDate           = gmdate("Y-m-d H:i:s", gmmktime(23, 59, 59, gmdate("m"), gmdate("d") - $days, gmdate("Y")));

        $ordercollection = Mage::getResourceModel('sales/order_collection')
            ->addAttributeToSelect('entity_id')
            ->addAttributeToSelect('created_at')
            ->addAttributeToFilter('created_at', array('from' => $fromDate, 'to' => $toDate))
            ->load();

        foreach ($ordercollection as $ordervalue) {
            $eid = $ordervalue->getEntityId();   
            $order = Mage::getModel("sales/order")->load($eid);
            $email = $order->getCustomerEmail();

            $titulo    = Mage::helper('reviews')->__('Title');
            $mensaje   = //TODO URL review
            $cabeceras = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($email, $titulo, $mensaje, $cabeceras);
        }
    } 
}