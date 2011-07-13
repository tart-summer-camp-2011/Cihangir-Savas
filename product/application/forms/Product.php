<?php
/**
* Product
*
* @package     Product
* @subpackage  -
* @copyright   siesta
* @license     GNU General Public License
* @author	   siesta <cihangir.savas@tart.com.tr>
*
*/

class Application_Form_Product extends Zend_Form
{

    public function init()
    {
        
	/* we have labeled the form as product */
        
	$this->setName('product');
        
        
	/* we are creating the hidden id element
	 * of the form which holds the id of the product
	 * and added an Int filter to avoid problems
     */
	$id = new Zend_Form_Element_Hidden('id');
	$id->addFilter('Int');
        
	/*
	 * we are creating a text area for product name
	 * it is a string place and length between 3 to 20
     * and also is a required area
	 */
        
	$this->addElement( 'text', 'name', array(
						'label' => 'Adi',
						'validators'  => array(
					 	 array('StringLength', 
        							false, 
									'encoding'=>'UTF-8',
        							array( 3, 20, 'messages' => array(  Zend_Validate_StringLength::INVALID   =>  'En az 3 en fazla 20 karakter girmelisiniz',
         		 	  													Zend_Validate_StringLength::TOO_SHORT =>  'Cok kısa girdiniz',
          			  													Zend_Validate_StringLength::TOO_LONG  =>  'Cok uzun gidiniz' ) ) ),
                           ),
            'required'   => true,
        ));
        
        
       

        
        
	/*
	 * we are creating a text area for product type
	 * it is a string place and length between 3 to 20
     * and also is a required area
	 */     
     $this->addElement( 'text', 'type', array(
     'label' => 'Tipi',
     'validators'  => array(
                  array('StringLength', 
                                 false, 
                                 'encoding'=>'UTF-8',
                                 array( 3, 20, 'messages' => array(  Zend_Validate_StringLength::INVALID   =>  'En az 3 en fazla 20 karakter girmelisiniz',
         		 	  													Zend_Validate_StringLength::TOO_SHORT =>  'Cok kısa girdiniz',
          			  													Zend_Validate_StringLength::TOO_LONG  =>  'Cok uzun gidiniz') ) ),
                            ),
     'required'   => true,
    ));
            
        
	/*
	 * we are creating a text area for product email (what ! how come products have emails :) in zend they have)
	 * it is a string place
     * and also is a required area
	 */        
     $this->addElement('text', 'email', array(
    'label' => 'E-Posta',
    'required'  => true,
    'validators'=> array(
     array('EmailAddress', false, array( 'messages' => array(
     	Zend_Validate_EmailAddress::INVALID => 'Duzgun bir e posta adresi giriniz!',
 	    Zend_Validate_EmailAddress::INVALID_FORMAT =>  'düzgün formatta e posta adresi giriniz!',
 	    Zend_Validate_EmailAddress::INVALID_HOSTNAME =>  'host adresi uygun değildir!',
 	    Zend_Validate_EmailAddress::INVALID_MX_RECORD =>  'Duzgun bir e posta adresi giriniz!',
 	    Zend_Validate_EmailAddress::INVALID_SEGMENT =>  'Duzgun bir e posta adresi giriniz!',
 	    Zend_Validate_EmailAddress::DOT_ATOM =>  'Duzgun bir e posta adresi giriniz!',
 	    Zend_Validate_EmailAddress::QUOTED_STRING =>  'Duzgun bir e posta adresi giriniz!',
 	    Zend_Validate_EmailAddress::INVALID_LOCAL_PART =>  'Duzgun bir e posta adresi giriniz!',
  	   Zend_Validate_EmailAddress::LENGTH_EXCEEDED =>  'Duzgun bir e posta adresi giriniz!', ) ) ),

     ),
     ));
                
                          

    // Global Element Filters. All elements should be trimmed
	$this->setElementFilters( array( 'StringTrim', 'StripTags' ) );    
        
        
	/*
	 * we are creating a submit button for product 
	 * it is a string place
     * and also is a required area
	 */         
        
     $submit= new Zend_Form_Element_Submit('submit');
     $submit->setAttrib('id', 'submitbutton');
     $this->addElements(array($id, $submit));  
        
    }


}

?>