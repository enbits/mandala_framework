<?php

class validation {
    
    public $rules = null;
	public $result = array();
        /*
         * Rules Example:
         * array(
               'email' => array('required' => 'Please enter your e-mail.',
                   'email' => 'The e-mail you entered is incorrect.'),
                   'password' => array('required' => 'Please enter your password.',
                   'min_length=4' => 'The password must contain at least 4 characters')
           );
         */
		 
    public static function email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL); 
    }
    
    public static function ip($ip) {
       return filter_var($ip, FILTER_VALIDATE_IP); 
    }
    
    public static function url($url) {
        return filter_var($ip, FILTER_VALIDATE_URL);
    }
	
	protected function required($value) {
		return strlen($value) !== 0;
	}
	
	protected function min_length($value,$length) {
		return strlen($value) >= $length;
	}
	
	protected function max_length ($value,$length) {
		return strlen($value) <= $length;
	}
	
	public function validate($values) 
	{
		//unset($values['html']);
		//die(var_dump($values));
		if(!is_array($this->rules)) {
			return true;
		}
		foreach ($this->rules as $name => $rules) {
			if (array_key_exists($name,$values)) {
				foreach ($rules as $rule => $message) {
					if (strpos($rule,'=') > 0) {
						$rule_data = explode('=',$rule);
						$rule = $rule_data[0];
						$param = $rule_data[1];
						if ($this->$rule($values[$name],$param) === false) {
							$this->result[$name] = $message;
							break; 		
						}
					} else {
						if (!$this->$rule($values[$name])) {
							$this->result[$name] = $message;	
							break;
						}
					}
				}
			}
		}
		return count($this->result) > 0 ? false:true;
	}
}