<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Player'); 
    }

    public function index()
    {
        $data['players'] = $this->Player->default_players();

        // Load the view
        $this->load->view('index', $data);
    }

    public function search()
    {
        // Retrieve form input values
        $search = $this->input->post('search');
        $genders = $this->input->post('gender');
        $sports = $this->input->post('sports');

        // Call model method to get filtered players
        $data['players'] = $this->Player->searchPlayers($search, $genders, $sports);
        // Load the view
        $this->load->view('index', $data);
    }
}
