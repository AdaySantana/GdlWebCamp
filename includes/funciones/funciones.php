<?php 
function productos_json(&$pases, &$camisas = 0, &$etiquetas = 0){
    $dias = array(
        0 => 'un_dia',
        1 => 'pase_completo',
        2 => 'pase_dos_dias'
    );
    $total_pases = array_combine($dias, $pases);
    $json = array();

    foreach($total_pases as $key => $pase) {
        if((int) $pase > 0){
            $json[$key] = (int) $pase;
        }
    }

    $camisas = (int) $camisas;
    if($camisas > 0){
        $json['camisas'] = $camisas;
    }
    $etiquetas = (int) $etiquetas;
    if($etiquetas > 0){
        $json['etiquetas'] = $etiquetas;
    }
    return json_encode($json);

}

function eventos_json(&$eventos){

    $eventos_json = array();

    foreach ($eventos as $evento) {
        $eventos_json['eventos'][] = $evento;
    }

    return json_encode($eventos_json);
}