<?php
//app/Controller/TestController.php
class TestController extends AppController
{
  public function index()
  {
    $this->Car->setDatabase('cake_sandbox_client3');

    $cars = $this->Car->find('all');

    $this->set('cars', $cars);
  }

}
