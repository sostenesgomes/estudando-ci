<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model', 'objUser');
    }

    public function index(){
        $data = array(
            'users' => $this->objUser->get(),
            'title' => 'Lista de Usuários',
            'page'  => 'Usuários'
        );

        $this->load->view('user/index', $data);
    }

    public function register(){
        $this->load->helper('form');

        $this->load->library('form_validation');

        /* run() com chamada automatica do nó de array de regras em configuração */
        if ($this->form_validation->run() === FALSE){

            $data = array(
                'title' => 'Novo Cadastro',
                'page'  => 'Usuários'
            );

            $this->load->view('user/register', $data);
        }else{
            if ($this->objUser->insert()){
                $message = array(
                    'type' => 'success',
                    'msg'  => 'Cadastro realizado com sucesso'
                );
            }else{
                $message = array(
                    'type' => 'danger',
                    'msg'  => 'Cadastro não realizado'
                );
            }

            $this->redirectIndex($message);
        }
    }

    public function edit($id=false){
        $this->load->helper('form');

        $data = array(
            'title' => 'Editar Cadastro',
            'page'  => 'Usuários'
        );

        if(count($_POST)){
            $this->load->library('form_validation');

            /* run() com chamada manual do nó de array de regras em configuração */
            if ($this->form_validation->run('user/edit') === FALSE){
                $this->load->view('user/edit', $data);
            }else{
                if ($this->objUser->update($id)){
                    $message = array(
                        'type' => 'success',
                        'msg'  => 'Cadastro alterado com sucesso'
                    );
                }else{
                    $message = array(
                        'type' => 'danger',
                        'msg'  => 'Cadastro não alterado'
                    );
                }

                $this->redirectIndex($message);
            }
        }elseif($id !== false){
            $data['user']  = $this->objUser->get($id);
            $this->load->view('user/edit', $data);
        }else{
            redirect('/user');
        }
    }

    public function delete($id, $confirm=false){
        $this->load->helper('form');

        $data = array(
            'id'    => $id,
            'title' => 'Excluir Cadastro',
            'page'  => 'Usuários'
        );

        if($confirm==='true'){
            if ($this->objUser->delete($id)){
                $message = array(
                    'type' => 'success',
                    'msg'  => 'Cadastro excluído com sucesso'
                );
            }else{
                $message = array(
                    'type' => 'danger',
                    'msg'  => 'Cadastro não excluído'
                );
            }

            $this->redirectIndex($message);
        }else{
            $this->load->view('user/delete', $data);
        }
    }

    private function redirectIndex($message=null){
        $this->session->set_flashdata('message', $message);
        redirect('/user');
    }
}