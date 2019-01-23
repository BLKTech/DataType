<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BLKTech\DataType;

/**
 * Description of Header
 *
 */
class Query extends HashTable
{
    private static function getFromGlobals()
    {
        $_ = new self();        
        foreach($_GET as $key => $value)
        {
            $_->set(trim($key), $value);
        }        
        return $_;                
    }

    public static function getFromString($string) 
    {
        $_ = new self();        
        foreach (explode("&", $string) as $element)
        {
            $element = explode('=', $element, 2);
            
            if(count($element)==2)
                $value = urldecode(trim($element[1]));
            else
                $value = null;

            $_->set(urldecode(trim($element[0])), $value);
        }
        return $_;         
    }
    
        
    public function __toString() 
    {
        $_ = '';
        foreach($this as $key=>$value)
        {
            if($key==null)
                continue;
            
            if($_!='')
               $_ .= '&';
            
            $_ .= urlencode($key);
            
            if($value!==null)
                $_ .= '=' . urlencode($value);
            
        }
        return $_;
    }    
}
