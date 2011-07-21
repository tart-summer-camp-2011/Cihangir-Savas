<?php

/**
 * This code is part of the sniff security demo application
 *
 * *** DO NOT USE IN ANY TYPE OF PRODUCTION ***
 *
 * The application is stripped down and contains various security issues to be found
 * by course attendees. It is not ment to be used as an actual social network or a
 * base for one.
 *
 * @author Arne Blankerts <arne@thephp.cc>
 * @copyright 2010 thePHP.cc - the PHP consulting company, Germany
 *
 */
class sniffRequest
{

    protected $input;
    protected $params;

    public function __construct(Array $request, Array $session)
    {
        $this->input = $this->filterParameters($request);
        $this->session = $this->filterParameters($session);
    }

    public function setParams(Array $params)
    {
        $this->params = $this->filterParameters($params);
    }

    public function getValue($key)
    {
        if (isset($this->input[$key])) {
            return $this->input[$key];
        }

        if (isset($this->session[$key])) {
            return $this->session[$key];
        }

        if (isset($this->params[$key])) {
            return $this->params[$key];
        }

        return null;
    }
    
    /**
     * Gets all parameters and if the value is a string
     * performs a filtering against SQL inj.
     * 
     * @param type $array
     * @return type array
     */
    public function filterParameters($array)
    {

        // Check if the parameter is an array
        if (is_array($array)) {
            // Loop through the initial dimension
            foreach ($array as $key => $value) {
                // Check if any nodes are arrays themselves
                if (is_array($array[$key]))
                // If they are, let the function call itself over that particular node
                    $array[$key] = $this->filterParameters($array[$key]);

                // Check if the nodes are strings
                if (is_string($array[$key]))
                // If they are, perform the real escape function over the selected node
                    $array[$key] = mysql_real_escape_string($array[$key]);
            }
        }
        // Check if the parameter is a string
        if (is_string($array))
        // If it is, perform a  mysql_real_escape_string on the parameter
            $array = mysql_real_escape_string($array);

        // Return the filtered result
        return $array;
    }

}