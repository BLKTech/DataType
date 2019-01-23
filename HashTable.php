<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exception
 *
 */
namespace BLKTech\DataType;
class HashTable implements \Iterator
{   
    public static function getHashTableFromArray($array)
    {
        return new HashTable ($array);
    }

    private $_;
    public function __construct($array = array())
    {
        if(!is_array($array))
            throw new InvalidArrayException ($array);

        $this->_= $array;
    }
    
    public function get($key,$default = null){return isset($this->_[$key])?$this->_[$key]:$default;}    
    public function set($key,$value){$this->_[$key] = $value; return $this;}
    public function remove($key){if(isset($this->_[$key]))unset($this->_[$key]);}    
    public function exists($key){return isset($this->_[$key]);}
    public function count(){return count($this->_);}
    public function getIterator(){return new \ArrayIterator($this->_);}
    public function current(){return current($this->_);}
    public function key(){return key($this->_);}
    public function next(){next($this->_);}   
    public function rewind(){reset($this->_);}
    public function valid(){return $this->key()!==null;}
    
}
