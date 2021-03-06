<?php
/**
 * Created by PhpStorm.
 * User: zhaoye
 * Date: 16/9/14
 * Time: 下午5:16
 */

namespace socket;
use ZPHP\Core\Log;

class Controller {
    /**
     * @var $response
     */
    public $response;
    public $method;

    public function apiStart(){
        $result = call_user_func([$this, $this->method]);
        $result = json_encode($result);
        Log::write('result:'.($result));
        $this->response->end($result);

    }


    public function coroutineApiStart(){
        $result = yield call_user_func([$this, $this->method]);
        $result = json_encode($result);
        Log::write('result:'.($result));
        $this->response->end($result);
    }
}