<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* loader 5 design starts from here */
        #loader{
            background-color: rgb(241, 241, 241);
            width: 100vw;
            height: 100vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader-ele{
            background-color: black;
            width: 5px;
            height: 0px;
            margin: 0 3px;
            animation: tut 1s  infinite;
            border-radius: 10px;
        }

        .hide-laoder{
            transition: .5s;
            opacity: 0;
            height: 0!important;
            width: 0!important;
        }

        .loader-ele:nth-child(2){
            animation-delay: .1s;
        }
        .loader-ele:nth-child(3){
            animation-delay: .2s;
        }
        .loader-ele:nth-child(4){
            animation-delay: .3s;
        }
        .loader-ele:nth-child(5){
            animation-delay: .4s;
        }
        .loader-ele:nth-child(6){
            animation-delay: .5s;
        }
        .loader-ele:nth-child(7){
            animation-delay: .6s;
        }
        .loader-ele:nth-child(8){
            animation-delay: .7s;
        }

        @keyframes tut{
            0%{height: 0px;}
            50%{height: 40px;}
            100%{height: 0px;}
        }
        /* loader  design Ends Here */
    </style>
</head>
<body onload="myLoader()">
    
        <div id="loader">
            <div class="loader-ele"></div>
            <div class="loader-ele"></div>
            <div class="loader-ele"></div>
            <div class="loader-ele"></div>
            <div class="loader-ele"></div>
            <div class="loader-ele"></div>
            <div class="loader-ele"></div>
            <div class="loader-ele"></div>  
        </div>

    <script>
        function myLoader(){
            var loader = document.getElementById("loader");
            setTimeout(function(){
                loader.className += 'hide-laoder';
            },1000);
        }
    </script>


</body>
</html>