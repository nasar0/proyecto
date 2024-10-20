<?php
    $opcionSeleccionada = $_POST['opcion'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, header, hgroup, 
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        body {
            background-color: black;
        }
        .container{
            padding-top:40vh ;
            width: 70%;
            display: flex; 
            justify-content: center; 
            margin: auto;
            gap: 1%;
            justify-content: center;
            div{
                display: inline-block; 
                width: 20%;
            }
        }
        img{
            max-width: 100%;
        }
        .start {
            width: 70%;
            display: flex;  
            margin: auto;
            gap: 1%;
            justify-content: center;
            button {
                display: flex;
                justify-content: center;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background-color: #4CAF50;
                color: white;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #45a049;
            }
            
        }
        .n3 {
            gap: 1%;
            button{
            display: flex;
            flex-direction: column;
            justify-content: start;
            width: 50%;
            margin: 4%;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            }
        }
    </style>
</head>
<body>
    <section class="code">
        
        <div class="container">
            <div class="n3"></div>
            <div class="n1"></div>
            <div class="n2"></div>
        </div>
        <div class="start"> </div>
    </section>
    
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // var opcion = "<?php echo $opcionSeleccionada; ?>";
        var opcion = "mk";

        let num1;
        let num2;
        let intervalId1;
        let intervalId2;

        const n1 =document.querySelector(".n1")
        const img1= crear("img");
        const n2 =document.querySelector(".n2")
        const img2= crear("img");
        const ini = crear("button");
        const iniciar = document.querySelector(".start");
        const comp = crear("button");
        const end =document.querySelector(".start");
        const n3 =document.querySelector(".n3")
        const piedra = crear("button");
        const papel = crear("button");
        const tijera = crear("button");
        function crear(element) {
            return document.createElement(element);
        }
        if (opcion=="rm") {
            codigo()

            ini.addEventListener('click',()=>{
                startAnimation1();
                startAnimation2() 
            })

            comp.addEventListener('click',()=>{
                stopAnimation()
                stopAnimation()
                comparar()
            })
        }else{
            
            crearJugador2()
            botonInicio()
            botonComprobar()
            opciones()
            startAnimation2() 
            papel.addEventListener('click',()=>{crearJugador1(); img1.src = `img/${1}.png`; num1=1;})
            piedra.addEventListener('click',()=>{crearJugador1(); img1.src = `img/${2}.png`;num1=2;})
            tijera.addEventListener('click',()=>{crearJugador1(); img1.src = `img/${3}.png`;num1=3;})
            comp.addEventListener('click',()=>{
                stopAnimation2()
                comparar()
            })
            ini.addEventListener('click',()=>{
                startAnimation2() 
            })
            
        }
        
        //variables y funciones para la animacion
        
        function startAnimation1() {
            intervalId1 = setInterval(() => {
                num1 = Math.floor(Math.random() * 3) + 1;
                img1.src = `img/${num1}.png`;
            }, 20);
        }
        function startAnimation2() {
            intervalId2 = setInterval(() => {
                num2 = Math.floor(Math.random() * 3) + 1;
                img2.src = `img/${num2}.png`;
            }, 20);
        }
        function stopAnimation1() {
            clearInterval(intervalId1);
        }
        function stopAnimation2() {
            clearInterval(intervalId2);
        }
        function crearJugador1() {
            //variables jugador 1
            img1.src="img/1.png"
            n1.append(img1);
        }
        function crearJugador2() {
            //variables jugador 2
            img2.src="img/2.png"
            n2.append(img2);
        }
        function botonInicio(){
            ini.textContent = "INICIAR";
            iniciar.append(ini);
        }
        function botonComprobar(){
            //Creamos el boton y la funcion para comprobar
            comp.textContent = "Comprobar";
            end.append(comp);
        }
        function opciones(){
            piedra.textContent = "PIEDRA";
            n3.append(piedra);
            papel.textContent = "PAPEL";
            n3.append(papel);
            tijera.textContent = "TIJERA";
            n3.append(tijera);
        }
        function codigo(){
            crearJugador1()
            crearJugador2()
            botonInicio()
            botonComprobar()
        }
        

        
        //Creamos la fucion para comprobar

        function comparar() {
            if (num1 !== undefined && num2 !== undefined) {
                    if (num1 === num2) {
                        alert("Empate"); 
                    } else if (num1 === 1 && num2 === 2) {
                        alert("El ganador es Jugador 1 (Papel)"); 
                    } else if (num1 === 2 && num2 === 3) {
                        alert("El ganador es Jugador 1 (Piedra)"); 
                    } else if (num1 === 3 && num2 === 1) {
                        alert("El ganador es Jugador 1 (Tijeras)"); 
                    } else if (num1 === 2 && num2 === 1) {
                        alert("El ganador es Jugador 2 (Papel)"); 
                    } else if (num1 === 3 && num2 === 2) {
                        alert("El ganador es Jugador 2 (Piedra)"); 
                    } else if (num1 === 1 && num2 === 3) {
                        alert("El ganador es Jugador 2 (Tijeras)"); 
                    }
                }
            // img1.src = `img/${num1}.png`;
            // img2.src = `img/${num2}.png`;
        }
    });
</script>
