  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $redirect = $this->getRedirect($this->getRoute()->getObject()) ? $this->getRedirect($this->getRoute()->getObject()) : '@<?php echo $this->getUrlForAction('list') ?>';

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect($redirect);
  }
