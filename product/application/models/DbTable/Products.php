<?php
/**
* ProductsDBTable
*
* @package     Product
* @subpackage  -
* @copyright   siesta
* @license     GNU General Public License
* @author	   siesta <cihangir.savas@tart.com.tr>
*
*/

class Application_Model_DbTable_Products extends Zend_Db_Table_Abstract
{

    protected $_name = 'products_db';
    
    
	/**
	 * Gets product id  and returns the associated product row
	 *
	 * @param integer $id    	   
	 * @return array                
	 */
    public function getProducts($id) {
        
        $id=(int)$id;
        $satir=$this->find($id);
        //Zend_Debug::dump($satir); die;
        if($satir)
            return $satir->toArray();
        
    }
	/**
	 * Gets product $id, $name, $type and $email and 
	 * updates the table
	 *
	 * @param integer $id
	 * @param string  $name
	 * @param string  $type
	 * @param string  $email    	   
	 * @return array                
	 */
    public function updateProducts($id, $name, $type, $email) {
        
        $veri=array ('name'=>$name,'type'=>$type, 'email'=>$email);
        $this->update($veri, 'id = '. (int)$id);
       
    }
    
    
	/**
	 * Gets product $name, $type and $email and 
	 * persists into the table
	 *
	 * @param string  $name
	 * @param string  $type
	 * @param string  $email    	   
	 * @return array                
	 */
    public function addProducts($name, $type, $email) {
        
        $veri=array ('name'=>$name, 'type'=>$type, 'email'=>$email);
        $this->insert($veri);
        
    }


}

