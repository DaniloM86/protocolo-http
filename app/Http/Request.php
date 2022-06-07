<?php

namespace App\Http;
class Request{
    /** @var string variavél responsável por receber o tipo de requisição */
        private $httpMethod;
        /** @var string variavél responsável por receber o valor da uri */
    private $uri;
        /** @var array variavél responsável por receber os parâmetros da url */
    private $paramsUrl = [];
        /** @var array variavél responsável por receber o post no corpo da requisição */
    private $postVars = [];
        /** @var array variavél responsável por guardar as informações da 'Request' no cabeçalho da requisição   */
    private $headers = [];
        // MÉTODO CONSTRUTOR DA CLASSE
    public function __construct()
    {
        $this->paramsUrl  = $_GET ?? [];
            $this->postVars   = $_POST ?? [];
                $this->headers    = getallheaders();
                    $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
                        $this->uri        = $_SERVER['REQUEST_URI'] ?? '';
    }
        /** @return string método responsável por retornar o valor do paramsUrl */
    public function getParamsUrl()
    {
        return $this->paramsUrl;
    }
        /** @return string método responsável por retornar o valor do postVars */
    public function getPostVars()
    {
        return $this->postVars;
    }
        /** @return string método responsável por retornar o valor do headers */
    public function getHeaders()
    {
        return $this->headers;
    }
        /** @return string método responsável por retornar o valor do httpMethod */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }
        /** @return string método responsável por retornar o valor da uri */
    public function getUri()
    {
        return $this->uri;
    }    
}