<?php

namespace App\Services;

class Lang
{
    private $storage = [];
    
    public function __construct($storage = []) {
        $this->storage = $storage;
    }

    public function set($key, $value) {
        $this->storage[$key] = $value;
    }
    
    public function get($key) {
        if (isset($this->storage[$key])) {
            return $this->storage[$key];
        }
        
        throw new \Exception('Lang value by key = ' . $key . 'not found');
    }
    
    public function getAll() {
        return $this->storage;
    }
    
    public function toJson() {
        return json_encode($this->storage);
    }
}
