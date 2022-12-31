<?php

function isSessaoValida($caminho){
    if(!isset($_SESSION['perfil'])){
        header('Location: '. $caminho .'?erro=0');
        return false;
    }
    return true;
}