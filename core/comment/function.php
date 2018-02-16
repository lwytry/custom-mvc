<?php

	/**
	*	打印
	*	@param mixed $var
	*	@return void
	*/
	function dd($var) {
		if (is_bool($var)) {
			var_dump($var);die;
		} elseif (is_null($var)) {
			var_dump($var);die;
		} elseif (is_array($var)) {
			echo "<pre>";
			var_dump($var);die;
		} else {
			var_dump($var);die;
		}
	}


?>