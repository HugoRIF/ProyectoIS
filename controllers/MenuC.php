<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MenuC extends CI_Controller{
    public function __construct(){
        parent:: constrcut();
        $this->load->model("Menu_model");
        $this->load->library('multi_menu');
    }
    public function basico(){
        $items = $this->Menu_model->all();
        $this->multi_menu->set_items($items);
        $this->load->view('Vistas/ingresoAS');
			
    }
}
