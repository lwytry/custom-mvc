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

    /*
     * 简化配置文件
     */

    function config($str) {
        if (strpos($str, '.')) {
            $confArr = explode('.', $str);
            if (is_file(CORE . '/config/' . $confArr[0] . '.php')) {
                $conf =  include CORE . '/config/' . $confArr[0] . '.php';
                $val = '';
                $num = 0;
                foreach ($confArr as $k => $v) {
                    if ($k==0) continue;
                    if ($num == 0) {
                        if (isset($conf[$v])) {
                            $val = $conf[$v];
                        } else {
                            throw new \Exception('key not exists');
                        }
                        $num ++;
                    } else {
                        if (isset($val[$v])) {
                            $val = $val[$v];
                        } else {
                            throw new \Exception('key not exists');
                        }
                    }

                }
                return $val;
            } else {
                throw new \Exception("config file not exists");
            }
        } else {
            if (is_file(CORE . '/config/' . $str . '.php')) {
                return include CORE . '/config/' . $str . '.php';
            } else {
                throw new \Exception("config file not exists");
            }
        }
    }
?>