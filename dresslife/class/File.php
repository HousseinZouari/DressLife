<?php
class File
{
	private $id;
	private $uri;
	private $date;
	private $id_product;
	public function  __construct($uri,$id_product)
      {
		$this->uri=$uri;
		$this->id_product=$id_product;
		$date_now=new \DateTime();
		$this->date=$date_now->format('Y-m-d-H-i-s');
      }
	  
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
	
	public function getUri() {
        return $this->uri;
    }

    public function setUri($uri) {
        $this->uri = $uri;
    }
	
	public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }
	
	public function getId_Product() {
        return $this->id_product;
    }

    public function setId_Product($id_product) {
        $this->id_product = $id_product;
	
	}
}
