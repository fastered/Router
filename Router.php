<?php

class Router
{
    protected $routes;
    protected $page_404;

    /**
     * Router constructor.
     * @param array $routes - массив с маршрутами, ключи являются нужный нам адрес,
     * @param string $page_404 - подключаемый файл если среди маршрутов отсуствует запроешенный
     */
    function  __construct($routes = [], $page_404 = '')
  {
      $this->routes = $routes;
      $this->page_404 = $page_404;
  }

    /**
     * @return string - вернет чистый url, без GET параметрами
     */
    protected function get_only_url()
  {
      $route = explode('?',$_SERVER['REQUEST_URI'],'2');
      return  mb_strtolower($route[0]);
  }

    /**
     * @return string - вернет адрес скрипта для подключения, или 404 если его не найдет
     */
    protected function getScript()
  {
      $url = mb_strtolower($this->get_only_url());

      if(array_key_exists($url,$this->routes) ){
          return $this->routes[$url];
      };
      return $this->page_404;
  }

    /**
     * Подключает нужный скрипт
     */
    public function includes_page(){
      require $this->getScript();
  }


}