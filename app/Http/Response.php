<?php
namespace App\Http;

class Response{
        /** @var integer variavél responsável por receber o código de status do response */
    private $statusCode = 200;
        /** @var string variavél responsável por receber o valor do tipo do response */
    private $contentType = 'text/html';
        /** @var mixed variavél responsável por receber o cabeçalho do response*/
    private $headers = [];
        /** @var mixed variavél responsável por receber o conteúdo do response */        
    private $content;
        //MÉTODO CONSTRUTOR DA CLASSE
    public function __construct($statusCode,$content,$contentType = 'text/html')
    {
        $this->statusCode = $statusCode;
            $this->content    = $content;
                $this->setContentType($contentType);    
    }
    /** método responsável por alterar o content-type do response */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
            $this->addHeaders('Content-type',$contentType);
    }
    /** método responsável por adicionar valores no cabeçalho do response*/
    public function addHeaders($key,$value)
    {
        $this->headers[$key] = $value;
    }
    private function printHeaders()
    {
        // método que adiciona o valor do status do response no navegador
        http_response_code($this->statusCode);
        // informa o valor do contentType
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value);
        }
    }
    // método responsável por retornar o valor do conteúdo na tela
    public function printResponse()
    {
        // método responsável por adicionar o valor do status no response  
        $this->printHeaders();
        // condição que verifica o valor do contentType 
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                    exit;
        }
    }    
}