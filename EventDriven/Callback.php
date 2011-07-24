<?php
/**
 * Callback
 * 
 * @package     EventDriven
 * @subpackage  -
 * @copyright   siesta
 * @license     GNU General Public License
 * @author      siesta <cihangir.savas@tart.com.tr>
 *
 */
class Callback
{

    public $method;
    public $context;

    public function __construct($method, $context)
    {
        $this->method = $method;
        $this->context = $context;
    }

}

?>
