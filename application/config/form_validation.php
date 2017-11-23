<?php
$config = 
//CADASTRO DE GRUPO DE USUÁRIOS
array('usuariogrupo' => array(
    array(
        'field'=>'ds_denominacao',
        'label'=>'"denominação"',
        'rules'=>'required|trim'
    )
),
//CADASTRO DO USUÁRIO
'usuario' => array(
    array(
        'field'=>'ds_nome',
        'label'=>'"nome"',
        'rules'=>'required|trim'
    ),
    array(
        'field'=>'ds_email',
        'label'=>'"email"',
        'rules'=>'required|trim'
    ),
    array(
        'field'=>'ds_login',
        'label'=>'"login"',
        'rules'=>'required|trim'
    )
),'usuario_login' => array(
    array(
        'field'=>'ds_login',
        'label'=>'"login"',
        'rules'=>'required|trim'
    ),
    array(
        'field'=>'ds_senha',
        'label'=>'"senha"',
        'rules'=>'required|trim'
    ),
),
//CADASTRO DA PESSOA
'pessoa' => array(
    array(
        'field'=>'ds_nome',
        'label'=>'"nome"',
        'rules'=>'required|trim'
    ),
    array(
        'field'=>'nr_telefone',
        'label'=>'"telefone"',
        'rules'=>'required|trim'
    ),    
    array(
        'field'=>'ds_email',
        'label'=>'"e-mail"',
        'rules'=>'required|trim'
    ),
)
    
);