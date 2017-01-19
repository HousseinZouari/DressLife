<?php
class Product
{
	private $id;
	private $bust_girth;
	private $waist;
	private $len_top_bot;
	private $arm_cir;	
	public function  __construct($bust,$waist,$len_top_bot,$arm_cir)
      {
		$this->bust_girth=$bust;
		$this->waist=$waist;
		$this->len_top_bot=$len_top_bot;
		$this->arm_cir=$arm_cir;
      }
	  
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
	
	public function getBust_girth() {
        return $this->bust_girth;
    }

    public function setBust_girth($bust) {
        $this->bust_girth = $bust;
    }
	
	public function getWaist() {
        return $this->waist;
    }

    public function setWaist($waist) {
        $this->waist = $waist;
    }
	
	public function getLen_top_bot() {
        return $this->len_top_bot;
    }

    public function setLen_top_bot($len_top_bot) {
        $this->len_top_bot = $len_top_bot;
    }
	
	public function getArm_cir() {
        return $this->arm_cir;
    }

    public function setArm_cir($arm_cir) {
        $this->arm_cir = $arm_cir;
    }
}