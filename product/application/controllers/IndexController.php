<?php
/**
* IndexController
* 
* @package     Product
* @subpackage  -
* @copyright   siesta
* @license     GNU General Public License
* @author	   siesta <cihangir.savas@tart.com.tr>
*
*/
class IndexController extends Zend_Controller_Action
{
	/*
 	* Initialize action controller here 
 	*/
	public function init()
	{
		
	}
	
	/**
	 * Shown when Index is called
	 *
	 * @return void             
	 */
	public function indexAction()
	{

		// action body
		$products = new Application_Model_DbTable_Products();
		$this->view->products=$products->fetchAll();
		
	}
	
	/**
	* Shown when List is called
	*
	* @return void
	* @todo Useless remove it!
	*/
	public function listAction()
	{
		// action body
	}

	/**
	* Shown when add is called
	*
	* @return void
	*/
	public function addAction()
	{
		$form = new Application_Form_Product();  
		//we created our form
		$form->submit->setLabel('Ekle');         
		//we have named the submit button with "Ekle"
		$this->view->form = $form;               
		//we have send to view to render

		if($this->getRequest()->isPost()){
		//if form is submitted

			$formdata = $this->getRequest()->getPost();   
			//we have binded all parameters to formdata coming with post

			if($form->isValid($formdata)){
				//we have valid data

				$name = $form->getValue('name');        //name=$_POST['name']
				$type = $form->getValue('type');        //type=$_POST['type']
				$email = $form->getValue('email');      //type=$_POST['type']
				$newproduct = new Application_Model_DbTable_Products(); 
				//we just created an instance from db
				$newproduct->addProducts($name, $type, $email);                 
				$this->_helper->redirector('index');                    
				//we redirect to index action
				 
			} else {
				$form->populate($formdata);    
				//if from is not valid show data again!
			}

		}






	}

	public function updateAction()
	{
		$form= new Application_Form_Product(); //neseneyi oluştur
		$products = new Application_Model_DbTable_Products();
		$this->view->products=$products->getProducts($this->_getParam('id', 0));
	//	Zend_Debug::dump($products->getProducts($this->_getParam('id', 0)));die;
		$form->submit->setLabel('Guncelle');             // submit butonun adını güncelle koy
		$this->view->form =$form;                        //render edilmesi için view e gönder
		 
		if($this->getRequest()->isPost()){
			//form submit edilmiş ise devam et

			$formdata = $this->getRequest()->getPost();   //gönderilen verileri $formdata değişkenine aktardık

			if($form->isValid($formdata)){
				//verilerin doğruluğunu kontrl ettik
				$id= $this->_getParam('id', 0);
				//$id=(int)$form->getValue('id');
				 
				$name=$form->getValue('name');
				//Zend_Debug::dump($name); die;
				$type=$form->getValue('type');
				$type=$form->getValue('email');
				$products = new Application_Model_DbTable_Products();
				$products->updateProducts($id, $name, $type, $email);
				 
				$this->_helper->redirector('index');
			} else {
				$form->populate($formdata);
			}
			 
		} else {
			$id= $this->_getParam('id', 0);
			if($id>0){
				$products = new Application_Model_DbTable_Products();
				$form->populate($products->getProducts($id));
			}
		}
		 
	}


}





?>

