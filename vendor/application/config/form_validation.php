<?php

$config = array(
    'user/register' => array(
        array(
            'field'   => 'fullName',
            'label'   => 'Nome Completo',
            'rules'   => 'trim|xss_clean|required|min_length[2]|max_length[100]'
        ),
        array(
            'field'   => 'email',
            'label'   => 'E-mail',
            'rules'   => 'trim|xss_clean|required|valid_email|is_unique[user_table.email]'
        ),
        array(
            'field'   => 'id_profile',
            'label'   => 'Perfil',
            'lang:first_name',
            'rules'   => 'required|is_natural_no_zero'
        ),
        array(
            'field'   => 'password',
            'label'   => 'Senha',
            'rules'   => 'trim|xss_clean|required|min_length[6]|max_length[15]|matches[retypePassword]'
        ),
        array(
            'field'   => 'retypePassword',
            'label'   => 'Confirme a senha',
            'rules'   => 'trim|xss_clean|required'
        ),
        array(
            'field'   => 'status',
            'label'   => 'Status',
            'rules'   => 'required|min_length[1]|max_lenth[2]'
        )
    ),
    'user/edit' => array(
        array(
            'field'   => 'id',
            'label'   => 'ID',
            'rules'   => 'trim|required|numeric|min_length[1]'
        ),
        array(
            'field'   => 'fullName',
            'label'   => 'Nome Completo',
            'rules'   => 'trim|xss_clean|required|min_length[2]|max_length[100]'
        ),
        array(
            'field'   => 'email',
            'label'   => 'E-mail',
            'rules'   => 'trim|xss_clean|required|valid_email|is_unique_update[user_table.email.id]'
        ),
        array(
            'field'   => 'id_profile',
            'label'   => 'Perfil',
            'lang:first_name',
            'rules'   => 'required|is_natural_no_zero'
        ),
        array(
            'field'   => 'status',
            'label'   => 'Status',
            'rules'   => 'required|min_length[1]|max_lenth[2]'
        )
    )
);