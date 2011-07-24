<?php
/**
 * Event
 * 
 * @package     EventDriven
 * @subpackage  -
 * @copyright   siesta
 * @license     GNU General Public License
 * @author      siesta <cihangir.savas@tart.com.tr>
 *
 */
require_once 'Callback.php';

class Event
{

    private $callbacks;

    public function __construct()
    {
        $this->callbacks = array();
    }

    private function getCallback($args)
    {
        return (count($args) < 2) ? new Callback($args[0], '') : new Callback($args[1], get_class($args[0]));
    }

    public function subscribe()
    {
        $callback = $this->getCallback(func_get_args());
        if (!in_array($callback, $this->callbacks))
        {
            $this->callbacks[] = $callback;
        }
        else
            throw new Exception($callback->method . ' already subscribed to this event');
    }

    public function unsubscribe()
    {
        $callback = $this->getCallback(func_get_args());
        $key = array_search($callback, $this->callbacks);
        if (!($key === false))
        {
            unset($this->callbacks[$key]);
        }
        else
            throw new Exception($callback->method . ' not subscribed to this event');
    }

    public function raise()
    {
        foreach ($this->callbacks as $callback) {
            if (method_exists($callback->context, $callback->method) || function_exists($callback->method))
            {
                $params = func_get_args();
                $callback = (!empty($callback->context)) ? array($callback->context, $callback->method) : $callback->method;
                call_user_func_array($callback, $params);
            }
            else
                throw new Exception($callback->method . " does not exist");
        }
    }

}

?>
