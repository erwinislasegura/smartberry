<?php
class BDCONFIG {

    private $HOST;
    private $USER;
    private $PASS;
    private $DBNAME;

    public function __construct()
    {
        $this->HOST = "190.13.179.171";
        $this->USER = "eisla";
        $this->PASS = "Eisla1245...";
        $this->DBNAME = "bd_smartberries";

        /*$this->HOST = "190.13.179.171";
        $this->USER = "visiondc_berrie";
        $this->PASS = "Berrie.2024";
        $this->DBNAME = "visiondc_berrie";*/
    }

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        $this->$k = $v;
    }

    public function conectar() {
        try {
            $link = new PDO("mysql:host={$this->HOST};dbname={$this->DBNAME}", $this->USER, $this->PASS);
            $link->exec("set names utf8");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $link;
        } catch (PDOException $e) {
            // Maneja el error de conexión aquí, si es necesario
            echo 'Error de conexión: ' . $e->getMessage();
            return null;
        }
    }
}