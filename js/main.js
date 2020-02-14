

(function(){
    'use strict';
    
    
    
    let regalo = document.querySelector('#regalo');  
    
    document.addEventListener('DOMContentLoaded', function(){
        
        
        let map = document.querySelector('#mapa');
        
        if(map){
            
            //MAPA
            
            map = L.map('mapa').setView([40.420164, -3.68799], 17);
            
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        L.marker([40.420164, -3.68799]).addTo(map)
        .bindPopup('Estamos en la calle Alcalá')
        .openPopup()
    }
    
    
    
    //DATOS USUARIO
    let nombre= document.querySelector('#nombre');
    let apellido= document.querySelector('#apellido');
    let email= document.querySelector('#email');
    
    let campos = document.querySelectorAll('.campo');
    
    //CAMPOS PASES
    
    let paseDiario= document.querySelector('#paseDia');
    let paseEntero= document.querySelector('#paseCompleto');
    let paseDos= document.querySelector('#paseDosDias');

    
    
    
    
    //BOTONES Y DIVS
    
    let calcular = document.querySelector('#calcular');
    let errorDiv = document.querySelector('#error');
    let btnRegistro = document.querySelector('#btnRegistro');
    let resultado = document.querySelector('#lista-productos');
    let sumaResultado = document.querySelector('#suma-total');
    
    //EXTRAS
    
    let camisasEvento = document.querySelector('#camisaEvento');
    let etiquetasEvento = document.querySelector('#paquetEtiquetas');

    btnRegistro.disabled=true;
    if(btnRegistro.disabled===true){

        btnRegistro.style.backgroundColor="gray";
        btnRegistro.style.borderColor="gray";
    }
    
    //Talleres y seminarios

    // let menuPrograma = document.getElementsByClassName('.menu-programa')
    
    
    
    
    
    //ADDEVENTLISTENER

    if(document.getElementById('calcular')){





    
    
    calcular.addEventListener('click', calcularMontos);
    paseDiario.addEventListener('blur', mostrarPases);
    paseDiario.addEventListener('click', mostrarPases);
    paseEntero.addEventListener('blur', mostrarPases);
    paseEntero.addEventListener('click', mostrarPases);
    paseDos.addEventListener('blur', mostrarPases);
    paseDos.addEventListener('click', mostrarPases);
    nombre.addEventListener('blur', validarCampo);
    apellido.addEventListener('blur', validarCampo);
    email.addEventListener('blur', validarCampo);
    email.addEventListener('blur', validarEmail);

    // menuPrograma.addEventListener('click', mostrarDia)


    
    
    
    
    
    
    
    
    
    
    //======================================================
    
    function calcularMontos(e){
        
        e.preventDefault(); 
        if(regalo.value === ""){
            alert('Debes elegir un regalo antes de continuar');
            regalo.focus();
            
        } else{
            
            let billeteDia = parseInt(paseDiario.value, 10) || 0;
            let billeteCompleto = parseInt(paseEntero.value, 10) || 0;
            let billeteDosDias = parseInt(paseDos.value, 10) || 0;
            
            let camisas = parseInt(camisasEvento.value, 10) || 0;
            let etiquetas = parseInt(etiquetasEvento.value, 10) || 0;
            
            
            
            
            
            let totalPagar = (billeteDia * 30)+(billeteDosDias * 45) + (billeteCompleto * 50) + ((camisas * 10)* .93) + (etiquetas * 2);
            
            
            let listaProductos = [];
            
            if(billeteDia == 1){
                
                
                listaProductos.push(`${billeteDia} Pase por día`)
            } else if(billeteDia > 1){
                
                
                listaProductos.push(`${billeteDia} Pases por día`)
            } 
            
            if(billeteCompleto == 1){
                
                listaProductos.push(`${billeteCompleto} Pase Completo`)
            } else if(billeteCompleto > 1){
                
                listaProductos.push(`${billeteCompleto} Pases Completos`)
            }
            
            if(billeteDosDias == 1){
                listaProductos.push(`${billeteDosDias} Pases por Dos Días`)
            }else if(billeteDosDias > 1){
                
                listaProductos.push(`${billeteDosDias} Pases por Dos Días`)
            }
            
            
            if(camisas == 1){
                listaProductos.push(`${camisas} Camisa`)
            }else if(camisas > 1){
                
                listaProductos.push(`${camisas} Camisas`)
            }
            if(etiquetas == 1){
                listaProductos.push(`${etiquetas} Etiqueta`)
            } else if(etiquetas > 1){
                listaProductos.push(`${etiquetas} Etiquetas`)
            }
            
            resultado.style.display= 'block'
            resultado.innerHTML = "";
            
            listaProductos.forEach(producto => {
                
                resultado.innerHTML += `${producto} </br>`
            });
            
            sumaResultado.innerHTML = "";
            
            sumaResultado.innerHTML = `${totalPagar.toFixed(1)} €` ;
            document.querySelector('#total_pedido').value = totalPagar;
            btnRegistro.disabled=false;
            if(btnRegistro.disabled===false){
                btnRegistro.style.backgroundColor="#fe4918"
                btnRegistro.style.borderColor="#fe4918";
            }
            
            
            
            
        }
    }  //Calcular montos
    
    function mostrarPases(){
        
        
        let boletoDia = parseInt(paseDiario.value, 10) || 0;
        let boletoCompleto = parseInt(paseEntero.value, 10) || 0;
        let boletoDosDias = parseInt(paseDos.value, 10) || 0;
        
        
        let diasElegidos = [];
        
        if(boletoDia > 0 ){
            
            diasElegidos.push('#viernes');
            
        } else{
            
            
            document.querySelector('#viernes').style.display='none';
            calcular.setAttribute('disabled', "");
            
            
            
            
            
        }
        if(boletoCompleto > 0 ){
            
            diasElegidos.push('#viernes' , '#sabado', '#domingo');
            
        } else{
            
            
            
            document.querySelector('#viernes').style.display='none';
            document.querySelector('#sabado').style.display='none';
            document.querySelector('#domingo').style.display='none';
            calcular.setAttribute('disabled', "");
            if(calcular.hasAttribute('disabled') === true){
                
                calcular.setAttribute('style', 'background-color: gray; border-color: gray');
            }
            
            
            
        }
        if(boletoDosDias > 0 ){
            
            diasElegidos.push('#viernes', '#sabado');
            
        } else {
            
            
            document.querySelector('#viernes').style.display='none';
            document.querySelector('#sabado').style.display='none';
            calcular.setAttribute('disabled', "");
            
            
            
            
            
        }
        
        diasElegidos.forEach(dias => {
            document.querySelector(dias).style.display ='block';
            calcular.removeAttribute('disabled');
            if(calcular.hasAttribute('disabled') == false){
                
                calcular.style.backgroundColor = "#fe4918";
                calcular.style.borderColor = "#fe4918";
                
                
            } 
            
            
            
        });
        
        console.log(diasElegidos);
        

        
    }
    
    
    function validarCampo(){
        
        if(this.value == ""){
            
            errorDiv.style.display = 'block';
            errorDiv.innerHTML = "Este campo es obligatorio";
            this.style.border = '1px solid red';
            errorDiv.style.border = '1px solid red';
            errorDiv.style.opacity = '1';
            
            
        } else{
            
            errorDiv.style.transition='all .4s';
            
            errorDiv.style.opacity ='0'
            this.style.border = '1px solid #e2e2e2 ';
        }
    }
    
    
    function validarEmail(){
        
        
        if(this.value.indexOf("@")  !== - 1){
            
            errorDiv.style.transition='all .4s';
            errorDiv.style.opacity ='0'
            this.style.border = '1px solid #e2e2e2 ';
            
            
        } else {
            
            errorDiv.style.display = 'block';
            errorDiv.innerHTML = "Tiene que ser un correo válido, al menos una @";
            this.style.border = '1px solid red';
            errorDiv.style.border = '1px solid red';
            errorDiv.style.opacity = '1';
        }
    }



 

    }
    
    
}); //DOMContentLoaded
})();


$(document).ready(function () {
    

    
    
    var windowHeight = $(window).height(); 
    var barraAltura = $('.barra').innerHeight();

   



    //Programa evento

    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function () {

        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');

        $('.ocultar').hide();
        
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);

        
        return false;


    });

    //AnimateNumber 

    if(barraAltura){

        
        }

    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6}, 2000);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15}, 1800);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3}, 1200);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9}, 1000);


    //Cuenta Regresiva

    $('.cuenta-regresiva').countdown('2020/03/25 9:00:00', function(e){

        $('#dias').html(e.strftime('%D'));
        $('#horas').html(e.strftime('%H'));
        $('#minutos').html(e.strftime('%M'));
        $('#segundos').html(e.strftime('%S'));

    })

    
    //Añadiendo la clase activo

        $('body.conferencias .navegacion-principal a:contains("Conferencia")').addClass('activo');
        $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
        $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    

    //  Colorbox

        


   

        
    
    

    //Lettering

    $('.nombre-sitio').lettering();


    //

    $('#btnRegistro').on('click', function(){

        $(this).addClass('activo');

    })

    
    $(window).scroll(function(){
        
        var scroll = $(window).scrollTop();
        if (scroll > windowHeight){
            
            $('.barra').addClass('fixed');
            $('body').css({'margin-top' : barraAltura  });
            $('.barra').css({'opacity': '0.8'});
            
            $('.barra').mouseenter(function () { 
                
                $('.barra').css({
                    'transition' : 'all 0.3s cubic-bezier(0.18, 0.89, 0.32, 1.28) 0s',
                    'opacity': '1'});
                    
                    
                    
                    $('.barra').mouseleave(function () { 
                        
                        $('.barra').css({
                            'transition' : '.3s ease',
                            'opacity': '0.8'});
                            
                        });
                        
                    });
                }else {
                    
                    
                    $('.barra').removeClass('fixed');
                    $('body').css({'margin-top' : '0px',
                                    'opacity' : '1'});
                    
                    
                    
                    
                }
                

            })


            /* Menu-responsive */
            
      

            $('.menu-movil').on('click', function(){

                $('.navegacion-principal').slideToggle();
            })
            


    
            
        });