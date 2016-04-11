<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shop extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->model('Shop_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters(
                '', '<br />');
        if ($this->input->post()) {
            $category_id = $this->input->post('cat');
        } else {
            $category_id = null;
        }
        $this->form_validation->set_rules('cat', 'Category', 'required|min_length[1]| max_length[125]|integer');
        if ($this->form_validation->run() == FALSE) {
            $data['query'] = $this->Shop_model->get_all_products($category_id);
            $data['cat_query'] = $this->Shop_model->get_all_categories();
            $this->load->view('shop/display_products', $data);
        } else {
            $data['query'] = $this->Shop_model->get_all_products($category_id);
            $data['cat_query'] = $this->Shop_model->get_all_categories();
            $this->load->view('shop/display_products', $data);
        }
    }

    public function add($product_id) {
        //$product_id = $this->uri->segment(3);
        $query = $this->Shop_model->get_product_details($product_id);
        foreach ($query->result() as $row) {
            $data = array(
                'id' => $row->product_id,
                'qty' => 1, //reset to 1 when you have this item in the shop cart
                'price' => $row->product_price,
                'name' => $row->product_name,
            );
        }
        $this->cart->insert($data);
        $data['cat_query'] = $this->Shop_model->get_all_categories();
        $this->load->view('shop/display_cart', $data);
    }

    public function update_cart() {
        $data = array();
        $i = 0;
        echo 'update_cart';
        foreach ($this->input->post() as $item) {
            $data[$i]['rowid'] = $item['rowid'];
            $data[$i]['qty'] = $item['qty'];
            $i++;
        }
        $this->cart->update($data);
        redirect('shop/display_cart');
        //$this->load->view('shop/display_cart', $data);
    }

    public function display_cart() {
        $data['cat_query'] = $this->Shop_model->get_all_categories();
        $this->load->view('shop/display_cart', $data);
    }

    public function clear_cart() {
        $this->cart->destroy();
        redirect('index');
    }

    public function display_order() {
        if ($this->input->post('order')) {
            $order_id = $this->input->post('order');
            $cust_id = $this->input->post('order');
        } else {
            $cust_id = 1;

            $order_id = 1;
        }
        $data['orders_query'] = $this->Shop_model->get_all_orders();
        $data['cust_query'] = $this->Shop_model->get_customer_details($cust_id);
        $data['details'] = $this->Shop_model->get_order_details($order_id);



        date_default_timezone_set('America/Los_Angeles');

         $query =  $this->Shop_model->get_order_details($order_id);
                 var_dump( $query->result()[0]->order_details);

        foreach ($query->result() as $row) {
            $data = array(
                'id' => $row->product_id,
                'qty' => 1, //reset to 1 when you have this item in the shop cart
                'price' => $row->product_price,
                'name' => $row->product_name,
            );
        }
        $this->cart->insert($data);
        $data['query'] = $this->Shop_model->get_all_categories();
        $data['cust_id_number'] = $data['orders_query']->result()[$order_id - 1]->cust_id;
        $data['cust_first_name'] = $data['cust_query']->result()[0]->cust_first_name;
        $data['cust_last_name'] = $data['cust_query']->result()[0]->cust_last_name;
        $data['cust_address'] = $data['cust_query']->result()[0]->cust_address;
        



        $this->load->view('shop/display_order', $data);
    }

}
