<?php
$pageTitle = "Login";
$stylesheet = "styles/login.css";
require 'templates/header.php';

$emailError = "";
$passwordError = "";

if (isset($_GET["error"])) {

    if ($_GET["error"] == "emptyemail")  $emailError = "Email cannot be blank";
    else if ($_GET["error"] == "emailnotexist") $emailError = "Email is not registered";

    if ($_GET["error"] == "emptypassword")  $passwordError = "Password cannot be blank";

    if ($_GET["error"] == "loginfailed")  $emailError = "Email or Password is invalid";
}
?>

<body>
    <main>
        <div class="row h-100">
            <div class="col-12 col-md-6 bcg-light d-flex align-items-center justify-content-center" id="illustration-col">
                <div class="illustration">
                    <svg class="animated" id="freepik_stories-secure-login" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
                        <style>
                            svg#freepik_stories-secure-login:not(.animated) .animable {
                                opacity: 0;
                            }

                            svg#freepik_stories-secure-login.animated #freepik--Floor--inject-74 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) fadeIn;
                                animation-delay: 0s;
                            }

                            svg#freepik_stories-secure-login.animated #freepik--Shadows--inject-74 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) fadeIn;
                                animation-delay: 0s;
                            }

                            svg#freepik_stories-secure-login.animated #freepik--Window--inject-74 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) fadeIn;
                                animation-delay: 0s;
                            }

                            svg#freepik_stories-secure-login.animated #freepik--Furniture--inject-74 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideUp;
                                animation-delay: 0s;
                            }

                            svg#freepik_stories-secure-login.animated #freepik--Plant--inject-74 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 1.5s Infinite linear wind;
                                animation-delay: 0s, 1s;
                            }

                            svg#freepik_stories-secure-login.animated #freepik--window--inject-74 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 3s Infinite linear floating;
                                animation-delay: 0s, 1s;
                            }

                            svg#freepik_stories-secure-login.animated #freepik--Character--inject-74 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft, 6s Infinite linear floating;
                                animation-delay: 0s, 1s;
                            }

                            @keyframes fadeIn {
                                0% {
                                    opacity: 0;
                                }

                                100% {
                                    opacity: 1;
                                }
                            }

                            @keyframes slideUp {
                                0% {
                                    opacity: 0;
                                    transform: translateY(30px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: inherit;
                                }
                            }

                            @keyframes slideDown {
                                0% {
                                    opacity: 0;
                                    transform: translateY(-30px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: translateY(0);
                                }
                            }

                            @keyframes wind {
                                0% {
                                    transform: rotate(0deg);
                                }

                                25% {
                                    transform: rotate(1deg);
                                }

                                75% {
                                    transform: rotate(-1deg);
                                }
                            }

                            @keyframes floating {
                                0% {
                                    opacity: 1;
                                    transform: translateY(0px);
                                }

                                50% {
                                    transform: translateY(-10px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: translateY(0px);
                                }
                            }

                            @keyframes slideLeft {
                                0% {
                                    opacity: 0;
                                    transform: translateX(-30px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: translateX(0);
                                }
                            }
                        </style>
                        <g id="freepik--Floor--inject-74" class="animable" style="transform-origin: 250px 334.722px;">
                            <path d="M409,242.28c-88.41-51-231.28-51-319.12,0S2.55,376.09,91,427.13s231.28,51.05,319.12,0S497.45,293.33,409,242.28Z" style="fill: rgb(240, 240, 240); transform-origin: 250px 334.722px;" id="elev8lugbtdfj" class="animable"></path>
                        </g>
                        <g id="freepik--Shadows--inject-74" class="animable" style="transform-origin: 249.08px 348.662px;">
                            <path d="M125,371.71l79.48-45.9,63.44,36.53a41.61,41.61,0,0,1,11.31-9.21c22.63-13.07,59.19-13.07,81.68,0s22.36,34.24-.27,47.31a68.2,68.2,0,0,1-15.48,6.39l6.38,3.67a2.89,2.89,0,0,1,0,5l-73.72,42.58a11.51,11.51,0,0,1-11.52,0L125,376.71A2.89,2.89,0,0,1,125,371.71Z" style="fill: rgb(224, 224, 224); transform-origin: 250.628px 392.717px;" id="elkjxespqd8x" class="animable"></path>
                            <path d="M448.73,350.11c-6.54-3.77-17.1-3.77-23.6,0s-6.46,9.9.08,13.68,17.1,3.77,23.6,0S455.27,353.89,448.73,350.11Z" style="fill: rgb(224, 224, 224); transform-origin: 436.97px 356.952px;" id="elbrysustehyo" class="animable"></path>
                            <path d="M45.27,367.94,48.86,370a6.29,6.29,0,0,0,6.28,0L274.68,243.26a1.54,1.54,0,0,0,0-2.67l-3.55-2.05a6.27,6.27,0,0,0-6.27,0L45.27,365.26A1.55,1.55,0,0,0,45.27,367.94Z" style="fill: rgb(224, 224, 224); transform-origin: 159.976px 304.27px;" id="el4kh9sug062a" class="animable"></path>
                        </g>
                        <g id="freepik--Window--inject-74" class="animable" style="transform-origin: 398.035px 123.15px;">
                            <polygon points="393.94 78.77 393.71 167.21 398.21 169.81 398.44 81.36 393.94 78.77" style="fill: rgb(224, 224, 224); transform-origin: 396.075px 124.29px;" id="elwklrjmrpcyk" class="animable"></polygon>
                            <polygon points="398.44 81.36 398.44 81.36 398.21 169.81 402.12 167.53 402.33 83.61 398.44 81.36" style="fill: rgb(240, 240, 240); transform-origin: 400.27px 125.585px;" id="elpsap07w5gb" class="animable"></polygon>
                            <g id="elpmcutdeo63j">
                                <rect x="396.19" y="77.47" height="5.19" style="fill: rgb(224, 224, 224); transform-origin: 396.19px 80.065px; transform: rotate(-60deg);" class="animable"></rect>
                            </g>
                            <g id="elcvjfu9igtvj">
                                <polygon points="398.43 84.99 398.44 81.36 393.94 78.77 393.93 82.4 398.43 84.99 398.43 84.99" style="opacity: 0.2; transform-origin: 396.185px 81.88px;" class="animable"></polygon>
                            </g>
                            <g id="elqnkpwg9tkbd">
                                <polygon points="398.43 84.99 401.58 83.18 398.44 81.36 398.44 81.36 398.43 84.99" style="opacity: 0.2; transform-origin: 400.005px 83.175px;" class="animable"></polygon>
                            </g>
                            <g id="el4f92kt4bb12">
                                <rect x="396.19" y="77.47" height="5.19" style="fill: rgb(224, 224, 224); transform-origin: 396.19px 80.065px; transform: rotate(-60deg);" class="animable"></rect>
                            </g>
                            <polygon points="339.86 47.54 343.76 45.27 343.53 133.71 339.63 135.98 339.86 47.54" style="fill: rgb(240, 240, 240); transform-origin: 341.695px 90.625px;" id="eli8c77t0ikz" class="animable"></polygon>
                            <polygon points="339.63 135.98 343.53 133.71 456.21 198.76 452.3 201.03 339.63 135.98" style="fill: rgb(245, 245, 245); transform-origin: 397.92px 167.37px;" id="elvcmxt78ls5" class="animable"></polygon>
                            <path d="M335.38,39.78,457,110l-.26,98.77L335.12,138.55ZM452.3,201l.23-88.44L339.86,47.54,339.63,136,452.3,201" style="fill: rgb(224, 224, 224); transform-origin: 396.06px 124.275px;" id="elk2ltf1elbic" class="animable"></path>
                            <polygon points="335.38 39.78 339.28 37.51 460.95 107.75 457.04 110.02 335.38 39.78" style="fill: rgb(245, 245, 245); transform-origin: 398.165px 73.765px;" id="elz4zee7bdjrd" class="animable"></polygon>
                            <polygon points="457.04 110.02 460.95 107.75 460.69 206.52 456.78 208.79 457.04 110.02" style="fill: rgb(240, 240, 240); transform-origin: 458.865px 158.27px;" id="elqagt1dd40fp" class="animable"></polygon>
                        </g>
                        <g id="freepik--Furniture--inject-74" class="animable" style="transform-origin: 373.685px 246.535px;">
                            <polygon points="285.11 190.82 285.11 265.51 412.15 338.47 412.15 263.78 285.11 190.82" style="fill: rgb(224, 224, 224); transform-origin: 348.63px 264.645px;" id="elnz6mq1j7z4i" class="animable"></polygon>
                            <polygon points="462.26 234.94 462.26 309.63 412.15 338.47 412.15 263.78 462.26 234.94" style="fill: rgb(224, 224, 224); transform-origin: 437.205px 286.705px;" id="elih8bav7kgmf" class="animable"></polygon>
                            <g id="elbaxxj8l3yb">
                                <polygon points="285.11 190.82 285.11 265.51 412.15 338.47 412.15 263.78 285.11 190.82" style="opacity: 0.1; transform-origin: 348.63px 264.645px;" class="animable"></polygon>
                            </g>
                            <g id="elzum3d1w7f">
                                <polygon points="462.26 234.94 462.26 309.63 412.15 338.47 412.15 263.78 462.26 234.94" style="opacity: 0.2; transform-origin: 437.205px 286.705px;" class="animable"></polygon>
                            </g>
                            <polygon points="283.31 183.86 413.31 258.53 464.06 229.32 333.99 154.6 283.31 183.86" style="fill: rgb(235, 235, 235); transform-origin: 373.685px 206.565px;" id="el2yr2l7c6zkg" class="animable"></polygon>
                            <polygon points="283.31 183.86 283.31 191.49 413.31 266.16 413.31 258.53 283.31 183.86" style="fill: rgb(224, 224, 224); transform-origin: 348.31px 225.01px;" id="elvz3aznft3p" class="animable"></polygon>
                            <polygon points="464.06 229.32 464.06 236.95 413.31 266.16 413.31 258.53 464.06 229.32" style="fill: rgb(224, 224, 224); transform-origin: 438.685px 247.74px;" id="elk6ufjn7i8pi" class="animable"></polygon>
                            <g id="elmspxmr13cs">
                                <polygon points="464.06 229.32 464.06 236.95 413.31 266.16 413.31 258.53 464.06 229.32" style="opacity: 0.1; transform-origin: 438.685px 247.74px;" class="animable"></polygon>
                            </g>
                            <g id="elk6fu6o1l9g">
                                <polygon points="414.46 239.24 442.89 222.67 415.68 206.86 387.25 223.43 414.46 239.24" style="opacity: 0.1; transform-origin: 415.07px 223.05px;" class="animable"></polygon>
                            </g>
                            <polygon points="421 232.97 441.24 221.28 437.48 219.1 420.99 228.63 421 232.97" style="fill: rgb(38, 50, 56); transform-origin: 431.115px 226.035px;" id="el7y1xjsm8ug9" class="animable"></polygon>
                            <polygon points="441.24 221.28 421 232.97 420.99 228.63 437.48 219.1 441.22 216.94 441.22 216.23 420.37 228.27 420.38 234.03 441.24 221.99 441.24 221.28" style="fill: rgb(69, 90, 100); transform-origin: 430.805px 225.13px;" id="elguur7fd3v4e" class="animable"></polygon>
                            <g id="elb5u9kyipv65">
                                <polygon points="441.24 221.28 421 232.97 420.99 228.63 437.48 219.1 441.22 216.94 441.22 216.23 420.37 228.27 420.38 234.03 441.24 221.99 441.24 221.28" style="opacity: 0.3; transform-origin: 430.805px 225.13px;" class="animable"></polygon>
                            </g>
                            <g id="el7pm1ls85dcc">
                                <polygon points="441.24 221.28 421 232.97 420.99 228.63 437.48 219.1 441.22 216.94 441.22 216.23 420.37 228.27 420.38 234.03 441.24 221.99 441.24 221.28" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 430.805px 225.13px;" class="animable"></polygon>
                            </g>
                            <polygon points="420.37 228.27 390.33 210.82 390.34 216.58 420.38 234.03 420.37 228.27" style="fill: rgb(69, 90, 100); transform-origin: 405.355px 222.425px;" id="elvavsxeuf1u" class="animable"></polygon>
                            <g id="el7axcaqhiesj">
                                <polygon points="420.37 228.27 390.33 210.82 390.34 216.58 420.38 234.03 420.37 228.27" style="opacity: 0.2; transform-origin: 405.355px 222.425px;" class="animable"></polygon>
                            </g>
                            <g id="elac4zal3m0w">
                                <polygon points="420.37 228.27 390.33 210.82 390.34 216.58 420.38 234.03 420.37 228.27" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 405.355px 222.425px;" class="animable"></polygon>
                            </g>
                            <polygon points="420.37 228.27 441.22 216.23 411.18 198.78 390.33 210.82 420.37 228.27" style="fill: rgb(69, 90, 100); transform-origin: 415.775px 213.525px;" id="el8ngcx1n7zkr" class="animable"></polygon>
                            <g id="eleb5xufdjcz">
                                <polygon points="420.37 228.27 441.22 216.23 411.18 198.78 390.33 210.82 420.37 228.27" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 415.775px 213.525px;" class="animable"></polygon>
                            </g>
                            <polygon points="440.66 217.26 440.66 221.62 421 232.97 420.99 228.63 440.66 217.26" style="fill: rgb(224, 224, 224); transform-origin: 430.825px 225.115px;" id="ellzjaypm4cir" class="animable"></polygon>
                            <g id="el07y3t6ntq8eb">
                                <polygon points="440.66 217.26 440.66 221.62 421 232.97 420.99 228.63 440.66 217.26" style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 430.825px 225.115px;" class="animable"></polygon>
                            </g>
                            <path d="M424.66,234.25l.44-1.57,1.5.45c-1.67-1.61-.48-3.63-2.43-4.72l-1.93,1.12C424.05,230.86,423,232.38,424.66,234.25Z" style="fill: rgb(46, 172, 124); transform-origin: 424.42px 231.33px;" id="elodxzycq03im" class="animable"></path>
                            <g id="elew11ol1xzs5">
                                <g style="opacity: 0.2; transform-origin: 424.42px 231.33px;" class="animable">
                                    <path d="M424.66,234.25l.44-1.57,1.5.45c-1.67-1.61-.48-3.63-2.43-4.72l-1.93,1.12C424.05,230.86,423,232.38,424.66,234.25Z" style="fill: rgb(255, 255, 255); transform-origin: 424.42px 231.33px;" id="el3enlv0wvk89" class="animable"></path>
                                </g>
                            </g>
                            <path d="M410.52,202.83l-13.07,7.54a.53.53,0,0,0,0,.92l7.1,4.13a1.37,1.37,0,0,0,1.33,0L419,207.87a.53.53,0,0,0,0-.91l-7.11-4.13A1.3,1.3,0,0,0,410.52,202.83Z" style="fill: rgb(69, 90, 100); transform-origin: 408.221px 209.114px;" id="el7d0dtszpaxs" class="animable"></path>
                            <polygon points="421.38 208.26 406.86 216.65 408 217.31 422.52 208.93 421.38 208.26" style="fill: rgb(69, 90, 100); transform-origin: 414.69px 212.785px;" id="eltusr9a57jsl" class="animable"></polygon>
                            <polygon points="408.55 217.76 409.69 218.43 417.39 213.98 416.25 213.32 408.55 217.76" style="fill: rgb(69, 90, 100); transform-origin: 412.97px 215.875px;" id="elotb5u7z4dp" class="animable"></polygon>
                            <polygon points="394.79 212.78 394.79 212.78 394.26 212.47 394.26 212.48 388.87 209.37 388.87 209.37 388.34 209.06 408.01 197.71 433.29 212.29 413.63 223.65 394.79 212.78" style="fill: rgb(46, 172, 124); transform-origin: 410.815px 210.68px;" id="elm4xv2tzfkdj" class="animable"></polygon>
                            <path d="M388.34,209.07h0l.53.3h0l5.39,3.11h0l.53.3h0l18.84,10.87a.56.56,0,0,0-.27.45l0,6.82a.16.16,0,0,0,.08.16h0l-25.28-14.58h0a.17.17,0,0,1-.07-.16l0-6.82A.57.57,0,0,1,388.34,209.07Z" style="fill: rgb(46, 172, 124); transform-origin: 400.859px 220.075px;" id="el5x9xgdsgtuc" class="animable"></path>
                            <path d="M413.36,224.1a.56.56,0,0,1,.27-.45l19.66-11.36v.61L413.9,224.1v6.21l19.4-11.2v.61l-19.66,11.35a.19.19,0,0,1-.19,0,.16.16,0,0,1-.08-.16Z" style="fill: rgb(46, 172, 124); transform-origin: 423.33px 221.693px;" id="ela1nsu63kpbq" class="animable"></path>
                            <g id="el3ooiu4yhsou">
                                <polygon points="394.79 212.78 394.79 212.78 394.26 212.47 394.26 212.48 388.87 209.37 388.87 209.37 388.34 209.06 408.01 197.71 433.29 212.29 413.63 223.65 394.79 212.78" style="opacity: 0.2; transform-origin: 410.815px 210.68px;" class="animable"></polygon>
                            </g>
                            <g id="elh2240jmd8r">
                                <path d="M388.34,209.07h0l.53.3h0l5.39,3.11h0l.53.3h0l18.84,10.87a.56.56,0,0,0-.27.45l0,6.82a.16.16,0,0,0,.08.16h0l-25.28-14.58h0a.17.17,0,0,1-.07-.16l0-6.82A.57.57,0,0,1,388.34,209.07Z" style="opacity: 0.4; transform-origin: 400.859px 220.075px;" class="animable"></path>
                            </g>
                            <g id="el7j4lkznx1go">
                                <path d="M413.36,224.1a.56.56,0,0,1,.27-.45l19.66-11.36v.61L413.9,224.1v6.21l19.4-11.2v.61l-19.66,11.35a.19.19,0,0,1-.19,0,.16.16,0,0,1-.08-.16Z" style="opacity: 0.3; transform-origin: 423.33px 221.693px;" class="animable"></path>
                            </g>
                            <polygon points="432.08 213.6 432.08 218.65 413.91 229.21 413.89 224.1 432.08 213.6" style="fill: rgb(224, 224, 224); transform-origin: 422.985px 221.405px;" id="elnusupozeum" class="animable"></polygon>
                            <g id="elobtsgkmx33b">
                                <polygon points="432.08 213.6 432.08 218.65 413.91 229.21 413.89 224.1 432.08 213.6" style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 422.985px 221.405px;" class="animable"></polygon>
                            </g>
                            <polygon points="433.31 219.11 432.08 218.38 432.08 218.65 413.91 229.21 413.91 230.31 433.31 219.11" style="fill: rgb(46, 172, 124); transform-origin: 423.61px 224.345px;" id="elqmeb9fuinw" class="animable"></polygon>
                            <g id="elyall0z0c3p">
                                <polygon points="433.31 219.11 432.08 218.38 432.08 218.65 413.91 229.21 413.91 230.31 433.31 219.11" style="opacity: 0.4; transform-origin: 423.61px 224.345px;" class="animable"></polygon>
                            </g>
                            <g id="elv4jrur15yzq">
                                <path d="M388.34,209.07h0L408,197.71l25.28,14.58v.61L413.9,224.1v5.1l18.17-10.55v-.27l1.23.73v.61l-19.66,11.35a.19.19,0,0,1-.19,0h0l-25.28-14.58h0a.17.17,0,0,1-.07-.16l0-6.82A.57.57,0,0,1,388.34,209.07Z" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 410.699px 214.403px;" class="animable"></path>
                            </g>
                            <path d="M417.3,229l.44-1.57,1.5.45c-1.66-1.61-.48-3.63-2.42-4.72l-1.94,1.12C416.69,225.56,415.67,227.07,417.3,229Z" style="fill: rgb(46, 172, 124); transform-origin: 417.06px 226.08px;" id="elqcr54ygl95n" class="animable"></path>
                            <g id="elk27m243i1n">
                                <g style="opacity: 0.2; transform-origin: 417.06px 226.08px;" class="animable">
                                    <path d="M417.3,229l.44-1.57,1.5.45c-1.66-1.61-.48-3.63-2.42-4.72l-1.94,1.12C416.69,225.56,415.67,227.07,417.3,229Z" style="fill: rgb(255, 255, 255); transform-origin: 417.06px 226.08px;" id="elcws4gwzrnh5" class="animable"></path>
                                </g>
                            </g>
                            <polygon points="419.6 221.51 437.93 210.93 434.53 208.95 419.59 217.58 419.6 221.51" style="fill: rgb(38, 50, 56); transform-origin: 428.76px 215.23px;" id="el6faoac2sddg" class="animable"></polygon>
                            <polygon points="437.93 210.93 419.6 221.51 419.59 217.58 434.53 208.95 437.92 206.99 437.92 206.35 419.03 217.26 419.05 222.47 437.94 211.57 437.93 210.93" style="fill: rgb(69, 90, 100); transform-origin: 428.485px 214.41px;" id="eltfxhuzuzl1i" class="animable"></polygon>
                            <g id="elrl51quc1jcc">
                                <polygon points="437.93 210.93 419.6 221.51 419.59 217.58 434.53 208.95 437.92 206.99 437.92 206.35 419.03 217.26 419.05 222.47 437.94 211.57 437.93 210.93" style="opacity: 0.3; transform-origin: 428.485px 214.41px;" class="animable"></polygon>
                            </g>
                            <g id="eljhebdlqmpo">
                                <polygon points="437.93 210.93 419.6 221.51 419.59 217.58 434.53 208.95 437.92 206.99 437.92 206.35 419.03 217.26 419.05 222.47 437.94 211.57 437.93 210.93" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 428.485px 214.41px;" class="animable"></polygon>
                            </g>
                            <polygon points="419.03 217.26 391.82 201.45 391.84 206.66 419.05 222.47 419.03 217.26" style="fill: rgb(69, 90, 100); transform-origin: 405.435px 211.96px;" id="eljngc24rpcnr" class="animable"></polygon>
                            <g id="eldkii5fg7frt">
                                <polygon points="419.03 217.26 391.82 201.45 391.84 206.66 419.05 222.47 419.03 217.26" style="opacity: 0.2; transform-origin: 405.435px 211.96px;" class="animable"></polygon>
                            </g>
                            <g id="el12bterig70w">
                                <polygon points="419.03 217.26 391.82 201.45 391.84 206.66 419.05 222.47 419.03 217.26" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 405.435px 211.96px;" class="animable"></polygon>
                            </g>
                            <polygon points="419.03 217.26 437.92 206.35 410.71 190.54 391.82 201.45 419.03 217.26" style="fill: rgb(69, 90, 100); transform-origin: 414.87px 203.9px;" id="elpm94nbyyybg" class="animable"></polygon>
                            <g id="el14t5zy109ih">
                                <polygon points="419.03 217.26 437.92 206.35 410.71 190.54 391.82 201.45 419.03 217.26" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 414.87px 203.9px;" class="animable"></polygon>
                            </g>
                            <polygon points="437.41 207.29 437.41 211.23 419.6 221.51 419.59 217.58 437.41 207.29" style="fill: rgb(224, 224, 224); transform-origin: 428.5px 214.4px;" id="ell8xprf4u1vs" class="animable"></polygon>
                            <g id="elvhhvwy6gwhm">
                                <polygon points="437.41 207.29 437.41 211.23 419.6 221.51 419.59 217.58 437.41 207.29" style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 428.5px 214.4px;" class="animable"></polygon>
                            </g>
                            <path d="M410.11,194.21,398.27,201a.48.48,0,0,0,0,.83l6.44,3.74a1.17,1.17,0,0,0,1.2,0l11.83-6.83a.48.48,0,0,0,0-.83l-6.44-3.74A1.2,1.2,0,0,0,410.11,194.21Z" style="fill: rgb(69, 90, 100); transform-origin: 408.005px 199.883px;" id="elc4yuyb2fmyi" class="animable"></path>
                            <polygon points="419.95 199.14 406.8 206.73 407.83 207.33 420.99 199.74 419.95 199.14" style="fill: rgb(69, 90, 100); transform-origin: 413.895px 203.235px;" id="elj3ys13u08hg" class="animable"></polygon>
                            <polygon points="408.32 207.74 409.36 208.34 416.33 204.31 415.3 203.71 408.32 207.74" style="fill: rgb(69, 90, 100); transform-origin: 412.325px 206.025px;" id="eliy657sa9rn9" class="animable"></polygon>
                            <g id="eltyf7xdjq2uq">
                                <path d="M441.24,222v-.71l-.58-.33v-3.69l-3.18,1.84h0l3.74-2.16v-.71l-5.66-3.29,2.37-1.37v-.64l-.52-.3v-3.34l-1.41.81,1.92-1.11v-.64l-27.21-15.81-18.89,10.91,0,5.21.33.2-3.83,2.21h0a.57.57,0,0,0-.26.45l0,6.82a.17.17,0,0,0,.07.16h0l25.28,14.58h0a.19.19,0,0,0,.19,0l.82-.47,5.91,3.43,3.25-1.87a4.51,4.51,0,0,0,1,2.09l.44-1.57,1.5.45a3.6,3.6,0,0,1-1-2.1Z" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 414.649px 212.41px;" class="animable"></path>
                            </g>
                        </g>
                        <g id="freepik--Plant--inject-74" class="animable" style="transform-origin: 437.935px 310.673px;">
                            <path d="M452.8,328.39l-15.83.46-15.83-.46c-.69,10.69,1.4,21.59,4.28,26.91h0a7.23,7.23,0,0,0,3.14,3.19c4.67,2.7,12.22,2.7,16.86,0a7,7,0,0,0,3.13-3.27C451.42,349.87,453.48,339,452.8,328.39Z" style="fill: rgb(255, 255, 255); transform-origin: 436.969px 344.453px;" id="el7odanm3tbsb" class="animable"></path>
                            <path d="M448.13,321.9c6.2,3.59,6.23,9.39.07,13s-16.19,3.59-22.39,0-6.24-9.38-.07-13S441.93,318.32,448.13,321.9Z" style="fill: rgb(235, 235, 235); transform-origin: 436.968px 328.4px;" id="el0sv9dl7av1e" class="animable"></path>
                            <path d="M445.68,323.33c4.84,2.79,4.86,7.32.05,10.12s-12.63,2.79-17.47,0-4.86-7.33-.05-10.12S440.84,320.54,445.68,323.33Z" style="fill: rgb(224, 224, 224); transform-origin: 436.97px 328.392px;" id="elj12oj7tozg" class="animable"></path>
                            <g id="elzsj4do6jw5d">
                                <g style="opacity: 0.15; transform-origin: 436.97px 328.392px;" class="animable">
                                    <path d="M445.68,323.33c4.84,2.79,4.86,7.32.05,10.12s-12.63,2.79-17.47,0-4.86-7.33-.05-10.12S440.84,320.54,445.68,323.33Z" id="el33htnv5ol2w" class="animable" style="transform-origin: 436.97px 328.392px;"></path>
                                </g>
                            </g>
                            <path d="M463,260.83c-35.68,11.68-36,35.55-28,52.55,2,3.44,8.17,5.29,13.51-15.85l-9.37,1.2,10.92-5.54,2.84-8.48-9.11.68,11.56-4.86A171.38,171.38,0,0,1,463,260.83Z" style="fill: rgb(46, 172, 124); transform-origin: 446.881px 288.164px;" id="elvpv73t8rnun" class="animable"></path>
                            <g id="elcnvmpfdldui">
                                <path d="M463,260.83c-35.68,11.68-36,35.55-28,52.55,2,3.44,8.17,5.29,13.51-15.85l-9.37,1.2,10.92-5.54,2.84-8.48-9.11.68,11.56-4.86A171.38,171.38,0,0,1,463,260.83Z" style="opacity: 0.2; transform-origin: 446.881px 288.164px;" class="animable"></path>
                            </g>
                            <g id="el606fia7rgly">
                                <path d="M463,260.83c-35.68,11.68-36,35.55-28,52.55,2,3.44,8.17,5.29,13.51-15.85l-9.37,1.2,10.92-5.54,2.84-8.48-9.11.68,11.56-4.86A171.38,171.38,0,0,1,463,260.83Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 446.881px 288.164px;" class="animable"></path>
                            </g>
                            <path d="M452.91,266.8c-18.82,14.28-20.52,30.65-15.2,47.74C435.83,299.49,433.8,284.27,452.91,266.8Z" style="fill: rgb(255, 255, 255); transform-origin: 443.999px 290.67px;" id="el763tj6j627j" class="animable"></path>
                            <path d="M402.57,285.07c35.17,5,39.44,27.13,34.77,44.3-1.32,3.54-6.73,6.28-15.22-12.52l8.93-.44L420,313.07l-4-7.42,8.59-.89-11.57-2.6A163.18,163.18,0,0,0,402.57,285.07Z" style="fill: rgb(46, 172, 124); transform-origin: 420.733px 308.496px;" id="elp3er2m8ug" class="animable"></path>
                            <g id="elzsbuopu9kyj">
                                <path d="M402.57,285.07c35.17,5,39.44,27.13,34.77,44.3-1.32,3.54-6.73,6.28-15.22-12.52l8.93-.44L420,313.07l-4-7.42,8.59-.89-11.57-2.6A163.18,163.18,0,0,0,402.57,285.07Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 420.733px 308.496px;" class="animable"></path>
                            </g>
                            <g id="elvgk07cpocdj">
                                <path d="M402.57,285.07c35.17,5,39.44,27.13,34.77,44.3-1.32,3.54-6.73,6.28-15.22-12.52l8.93-.44L420,313.07l-4-7.42,8.59-.89-11.57-2.6A163.18,163.18,0,0,0,402.57,285.07Z" style="opacity: 0.1; transform-origin: 420.733px 308.496px;" class="animable"></path>
                            </g>
                            <path d="M413,289c19.89,10.17,24.2,25.14,22.09,41.94C434.3,316.57,433.66,302.06,413,289Z" style="fill: rgb(255, 255, 255); transform-origin: 424.288px 309.97px;" id="el6mfrxyshmtl" class="animable"></path>
                            <path d="M473.3,293.38c-32.26.53-38.59,20-36.3,36,.79,3.34,5.36,6.41,15.11-9.58l-8-1.4,10.37-1.77,4.48-6.24-7.65-1.75,10.73-1.06A146,146,0,0,1,473.3,293.38Z" style="fill: rgb(46, 172, 124); transform-origin: 454.939px 312.719px;" id="elf7otp1lj2we" class="animable"></path>
                            <path d="M463.5,295.72c-19.08,6.94-24.63,19.95-24.61,35.33C441.17,318.22,443.37,305.21,463.5,295.72Z" style="fill: rgb(255, 255, 255); transform-origin: 451.195px 313.385px;" id="el450iox93hzy" class="animable"></path>
                            <g id="el3txr3z6wyrn">
                                <path d="M473.3,293.38c-32.26.53-38.59,20-36.3,36,.79,3.34,5.36,6.41,15.11-9.58l-8-1.4,10.37-1.77,4.48-6.24-7.65-1.75,10.73-1.06A146,146,0,0,1,473.3,293.38Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 454.939px 312.719px;" class="animable"></path>
                            </g>
                        </g>
                        <g id="freepik--window--inject-74" class="animable" style="transform-origin: 157.75px 197.71px;">
                            <polygon points="49.42 202.33 49.38 190 42.95 186.34 42.98 198.38 42.98 198.38 42.99 198.66 49.42 202.33 49.42 202.33" style="fill: rgb(46, 172, 124); transform-origin: 46.185px 194.335px;" id="elwwgdqlhi02m" class="animable"></polygon>
                            <path d="M49.82,345.09l-.4-142.76L43,198.66l.4,142.48a2.69,2.69,0,0,0,1.08,2.42h0l0,0,0,0,6.34,3.87A2.68,2.68,0,0,1,49.82,345.09Z" style="fill: rgb(46, 172, 124); transform-origin: 46.91px 273.045px;" id="elns10r3jlrs" class="animable"></path>
                            <g id="elbzfw9mmg5fc">
                                <path d="M49.82,345.09l-.4-142.76L43,198.66l.4,142.48a2.69,2.69,0,0,0,1.08,2.42h0l0,0,0,0,6.34,3.87A2.68,2.68,0,0,1,49.82,345.09Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 46.91px 273.045px;" class="animable"></path>
                            </g>
                            <path d="M53.64,347.26a4.48,4.48,0,0,1-.74.35A4.48,4.48,0,0,0,53.64,347.26Z" style="fill: rgb(69, 90, 100); transform-origin: 53.27px 347.435px;" id="el1iqnlwrql9v" class="animable"></path>
                            <path d="M52.38,347.73l-.16,0Z" style="fill: rgb(69, 90, 100); transform-origin: 52.3px 347.73px;" id="elr9hjlalvb6" class="animable"></path>
                            <path d="M51.06,347.59h0l-.05,0Z" style="fill: rgb(69, 90, 100); transform-origin: 51.035px 347.59px;" id="elkpg4wtmkm4" class="animable"></path>
                            <path d="M49.4,190l0-7.1a8.37,8.37,0,0,1,3.8-6.58L268.29,52.1a2.7,2.7,0,0,1,2.67-.28l-6.35-3.9h0a2.65,2.65,0,0,0-2.75.22L46.75,172.35a8.38,8.38,0,0,0-3.8,6.58l0,7.1h0l0,0v.28L49.38,190Z" style="fill: rgb(46, 172, 124); transform-origin: 156.955px 118.818px;" id="el9ch6ngap0w" class="animable"></path>
                            <g id="elq55izqetkrl">
                                <path d="M49.4,190l0-7.1a8.37,8.37,0,0,1,3.8-6.58L268.29,52.1a2.7,2.7,0,0,1,2.67-.28l-6.35-3.9h0a2.65,2.65,0,0,0-2.75.22L46.75,172.35a8.38,8.38,0,0,0-3.8,6.58l0,7.1h0l0,0v.28L49.38,190Z" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 156.955px 118.818px;" class="animable"></path>
                            </g>
                            <g id="eltb8tps3j45">
                                <polygon points="49.42 202.33 49.38 190 42.95 186.34 42.98 198.38 42.98 198.38 42.99 198.66 49.42 202.33 49.42 202.33" style="opacity: 0.2; transform-origin: 46.185px 194.335px;" class="animable"></polygon>
                            </g>
                            <g id="elrj9ihpwhkj">
                                <polygon points="49.42 202.33 49.38 190 42.95 186.34 42.98 198.38 42.98 198.38 42.99 198.66 49.42 202.33 49.42 202.33" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 46.185px 194.335px;" class="animable"></polygon>
                            </g>
                            <path d="M268.29,52.1c2.1-1.21,3.82-.24,3.82,2.18l0,7.11L49.4,190l0-7.1a8.37,8.37,0,0,1,3.8-6.58Z" style="fill: rgb(46, 172, 124); transform-origin: 160.755px 120.79px;" id="elob3gavhane" class="animable"></path>
                            <path d="M253.87,63.85c1.13-.65,2-.13,2,1.16a4.51,4.51,0,0,1-2,3.52c-1.13.65-2,.13-2-1.17A4.49,4.49,0,0,1,253.87,63.85Z" style="fill: rgb(255, 255, 255); transform-origin: 253.87px 66.1899px;" id="elpljgm0qeeza" class="animable"></path>
                            <path d="M260.09,60.26c1.12-.65,2-.13,2,1.16a4.44,4.44,0,0,1-2,3.52c-1.12.65-2,.13-2-1.16A4.44,4.44,0,0,1,260.09,60.26Z" style="fill: rgb(255, 255, 255); transform-origin: 260.09px 62.6px;" id="elwhh1nfl272s" class="animable"></path>
                            <path d="M266.3,56.67c1.12-.64,2-.12,2,1.17a4.51,4.51,0,0,1-2,3.52c-1.13.65-2,.12-2-1.17A4.46,4.46,0,0,1,266.3,56.67Z" style="fill: rgb(255, 255, 255); transform-origin: 266.3px 59.0172px;" id="eli0ss4r38b3g" class="animable"></path>
                            <path d="M94.2,157.08c.84-.49,1.61-.41,2,.21l2,3.12c.4.62,1.17.71,2,.22L272.11,61.41l0,12.34L49.42,202.34l0-12.34,6.6-3.81a5.07,5.07,0,0,0,2-2.55l2-5.43a5,5,0,0,1,2-2.54Z" style="fill: rgb(224, 224, 224); transform-origin: 160.765px 131.875px;" id="elhgof6evxal" class="animable"></path>
                            <path d="M272.15,73.73l.4,142.76a8.38,8.38,0,0,1-3.79,6.58L53.64,347.26c-2.11,1.22-3.81.24-3.82-2.17l-.4-142.76Z" style="fill: rgb(46, 172, 124); transform-origin: 160.985px 210.758px;" id="elcu5jvhjxke9" class="animable"></path>
                            <g id="elyrw4aek55li">
                                <g style="opacity: 0.4; transform-origin: 160.985px 210.758px;" class="animable">
                                    <path d="M272.15,73.73l.4,142.76a8.38,8.38,0,0,1-3.79,6.58L53.64,347.26c-2.11,1.22-3.81.24-3.82-2.17l-.4-142.76Z" style="fill: rgb(255, 255, 255); transform-origin: 160.985px 210.758px;" id="elqvgez0s4j" class="animable"></path>
                                </g>
                            </g>
                            <path d="M263.34,69c1.49-.86,2.7-.17,2.71,1.55a6,6,0,0,1-2.7,4.67L74.82,184.06c-1.5.86-2.72.17-2.72-1.55a5.92,5.92,0,0,1,2.7-4.67Z" style="fill: rgb(255, 255, 255); transform-origin: 169.075px 126.53px;" id="elrd5rjmavaac" class="animable"></path>
                            <path d="M53,191.1a.26.26,0,0,1,.28,0c.14.1.13.38,0,.63l-1.19,1.94,3.12-1.8a.24.24,0,0,1,.39.21.87.87,0,0,1-.39.67l-3.12,1.8,1.2.56c.15.08.16.35,0,.61a.82.82,0,0,1-.28.3.28.28,0,0,1-.26,0l-1.91-.92-.08-.07v0l0-.16,0-.19v0l.07-.16,1.91-3.12A.62.62,0,0,1,53,191.1Z" style="fill: rgb(224, 224, 224); transform-origin: 53.1806px 193.556px;" id="el7i9qaq2abbq" class="animable"></path>
                            <path d="M59.73,187.2a.28.28,0,0,1,.26,0l1.92.91.07.09h0l0,.16,0,.19,0,0-.07.15L60,191.84a.92.92,0,0,1-.26.26.26.26,0,0,1-.28,0c-.14-.09-.14-.37,0-.63l1.18-1.94-3.12,1.8a.23.23,0,0,1-.38-.22.83.83,0,0,1,.38-.65l3.12-1.8-1.19-.57c-.16-.08-.17-.35,0-.61A.73.73,0,0,1,59.73,187.2Z" style="fill: rgb(224, 224, 224); transform-origin: 59.5572px 189.654px;" id="eld3e9xqk11kw" class="animable"></path>
                            <path d="M66.15,183.49a1.71,1.71,0,0,1,1.29-.24l.28-.37a.72.72,0,0,1,.21-.19.28.28,0,0,1,.21-.05c.13,0,.19.15.17.34l-.16,1.17a.88.88,0,0,1-.37.59l-.1,0-.93.26a.22.22,0,0,1-.28-.19.74.74,0,0,1,.17-.54l.09-.12a1.15,1.15,0,0,0-.58.18,3,3,0,0,0-1.37,2.37c0,.87.62,1.22,1.38.78a3,3,0,0,0,1.2-1.51.89.89,0,0,1,.33-.42.45.45,0,0,1,.19-.05c.18,0,.25.24.15.51a4.7,4.7,0,0,1-1.87,2.35c-1.17.67-2.14.13-2.14-1.22A4.71,4.71,0,0,1,66.15,183.49Z" style="fill: rgb(224, 224, 224); transform-origin: 66.1669px 185.642px;" id="el07vtt24cp8w7" class="animable"></path>
                            <g id="el3nxniae1o1y">
                                <g style="opacity: 0.3; transform-origin: 53.1806px 193.556px;" class="animable">
                                    <path d="M53,191.1a.26.26,0,0,1,.28,0c.14.1.13.38,0,.63l-1.19,1.94,3.12-1.8a.24.24,0,0,1,.39.21.87.87,0,0,1-.39.67l-3.12,1.8,1.2.56c.15.08.16.35,0,.61a.82.82,0,0,1-.28.3.28.28,0,0,1-.26,0l-1.91-.92-.08-.07v0l0-.16,0-.19v0l.07-.16,1.91-3.12A.62.62,0,0,1,53,191.1Z" id="el8j2pw3jhd0f" class="animable" style="transform-origin: 53.1806px 193.556px;"></path>
                                </g>
                            </g>
                            <g id="el7o7skdo4kml">
                                <g style="opacity: 0.3; transform-origin: 59.5572px 189.654px;" class="animable">
                                    <path d="M59.73,187.2a.28.28,0,0,1,.26,0l1.92.91.07.09h0l0,.16,0,.19,0,0-.07.15L60,191.84a.92.92,0,0,1-.26.26.26.26,0,0,1-.28,0c-.14-.09-.14-.37,0-.63l1.18-1.94-3.12,1.8a.23.23,0,0,1-.38-.22.83.83,0,0,1,.38-.65l3.12-1.8-1.19-.57c-.16-.08-.17-.35,0-.61A.73.73,0,0,1,59.73,187.2Z" id="eljbvvaq048na" class="animable" style="transform-origin: 59.5572px 189.654px;"></path>
                                </g>
                            </g>
                            <g id="elalji3nldccd">
                                <g style="opacity: 0.3; transform-origin: 66.1669px 185.642px;" class="animable">
                                    <path d="M66.15,183.49a1.71,1.71,0,0,1,1.29-.24l.28-.37a.72.72,0,0,1,.21-.19.28.28,0,0,1,.21-.05c.13,0,.19.15.17.34l-.16,1.17a.88.88,0,0,1-.37.59l-.1,0-.93.26a.22.22,0,0,1-.28-.19.74.74,0,0,1,.17-.54l.09-.12a1.15,1.15,0,0,0-.58.18,3,3,0,0,0-1.37,2.37c0,.87.62,1.22,1.38.78a3,3,0,0,0,1.2-1.51.89.89,0,0,1,.33-.42.45.45,0,0,1,.19-.05c.18,0,.25.24.15.51a4.7,4.7,0,0,1-1.87,2.35c-1.17.67-2.14.13-2.14-1.22A4.71,4.71,0,0,1,66.15,183.49Z" id="elkiestlfuxpb" class="animable" style="transform-origin: 66.1669px 185.642px;"></path>
                                </g>
                            </g>
                            <g id="elpctu6zyay8s">
                                <path d="M272.15,73.75h0l0-12.34L100.25,160.63l-.06,0L272.13,61.39l0-7.11A2.62,2.62,0,0,0,271,51.82h0l-6.35-3.9h0a2.65,2.65,0,0,0-2.75.22L46.75,172.35a8.38,8.38,0,0,0-3.8,6.58l0,7.1h0l0,0v.28l0,12v.28l.4,142.48a2.69,2.69,0,0,0,1.08,2.42h0l0,0,0,0,6.34,3.87.15.09.05,0h0a2.74,2.74,0,0,0,2.58-.32L268.76,223.07a8.38,8.38,0,0,0,3.79-6.58Zm-222,272.81s0-.09,0-.14S50.09,346.52,50.11,346.56Zm-.21-.66a4.12,4.12,0,0,1-.08-.81A4.12,4.12,0,0,0,49.9,345.9ZM269.76,51.59l-.13,0Zm-.71.16a4.23,4.23,0,0,0-.76.35A4.23,4.23,0,0,1,269.05,51.75ZM50,180.05a7.22,7.22,0,0,0-.65,2.83h0A7.22,7.22,0,0,1,50,180.05ZM49.4,190h0L56,186.15l-.06,0L49.38,190Zm0,12.35Z" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 157.75px 197.636px;" class="animable"></path>
                            </g>
                            <polygon points="222.98 218.01 222.04 220.18 214.3 224.66 214.33 236.09 228.78 227.74 228.75 216.9 228.74 216.31 228.74 214.69 222.98 218.01" style="fill: rgb(46, 172, 124); transform-origin: 221.54px 225.39px;" id="elgibwtad7fxm" class="animable"></polygon>
                            <polygon points="228.78 231.02 214.33 239.37 214.33 238.08 228.78 229.74 228.78 231.02" style="fill: rgb(46, 172, 124); transform-origin: 221.555px 234.555px;" id="elewn05ju421d" class="animable"></polygon>
                            <polygon points="228.78 232.42 228.78 233.7 221.12 238.12 221.12 236.84 228.78 232.42" style="fill: rgb(46, 172, 124); transform-origin: 224.95px 235.27px;" id="eleg92d10ak0a" class="animable"></polygon>
                            <g id="el2w9dmaz2dsd">
                                <polygon points="228.78 231.02 214.33 239.37 214.33 238.08 228.78 229.74 228.78 231.02" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 221.555px 234.555px;" class="animable"></polygon>
                            </g>
                            <g id="elzw5lho2n12b">
                                <polygon points="228.78 232.42 228.78 233.7 221.12 238.12 221.12 236.84 228.78 232.42" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 224.95px 235.27px;" class="animable"></polygon>
                            </g>
                            <polygon points="222.98 184.69 222.04 186.87 214.3 191.34 214.33 202.77 228.78 194.43 228.75 183.58 228.74 183 228.74 181.37 222.98 184.69" style="fill: rgb(46, 172, 124); transform-origin: 221.54px 192.07px;" id="elm1th8o585ms" class="animable"></polygon>
                            <polygon points="228.78 197.71 214.33 206.05 214.33 204.77 228.78 196.43 228.78 197.71" style="fill: rgb(46, 172, 124); transform-origin: 221.555px 201.24px;" id="elgrggpg7991" class="animable"></polygon>
                            <polygon points="228.78 199.1 228.78 200.39 221.12 204.81 221.12 203.52 228.78 199.1" style="fill: rgb(46, 172, 124); transform-origin: 224.95px 201.955px;" id="elzw2h9pxbv9" class="animable"></polygon>
                            <g id="el5enuohetr4j">
                                <polygon points="228.78 197.71 214.33 206.05 214.33 204.77 228.78 196.43 228.78 197.71" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 221.555px 201.24px;" class="animable"></polygon>
                            </g>
                            <g id="elwcyyx5x9mw">
                                <polygon points="228.78 199.1 228.78 200.39 221.12 204.81 221.12 203.52 228.78 199.1" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 224.95px 201.955px;" class="animable"></polygon>
                            </g>
                            <polygon points="222.98 151.38 222.04 153.55 214.3 158.03 214.33 169.46 228.78 161.12 228.75 150.27 228.74 149.69 228.74 148.06 222.98 151.38" style="fill: rgb(46, 172, 124); transform-origin: 221.54px 158.76px;" id="el2vekwyql6ox" class="animable"></polygon>
                            <polygon points="228.78 164.4 214.33 172.74 214.33 171.45 228.78 163.11 228.78 164.4" style="fill: rgb(46, 172, 124); transform-origin: 221.555px 167.925px;" id="elt9fvo6garff" class="animable"></polygon>
                            <polygon points="228.78 165.79 228.78 167.07 221.12 171.49 221.12 170.21 228.78 165.79" style="fill: rgb(46, 172, 124); transform-origin: 224.95px 168.64px;" id="elgb1yuvthubq" class="animable"></polygon>
                            <g id="elr7garr4nmb">
                                <polygon points="228.78 164.4 214.33 172.74 214.33 171.45 228.78 163.11 228.78 164.4" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 221.555px 167.925px;" class="animable"></polygon>
                            </g>
                            <g id="eltq1reawoaxm">
                                <polygon points="228.78 165.79 228.78 167.07 221.12 171.49 221.12 170.21 228.78 165.79" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 224.95px 168.64px;" class="animable"></polygon>
                            </g>
                            <polygon points="222.98 118.07 222.04 120.24 214.3 124.71 214.33 136.14 228.78 127.8 228.75 116.95 228.74 116.37 228.74 114.74 222.98 118.07" style="fill: rgb(46, 172, 124); transform-origin: 221.54px 125.44px;" id="elnj8yzn2ykgk" class="animable"></polygon>
                            <polygon points="228.78 131.08 214.33 139.42 214.33 138.14 228.78 129.8 228.78 131.08" style="fill: rgb(46, 172, 124); transform-origin: 221.555px 134.61px;" id="el04tdbwr4hoxj" class="animable"></polygon>
                            <polygon points="228.78 132.47 228.78 133.76 221.12 138.18 221.12 136.9 228.78 132.47" style="fill: rgb(46, 172, 124); transform-origin: 224.95px 135.325px;" id="elkpgiarve12" class="animable"></polygon>
                            <g id="el9km7wl62sv4">
                                <polygon points="228.78 131.08 214.33 139.42 214.33 138.14 228.78 129.8 228.78 131.08" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 221.555px 134.61px;" class="animable"></polygon>
                            </g>
                            <g id="eld5mmmhrbb8n">
                                <polygon points="228.78 132.47 228.78 133.76 221.12 138.18 221.12 136.9 228.78 132.47" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 224.95px 135.325px;" class="animable"></polygon>
                            </g>
                            <polygon points="251.25 201.63 250.31 203.81 242.56 208.28 242.59 219.71 257.04 211.37 257.01 200.52 257.01 199.94 257 198.31 251.25 201.63" style="fill: rgb(46, 172, 124); transform-origin: 249.8px 209.01px;" id="elz15k1gik288" class="animable"></polygon>
                            <polygon points="257.04 214.65 242.59 222.99 242.59 221.71 257.04 213.37 257.04 214.65" style="fill: rgb(46, 172, 124); transform-origin: 249.815px 218.18px;" id="el6q6mwzub3fq" class="animable"></polygon>
                            <polygon points="257.04 216.04 257.04 217.32 249.38 221.75 249.38 220.46 257.04 216.04" style="fill: rgb(46, 172, 124); transform-origin: 253.21px 218.895px;" id="el62vn51gd42f" class="animable"></polygon>
                            <g id="el2pzvv2qqktw">
                                <polygon points="257.04 214.65 242.59 222.99 242.59 221.71 257.04 213.37 257.04 214.65" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 249.815px 218.18px;" class="animable"></polygon>
                            </g>
                            <g id="el5x0ozo0kyad">
                                <polygon points="257.04 216.04 257.04 217.32 249.38 221.75 249.38 220.46 257.04 216.04" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 253.21px 218.895px;" class="animable"></polygon>
                            </g>
                            <polygon points="251.25 168.32 250.31 170.49 242.56 174.97 242.59 186.4 257.04 178.05 257.01 167.21 257.01 166.63 257 165 251.25 168.32" style="fill: rgb(46, 172, 124); transform-origin: 249.8px 175.7px;" id="elhg1ma9ql2fq" class="animable"></polygon>
                            <polygon points="257.04 181.34 242.59 189.68 242.59 188.39 257.04 180.05 257.04 181.34" style="fill: rgb(46, 172, 124); transform-origin: 249.815px 184.865px;" id="el61jh301v3f5" class="animable"></polygon>
                            <polygon points="257.04 182.73 257.04 184.01 249.38 188.43 249.38 187.15 257.04 182.73" style="fill: rgb(46, 172, 124); transform-origin: 253.21px 185.58px;" id="elc762y1xhs6" class="animable"></polygon>
                            <g id="elfr8er1e597">
                                <polygon points="257.04 181.34 242.59 189.68 242.59 188.39 257.04 180.05 257.04 181.34" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 249.815px 184.865px;" class="animable"></polygon>
                            </g>
                            <g id="elmufc2ezdf7l">
                                <polygon points="257.04 182.73 257.04 184.01 249.38 188.43 249.38 187.15 257.04 182.73" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 253.21px 185.58px;" class="animable"></polygon>
                            </g>
                            <polygon points="251.25 135.01 250.31 137.18 242.56 141.65 242.59 153.08 257.04 144.74 257.01 133.89 257.01 133.31 257 131.68 251.25 135.01" style="fill: rgb(46, 172, 124); transform-origin: 249.8px 142.38px;" id="elxnhawivird" class="animable"></polygon>
                            <polygon points="257.04 148.02 242.59 156.36 242.59 155.08 257.04 146.74 257.04 148.02" style="fill: rgb(46, 172, 124); transform-origin: 249.815px 151.55px;" id="elkw8m50xrox" class="animable"></polygon>
                            <polygon points="257.04 149.41 257.04 150.7 249.38 155.12 249.38 153.84 257.04 149.41" style="fill: rgb(46, 172, 124); transform-origin: 253.21px 152.265px;" id="elzz3gzd6nwab" class="animable"></polygon>
                            <g id="elhng0gr9ry96">
                                <polygon points="257.04 148.02 242.59 156.36 242.59 155.08 257.04 146.74 257.04 148.02" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 249.815px 151.55px;" class="animable"></polygon>
                            </g>
                            <g id="eleeo74wcqdqv">
                                <polygon points="257.04 149.41 257.04 150.7 249.38 155.12 249.38 153.84 257.04 149.41" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 253.21px 152.265px;" class="animable"></polygon>
                            </g>
                            <polygon points="251.25 101.69 250.31 103.86 242.56 108.34 242.59 119.77 257.04 111.43 257.01 100.58 257.01 100 257 98.37 251.25 101.69" style="fill: rgb(46, 172, 124); transform-origin: 249.8px 109.07px;" id="elgf0gscfulp6" class="animable"></polygon>
                            <polygon points="257.04 114.71 242.59 123.05 242.59 121.77 257.04 113.42 257.04 114.71" style="fill: rgb(46, 172, 124); transform-origin: 249.815px 118.235px;" id="elxz0aa6uc4hi" class="animable"></polygon>
                            <polygon points="257.04 116.1 257.04 117.38 249.38 121.8 249.38 120.52 257.04 116.1" style="fill: rgb(46, 172, 124); transform-origin: 253.21px 118.95px;" id="elvgaos4hm03" class="animable"></polygon>
                            <g id="el0mgoo2gthzji">
                                <polygon points="257.04 114.71 242.59 123.05 242.59 121.77 257.04 113.42 257.04 114.71" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 249.815px 118.235px;" class="animable"></polygon>
                            </g>
                            <g id="elaljsmva4wak">
                                <polygon points="257.04 116.1 257.04 117.38 249.38 121.8 249.38 120.52 257.04 116.1" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 253.21px 118.95px;" class="animable"></polygon>
                            </g>
                            <polygon points="194.08 234.77 193.15 236.94 185.4 241.41 185.43 252.84 199.88 244.5 199.85 233.65 199.84 233.07 199.84 231.44 194.08 234.77" style="fill: rgb(46, 172, 124); transform-origin: 192.64px 242.14px;" id="el0cvfoeiamnzh" class="animable"></polygon>
                            <polygon points="199.88 247.78 185.43 256.12 185.43 254.84 199.88 246.5 199.88 247.78" style="fill: rgb(46, 172, 124); transform-origin: 192.655px 251.31px;" id="elcg49fvf4lg9" class="animable"></polygon>
                            <polygon points="199.88 249.17 199.88 250.46 192.22 254.88 192.22 253.59 199.88 249.17" style="fill: rgb(46, 172, 124); transform-origin: 196.05px 252.025px;" id="elkjk2l6u480l" class="animable"></polygon>
                            <g id="el5g8ltzd9pzn">
                                <polygon points="199.88 247.78 185.43 256.12 185.43 254.84 199.88 246.5 199.88 247.78" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 192.655px 251.31px;" class="animable"></polygon>
                            </g>
                            <g id="el5tysu5d4f95">
                                <polygon points="199.88 249.17 199.88 250.46 192.22 254.88 192.22 253.59 199.88 249.17" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 196.05px 252.025px;" class="animable"></polygon>
                            </g>
                            <polygon points="194.08 201.45 193.15 203.63 185.4 208.1 185.43 219.53 199.88 211.19 199.85 200.34 199.84 199.76 199.84 198.13 194.08 201.45" style="fill: rgb(46, 172, 124); transform-origin: 192.64px 208.83px;" id="el7neoezs99z8" class="animable"></polygon>
                            <polygon points="199.88 214.47 185.43 222.81 185.43 221.53 199.88 213.18 199.88 214.47" style="fill: rgb(46, 172, 124); transform-origin: 192.655px 217.995px;" id="elobjly62xda" class="animable"></polygon>
                            <polygon points="199.88 215.86 199.88 217.14 192.22 221.56 192.22 220.28 199.88 215.86" style="fill: rgb(46, 172, 124); transform-origin: 196.05px 218.71px;" id="el5l6zu7n8f4e" class="animable"></polygon>
                            <g id="elw4b6hyhmj5">
                                <polygon points="199.88 214.47 185.43 222.81 185.43 221.53 199.88 213.18 199.88 214.47" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 192.655px 217.995px;" class="animable"></polygon>
                            </g>
                            <g id="el4c9jsfxpjft">
                                <polygon points="199.88 215.86 199.88 217.14 192.22 221.56 192.22 220.28 199.88 215.86" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 196.05px 218.71px;" class="animable"></polygon>
                            </g>
                            <polygon points="194.08 168.14 193.15 170.31 185.4 174.78 185.43 186.21 199.88 177.87 199.85 167.03 199.84 166.44 199.84 164.81 194.08 168.14" style="fill: rgb(46, 172, 124); transform-origin: 192.64px 175.51px;" id="elpdgyiak05b" class="animable"></polygon>
                            <polygon points="199.88 181.15 185.43 189.5 185.43 188.21 199.88 179.87 199.88 181.15" style="fill: rgb(46, 172, 124); transform-origin: 192.655px 184.685px;" id="eljbfnd4obh5i" class="animable"></polygon>
                            <polygon points="199.88 182.55 199.88 183.83 192.22 188.25 192.22 186.97 199.88 182.55" style="fill: rgb(46, 172, 124); transform-origin: 196.05px 185.4px;" id="elgw1amy8wlk" class="animable"></polygon>
                            <g id="el79c1coc0uzn">
                                <polygon points="199.88 181.15 185.43 189.5 185.43 188.21 199.88 179.87 199.88 181.15" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 192.655px 184.685px;" class="animable"></polygon>
                            </g>
                            <g id="eluq8a3qb5gb">
                                <polygon points="199.88 182.55 199.88 183.83 192.22 188.25 192.22 186.97 199.88 182.55" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 196.05px 185.4px;" class="animable"></polygon>
                            </g>
                            <polygon points="194.08 134.82 193.15 137 185.4 141.47 185.43 152.9 199.88 144.56 199.85 133.71 199.84 133.13 199.84 131.5 194.08 134.82" style="fill: rgb(46, 172, 124); transform-origin: 192.64px 142.2px;" id="elozpxwmown9h" class="animable"></polygon>
                            <polygon points="199.88 147.84 185.43 156.18 185.43 154.9 199.88 146.56 199.88 147.84" style="fill: rgb(46, 172, 124); transform-origin: 192.655px 151.37px;" id="elnz6xi5np3ga" class="animable"></polygon>
                            <polygon points="199.88 149.23 199.88 150.51 192.22 154.94 192.22 153.65 199.88 149.23" style="fill: rgb(46, 172, 124); transform-origin: 196.05px 152.085px;" id="elyf4k1xzoglc" class="animable"></polygon>
                            <g id="elhiy9i9kvi2a">
                                <polygon points="199.88 147.84 185.43 156.18 185.43 154.9 199.88 146.56 199.88 147.84" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 192.655px 151.37px;" class="animable"></polygon>
                            </g>
                            <g id="elksw7pa9cgwl">
                                <polygon points="199.88 149.23 199.88 150.51 192.22 154.94 192.22 153.65 199.88 149.23" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 196.05px 152.085px;" class="animable"></polygon>
                            </g>
                            <polygon points="165.19 251.52 164.25 253.7 156.5 258.17 156.53 269.6 170.98 261.26 170.95 250.41 170.95 249.83 170.94 248.2 165.19 251.52" style="fill: rgb(46, 172, 124); transform-origin: 163.74px 258.9px;" id="elsfbunpjr8ha" class="animable"></polygon>
                            <polygon points="170.98 264.54 156.53 272.88 156.53 271.6 170.98 263.25 170.98 264.54" style="fill: rgb(46, 172, 124); transform-origin: 163.755px 268.065px;" id="elwhk8bx04v1c" class="animable"></polygon>
                            <polygon points="170.98 265.93 170.98 267.21 163.32 271.63 163.32 270.35 170.98 265.93" style="fill: rgb(46, 172, 124); transform-origin: 167.15px 268.78px;" id="elxjhcyp7zjm8" class="animable"></polygon>
                            <g id="elvouilafe76d">
                                <polygon points="170.98 264.54 156.53 272.88 156.53 271.6 170.98 263.25 170.98 264.54" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 163.755px 268.065px;" class="animable"></polygon>
                            </g>
                            <g id="el88n1g5jv7k">
                                <polygon points="170.98 265.93 170.98 267.21 163.32 271.63 163.32 270.35 170.98 265.93" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 167.15px 268.78px;" class="animable"></polygon>
                            </g>
                            <polygon points="165.19 218.21 164.25 220.38 156.5 224.86 156.53 236.28 170.98 227.94 170.95 217.1 170.95 216.51 170.94 214.89 165.19 218.21" style="fill: rgb(46, 172, 124); transform-origin: 163.74px 225.585px;" id="el42ezz65guis" class="animable"></polygon>
                            <polygon points="170.98 231.22 156.53 239.57 156.53 238.28 170.98 229.94 170.98 231.22" style="fill: rgb(46, 172, 124); transform-origin: 163.755px 234.755px;" id="elohkab9jgrxq" class="animable"></polygon>
                            <polygon points="170.98 232.62 170.98 233.9 163.32 238.32 163.32 237.04 170.98 232.62" style="fill: rgb(46, 172, 124); transform-origin: 167.15px 235.47px;" id="elhaqv1k9su3w" class="animable"></polygon>
                            <g id="elty96pu3v31f">
                                <polygon points="170.98 231.22 156.53 239.57 156.53 238.28 170.98 229.94 170.98 231.22" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 163.755px 234.755px;" class="animable"></polygon>
                            </g>
                            <g id="eld46gdy90woc">
                                <polygon points="170.98 232.62 170.98 233.9 163.32 238.32 163.32 237.04 170.98 232.62" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 167.15px 235.47px;" class="animable"></polygon>
                            </g>
                            <polygon points="165.19 184.9 164.25 187.07 156.5 191.54 156.53 202.97 170.98 194.63 170.95 183.78 170.95 183.2 170.94 181.57 165.19 184.9" style="fill: rgb(46, 172, 124); transform-origin: 163.74px 192.27px;" id="eloi4lnu6apgj" class="animable"></polygon>
                            <polygon points="170.98 197.91 156.53 206.25 156.53 204.97 170.98 196.63 170.98 197.91" style="fill: rgb(46, 172, 124); transform-origin: 163.755px 201.44px;" id="elq5vbm5ujhtf" class="animable"></polygon>
                            <polygon points="170.98 199.3 170.98 200.59 163.32 205.01 163.32 203.72 170.98 199.3" style="fill: rgb(46, 172, 124); transform-origin: 167.15px 202.155px;" id="elkfg9j9f4o2l" class="animable"></polygon>
                            <g id="elq41lejx957j">
                                <polygon points="170.98 197.91 156.53 206.25 156.53 204.97 170.98 196.63 170.98 197.91" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 163.755px 201.44px;" class="animable"></polygon>
                            </g>
                            <g id="el513qqeo7b8b">
                                <polygon points="170.98 199.3 170.98 200.59 163.32 205.01 163.32 203.72 170.98 199.3" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 167.15px 202.155px;" class="animable"></polygon>
                            </g>
                            <polygon points="165.19 151.58 164.25 153.75 156.5 158.23 156.53 169.66 170.98 161.32 170.95 150.47 170.95 149.89 170.94 148.26 165.19 151.58" style="fill: rgb(46, 172, 124); transform-origin: 163.74px 158.96px;" id="elz9x55kd0s7f" class="animable"></polygon>
                            <polygon points="170.98 164.6 156.53 172.94 156.53 171.66 170.98 163.31 170.98 164.6" style="fill: rgb(46, 172, 124); transform-origin: 163.755px 168.125px;" id="elybjinuc0cuk" class="animable"></polygon>
                            <polygon points="170.98 165.99 170.98 167.27 163.32 171.69 163.32 170.41 170.98 165.99" style="fill: rgb(46, 172, 124); transform-origin: 167.15px 168.84px;" id="el9h9yiirkzx9" class="animable"></polygon>
                            <g id="elq3b9mr8e4q">
                                <polygon points="170.98 164.6 156.53 172.94 156.53 171.66 170.98 163.31 170.98 164.6" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 163.755px 168.125px;" class="animable"></polygon>
                            </g>
                            <g id="elc9w6v4zi4z8">
                                <polygon points="170.98 165.99 170.98 167.27 163.32 171.69 163.32 170.41 170.98 165.99" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 167.15px 168.84px;" class="animable"></polygon>
                            </g>
                            <polygon points="136.29 268.28 135.35 270.45 127.6 274.93 127.63 286.36 142.08 278.01 142.05 267.17 142.05 266.59 142.04 264.96 136.29 268.28" style="fill: rgb(46, 172, 124); transform-origin: 134.84px 275.66px;" id="eluxdgahqx49r" class="animable"></polygon>
                            <polygon points="142.08 281.3 127.63 289.64 127.63 288.35 142.08 280.01 142.08 281.3" style="fill: rgb(46, 172, 124); transform-origin: 134.855px 284.825px;" id="eldvnyrezh8r5" class="animable"></polygon>
                            <polygon points="142.08 282.69 142.08 283.97 134.42 288.39 134.42 287.11 142.08 282.69" style="fill: rgb(46, 172, 124); transform-origin: 138.25px 285.54px;" id="elsyarul4nvup" class="animable"></polygon>
                            <g id="elpvlg5p3zrd">
                                <polygon points="142.08 281.3 127.63 289.64 127.63 288.35 142.08 280.01 142.08 281.3" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 134.855px 284.825px;" class="animable"></polygon>
                            </g>
                            <g id="el2v305mn9gx5">
                                <polygon points="142.08 282.69 142.08 283.97 134.42 288.39 134.42 287.11 142.08 282.69" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 138.25px 285.54px;" class="animable"></polygon>
                            </g>
                            <polygon points="136.29 234.97 135.35 237.14 127.6 241.61 127.63 253.04 142.08 244.7 142.05 233.85 142.05 233.27 142.04 231.64 136.29 234.97" style="fill: rgb(46, 172, 124); transform-origin: 134.84px 242.34px;" id="el2vadbmnadxy" class="animable"></polygon>
                            <polygon points="142.08 247.98 127.63 256.32 127.63 255.04 142.08 246.7 142.08 247.98" style="fill: rgb(46, 172, 124); transform-origin: 134.855px 251.51px;" id="elxey8dflyo4" class="animable"></polygon>
                            <polygon points="142.08 249.37 142.08 250.66 134.42 255.08 134.42 253.79 142.08 249.37" style="fill: rgb(46, 172, 124); transform-origin: 138.25px 252.225px;" id="eliwwkzxbm43" class="animable"></polygon>
                            <g id="elrh5g7a7jl1j">
                                <polygon points="142.08 247.98 127.63 256.32 127.63 255.04 142.08 246.7 142.08 247.98" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 134.855px 251.51px;" class="animable"></polygon>
                            </g>
                            <g id="elot0ycqrj4aq">
                                <polygon points="142.08 249.37 142.08 250.66 134.42 255.08 134.42 253.79 142.08 249.37" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 138.25px 252.225px;" class="animable"></polygon>
                            </g>
                            <polygon points="136.29 201.65 135.35 203.83 127.6 208.3 127.63 219.73 142.08 211.39 142.05 200.54 142.05 199.96 142.04 198.33 136.29 201.65" style="fill: rgb(46, 172, 124); transform-origin: 134.84px 209.03px;" id="elec1ablbg2n5" class="animable"></polygon>
                            <polygon points="142.08 214.67 127.63 223.01 127.63 221.73 142.08 213.38 142.08 214.67" style="fill: rgb(46, 172, 124); transform-origin: 134.855px 218.195px;" id="elhj3y8r5xd1s" class="animable"></polygon>
                            <polygon points="142.08 216.06 142.08 217.34 134.42 221.76 134.42 220.48 142.08 216.06" style="fill: rgb(46, 172, 124); transform-origin: 138.25px 218.91px;" id="elfykhy1t02k9" class="animable"></polygon>
                            <g id="elwmqpbzjbr1">
                                <polygon points="142.08 214.67 127.63 223.01 127.63 221.73 142.08 213.38 142.08 214.67" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 134.855px 218.195px;" class="animable"></polygon>
                            </g>
                            <g id="el1ss7ta1dvsb">
                                <polygon points="142.08 216.06 142.08 217.34 134.42 221.76 134.42 220.48 142.08 216.06" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 138.25px 218.91px;" class="animable"></polygon>
                            </g>
                            <polygon points="136.29 168.34 135.35 170.51 127.6 174.99 127.63 186.41 142.08 178.07 142.05 167.23 142.05 166.64 142.04 165.02 136.29 168.34" style="fill: rgb(46, 172, 124); transform-origin: 134.84px 175.715px;" id="el30nyfey6k33" class="animable"></polygon>
                            <polygon points="142.08 181.35 127.63 189.7 127.63 188.41 142.08 180.07 142.08 181.35" style="fill: rgb(46, 172, 124); transform-origin: 134.855px 184.885px;" id="el8wd8x66as97" class="animable"></polygon>
                            <polygon points="142.08 182.75 142.08 184.03 134.42 188.45 134.42 187.17 142.08 182.75" style="fill: rgb(46, 172, 124); transform-origin: 138.25px 185.6px;" id="elb6yj3gsftiw" class="animable"></polygon>
                            <g id="elgiqxkbs4bda">
                                <polygon points="142.08 181.35 127.63 189.7 127.63 188.41 142.08 180.07 142.08 181.35" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 134.855px 184.885px;" class="animable"></polygon>
                            </g>
                            <g id="ellqh1hlm23j">
                                <polygon points="142.08 182.75 142.08 184.03 134.42 188.45 134.42 187.17 142.08 182.75" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 138.25px 185.6px;" class="animable"></polygon>
                            </g>
                            <polygon points="107.39 285.04 106.45 287.21 98.7 291.69 98.73 303.11 113.18 294.77 113.15 283.93 113.15 283.34 113.14 281.71 107.39 285.04" style="fill: rgb(46, 172, 124); transform-origin: 105.94px 292.41px;" id="el6dqorrred3k" class="animable"></polygon>
                            <polygon points="113.18 298.05 98.73 306.39 98.73 305.11 113.18 296.77 113.18 298.05" style="fill: rgb(46, 172, 124); transform-origin: 105.955px 301.58px;" id="elin1rbxi3a4" class="animable"></polygon>
                            <polygon points="113.18 299.45 113.18 300.73 105.52 305.15 105.52 303.87 113.18 299.45" style="fill: rgb(46, 172, 124); transform-origin: 109.35px 302.3px;" id="el28ib7m3wjpr" class="animable"></polygon>
                            <g id="elnw34fujlc8">
                                <polygon points="113.18 298.05 98.73 306.39 98.73 305.11 113.18 296.77 113.18 298.05" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 105.955px 301.58px;" class="animable"></polygon>
                            </g>
                            <g id="el7nn6mnujs5y">
                                <polygon points="113.18 299.45 113.18 300.73 105.52 305.15 105.52 303.87 113.18 299.45" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 109.35px 302.3px;" class="animable"></polygon>
                            </g>
                            <polygon points="107.39 251.72 106.45 253.9 98.7 258.37 98.73 269.8 113.18 261.46 113.15 250.61 113.15 250.03 113.14 248.4 107.39 251.72" style="fill: rgb(46, 172, 124); transform-origin: 105.94px 259.1px;" id="elm9b1hsiqn8" class="animable"></polygon>
                            <polygon points="113.18 264.74 98.73 273.08 98.73 271.8 113.18 263.46 113.18 264.74" style="fill: rgb(46, 172, 124); transform-origin: 105.955px 268.27px;" id="eln6tp3i5nwrq" class="animable"></polygon>
                            <polygon points="113.18 266.13 113.18 267.42 105.52 271.84 105.52 270.55 113.18 266.13" style="fill: rgb(46, 172, 124); transform-origin: 109.35px 268.985px;" id="elatl4yo5q8ap" class="animable"></polygon>
                            <g id="elj6kcozw116o">
                                <polygon points="113.18 264.74 98.73 273.08 98.73 271.8 113.18 263.46 113.18 264.74" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 105.955px 268.27px;" class="animable"></polygon>
                            </g>
                            <g id="el7zf94rsijwx">
                                <polygon points="113.18 266.13 113.18 267.42 105.52 271.84 105.52 270.55 113.18 266.13" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 109.35px 268.985px;" class="animable"></polygon>
                            </g>
                            <polygon points="107.39 218.41 106.45 220.58 98.7 225.06 98.73 236.49 113.18 228.14 113.15 217.3 113.15 216.72 113.14 215.09 107.39 218.41" style="fill: rgb(46, 172, 124); transform-origin: 105.94px 225.79px;" id="elhr1n9ten10a" class="animable"></polygon>
                            <polygon points="113.18 231.43 98.73 239.77 98.73 238.48 113.18 230.14 113.18 231.43" style="fill: rgb(46, 172, 124); transform-origin: 105.955px 234.955px;" id="elsid369xm88" class="animable"></polygon>
                            <polygon points="113.18 232.82 113.18 234.1 105.52 238.52 105.52 237.24 113.18 232.82" style="fill: rgb(46, 172, 124); transform-origin: 109.35px 235.67px;" id="elwvv35r8vevs" class="animable"></polygon>
                            <g id="elqdm1sme3t0n">
                                <polygon points="113.18 231.43 98.73 239.77 98.73 238.48 113.18 230.14 113.18 231.43" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 105.955px 234.955px;" class="animable"></polygon>
                            </g>
                            <g id="el7qeaf3il7vc">
                                <polygon points="113.18 232.82 113.18 234.1 105.52 238.52 105.52 237.24 113.18 232.82" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 109.35px 235.67px;" class="animable"></polygon>
                            </g>
                            <polygon points="107.39 185.1 106.45 187.27 98.7 191.74 98.73 203.17 113.18 194.83 113.15 183.98 113.15 183.4 113.14 181.77 107.39 185.1" style="fill: rgb(46, 172, 124); transform-origin: 105.94px 192.47px;" id="elx6i8xajmkk" class="animable"></polygon>
                            <polygon points="113.18 198.11 98.73 206.45 98.73 205.17 113.18 196.83 113.18 198.11" style="fill: rgb(46, 172, 124); transform-origin: 105.955px 201.64px;" id="el3n8565hun1o" class="animable"></polygon>
                            <polygon points="113.18 199.5 113.18 200.79 105.52 205.21 105.52 203.93 113.18 199.5" style="fill: rgb(46, 172, 124); transform-origin: 109.35px 202.355px;" id="el0dqcnrz2eiyc" class="animable"></polygon>
                            <g id="el9fc48u04i4r">
                                <polygon points="113.18 198.11 98.73 206.45 98.73 205.17 113.18 196.83 113.18 198.11" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 105.955px 201.64px;" class="animable"></polygon>
                            </g>
                            <g id="elicezjy5o1g">
                                <polygon points="113.18 199.5 113.18 200.79 105.52 205.21 105.52 203.93 113.18 199.5" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 109.35px 202.355px;" class="animable"></polygon>
                            </g>
                            <polygon points="78.49 301.8 77.55 303.97 69.8 308.44 69.83 319.87 84.28 311.53 84.25 300.68 84.25 300.1 84.25 298.47 78.49 301.8" style="fill: rgb(46, 172, 124); transform-origin: 77.04px 309.17px;" id="elz9frf49m89" class="animable"></polygon>
                            <polygon points="84.28 314.81 69.83 323.15 69.83 321.87 84.28 313.53 84.28 314.81" style="fill: rgb(46, 172, 124); transform-origin: 77.055px 318.34px;" id="eln1brf6njzco" class="animable"></polygon>
                            <polygon points="84.28 316.2 84.28 317.49 76.63 321.91 76.63 320.62 84.28 316.2" style="fill: rgb(46, 172, 124); transform-origin: 80.455px 319.055px;" id="elnbunfk8f7oj" class="animable"></polygon>
                            <g id="elyzx299xus6">
                                <polygon points="84.28 314.81 69.83 323.15 69.83 321.87 84.28 313.53 84.28 314.81" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 77.055px 318.34px;" class="animable"></polygon>
                            </g>
                            <g id="el6vfv6dbxhp">
                                <polygon points="84.28 316.2 84.28 317.49 76.63 321.91 76.63 320.62 84.28 316.2" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 80.455px 319.055px;" class="animable"></polygon>
                            </g>
                            <polygon points="78.49 268.48 77.55 270.65 69.8 275.13 69.83 286.56 84.28 278.22 84.25 267.37 84.25 266.79 84.25 265.16 78.49 268.48" style="fill: rgb(46, 172, 124); transform-origin: 77.04px 275.86px;" id="elg5elsx0uyk9" class="animable"></polygon>
                            <polygon points="84.28 281.5 69.83 289.84 69.83 288.56 84.28 280.21 84.28 281.5" style="fill: rgb(46, 172, 124); transform-origin: 77.055px 285.025px;" id="elno8b42l5i6" class="animable"></polygon>
                            <polygon points="84.28 282.89 84.28 284.17 76.63 288.59 76.63 287.31 84.28 282.89" style="fill: rgb(46, 172, 124); transform-origin: 80.455px 285.74px;" id="eleblc7f1kv8l" class="animable"></polygon>
                            <g id="elm6rlfxfge4n">
                                <polygon points="84.28 281.5 69.83 289.84 69.83 288.56 84.28 280.21 84.28 281.5" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 77.055px 285.025px;" class="animable"></polygon>
                            </g>
                            <g id="elsqyvhfgvv8f">
                                <polygon points="84.28 282.89 84.28 284.17 76.63 288.59 76.63 287.31 84.28 282.89" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 80.455px 285.74px;" class="animable"></polygon>
                            </g>
                            <polygon points="78.49 235.17 77.55 237.34 69.8 241.81 69.83 253.24 84.28 244.9 84.25 234.06 84.25 233.47 84.25 231.84 78.49 235.17" style="fill: rgb(46, 172, 124); transform-origin: 77.04px 242.54px;" id="elu6emqitg4y" class="animable"></polygon>
                            <polygon points="84.28 248.18 69.83 256.52 69.83 255.24 84.28 246.9 84.28 248.18" style="fill: rgb(46, 172, 124); transform-origin: 77.055px 251.71px;" id="el2kwqexqcaqb" class="animable"></polygon>
                            <polygon points="84.28 249.57 84.28 250.86 76.63 255.28 76.63 254 84.28 249.57" style="fill: rgb(46, 172, 124); transform-origin: 80.455px 252.425px;" id="el2asw78jk7wx" class="animable"></polygon>
                            <g id="elsxwqr1f0d6">
                                <polygon points="84.28 248.18 69.83 256.52 69.83 255.24 84.28 246.9 84.28 248.18" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 77.055px 251.71px;" class="animable"></polygon>
                            </g>
                            <g id="elecmqbki5w5e">
                                <polygon points="84.28 249.57 84.28 250.86 76.63 255.28 76.63 254 84.28 249.57" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 80.455px 252.425px;" class="animable"></polygon>
                            </g>
                            <polygon points="78.49 201.85 77.55 204.03 69.8 208.5 69.83 219.93 84.28 211.59 84.25 200.74 84.25 200.16 84.25 198.53 78.49 201.85" style="fill: rgb(46, 172, 124); transform-origin: 77.04px 209.23px;" id="el0lgkwnie466" class="animable"></polygon>
                            <polygon points="84.28 214.87 69.83 223.21 69.83 221.93 84.28 213.59 84.28 214.87" style="fill: rgb(46, 172, 124); transform-origin: 77.055px 218.4px;" id="elbs4wt7fpriw" class="animable"></polygon>
                            <polygon points="84.28 216.26 84.28 217.54 76.63 221.97 76.63 220.68 84.28 216.26" style="fill: rgb(46, 172, 124); transform-origin: 80.455px 219.115px;" id="el0g4zgfd95sqd" class="animable"></polygon>
                            <g id="eluxlwwh5pskp">
                                <polygon points="84.28 214.87 69.83 223.21 69.83 221.93 84.28 213.59 84.28 214.87" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 77.055px 218.4px;" class="animable"></polygon>
                            </g>
                            <g id="elu4mu1vywjg">
                                <polygon points="84.28 216.26 84.28 217.54 76.63 221.97 76.63 220.68 84.28 216.26" style="fill: rgb(46, 172, 124); opacity: 0.2; transform-origin: 80.455px 219.115px;" class="animable"></polygon>
                            </g>
                            <g id="elkj433see4d">
                                <g style="opacity: 0.1; transform-origin: 163.42px 210.76px;" class="animable">
                                    <polygon points="222.98 218.01 222.04 220.18 214.3 224.66 214.33 236.09 228.78 227.74 228.75 216.9 228.74 216.31 228.74 214.69 222.98 218.01" style="fill: rgb(255, 255, 255); transform-origin: 221.54px 225.39px;" id="el8hnzaph5ttt" class="animable"></polygon>
                                    <polygon points="228.78 231.02 214.33 239.37 214.33 238.08 228.78 229.74 228.78 231.02" style="fill: rgb(255, 255, 255); transform-origin: 221.555px 234.555px;" id="elw33ihvj5jpa" class="animable"></polygon>
                                    <polygon points="228.78 232.42 228.78 233.7 221.12 238.12 221.12 236.84 228.78 232.42" style="fill: rgb(255, 255, 255); transform-origin: 224.95px 235.27px;" id="elws0opew7jqq" class="animable"></polygon>
                                    <g id="el6asr57gu6mf">
                                        <polygon points="228.78 231.02 214.33 239.37 214.33 238.08 228.78 229.74 228.78 231.02" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 221.555px 234.555px;" class="animable"></polygon>
                                    </g>
                                    <g id="ell2kqw808evj">
                                        <polygon points="228.78 232.42 228.78 233.7 221.12 238.12 221.12 236.84 228.78 232.42" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 224.95px 235.27px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="222.98 184.69 222.04 186.87 214.3 191.34 214.33 202.77 228.78 194.43 228.75 183.58 228.74 183 228.74 181.37 222.98 184.69" style="fill: rgb(255, 255, 255); transform-origin: 221.54px 192.07px;" id="el15gic858vvg" class="animable"></polygon>
                                    <polygon points="228.78 197.71 214.33 206.05 214.33 204.77 228.78 196.43 228.78 197.71" style="fill: rgb(255, 255, 255); transform-origin: 221.555px 201.24px;" id="ela2eipetx84g" class="animable"></polygon>
                                    <polygon points="228.78 199.1 228.78 200.39 221.12 204.81 221.12 203.52 228.78 199.1" style="fill: rgb(255, 255, 255); transform-origin: 224.95px 201.955px;" id="el83w8kb5n3w7" class="animable"></polygon>
                                    <g id="elaxusjszo476">
                                        <polygon points="228.78 197.71 214.33 206.05 214.33 204.77 228.78 196.43 228.78 197.71" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 221.555px 201.24px;" class="animable"></polygon>
                                    </g>
                                    <g id="elkesx289sqrl">
                                        <polygon points="228.78 199.1 228.78 200.39 221.12 204.81 221.12 203.52 228.78 199.1" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 224.95px 201.955px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="222.98 151.38 222.04 153.55 214.3 158.03 214.33 169.46 228.78 161.12 228.75 150.27 228.74 149.69 228.74 148.06 222.98 151.38" style="fill: rgb(255, 255, 255); transform-origin: 221.54px 158.76px;" id="elf167e0gj59s" class="animable"></polygon>
                                    <polygon points="228.78 164.4 214.33 172.74 214.33 171.45 228.78 163.11 228.78 164.4" style="fill: rgb(255, 255, 255); transform-origin: 221.555px 167.925px;" id="el296rgilsabt" class="animable"></polygon>
                                    <polygon points="228.78 165.79 228.78 167.07 221.12 171.49 221.12 170.21 228.78 165.79" style="fill: rgb(255, 255, 255); transform-origin: 224.95px 168.64px;" id="elbup3r2o3um" class="animable"></polygon>
                                    <g id="elxiibpyxkzgh">
                                        <polygon points="228.78 164.4 214.33 172.74 214.33 171.45 228.78 163.11 228.78 164.4" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 221.555px 167.925px;" class="animable"></polygon>
                                    </g>
                                    <g id="elxbk8whga0mb">
                                        <polygon points="228.78 165.79 228.78 167.07 221.12 171.49 221.12 170.21 228.78 165.79" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 224.95px 168.64px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="222.98 118.07 222.04 120.24 214.3 124.71 214.33 136.14 228.78 127.8 228.75 116.95 228.74 116.37 228.74 114.74 222.98 118.07" style="fill: rgb(255, 255, 255); transform-origin: 221.54px 125.44px;" id="ellu4umvwis5" class="animable"></polygon>
                                    <polygon points="228.78 131.08 214.33 139.42 214.33 138.14 228.78 129.8 228.78 131.08" style="fill: rgb(255, 255, 255); transform-origin: 221.555px 134.61px;" id="elkfryvwt1na7" class="animable"></polygon>
                                    <polygon points="228.78 132.47 228.78 133.76 221.12 138.18 221.12 136.9 228.78 132.47" style="fill: rgb(255, 255, 255); transform-origin: 224.95px 135.325px;" id="elajak9w0rx5m" class="animable"></polygon>
                                    <g id="elorwae81jmom">
                                        <polygon points="228.78 131.08 214.33 139.42 214.33 138.14 228.78 129.8 228.78 131.08" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 221.555px 134.61px;" class="animable"></polygon>
                                    </g>
                                    <g id="el2j39qf300a9">
                                        <polygon points="228.78 132.47 228.78 133.76 221.12 138.18 221.12 136.9 228.78 132.47" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 224.95px 135.325px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="251.25 201.63 250.31 203.81 242.56 208.28 242.59 219.71 257.04 211.37 257.01 200.52 257.01 199.94 257 198.31 251.25 201.63" style="fill: rgb(255, 255, 255); transform-origin: 249.8px 209.01px;" id="elubxnek7obzp" class="animable"></polygon>
                                    <polygon points="257.04 214.65 242.59 222.99 242.59 221.71 257.04 213.37 257.04 214.65" style="fill: rgb(255, 255, 255); transform-origin: 249.815px 218.18px;" id="elqzyygaq5jva" class="animable"></polygon>
                                    <polygon points="257.04 216.04 257.04 217.32 249.38 221.75 249.38 220.46 257.04 216.04" style="fill: rgb(255, 255, 255); transform-origin: 253.21px 218.895px;" id="elx6sndbxncu" class="animable"></polygon>
                                    <g id="elfiy82yimn2">
                                        <polygon points="257.04 214.65 242.59 222.99 242.59 221.71 257.04 213.37 257.04 214.65" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 249.815px 218.18px;" class="animable"></polygon>
                                    </g>
                                    <g id="elsw6841anrqd">
                                        <polygon points="257.04 216.04 257.04 217.32 249.38 221.75 249.38 220.46 257.04 216.04" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 253.21px 218.895px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="251.25 168.32 250.31 170.49 242.56 174.97 242.59 186.4 257.04 178.05 257.01 167.21 257.01 166.63 257 165 251.25 168.32" style="fill: rgb(255, 255, 255); transform-origin: 249.8px 175.7px;" id="elp6u1rbacqg" class="animable"></polygon>
                                    <polygon points="257.04 181.34 242.59 189.68 242.59 188.39 257.04 180.05 257.04 181.34" style="fill: rgb(255, 255, 255); transform-origin: 249.815px 184.865px;" id="elxz2cwgum56t" class="animable"></polygon>
                                    <polygon points="257.04 182.73 257.04 184.01 249.38 188.43 249.38 187.15 257.04 182.73" style="fill: rgb(255, 255, 255); transform-origin: 253.21px 185.58px;" id="el7twgr6ymt7v" class="animable"></polygon>
                                    <g id="eltnrq7fdzx7">
                                        <polygon points="257.04 181.34 242.59 189.68 242.59 188.39 257.04 180.05 257.04 181.34" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 249.815px 184.865px;" class="animable"></polygon>
                                    </g>
                                    <g id="el69iz0lw97hg">
                                        <polygon points="257.04 182.73 257.04 184.01 249.38 188.43 249.38 187.15 257.04 182.73" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 253.21px 185.58px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="251.25 135.01 250.31 137.18 242.56 141.65 242.59 153.08 257.04 144.74 257.01 133.89 257.01 133.31 257 131.68 251.25 135.01" style="fill: rgb(255, 255, 255); transform-origin: 249.8px 142.38px;" id="eloi58ipinbs" class="animable"></polygon>
                                    <polygon points="257.04 148.02 242.59 156.36 242.59 155.08 257.04 146.74 257.04 148.02" style="fill: rgb(255, 255, 255); transform-origin: 249.815px 151.55px;" id="elfcognkkylxk" class="animable"></polygon>
                                    <polygon points="257.04 149.41 257.04 150.7 249.38 155.12 249.38 153.84 257.04 149.41" style="fill: rgb(255, 255, 255); transform-origin: 253.21px 152.265px;" id="el7n1v1j3zdxd" class="animable"></polygon>
                                    <g id="elqjmr97cwd5g">
                                        <polygon points="257.04 148.02 242.59 156.36 242.59 155.08 257.04 146.74 257.04 148.02" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 249.815px 151.55px;" class="animable"></polygon>
                                    </g>
                                    <g id="el5a4mniidfdq">
                                        <polygon points="257.04 149.41 257.04 150.7 249.38 155.12 249.38 153.84 257.04 149.41" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 253.21px 152.265px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="251.25 101.69 250.31 103.86 242.56 108.34 242.59 119.77 257.04 111.43 257.01 100.58 257.01 100 257 98.37 251.25 101.69" style="fill: rgb(255, 255, 255); transform-origin: 249.8px 109.07px;" id="elhbqnps68cp5" class="animable"></polygon>
                                    <polygon points="257.04 114.71 242.59 123.05 242.59 121.77 257.04 113.42 257.04 114.71" style="fill: rgb(255, 255, 255); transform-origin: 249.815px 118.235px;" id="eljfzoyp4h8nm" class="animable"></polygon>
                                    <polygon points="257.04 116.1 257.04 117.38 249.38 121.8 249.38 120.52 257.04 116.1" style="fill: rgb(255, 255, 255); transform-origin: 253.21px 118.95px;" id="el4zd154wgcq8" class="animable"></polygon>
                                    <g id="el0bb59jr6dst7">
                                        <polygon points="257.04 114.71 242.59 123.05 242.59 121.77 257.04 113.42 257.04 114.71" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 249.815px 118.235px;" class="animable"></polygon>
                                    </g>
                                    <g id="el04029xcv9jzd">
                                        <polygon points="257.04 116.1 257.04 117.38 249.38 121.8 249.38 120.52 257.04 116.1" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 253.21px 118.95px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="194.08 234.77 193.15 236.94 185.4 241.41 185.43 252.84 199.88 244.5 199.85 233.65 199.84 233.07 199.84 231.44 194.08 234.77" style="fill: rgb(255, 255, 255); transform-origin: 192.64px 242.14px;" id="elmmltgjgbre" class="animable"></polygon>
                                    <polygon points="199.88 247.78 185.43 256.12 185.43 254.84 199.88 246.5 199.88 247.78" style="fill: rgb(255, 255, 255); transform-origin: 192.655px 251.31px;" id="elgqmy6m4ojci" class="animable"></polygon>
                                    <polygon points="199.88 249.17 199.88 250.46 192.22 254.88 192.22 253.59 199.88 249.17" style="fill: rgb(255, 255, 255); transform-origin: 196.05px 252.025px;" id="elctfja847adv" class="animable"></polygon>
                                    <g id="elb8hb4a9n6lt">
                                        <polygon points="199.88 247.78 185.43 256.12 185.43 254.84 199.88 246.5 199.88 247.78" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 192.655px 251.31px;" class="animable"></polygon>
                                    </g>
                                    <g id="elpfdcqydzhy">
                                        <polygon points="199.88 249.17 199.88 250.46 192.22 254.88 192.22 253.59 199.88 249.17" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 196.05px 252.025px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="194.08 201.45 193.15 203.63 185.4 208.1 185.43 219.53 199.88 211.19 199.85 200.34 199.84 199.76 199.84 198.13 194.08 201.45" style="fill: rgb(255, 255, 255); transform-origin: 192.64px 208.83px;" id="el6y00zopxxjl" class="animable"></polygon>
                                    <polygon points="199.88 214.47 185.43 222.81 185.43 221.53 199.88 213.18 199.88 214.47" style="fill: rgb(255, 255, 255); transform-origin: 192.655px 217.995px;" id="elcd7cj55wvdu" class="animable"></polygon>
                                    <polygon points="199.88 215.86 199.88 217.14 192.22 221.56 192.22 220.28 199.88 215.86" style="fill: rgb(255, 255, 255); transform-origin: 196.05px 218.71px;" id="elrfr8ymbxfko" class="animable"></polygon>
                                    <g id="eliy6mzdbx6c">
                                        <polygon points="199.88 214.47 185.43 222.81 185.43 221.53 199.88 213.18 199.88 214.47" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 192.655px 217.995px;" class="animable"></polygon>
                                    </g>
                                    <g id="elyz1x542l7g">
                                        <polygon points="199.88 215.86 199.88 217.14 192.22 221.56 192.22 220.28 199.88 215.86" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 196.05px 218.71px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="194.08 168.14 193.15 170.31 185.4 174.78 185.43 186.21 199.88 177.87 199.85 167.03 199.84 166.44 199.84 164.81 194.08 168.14" style="fill: rgb(255, 255, 255); transform-origin: 192.64px 175.51px;" id="elnpv432slysa" class="animable"></polygon>
                                    <polygon points="199.88 181.15 185.43 189.5 185.43 188.21 199.88 179.87 199.88 181.15" style="fill: rgb(255, 255, 255); transform-origin: 192.655px 184.685px;" id="elgc4mpnjvdzn" class="animable"></polygon>
                                    <polygon points="199.88 182.55 199.88 183.83 192.22 188.25 192.22 186.97 199.88 182.55" style="fill: rgb(255, 255, 255); transform-origin: 196.05px 185.4px;" id="el809uyfrte1x" class="animable"></polygon>
                                    <g id="elmmz726efo2g">
                                        <polygon points="199.88 181.15 185.43 189.5 185.43 188.21 199.88 179.87 199.88 181.15" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 192.655px 184.685px;" class="animable"></polygon>
                                    </g>
                                    <g id="el9mywjpll9q">
                                        <polygon points="199.88 182.55 199.88 183.83 192.22 188.25 192.22 186.97 199.88 182.55" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 196.05px 185.4px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="194.08 134.82 193.15 137 185.4 141.47 185.43 152.9 199.88 144.56 199.85 133.71 199.84 133.13 199.84 131.5 194.08 134.82" style="fill: rgb(255, 255, 255); transform-origin: 192.64px 142.2px;" id="elf761imgkdif" class="animable"></polygon>
                                    <polygon points="199.88 147.84 185.43 156.18 185.43 154.9 199.88 146.56 199.88 147.84" style="fill: rgb(255, 255, 255); transform-origin: 192.655px 151.37px;" id="elqepbl2h2i9" class="animable"></polygon>
                                    <polygon points="199.88 149.23 199.88 150.51 192.22 154.94 192.22 153.65 199.88 149.23" style="fill: rgb(255, 255, 255); transform-origin: 196.05px 152.085px;" id="elnntd0thkla" class="animable"></polygon>
                                    <g id="elwk4qq8m5xr9">
                                        <polygon points="199.88 147.84 185.43 156.18 185.43 154.9 199.88 146.56 199.88 147.84" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 192.655px 151.37px;" class="animable"></polygon>
                                    </g>
                                    <g id="elxfeiz4z5gga">
                                        <polygon points="199.88 149.23 199.88 150.51 192.22 154.94 192.22 153.65 199.88 149.23" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 196.05px 152.085px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="165.19 251.52 164.25 253.7 156.5 258.17 156.53 269.6 170.98 261.26 170.95 250.41 170.95 249.83 170.94 248.2 165.19 251.52" style="fill: rgb(255, 255, 255); transform-origin: 163.74px 258.9px;" id="elq6v8cqihns" class="animable"></polygon>
                                    <polygon points="170.98 264.54 156.53 272.88 156.53 271.6 170.98 263.25 170.98 264.54" style="fill: rgb(255, 255, 255); transform-origin: 163.755px 268.065px;" id="elobz31696lxm" class="animable"></polygon>
                                    <polygon points="170.98 265.93 170.98 267.21 163.32 271.63 163.32 270.35 170.98 265.93" style="fill: rgb(255, 255, 255); transform-origin: 167.15px 268.78px;" id="elc0xxwaf1t8m" class="animable"></polygon>
                                    <g id="elyz2706wsxpa">
                                        <polygon points="170.98 264.54 156.53 272.88 156.53 271.6 170.98 263.25 170.98 264.54" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 163.755px 268.065px;" class="animable"></polygon>
                                    </g>
                                    <g id="eloilfbewjb88">
                                        <polygon points="170.98 265.93 170.98 267.21 163.32 271.63 163.32 270.35 170.98 265.93" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 167.15px 268.78px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="165.19 218.21 164.25 220.38 156.5 224.86 156.53 236.28 170.98 227.94 170.95 217.1 170.95 216.51 170.94 214.89 165.19 218.21" style="fill: rgb(255, 255, 255); transform-origin: 163.74px 225.585px;" id="el74lwyy1ef6t" class="animable"></polygon>
                                    <polygon points="170.98 231.22 156.53 239.57 156.53 238.28 170.98 229.94 170.98 231.22" style="fill: rgb(255, 255, 255); transform-origin: 163.755px 234.755px;" id="eli5wyo4rknr" class="animable"></polygon>
                                    <polygon points="170.98 232.62 170.98 233.9 163.32 238.32 163.32 237.04 170.98 232.62" style="fill: rgb(255, 255, 255); transform-origin: 167.15px 235.47px;" id="el65rovveunst" class="animable"></polygon>
                                    <g id="eluu8hjvbo669">
                                        <polygon points="170.98 231.22 156.53 239.57 156.53 238.28 170.98 229.94 170.98 231.22" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 163.755px 234.755px;" class="animable"></polygon>
                                    </g>
                                    <g id="elg9p6mwhnfw">
                                        <polygon points="170.98 232.62 170.98 233.9 163.32 238.32 163.32 237.04 170.98 232.62" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 167.15px 235.47px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="165.19 184.9 164.25 187.07 156.5 191.54 156.53 202.97 170.98 194.63 170.95 183.78 170.95 183.2 170.94 181.57 165.19 184.9" style="fill: rgb(255, 255, 255); transform-origin: 163.74px 192.27px;" id="el4pg8756q90u" class="animable"></polygon>
                                    <polygon points="170.98 197.91 156.53 206.25 156.53 204.97 170.98 196.63 170.98 197.91" style="fill: rgb(255, 255, 255); transform-origin: 163.755px 201.44px;" id="elkze1j4n8v6r" class="animable"></polygon>
                                    <polygon points="170.98 199.3 170.98 200.59 163.32 205.01 163.32 203.72 170.98 199.3" style="fill: rgb(255, 255, 255); transform-origin: 167.15px 202.155px;" id="elsoed6q0c4m" class="animable"></polygon>
                                    <g id="elrlsikp3aqab">
                                        <polygon points="170.98 197.91 156.53 206.25 156.53 204.97 170.98 196.63 170.98 197.91" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 163.755px 201.44px;" class="animable"></polygon>
                                    </g>
                                    <g id="el90t0n1x3xqv">
                                        <polygon points="170.98 199.3 170.98 200.59 163.32 205.01 163.32 203.72 170.98 199.3" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 167.15px 202.155px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="165.19 151.58 164.25 153.75 156.5 158.23 156.53 169.66 170.98 161.32 170.95 150.47 170.95 149.89 170.94 148.26 165.19 151.58" style="fill: rgb(255, 255, 255); transform-origin: 163.74px 158.96px;" id="eloqecjz4jj69" class="animable"></polygon>
                                    <polygon points="170.98 164.6 156.53 172.94 156.53 171.66 170.98 163.31 170.98 164.6" style="fill: rgb(255, 255, 255); transform-origin: 163.755px 168.125px;" id="elbmzv7fljwq" class="animable"></polygon>
                                    <polygon points="170.98 165.99 170.98 167.27 163.32 171.69 163.32 170.41 170.98 165.99" style="fill: rgb(255, 255, 255); transform-origin: 167.15px 168.84px;" id="elug6yrlhkfi" class="animable"></polygon>
                                    <g id="ela33aav1t91n">
                                        <polygon points="170.98 164.6 156.53 172.94 156.53 171.66 170.98 163.31 170.98 164.6" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 163.755px 168.125px;" class="animable"></polygon>
                                    </g>
                                    <g id="elj0zch5m68w">
                                        <polygon points="170.98 165.99 170.98 167.27 163.32 171.69 163.32 170.41 170.98 165.99" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 167.15px 168.84px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="136.29 268.28 135.35 270.45 127.6 274.93 127.63 286.36 142.08 278.01 142.05 267.17 142.05 266.59 142.04 264.96 136.29 268.28" style="fill: rgb(255, 255, 255); transform-origin: 134.84px 275.66px;" id="eldrcm6z3quj5" class="animable"></polygon>
                                    <polygon points="142.08 281.3 127.63 289.64 127.63 288.35 142.08 280.01 142.08 281.3" style="fill: rgb(255, 255, 255); transform-origin: 134.855px 284.825px;" id="elzsamk214pcq" class="animable"></polygon>
                                    <polygon points="142.08 282.69 142.08 283.97 134.42 288.39 134.42 287.11 142.08 282.69" style="fill: rgb(255, 255, 255); transform-origin: 138.25px 285.54px;" id="el250thz3t0uc" class="animable"></polygon>
                                    <g id="ela3hk29hi9on">
                                        <polygon points="142.08 281.3 127.63 289.64 127.63 288.35 142.08 280.01 142.08 281.3" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 134.855px 284.825px;" class="animable"></polygon>
                                    </g>
                                    <g id="el128a56nxfq3">
                                        <polygon points="142.08 282.69 142.08 283.97 134.42 288.39 134.42 287.11 142.08 282.69" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 138.25px 285.54px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="136.29 234.97 135.35 237.14 127.6 241.61 127.63 253.04 142.08 244.7 142.05 233.85 142.05 233.27 142.04 231.64 136.29 234.97" style="fill: rgb(255, 255, 255); transform-origin: 134.84px 242.34px;" id="eloq2wn5x2oee" class="animable"></polygon>
                                    <polygon points="142.08 247.98 127.63 256.32 127.63 255.04 142.08 246.7 142.08 247.98" style="fill: rgb(255, 255, 255); transform-origin: 134.855px 251.51px;" id="elwift4jj4wv" class="animable"></polygon>
                                    <polygon points="142.08 249.37 142.08 250.66 134.42 255.08 134.42 253.79 142.08 249.37" style="fill: rgb(255, 255, 255); transform-origin: 138.25px 252.225px;" id="elgy0z4qz1m09" class="animable"></polygon>
                                    <g id="el6jo989zz8am">
                                        <polygon points="142.08 247.98 127.63 256.32 127.63 255.04 142.08 246.7 142.08 247.98" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 134.855px 251.51px;" class="animable"></polygon>
                                    </g>
                                    <g id="elqfqe5s3arh">
                                        <polygon points="142.08 249.37 142.08 250.66 134.42 255.08 134.42 253.79 142.08 249.37" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 138.25px 252.225px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="136.29 201.65 135.35 203.83 127.6 208.3 127.63 219.73 142.08 211.39 142.05 200.54 142.05 199.96 142.04 198.33 136.29 201.65" style="fill: rgb(255, 255, 255); transform-origin: 134.84px 209.03px;" id="elur7mi6tu5dj" class="animable"></polygon>
                                    <polygon points="142.08 214.67 127.63 223.01 127.63 221.73 142.08 213.38 142.08 214.67" style="fill: rgb(255, 255, 255); transform-origin: 134.855px 218.195px;" id="elszjgicroqlj" class="animable"></polygon>
                                    <polygon points="142.08 216.06 142.08 217.34 134.42 221.76 134.42 220.48 142.08 216.06" style="fill: rgb(255, 255, 255); transform-origin: 138.25px 218.91px;" id="elpruv7bqzou" class="animable"></polygon>
                                    <g id="el540z2j9zbba">
                                        <polygon points="142.08 214.67 127.63 223.01 127.63 221.73 142.08 213.38 142.08 214.67" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 134.855px 218.195px;" class="animable"></polygon>
                                    </g>
                                    <g id="elgx4cr46lkh">
                                        <polygon points="142.08 216.06 142.08 217.34 134.42 221.76 134.42 220.48 142.08 216.06" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 138.25px 218.91px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="136.29 168.34 135.35 170.51 127.6 174.99 127.63 186.41 142.08 178.07 142.05 167.23 142.05 166.64 142.04 165.02 136.29 168.34" style="fill: rgb(255, 255, 255); transform-origin: 134.84px 175.715px;" id="eljrktaosw6z" class="animable"></polygon>
                                    <polygon points="142.08 181.35 127.63 189.7 127.63 188.41 142.08 180.07 142.08 181.35" style="fill: rgb(255, 255, 255); transform-origin: 134.855px 184.885px;" id="el2cxp4qmbgsg" class="animable"></polygon>
                                    <polygon points="142.08 182.75 142.08 184.03 134.42 188.45 134.42 187.17 142.08 182.75" style="fill: rgb(255, 255, 255); transform-origin: 138.25px 185.6px;" id="elkrcg88twkw7" class="animable"></polygon>
                                    <g id="elzv2oap2ypzm">
                                        <polygon points="142.08 181.35 127.63 189.7 127.63 188.41 142.08 180.07 142.08 181.35" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 134.855px 184.885px;" class="animable"></polygon>
                                    </g>
                                    <g id="elhmlgtkfucg">
                                        <polygon points="142.08 182.75 142.08 184.03 134.42 188.45 134.42 187.17 142.08 182.75" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 138.25px 185.6px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="107.39 285.04 106.45 287.21 98.7 291.69 98.73 303.11 113.18 294.77 113.15 283.93 113.15 283.34 113.14 281.71 107.39 285.04" style="fill: rgb(255, 255, 255); transform-origin: 105.94px 292.41px;" id="elh1a68yrt86a" class="animable"></polygon>
                                    <polygon points="113.18 298.05 98.73 306.39 98.73 305.11 113.18 296.77 113.18 298.05" style="fill: rgb(255, 255, 255); transform-origin: 105.955px 301.58px;" id="elpoz9lwu7x0c" class="animable"></polygon>
                                    <polygon points="113.18 299.45 113.18 300.73 105.52 305.15 105.52 303.87 113.18 299.45" style="fill: rgb(255, 255, 255); transform-origin: 109.35px 302.3px;" id="elq397mnj514" class="animable"></polygon>
                                    <g id="elnj5kubaghel">
                                        <polygon points="113.18 298.05 98.73 306.39 98.73 305.11 113.18 296.77 113.18 298.05" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 105.955px 301.58px;" class="animable"></polygon>
                                    </g>
                                    <g id="els0u60m6csv">
                                        <polygon points="113.18 299.45 113.18 300.73 105.52 305.15 105.52 303.87 113.18 299.45" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 109.35px 302.3px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="107.39 251.72 106.45 253.9 98.7 258.37 98.73 269.8 113.18 261.46 113.15 250.61 113.15 250.03 113.14 248.4 107.39 251.72" style="fill: rgb(255, 255, 255); transform-origin: 105.94px 259.1px;" id="elnvvoyr81dal" class="animable"></polygon>
                                    <polygon points="113.18 264.74 98.73 273.08 98.73 271.8 113.18 263.46 113.18 264.74" style="fill: rgb(255, 255, 255); transform-origin: 105.955px 268.27px;" id="elexauzo7fucu" class="animable"></polygon>
                                    <polygon points="113.18 266.13 113.18 267.42 105.52 271.84 105.52 270.55 113.18 266.13" style="fill: rgb(255, 255, 255); transform-origin: 109.35px 268.985px;" id="elbzmvngkhqib" class="animable"></polygon>
                                    <g id="el5ijvncc0zj">
                                        <polygon points="113.18 264.74 98.73 273.08 98.73 271.8 113.18 263.46 113.18 264.74" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 105.955px 268.27px;" class="animable"></polygon>
                                    </g>
                                    <g id="eltiwneq4o74">
                                        <polygon points="113.18 266.13 113.18 267.42 105.52 271.84 105.52 270.55 113.18 266.13" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 109.35px 268.985px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="107.39 218.41 106.45 220.58 98.7 225.06 98.73 236.49 113.18 228.14 113.15 217.3 113.15 216.72 113.14 215.09 107.39 218.41" style="fill: rgb(255, 255, 255); transform-origin: 105.94px 225.79px;" id="el6kbutgky2zk" class="animable"></polygon>
                                    <polygon points="113.18 231.43 98.73 239.77 98.73 238.48 113.18 230.14 113.18 231.43" style="fill: rgb(255, 255, 255); transform-origin: 105.955px 234.955px;" id="elv6bcqwtywr" class="animable"></polygon>
                                    <polygon points="113.18 232.82 113.18 234.1 105.52 238.52 105.52 237.24 113.18 232.82" style="fill: rgb(255, 255, 255); transform-origin: 109.35px 235.67px;" id="el09b472ssq3y" class="animable"></polygon>
                                    <g id="eloblye3psdlb">
                                        <polygon points="113.18 231.43 98.73 239.77 98.73 238.48 113.18 230.14 113.18 231.43" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 105.955px 234.955px;" class="animable"></polygon>
                                    </g>
                                    <g id="eltn32hlf8fsk">
                                        <polygon points="113.18 232.82 113.18 234.1 105.52 238.52 105.52 237.24 113.18 232.82" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 109.35px 235.67px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="107.39 185.1 106.45 187.27 98.7 191.74 98.73 203.17 113.18 194.83 113.15 183.98 113.15 183.4 113.14 181.77 107.39 185.1" style="fill: rgb(255, 255, 255); transform-origin: 105.94px 192.47px;" id="el99djcsa8m5k" class="animable"></polygon>
                                    <polygon points="113.18 198.11 98.73 206.45 98.73 205.17 113.18 196.83 113.18 198.11" style="fill: rgb(255, 255, 255); transform-origin: 105.955px 201.64px;" id="el72g39aumz53" class="animable"></polygon>
                                    <polygon points="113.18 199.5 113.18 200.79 105.52 205.21 105.52 203.93 113.18 199.5" style="fill: rgb(255, 255, 255); transform-origin: 109.35px 202.355px;" id="elmx2ie3bwz7s" class="animable"></polygon>
                                    <g id="elft226kuyqjs">
                                        <polygon points="113.18 198.11 98.73 206.45 98.73 205.17 113.18 196.83 113.18 198.11" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 105.955px 201.64px;" class="animable"></polygon>
                                    </g>
                                    <g id="elz15s3wagb">
                                        <polygon points="113.18 199.5 113.18 200.79 105.52 205.21 105.52 203.93 113.18 199.5" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 109.35px 202.355px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="78.49 301.8 77.55 303.97 69.8 308.44 69.83 319.87 84.28 311.53 84.25 300.68 84.25 300.1 84.25 298.47 78.49 301.8" style="fill: rgb(255, 255, 255); transform-origin: 77.04px 309.17px;" id="elj3e3zpf8gsi" class="animable"></polygon>
                                    <polygon points="84.28 314.81 69.83 323.15 69.83 321.87 84.28 313.53 84.28 314.81" style="fill: rgb(255, 255, 255); transform-origin: 77.055px 318.34px;" id="elnaatjene59f" class="animable"></polygon>
                                    <polygon points="84.28 316.2 84.28 317.49 76.63 321.91 76.63 320.62 84.28 316.2" style="fill: rgb(255, 255, 255); transform-origin: 80.455px 319.055px;" id="elfomgzkj8ire" class="animable"></polygon>
                                    <g id="eljtmdkqx7b1j">
                                        <polygon points="84.28 314.81 69.83 323.15 69.83 321.87 84.28 313.53 84.28 314.81" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 77.055px 318.34px;" class="animable"></polygon>
                                    </g>
                                    <g id="elchy7g95piqo">
                                        <polygon points="84.28 316.2 84.28 317.49 76.63 321.91 76.63 320.62 84.28 316.2" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 80.455px 319.055px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="78.49 268.48 77.55 270.65 69.8 275.13 69.83 286.56 84.28 278.22 84.25 267.37 84.25 266.79 84.25 265.16 78.49 268.48" style="fill: rgb(255, 255, 255); transform-origin: 77.04px 275.86px;" id="elhl78p7ej0nh" class="animable"></polygon>
                                    <polygon points="84.28 281.5 69.83 289.84 69.83 288.56 84.28 280.21 84.28 281.5" style="fill: rgb(255, 255, 255); transform-origin: 77.055px 285.025px;" id="elfvg2kdfw6" class="animable"></polygon>
                                    <polygon points="84.28 282.89 84.28 284.17 76.63 288.59 76.63 287.31 84.28 282.89" style="fill: rgb(255, 255, 255); transform-origin: 80.455px 285.74px;" id="eltlt1p0ddgt" class="animable"></polygon>
                                    <g id="eleuc0lytr1k">
                                        <polygon points="84.28 281.5 69.83 289.84 69.83 288.56 84.28 280.21 84.28 281.5" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 77.055px 285.025px;" class="animable"></polygon>
                                    </g>
                                    <g id="el4e0mb1arvmh">
                                        <polygon points="84.28 282.89 84.28 284.17 76.63 288.59 76.63 287.31 84.28 282.89" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 80.455px 285.74px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="78.49 235.17 77.55 237.34 69.8 241.81 69.83 253.24 84.28 244.9 84.25 234.06 84.25 233.47 84.25 231.84 78.49 235.17" style="fill: rgb(255, 255, 255); transform-origin: 77.04px 242.54px;" id="el850yl5b0by" class="animable"></polygon>
                                    <polygon points="84.28 248.18 69.83 256.52 69.83 255.24 84.28 246.9 84.28 248.18" style="fill: rgb(255, 255, 255); transform-origin: 77.055px 251.71px;" id="el09fceq7edsfu" class="animable"></polygon>
                                    <polygon points="84.28 249.57 84.28 250.86 76.63 255.28 76.63 254 84.28 249.57" style="fill: rgb(255, 255, 255); transform-origin: 80.455px 252.425px;" id="elremi69gje3" class="animable"></polygon>
                                    <g id="el9gpi4g3rrcj">
                                        <polygon points="84.28 248.18 69.83 256.52 69.83 255.24 84.28 246.9 84.28 248.18" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 77.055px 251.71px;" class="animable"></polygon>
                                    </g>
                                    <g id="elcyzr6unumm">
                                        <polygon points="84.28 249.57 84.28 250.86 76.63 255.28 76.63 254 84.28 249.57" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 80.455px 252.425px;" class="animable"></polygon>
                                    </g>
                                    <polygon points="78.49 201.85 77.55 204.03 69.8 208.5 69.83 219.93 84.28 211.59 84.25 200.74 84.25 200.16 84.25 198.53 78.49 201.85" style="fill: rgb(255, 255, 255); transform-origin: 77.04px 209.23px;" id="elq76clhg3rk" class="animable"></polygon>
                                    <polygon points="84.28 214.87 69.83 223.21 69.83 221.93 84.28 213.59 84.28 214.87" style="fill: rgb(255, 255, 255); transform-origin: 77.055px 218.4px;" id="el8sp0ow9smev" class="animable"></polygon>
                                    <polygon points="84.28 216.26 84.28 217.54 76.63 221.97 76.63 220.68 84.28 216.26" style="fill: rgb(255, 255, 255); transform-origin: 80.455px 219.115px;" id="elvevqww7m6hr" class="animable"></polygon>
                                    <g id="elyc8l9fsmaa">
                                        <polygon points="84.28 214.87 69.83 223.21 69.83 221.93 84.28 213.59 84.28 214.87" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 77.055px 218.4px;" class="animable"></polygon>
                                    </g>
                                    <g id="eloq6z4i1tohh">
                                        <polygon points="84.28 216.26 84.28 217.54 76.63 221.97 76.63 220.68 84.28 216.26" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 80.455px 219.115px;" class="animable"></polygon>
                                    </g>
                                </g>
                            </g>
                            <path d="M232.79,126.71h0a6.48,6.48,0,0,0-5.39-3.56,2.39,2.39,0,0,0-.71.14l-100,57.43a4.71,4.71,0,0,0-2.36,4.05v74.84c0,2.69,3.1,5.26,6,4h0a.77.77,0,0,0,.19-.08l100-57.47a4.68,4.68,0,0,0,2.35-4.06V127.22A1.27,1.27,0,0,0,232.79,126.71Z" style="fill: rgb(69, 90, 100); transform-origin: 178.601px 193.545px;" id="el5haqozx97uv" class="animable"></path>
                            <g id="elz20mewytuah">
                                <path d="M124.34,184.77v74.84c0,2.69,3.1,5.26,6,4h0a1.16,1.16,0,0,1-1.56-1.09V187.69a4.7,4.7,0,0,1,.79-2.58l-4.78-2.38A4.71,4.71,0,0,0,124.34,184.77Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 127.34px 223.335px;" class="animable"></path>
                            </g>
                            <g id="elffi7jcw13qb">
                                <path d="M227.4,123.15a2.39,2.39,0,0,0-.71.14l-100,57.43a4.67,4.67,0,0,0-1.88,2l4.78,2.38a4.84,4.84,0,0,1,1.57-1.48l100-57.42a1.16,1.16,0,0,1,1.62.5h0A6.48,6.48,0,0,0,227.4,123.15Z" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 178.795px 154.125px;" class="animable"></path>
                            </g>
                            <g id="el3z8ovxdv4tn">
                                <g style="opacity: 0.3; transform-origin: 181.485px 217.685px;" class="animable">
                                    <path d="M224.59,184.12c1.36-.78,2.47-.15,2.47,1.41l0,11.68a5.42,5.42,0,0,1-2.45,4.26l-86.23,49.78c-1.35.78-2.46.15-2.47-1.42l0-11.67a5.44,5.44,0,0,1,2.46-4.26Z" style="fill: rgb(255, 255, 255); transform-origin: 181.485px 217.685px;" id="elwazf2yrcmg" class="animable"></path>
                                </g>
                            </g>
                            <polygon points="160.1 224.76 160.07 226.57 161.47 224.78 162.25 225.8 160.89 227.45 162.26 227.51 161.48 229.44 160.08 229.28 160.12 231.02 158.6 231.9 158.63 230.11 157.23 231.89 156.46 230.86 157.82 229.22 156.46 229.15 157.22 227.23 158.62 227.41 158.58 225.65 160.1 224.76" style="fill: rgb(255, 255, 255); transform-origin: 159.36px 228.33px;" id="elem7oay9s97" class="animable"></polygon>
                            <polygon points="166.43 221.11 166.4 222.92 167.8 221.12 168.58 222.15 167.22 223.8 168.59 223.86 167.81 225.78 166.4 225.62 166.45 227.37 164.93 228.25 164.96 226.46 163.56 228.24 162.79 227.2 164.15 225.57 162.78 225.5 163.54 223.58 164.95 223.75 164.91 221.99 166.43 221.11" style="fill: rgb(255, 255, 255); transform-origin: 165.685px 224.68px;" id="ely1645ip7sln" class="animable"></polygon>
                            <polygon points="172.76 217.46 172.72 219.27 174.13 217.47 174.91 218.5 173.54 220.15 174.91 220.21 174.14 222.13 172.73 221.97 172.78 223.72 171.25 224.6 171.29 222.8 169.89 224.58 169.12 223.55 170.48 221.92 169.11 221.84 169.87 219.93 171.28 220.1 171.23 218.34 172.76 217.46" style="fill: rgb(255, 255, 255); transform-origin: 172.01px 221.03px;" id="ele410sdntpue" class="animable"></polygon>
                            <polygon points="179.09 213.81 179.05 215.61 180.46 213.82 181.23 214.84 179.87 216.49 181.24 216.55 180.47 218.47 179.06 218.32 179.1 220.06 177.58 220.94 177.61 219.15 176.21 220.93 175.44 219.9 176.81 218.26 175.44 218.19 176.2 216.27 177.6 216.45 177.56 214.69 179.09 213.81" style="fill: rgb(255, 255, 255); transform-origin: 178.34px 217.375px;" id="el6k6z71odw2" class="animable"></polygon>
                            <polygon points="185.41 210.15 185.38 211.96 186.78 210.16 187.56 211.19 186.2 212.84 187.57 212.9 186.79 214.82 185.38 214.66 185.43 216.41 183.91 217.29 183.94 215.5 182.54 217.28 181.77 216.24 183.13 214.61 181.77 214.53 182.52 212.62 183.93 212.79 183.89 211.03 185.41 210.15" style="fill: rgb(255, 255, 255); transform-origin: 184.67px 213.72px;" id="elkigz7s3l85" class="animable"></polygon>
                            <polygon points="191.74 206.5 191.71 208.31 193.11 206.51 193.89 207.54 192.53 209.19 193.89 209.25 193.12 211.17 191.71 211.01 191.76 212.76 190.23 213.64 190.27 211.85 188.87 213.63 188.1 212.59 189.46 210.96 188.09 210.88 188.85 208.97 190.26 209.14 190.21 207.38 191.74 206.5" style="fill: rgb(255, 255, 255); transform-origin: 190.99px 210.07px;" id="el6kk1p1phwt" class="animable"></polygon>
                            <polygon points="198.07 202.85 198.03 204.66 199.44 202.86 200.22 203.88 198.85 205.53 200.22 205.59 199.45 207.51 198.04 207.36 198.08 209.1 196.56 209.98 196.6 208.19 195.19 209.97 194.42 208.94 195.79 207.3 194.42 207.23 195.18 205.32 196.59 205.49 196.54 203.73 198.07 202.85" style="fill: rgb(255, 255, 255); transform-origin: 197.32px 206.415px;" id="ela6xcqmynm2" class="animable"></polygon>
                            <polygon points="204.4 199.19 204.36 201 205.76 199.21 206.54 200.23 205.18 201.88 206.55 201.94 205.77 203.86 204.37 203.7 204.41 205.45 202.89 206.33 202.92 204.54 201.52 206.32 200.75 205.28 202.11 203.65 200.75 203.58 201.51 201.66 202.91 201.84 202.87 200.07 204.4 199.19" style="fill: rgb(255, 255, 255); transform-origin: 203.65px 202.76px;" id="el5gr5unvdr9u" class="animable"></polygon>
                            <path d="M179.2,196.15l.13,0-.8,6.84h0l.79-6.84Z" style="fill: rgb(69, 90, 100); transform-origin: 178.93px 199.57px;" id="elf3if2k369ne" class="animable"></path>
                            <path d="M182.17,189.32a2.23,2.23,0,0,0-1.5.34A5.93,5.93,0,0,0,178,194.3a3,3,0,0,0,.1.76,1.42,1.42,0,0,0,1.11,1.09l.13,0-.79,6.84,4.33-2.5-.83-5.91a6.41,6.41,0,0,0,1-1.66,4.94,4.94,0,0,0,.36-1.76,2.63,2.63,0,0,0-.21-1.08A1.38,1.38,0,0,0,182.17,189.32Z" style="fill: rgb(69, 90, 100); transform-origin: 180.705px 196.146px;" id="el6smuhk1xlwd" class="animable"></path>
                            <g id="el93ut22vx138">
                                <path d="M182.17,189.32a2.23,2.23,0,0,0-1.5.34A5.93,5.93,0,0,0,178,194.3a3,3,0,0,0,.1.76,1.42,1.42,0,0,0,1.11,1.09l.13,0-.79,6.84,4.33-2.5-.83-5.91a6.41,6.41,0,0,0,1-1.66,4.94,4.94,0,0,0,.36-1.76,2.63,2.63,0,0,0-.21-1.08A1.38,1.38,0,0,0,182.17,189.32Z" style="opacity: 0.3; transform-origin: 180.705px 196.146px;" class="animable"></path>
                            </g>
                            <path d="M166,193.85l0,19.27,29.34-16.94-.06-19.27Zm17-.89a6.41,6.41,0,0,1-1,1.66l.83,5.91-4.33,2.5h0l.8-6.84-.13,0a1.42,1.42,0,0,1-1.11-1.09,3,3,0,0,1-.1-.76,5.93,5.93,0,0,1,2.68-4.64,2.23,2.23,0,0,1,1.5-.34,1.38,1.38,0,0,1,1,.8,2.63,2.63,0,0,1,.21,1.08A4.94,4.94,0,0,1,183,193Z" style="fill: rgb(69, 90, 100); transform-origin: 180.67px 195.015px;" id="elxgja868gqkc" class="animable"></path>
                            <g id="elhejjlq3fzoj">
                                <path d="M166,193.85l0,19.27,29.34-16.94-.06-19.27Zm17-.89a6.41,6.41,0,0,1-1,1.66l.83,5.91-4.33,2.5h0l.8-6.84-.13,0a1.42,1.42,0,0,1-1.11-1.09,3,3,0,0,1-.1-.76,5.93,5.93,0,0,1,2.68-4.64,2.23,2.23,0,0,1,1.5-.34,1.38,1.38,0,0,1,1,.8,2.63,2.63,0,0,1,.21,1.08A4.94,4.94,0,0,1,183,193Z" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 180.67px 195.015px;" class="animable"></path>
                            </g>
                            <path d="M172.57,190.05l0-9.28c0-5.12,3.6-11.39,8.06-14s8.1-.5,8.12,4.62l0,6.15,3.5-2,0-6.15c0-7.35-5.23-10.32-11.63-6.63S169,175.45,169,182.79l0,9.28Z" style="fill: rgb(69, 90, 100); transform-origin: 180.625px 176.622px;" id="el6hgllmfd2oj" class="animable"></path>
                            <g id="el8z8lkj265wh">
                                <path d="M172.57,190.05l0-9.28c0-5.12,3.6-11.39,8.06-14s8.1-.5,8.12,4.62l0,6.15,3.5-2,0-6.15c0-7.35-5.23-10.32-11.63-6.63S169,175.45,169,182.79l0,9.28Z" style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 180.625px 176.622px;" class="animable"></path>
                            </g>
                            <path d="M187,179.28,184,181.05a1,1,0,0,0-.44.75c0,.29.2.4.44.25l3.07-1.77a1,1,0,0,0,.44-.75C187.46,179.25,187.26,179.14,187,179.28Z" style="fill: rgb(69, 90, 100); transform-origin: 185.535px 180.668px;" id="elnqni0j8qnpb" class="animable"></path>
                            <path d="M187.86,177.52c.12-.31,0-.57-.16-.59L185,176.7a.46.46,0,0,0-.22.06,1,1,0,0,0-.38.47c-.12.32,0,.58.17.6l2.65.23a.46.46,0,0,0,.22-.06A.94.94,0,0,0,187.86,177.52Z" style="fill: rgb(69, 90, 100); transform-origin: 186.13px 177.38px;" id="el1zgrzenppr9" class="animable"></path>
                            <path d="M193.57,174.49a1,1,0,0,0,.22-.2l2.65-3.3a.73.73,0,0,0,.16-.78.27.27,0,0,0-.38,0,.68.68,0,0,0-.22.2l-2.65,3.29a.74.74,0,0,0-.16.78C193.27,174.57,193.42,174.57,193.57,174.49Z" style="fill: rgb(69, 90, 100); transform-origin: 194.896px 172.34px;" id="el7anmg5d93uy" class="animable"></path>
                            <path d="M197.11,173.45,194,175.22a.94.94,0,0,0-.43.76c0,.28.19.39.43.25l3.07-1.77a1,1,0,0,0,.44-.76A.27.27,0,0,0,197.11,173.45Z" style="fill: rgb(69, 90, 100); transform-origin: 195.54px 174.854px;" id="el2hf6y16b6mb" class="animable"></path>
                            <g id="el50bddh1xntd">
                                <g style="opacity: 0.5; transform-origin: 190.535px 176.124px;" class="animable">
                                    <path d="M187,179.28,184,181.05a1,1,0,0,0-.44.75c0,.29.2.4.44.25l3.07-1.77a1,1,0,0,0,.44-.75C187.46,179.25,187.26,179.14,187,179.28Z" style="fill: rgb(255, 255, 255); transform-origin: 185.535px 180.668px;" id="elrzucs8r849" class="animable"></path>
                                    <path d="M187.86,177.52c.12-.31,0-.57-.16-.59L185,176.7a.46.46,0,0,0-.22.06,1,1,0,0,0-.38.47c-.12.32,0,.58.17.6l2.65.23a.46.46,0,0,0,.22-.06A.94.94,0,0,0,187.86,177.52Z" style="fill: rgb(255, 255, 255); transform-origin: 186.13px 177.38px;" id="elrozvkaefcr" class="animable"></path>
                                    <path d="M193.57,174.49a1,1,0,0,0,.22-.2l2.65-3.3a.73.73,0,0,0,.16-.78.27.27,0,0,0-.38,0,.68.68,0,0,0-.22.2l-2.65,3.29a.74.74,0,0,0-.16.78C193.27,174.57,193.42,174.57,193.57,174.49Z" style="fill: rgb(255, 255, 255); transform-origin: 194.896px 172.34px;" id="eltzzmti3tkcg" class="animable"></path>
                                    <path d="M197.11,173.45,194,175.22a.94.94,0,0,0-.43.76c0,.28.19.39.43.25l3.07-1.77a1,1,0,0,0,.44-.76A.27.27,0,0,0,197.11,173.45Z" style="fill: rgb(255, 255, 255); transform-origin: 195.54px 174.854px;" id="elua9b7tut7dp" class="animable"></path>
                                </g>
                            </g>
                        </g>
                        <g id="freepik--Character--inject-74" class="animable" style="transform-origin: 279.059px 304.341px;">
                            <path d="M372,384.86a9.64,9.64,0,0,0-3.51-6.9v-4.27l-22.79-13.54,12-3a8.62,8.62,0,0,0-1.28,4.28,2.94,2.94,0,0,0,1.34,2.8h0l2.7,1.72.05,0h0a3.06,3.06,0,0,0,3-.31,9.5,9.5,0,0,0,4.3-7.46,3,3,0,0,0-1.21-2.73h0l0,0,0,0-2.74-1.73h0a2.51,2.51,0,0,0-2-.2v-.69l-1.46-.5-19.53,1v-3.45a5.71,5.71,0,0,0,.61-.29,3.29,3.29,0,0,0,1.94-2.68V324.33h-13.1v22.58a3.21,3.21,0,0,0,1.9,2.68,6.31,6.31,0,0,0,.64.31v2.9l-14.11-3.05L318,350v2.6h0l-2.74,1.74,0,0,0,0h0a3.1,3.1,0,0,0-1.21,2.74,9.38,9.38,0,0,0,2.13,5.49l-13.64,6.15V372a5.84,5.84,0,0,0-.56.28,9.47,9.47,0,0,0-4.3,7.45,2.94,2.94,0,0,0,1.34,2.8h0l2.69,1.72.06,0h0a3.09,3.09,0,0,0,3-.32,9.49,9.49,0,0,0,4.3-7.46,3,3,0,0,0-1.21-2.73h0l0,0,0,0-.8-.5,25.85-10.51a1.88,1.88,0,0,0,1,1.51l-2.33,20.33v2.76a9.56,9.56,0,0,0-3.56,6.93,3,3,0,0,0,1.34,2.81h0l2.7,1.72.05,0h0a3.07,3.07,0,0,0,3-.32,9.47,9.47,0,0,0,4.3-7.45,3,3,0,0,0-1.21-2.73h0l0,0,0,0-2.74-1.74h0a2.28,2.28,0,0,0-1.43-.31l3-21.19h0a6.5,6.5,0,0,0,1.89-.3h0L363.19,378l-1.4.89,0,0,0,0h0a3.07,3.07,0,0,0-1.21,2.73,9.47,9.47,0,0,0,4.31,7.46,3.09,3.09,0,0,0,3,.32h0l.06,0,2.69-1.72h0A3,3,0,0,0,372,384.86Zm-47.45-28,2,1.08-1.38.62A9.42,9.42,0,0,0,324.5,356.85ZM307,368l9.88-4.4h0l-13.35,5.95Zm18.3-8.16h0l7.44-3.31Z" style="fill: rgb(224, 224, 224); transform-origin: 334.839px 361.686px;" id="elugve8qe5arg" class="animable"></path>
                            <g id="elymwol1f75gm">
                                <path d="M417.33,218.22a5.51,5.51,0,0,0-.83-1.4,11.53,11.53,0,0,0-1.14-1.18,20.45,20.45,0,0,0-1.86-1.51,22.47,22.47,0,0,0-2.27-1.46,22.94,22.94,0,0,0-3.64-1.65q-.72-.26-1.44-.45c-.49-.14-1-.26-1.48-.36C387.7,201.82,353,186.8,353,186.8c-12.86-5.32-16.82-1.06-19.56,1.83-2.05,2.17-3.25,6.57-3.21,12.81a61.94,61.94,0,0,0,.47,6.83c.54,4.33,1.65,11.61,1.89,19.27a80.67,80.67,0,0,1-.15,8.23c-.55,7-2.31,13.65-6.46,17.72-6.14,6-25,2.46-34.17.27l-.13,0c-2.56-.62-4.33-1.12-4.82-1.26l-.1,0h-.06c-4.49-2.46-10.16-.15-9.64,4.43a5.37,5.37,0,0,0,.2,1c0,.11.07.23.11.35a9.29,9.29,0,0,0,1.21,2.29c2.56,3.64,4.49,4.86,5.73,7.82.15.35.28.72.41,1.13.83,2.62,1.26,6.55,1.25,13.65l-4.9,2.52a7.22,7.22,0,0,0-2.49,2.4,12.06,12.06,0,0,0-1.83,6.19,13.16,13.16,0,0,0,.33,3.37,10.87,10.87,0,0,0,.3,1.08,9.05,9.05,0,0,0,4,5.11l53.4,28.37a12.47,12.47,0,0,0,10.12.71,13,13,0,0,0,1.39-.6l37.41-18.95a18.91,18.91,0,0,0,9.72-11.95l21.42-79.13a3,3,0,0,0,2-.91,2.64,2.64,0,0,0,.61-1.47c0-.14,0-.28,0-.41A3.83,3.83,0,0,0,417.33,218.22Zm-75.79-9.38c0-.25.09-.49.14-.74.08-.48.17-.95.26-1.43-.08.43-.16.85-.23,1.28s-.12.59-.17.89-.14.91-.2,1.36c0,.21-.07.42-.1.63l.09-.58C341.4,209.78,341.46,209.31,341.54,208.84Zm3.12-11.47a44.2,44.2,0,0,0-1.47,4.21c.21-.71.43-1.4.67-2.08.1-.31.22-.6.34-.9s.3-.83.46-1.23.3-.68.46-1,.24-.58.38-.85c-.1.2-.19.42-.28.63C345,196.54,344.84,196.94,344.66,197.37Zm.9-2ZM342,206.42Zm43.28,92.93a16.76,16.76,0,0,1-1.48.86c.48-.24.94-.52,1.4-.8Zm-52.51-26.91L353,282.83l-20.21-10.39Z" style="opacity: 0.2; transform-origin: 347.102px 258.968px;" class="animable"></path>
                            </g>
                            <path d="M298.9,382.53h0l2.7,1.72,0,0h0a3.09,3.09,0,0,0,3-.32,9.49,9.49,0,0,0,4.3-7.46,3,3,0,0,0-1.21-2.73h0l0,0,0,0-.8-.5,25.85-10.51a1.88,1.88,0,0,0,1,1.51l-2.33,20.33v2.76a9.56,9.56,0,0,0-3.56,6.93,3,3,0,0,0,1.34,2.81h0l2.7,1.72.05,0h0a3.07,3.07,0,0,0,3-.32,9.47,9.47,0,0,0,4.3-7.45,3,3,0,0,0-1.21-2.73h0l0,0,0,0-2.74-1.74h0a2.28,2.28,0,0,0-1.43-.31l3-21.19h0a6.5,6.5,0,0,0,1.89-.3h0L363.19,378l-1.4.89,0,0,0,0h0a3.07,3.07,0,0,0-1.21,2.73,9.47,9.47,0,0,0,4.31,7.46,3.09,3.09,0,0,0,3,.32h0l.06,0,2.69-1.72h0a3,3,0,0,0,1.35-2.8,9.64,9.64,0,0,0-3.51-6.9v-4.27l-22.79-13.54,12-3a8.62,8.62,0,0,0-1.28,4.28,2.94,2.94,0,0,0,1.34,2.8h0l2.7,1.72.05,0h0a3.06,3.06,0,0,0,3-.31,9.5,9.5,0,0,0,4.3-7.46,3,3,0,0,0-1.21-2.73h0l0,0,0,0-2.74-1.73h0a2.51,2.51,0,0,0-2-.2v-.69l-1.46-.5-19.53,1v-3.45a5.71,5.71,0,0,0,.61-.29,3.29,3.29,0,0,0,1.94-2.68V324.33h-13.1v22.58a3.21,3.21,0,0,0,1.9,2.68,6.31,6.31,0,0,0,.64.31v2.9l-14.11-3.05L318,350v2.6h0l-2.73,1.74,0,0,0,0h0a3.1,3.1,0,0,0-1.21,2.74,9.38,9.38,0,0,0,2.13,5.49l-13.64,6.15V372a5.84,5.84,0,0,0-.56.28,9.47,9.47,0,0,0-4.3,7.45A2.94,2.94,0,0,0,298.9,382.53ZM307,368l9.88-4.4h0l-13.35,5.95Zm17.47-11.11,2,1.08-1.38.62A9.42,9.42,0,0,0,324.5,356.85Zm8.27-.36-7.44,3.31h0Z" style="fill: rgb(224, 224, 224); transform-origin: 334.833px 361.686px;" id="elzg7sg2pnys" class="animable"></path>
                            <path d="M364.46,359.17l2.16-3.71-2.81-1.78h0a3,3,0,0,0-3.12.26,9.47,9.47,0,0,0-4.3,7.45,2.94,2.94,0,0,0,1.34,2.8h0l2.76,1.76,2.28-3.91A10.35,10.35,0,0,0,364.46,359.17Z" style="fill: rgb(55, 71, 79); transform-origin: 361.496px 359.655px;" id="elhswbwrjh2ss" class="animable"></path>
                            <path d="M363.5,355.73c2.38-1.38,4.32-.28,4.33,2.46a9.5,9.5,0,0,1-4.3,7.46c-2.38,1.37-4.33.27-4.33-2.47A9.47,9.47,0,0,1,363.5,355.73Z" style="fill: rgb(69, 90, 100); transform-origin: 363.515px 360.687px;" id="el58tsjn8c4z" class="animable"></path>
                            <path d="M317.31,358.11l-2.17-3.71,2.81-1.78h0a3,3,0,0,1,3.12.26,9.5,9.5,0,0,1,4.31,7.45,3,3,0,0,1-1.35,2.8h0l-2.75,1.76L319,361A10.3,10.3,0,0,1,317.31,358.11Z" style="fill: rgb(55, 71, 79); transform-origin: 320.267px 358.595px;" id="el8di66ylxqev" class="animable"></path>
                            <path d="M318.26,354.67c-2.38-1.37-4.32-.27-4.33,2.47a9.47,9.47,0,0,0,4.31,7.45c2.38,1.38,4.32.27,4.33-2.47A9.47,9.47,0,0,0,318.26,354.67Z" style="fill: rgb(69, 90, 100); transform-origin: 318.25px 359.632px;" id="elz4o1zckk7q" class="animable"></path>
                            <path d="M332.77,348.93h8v13.8h0a2,2,0,0,1-1.18,1.64,6.24,6.24,0,0,1-5.66,0,2,2,0,0,1-1.17-1.65h0Z" style="fill: rgb(235, 235, 235); transform-origin: 336.765px 356.989px;" id="elr0kjmwca6m" class="animable"></path>
                            <polygon points="361.77 352.8 361.77 356.09 340.78 361.38 340.78 354.42 361.77 352.8" style="fill: rgb(224, 224, 224); transform-origin: 351.275px 357.09px;" id="eljpnc96w57" class="animable"></polygon>
                            <polygon points="361.77 352.8 360.31 352.3 340.78 353.33 340.78 354.42 361.77 352.8" style="fill: rgb(245, 245, 245); transform-origin: 351.275px 353.36px;" id="ell4174ru8gi" class="animable"></polygon>
                            <path d="M363.88,382.63l-2.17-3.71,2.81-1.78h0a3,3,0,0,1,3.12.26,9.48,9.48,0,0,1,4.31,7.45,3,3,0,0,1-1.35,2.8h0l-2.75,1.76-2.28-3.91A10.11,10.11,0,0,1,363.88,382.63Z" style="fill: rgb(55, 71, 79); transform-origin: 366.837px 383.115px;" id="elqcrwksmuawg" class="animable"></path>
                            <path d="M364.83,379.19c-2.38-1.38-4.32-.27-4.33,2.46a9.47,9.47,0,0,0,4.31,7.46c2.38,1.37,4.32.27,4.33-2.47A9.45,9.45,0,0,0,364.83,379.19Z" style="fill: rgb(69, 90, 100); transform-origin: 364.82px 384.148px;" id="elmvilvc1zddp" class="animable"></path>
                            <path d="M335.93,392l2.16-3.71-2.81-1.78h0a3,3,0,0,0-3.12.26,9.49,9.49,0,0,0-4.3,7.45,3,3,0,0,0,1.34,2.81h0l2.76,1.76,2.28-3.9A10.54,10.54,0,0,0,335.93,392Z" style="fill: rgb(55, 71, 79); transform-origin: 332.967px 392.49px;" id="elh3erfr4ioh8" class="animable"></path>
                            <path d="M335,388.59c2.38-1.37,4.32-.27,4.33,2.47a9.47,9.47,0,0,1-4.3,7.45c-2.39,1.38-4.33.28-4.34-2.47A9.54,9.54,0,0,1,335,388.59Z" style="fill: rgb(69, 90, 100); transform-origin: 335.01px 393.553px;" id="elw1f58d1e75" class="animable"></path>
                            <path d="M305.63,377.5l2.16-3.71L305,372h0a3,3,0,0,0-3.12.26,9.47,9.47,0,0,0-4.3,7.45,2.94,2.94,0,0,0,1.34,2.8h0l2.76,1.76,2.28-3.91A10.35,10.35,0,0,0,305.63,377.5Z" style="fill: rgb(55, 71, 79); transform-origin: 302.676px 377.975px;" id="elvhj7derisur" class="animable"></path>
                            <path d="M304.67,374.06c2.38-1.38,4.32-.28,4.33,2.46a9.49,9.49,0,0,1-4.3,7.46c-2.39,1.37-4.33.27-4.34-2.47A9.51,9.51,0,0,1,304.67,374.06Z" style="fill: rgb(69, 90, 100); transform-origin: 304.68px 379.017px;" id="el2j9ctzyhnwc" class="animable"></path>
                            <polygon points="366.82 374.61 366.82 379.94 338.71 364.75 338.71 357.4 366.82 374.61" style="fill: rgb(224, 224, 224); transform-origin: 352.765px 368.67px;" id="elplda31zywm" class="animable"></polygon>
                            <polygon points="368.44 373.69 340.32 356.99 338.71 357.4 366.82 374.61 368.44 373.69" style="fill: rgb(245, 245, 245); transform-origin: 353.575px 365.8px;" id="eljxv6yilbggc" class="animable"></polygon>
                            <polygon points="368.44 379.02 366.82 379.94 366.82 374.61 368.44 373.69 368.44 379.02" style="fill: rgb(240, 240, 240); transform-origin: 367.63px 376.815px;" id="el963yfbiwjm" class="animable"></polygon>
                            <polygon points="336.82 357.4 333.4 384.57 333.4 389.43 336.82 365.05 336.82 357.4" style="fill: rgb(224, 224, 224); transform-origin: 335.11px 373.415px;" id="el7wwyuzgwjyt" class="animable"></polygon>
                            <rect x="331.42" y="384.57" width="1.98" height="4.86" style="fill: rgb(240, 240, 240); transform-origin: 332.41px 387px;" id="elxoq772s04wc" class="animable"></rect>
                            <polygon points="331.42 384.57 334.53 357.4 336.82 357.4 333.4 384.57 331.42 384.57" style="fill: rgb(245, 245, 245); transform-origin: 334.12px 370.985px;" id="elcunez90zr5r" class="animable"></polygon>
                            <polygon points="303.56 369.51 303.56 374.61 332.77 362.73 332.77 356.49 303.56 369.51" style="fill: rgb(224, 224, 224); transform-origin: 318.165px 365.55px;" id="el90mowuwsvye" class="animable"></polygon>
                            <polygon points="302.42 373.86 303.56 374.61 303.56 369.51 302.42 368.77 302.42 373.86" style="fill: rgb(240, 240, 240); transform-origin: 302.99px 371.69px;" id="elah7y9b21bj" class="animable"></polygon>
                            <polygon points="307.03 367.96 303.56 369.51 302.42 368.77 332.77 355.1 332.77 356.49 307.03 367.96" style="fill: rgb(245, 245, 245); transform-origin: 317.595px 362.305px;" id="elpie5shxp0ac" class="animable"></polygon>
                            <polygon points="317.98 350.02 317.98 353.36 326.5 357.93 332.77 355.1 332.77 353.73 317.98 350.02" style="fill: rgb(224, 224, 224); transform-origin: 325.375px 353.975px;" id="elnvk4b4ceu0o" class="animable"></polygon>
                            <polygon points="317.98 350.02 318.66 349.75 332.77 352.8 332.77 353.73 317.98 350.02" style="fill: rgb(245, 245, 245); transform-origin: 325.375px 351.74px;" id="elaoevrxydaw9" class="animable"></polygon>
                            <path d="M330.23,324.33h13.1v22.58h0a3.29,3.29,0,0,1-1.94,2.68,10.18,10.18,0,0,1-9.26,0,3.21,3.21,0,0,1-1.9-2.68h0Z" style="fill: rgb(224, 224, 224); transform-origin: 336.78px 337.517px;" id="elbpgvt82c7y" class="animable"></path>
                            <path d="M278.61,288a8.36,8.36,0,0,0,2.83,2.68l53.4,28.37a12.54,12.54,0,0,0,11.51.11l37.41-18.95a18.91,18.91,0,0,0,9.72-12l18-66.68.91.28a7.31,7.31,0,0,0,2.36.36l.1,0-21.42,79.13a18.91,18.91,0,0,1-9.72,11.95l-37.41,18.95a12.51,12.51,0,0,1-11.51-.11l-53.4-28.37C276.11,300.74,275.61,292.58,278.61,288Z" style="fill: rgb(46, 172, 124); transform-origin: 345.811px 277.539px;" id="elacyjtukqzv4" class="animable"></path>
                            <g id="elmjqtao192ec">
                                <path d="M278.61,288a8.36,8.36,0,0,0,2.83,2.68l53.4,28.37a12.54,12.54,0,0,0,11.51.11l37.41-18.95a18.91,18.91,0,0,0,9.72-12l18-66.68.91.28a7.31,7.31,0,0,0,2.36.36l.1,0-21.42,79.13a18.91,18.91,0,0,1-9.72,11.95l-37.41,18.95a12.51,12.51,0,0,1-11.51-.11l-53.4-28.37C276.11,300.74,275.61,292.58,278.61,288Z" style="opacity: 0.3; transform-origin: 345.811px 277.539px;" class="animable"></path>
                            </g>
                            <path d="M281.1,285.62l38.69-19.85,51,26.21c-1.66.4-3.34.74-5,1.07-4.38.88-8.85,1.85-12.66,4.19s-6.88,6.35-6.91,10.82l1.37,10.52h0l-1.19.6a12.54,12.54,0,0,1-11.51-.11l-53.4-28.37a8.36,8.36,0,0,1-2.83-2.68A7.22,7.22,0,0,1,281.1,285.62Z" style="fill: rgb(46, 172, 124); transform-origin: 324.725px 293.147px;" id="elgheewuu4br8" class="animable"></path>
                            <g id="elmt680wbakbj">
                                <path d="M281.1,285.62l38.69-19.85,51,26.21c-1.66.4-3.34.74-5,1.07-4.38.88-8.85,1.85-12.66,4.19s-6.88,6.35-6.91,10.82l1.37,10.52h0l-1.19.6a12.54,12.54,0,0,1-11.51-.11l-53.4-28.37a8.36,8.36,0,0,1-2.83-2.68A7.22,7.22,0,0,1,281.1,285.62Z" style="opacity: 0.1; transform-origin: 324.725px 293.147px;" class="animable"></path>
                            </g>
                            <path d="M286.73,252.43s31.06,9.13,39.28,1.06c10.22-10,5.94-35.32,4.72-45.22s0-16.75,2.74-19.64,6.7-7.15,19.56-1.82c-13,6.69-14.69,38.53-10.57,51.31-10.21,10.5-9.51,26.77-9.7,34.32,0,0-26.54,6.48-40.4,14.09Z" style="fill: rgb(46, 172, 124); transform-origin: 319.88px 235.399px;" id="ely28j960rl9" class="animable"></path>
                            <g id="el0dew9sdteeue">
                                <path d="M286.73,252.43s31.06,9.13,39.28,1.06c10.22-10,5.94-35.32,4.72-45.22s0-16.75,2.74-19.64,6.7-7.15,19.56-1.82c-13,6.69-14.69,38.53-10.57,51.31-10.21,10.5-9.51,26.77-9.7,34.32,0,0-26.54,6.48-40.4,14.09Z" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 319.88px 235.399px;" class="animable"></path>
                            </g>
                            <path d="M292.36,286.53,286,283.1c0-17.47-2.58-15.75-7.39-22.6s2.56-11.12,8.12-8.07S294.53,264.63,292.36,286.53Z" style="fill: rgb(46, 172, 124); transform-origin: 285.116px 268.979px;" id="eld2bqf8wcsw" class="animable"></path>
                            <g id="elsssgmci1no">
                                <path d="M292.36,286.53,286,283.1c0-17.47-2.58-15.75-7.39-22.6s2.56-11.12,8.12-8.07S294.53,264.63,292.36,286.53Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 285.116px 268.979px;" class="animable"></path>
                            </g>
                            <path d="M353,186.81s34.8,15.07,51.74,23.44l-1.24,6.18L348,191.23A15,15,0,0,1,353,186.81Z" style="fill: rgb(46, 172, 124); transform-origin: 376.37px 201.62px;" id="elwrhtzv6eru" class="animable"></path>
                            <g id="el20arwy12du8">
                                <path d="M353,186.81s34.8,15.07,51.74,23.44l-1.24,6.18L348,191.23A15,15,0,0,1,353,186.81Z" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 376.37px 201.62px;" class="animable"></path>
                            </g>
                            <path d="M342.46,238.12c-3.51-10.91-2.8-35.7,5.58-46.89l55.49,25.2L390.85,280l-20.1,12-38-19.54C333,264.89,332.25,248.62,342.46,238.12Z" style="fill: rgb(46, 172, 124); transform-origin: 368.14px 241.615px;" id="elfkjhv639j0e" class="animable"></path>
                            <path d="M376.8,250.87c-.94-.54-1.71-.11-1.71,1a3.77,3.77,0,0,0,1.7,2.95c.94.54,1.71.1,1.71-1A3.75,3.75,0,0,0,376.8,250.87Z" style="fill: rgb(46, 172, 124); transform-origin: 376.795px 252.844px;" id="el7whib77eyoc" class="animable"></path>
                            <path d="M368.21,245.82c-.94-.54-1.71-.11-1.71,1a3.75,3.75,0,0,0,1.7,2.94c.94.54,1.71.11,1.71-1A3.74,3.74,0,0,0,368.21,245.82Z" style="fill: rgb(46, 172, 124); transform-origin: 368.205px 247.79px;" id="elxgqyd0zo82" class="animable"></path>
                            <path d="M359.62,240.78c-.94-.55-1.7-.11-1.71,1a3.75,3.75,0,0,0,1.7,2.94c.94.55,1.71.11,1.71-1A3.7,3.7,0,0,0,359.62,240.78Z" style="fill: rgb(46, 172, 124); transform-origin: 359.615px 242.75px;" id="eljdtri6q3kdf" class="animable"></path>
                            <path d="M351,235.73c-.94-.54-1.71-.11-1.71,1a3.74,3.74,0,0,0,1.7,3c.94.54,1.7.1,1.71-1A3.75,3.75,0,0,0,351,235.73Z" style="fill: rgb(46, 172, 124); transform-origin: 350.995px 237.729px;" id="elujrcwbw0bri" class="animable"></path>
                            <g id="elxf0rmz92kwo">
                                <g style="opacity: 0.2; transform-origin: 363.895px 245.274px;" class="animable">
                                    <path d="M376.8,250.87c-.94-.54-1.71-.11-1.71,1a3.77,3.77,0,0,0,1.7,2.95c.94.54,1.71.1,1.71-1A3.75,3.75,0,0,0,376.8,250.87Z" style="fill: rgb(255, 255, 255); transform-origin: 376.795px 252.844px;" id="elkmkqrvuim7" class="animable"></path>
                                    <path d="M368.21,245.82c-.94-.54-1.71-.11-1.71,1a3.75,3.75,0,0,0,1.7,2.94c.94.54,1.71.11,1.71-1A3.74,3.74,0,0,0,368.21,245.82Z" style="fill: rgb(255, 255, 255); transform-origin: 368.205px 247.79px;" id="elinwf4s2yb2i" class="animable"></path>
                                    <path d="M359.62,240.78c-.94-.55-1.7-.11-1.71,1a3.75,3.75,0,0,0,1.7,2.94c.94.55,1.71.11,1.71-1A3.7,3.7,0,0,0,359.62,240.78Z" style="fill: rgb(255, 255, 255); transform-origin: 359.615px 242.75px;" id="elscbsezlcgbr" class="animable"></path>
                                    <path d="M351,235.73c-.94-.54-1.71-.11-1.71,1a3.74,3.74,0,0,0,1.7,3c.94.54,1.7.1,1.71-1A3.75,3.75,0,0,0,351,235.73Z" style="fill: rgb(255, 255, 255); transform-origin: 350.995px 237.729px;" id="elfyf6amr6db" class="animable"></path>
                                </g>
                            </g>
                            <path d="M353.08,297.24c3.81-2.34,8.28-3.31,12.66-4.19,1.67-.33,3.35-.67,5-1.07a30.84,30.84,0,0,0,7.76-2.83c6.13-3.39,10.25-9.72,12.23-16.45s2-13.87,1.6-20.87-1.28-14-1.07-21c.12-4.08.74-8.44,3.5-11.45s7.44-4,11.6-3.49a23.34,23.34,0,0,1,4,.94l1.84,2.16-.71,2.61-18,66.68a18.91,18.91,0,0,1-8.29,11.13c-.47.29-.94.57-1.43.82l-36.22,18.35-1.37-10.52C346.2,303.59,349.28,299.59,353.08,297.24Z" style="fill: rgb(46, 172, 124); transform-origin: 379.19px 267.171px;" id="el5f16epneela" class="animable"></path>
                            <g id="elydji2slo8y">
                                <path d="M353.08,297.24c3.81-2.34,8.28-3.31,12.66-4.19,1.67-.33,3.35-.67,5-1.07a30.84,30.84,0,0,0,7.76-2.83c6.13-3.39,10.25-9.72,12.23-16.45s2-13.87,1.6-20.87-1.28-14-1.07-21c.12-4.08.74-8.44,3.5-11.45s7.44-4,11.6-3.49a23.34,23.34,0,0,1,4,.94l1.84,2.16-.71,2.61-18,66.68a18.91,18.91,0,0,1-8.29,11.13c-.47.29-.94.57-1.43.82l-36.22,18.35-1.37-10.52C346.2,303.59,349.28,299.59,353.08,297.24Z" style="opacity: 0.3; transform-origin: 379.19px 267.171px;" class="animable"></path>
                            </g>
                            <path d="M353,290.08c13.25-3.78,26.27-4.27,31.07-13.79s5.14-22.65,2.74-45.48a34.65,34.65,0,0,1,.21-8.84c1.41-8.55,6.55-12.2,12.46-12.29a23,23,0,0,1,15.85,6,7.18,7.18,0,0,1,2,2.58,3.08,3.08,0,0,1-.39,3.09,3,3,0,0,1-2,.91l-.1,0a7.31,7.31,0,0,1-2.36-.36l-.91-.28c-1.62-.51-3.21-1.12-4.86-1.52a10.6,10.6,0,0,0-6,0,6.35,6.35,0,0,0-3.83,4.27c-5.59,18.25,1.49,37.86-4.79,52.93-5.14,13.7-22.9,19.39-35.43,23.46h0a7.73,7.73,0,0,0,3.13-2.28,5.27,5.27,0,0,0-.49-6.35A6.91,6.91,0,0,0,353,290.08Z" style="fill: rgb(46, 172, 124); transform-origin: 385.289px 255.219px;" id="elb0ureyv9fy8" class="animable"></path>
                            <g id="elo9lzss7dnn">
                                <path d="M353,290.08c13.25-3.78,26.27-4.27,31.07-13.79s5.14-22.65,2.74-45.48a34.65,34.65,0,0,1,.21-8.84c1.41-8.55,6.55-12.2,12.46-12.29a23,23,0,0,1,15.85,6,7.18,7.18,0,0,1,2,2.58,3.08,3.08,0,0,1-.39,3.09,3,3,0,0,1-2,.91l-.1,0a7.31,7.31,0,0,1-2.36-.36l-.91-.28c-1.62-.51-3.21-1.12-4.86-1.52a10.6,10.6,0,0,0-6,0,6.35,6.35,0,0,0-3.83,4.27c-5.59,18.25,1.49,37.86-4.79,52.93-5.14,13.7-22.9,19.39-35.43,23.46h0a7.73,7.73,0,0,0,3.13-2.28,5.27,5.27,0,0,0-.49-6.35A6.91,6.91,0,0,0,353,290.08Z" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 385.289px 255.219px;" class="animable"></path>
                            </g>
                            <path d="M343.84,299.45a19.79,19.79,0,0,1,3.39-5.94,10.18,10.18,0,0,1,5.8-3.43,6.91,6.91,0,0,1,6.27,2,5.27,5.27,0,0,1,.49,6.35,7.73,7.73,0,0,1-3.13,2.28,29.07,29.07,0,0,0-2.91,1.43,12.33,12.33,0,0,0-5,7.07,36.89,36.89,0,0,0-1.16,8.77l0,.57-6.21-3.45A38,38,0,0,1,343.84,299.45Z" style="fill: rgb(46, 172, 124); transform-origin: 350.976px 304.254px;" id="el18ctf3lxr57" class="animable"></path>
                            <g id="elpsixgtzrwgn">
                                <path d="M343.84,299.45a19.79,19.79,0,0,1,3.39-5.94,10.18,10.18,0,0,1,5.8-3.43,6.91,6.91,0,0,1,6.27,2,5.27,5.27,0,0,1,.49,6.35,7.73,7.73,0,0,1-3.13,2.28,29.07,29.07,0,0,0-2.91,1.43,12.33,12.33,0,0,0-5,7.07,36.89,36.89,0,0,0-1.16,8.77l0,.57-6.21-3.45A38,38,0,0,1,343.84,299.45Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 350.976px 304.254px;" class="animable"></path>
                            </g>
                            <g id="eldrblstksot9">
                                <path d="M417.33,218.22a7.18,7.18,0,0,0-2-2.58,22.64,22.64,0,0,0-10.69-5.43c-17-8.39-51.64-23.4-51.64-23.4a11.55,11.55,0,0,0-1.3.79,11.55,11.55,0,0,1,1.3-.79c-12.86-5.33-16.82-1.07-19.56,1.82s-4,9.75-2.74,19.64,5.5,35.19-4.72,45.22c-8.22,8.07-39.28-1.06-39.28-1.06-5.56-3.05-12.94,1.21-8.12,8.07s7.4,5.13,7.39,22.6l-4.9,2.52a7.22,7.22,0,0,0-2.49,2.4c-3,4.56-2.5,12.72,2.83,15.75l53.4,28.37a12.51,12.51,0,0,0,11.51.11l37.41-18.95a18.91,18.91,0,0,0,9.72-11.95l21.42-79.13a3,3,0,0,0,2-.91A3.08,3.08,0,0,0,417.33,218.22Zm-25.19,73.57c-.14.27-.29.53-.43.79C391.85,292.32,392,292.06,392.14,291.79Zm-.91,1.6c-.18.29-.37.57-.57.85C390.86,294,391.05,293.68,391.23,293.39Zm-41-104.58q-.51.47-1,1Q349.71,189.27,350.22,188.81Zm1.21-1a11.69,11.69,0,0,0-1,.77A11.69,11.69,0,0,1,351.43,187.82ZM348,191.23c.34-.45.69-.88,1.06-1.29C348.73,190.35,348.38,190.78,348,191.23Zm-4.9,10.53a64.69,64.69,0,0,0-2,9.54A64.69,64.69,0,0,1,343.14,201.76Zm4.9-10.53c-.25.34-.5.69-.74,1.05C347.54,191.92,347.79,191.57,348,191.23Zm-.78,1.12c-.24.37-.47.74-.7,1.13C346.79,193.09,347,192.72,347.26,192.35Zm-.71,1.14a37.48,37.48,0,0,0-3.41,8.25A37.48,37.48,0,0,1,346.55,193.49Zm-5.4,18c-.07.48-.12,1-.18,1.45C341,212.46,341.08,212,341.15,211.5Zm-.21,1.78c-.05.46-.1.93-.14,1.4C340.84,214.21,340.89,213.75,340.94,213.28Zm-.17,1.74c0,.48-.08.95-.11,1.43C340.69,216,340.73,215.5,340.77,215Zm-.12,1.54c-.1,1.49-.15,3-.17,4.43C340.5,219.53,340.56,218.05,340.65,216.56Zm-.18,5v0ZM342.11,237c0-.13-.07-.27-.1-.41C342,236.68,342.08,236.82,342.11,237Zm-.31-1.26c0-.17-.08-.34-.11-.51C341.72,235.35,341.76,235.52,341.8,235.69Zm-.29-1.35c0-.19-.07-.37-.1-.56C341.44,234,341.48,234.15,341.51,234.34Zm-.25-1.44-.09-.59Zm-.22-1.54c0-.19-.06-.38-.08-.57C341,231,341,231.17,341,231.36Zm-.23-2-.06-.66Zm-.15-1.72c0-.27,0-.54-.05-.81C340.63,227.11,340.64,227.39,340.66,227.65Zm-.1-1.66,0-.89Zm-.06-1.68c0-.32,0-.64,0-1C340.48,223.67,340.49,224,340.5,224.31Zm22,63.43h0l-29.74-15.3h0Zm-16.15,31.44,1.19-.6,36.22-18.35c.49-.25,1-.53,1.43-.82s.85-.56,1.25-.87a18.07,18.07,0,0,1-2.68,1.69Zm40.38-20.84c.36-.28.7-.57,1-.87C387.43,297.77,387.09,298.06,386.73,298.34Zm1.43-1.22c.3-.28.59-.58.87-.88C388.75,296.54,388.46,296.84,388.16,297.12Zm2-2.24q-.35.45-.72.87Q389.85,295.33,390.19,294.88Zm2.42-4.15c.09-.21.2-.42.28-.64C392.81,290.31,392.7,290.52,392.61,290.73Z" style="opacity: 0.2; transform-origin: 347.15px 258.933px;" class="animable"></path>
                            </g>
                            <path d="M321.18,324.77c6.13-2.64,14.46-12.94,18.64-18.14,5.3-6.6,4.71-21,3.51-27.55L291.19,275c-1.49,14.28-14.61,23.63-14.61,23.63Z" style="fill: rgb(38, 50, 56); transform-origin: 310.362px 299.885px;" id="elpc5yey0ir0a" class="animable"></path>
                            <path d="M225.8,372.29c.2,4.82,0,10.47,0,10.47l2.8.16a6.76,6.76,0,0,1,6,4.46l.07.17a2.64,2.64,0,0,0,3.27,1.62h0a2.59,2.59,0,0,0,1.59-1.38L241,375.71Z" style="fill: rgb(255, 168, 167); transform-origin: 233.4px 380.79px;" id="elgcjkf0lv0uj" class="animable"></path>
                            <path d="M221.7,414.21c-7.33,3.12-18.55,3.74-23.2-3.74v2c4.65,7.48,15.87,6.87,23.2,3.74s5.72-8.24,12.29-11a17.86,17.86,0,0,0,6.41-4c0-.6.12-1.35.23-2.21a22.5,22.5,0,0,1-6.64,4.23C227.42,406,229,411.08,221.7,414.21Z" style="fill: rgb(55, 71, 79); transform-origin: 219.565px 408.704px;" id="elem4zehfy29" class="animable"></path>
                            <path d="M240.63,392.34a10.55,10.55,0,0,1,0-4.32,2.31,2.31,0,0,0-.33-1.91l-.55-.54-.26,2.22a2.59,2.59,0,0,1-1.59,1.38,2.64,2.64,0,0,1-3.27-1.62l-.07-.17a6.76,6.76,0,0,0-6-4.46l-2.84-.16a2.06,2.06,0,0,0-2,1.26c-2.92,7.05-10.27,14.89-15.94,18.47-4.16-.09-9.31,3.36-9.31,7.56v.42c4.65,7.48,15.87,6.86,23.2,3.74s5.72-8.25,12.29-11a22.5,22.5,0,0,0,6.64-4.23A24.41,24.41,0,0,0,240.63,392.34Z" style="fill: rgb(69, 90, 100); transform-origin: 219.656px 399.58px;" id="elzsb9ckix1cc" class="animable"></path>
                            <path d="M226.44,398.13a.93.93,0,0,0,1.3.11.92.92,0,0,0,.15-1.28,10.61,10.61,0,0,0-9.57-4.2c-.39.48-.79,1-1.2,1.43A10.22,10.22,0,0,1,226.44,398.13Z" style="fill: rgb(255, 255, 255); transform-origin: 222.601px 395.58px;" id="elinn7dupjwcb" class="animable"></path>
                            <path d="M229.33,394.89a.93.93,0,0,0,1.3.12.92.92,0,0,0,.15-1.28,11.15,11.15,0,0,0-10-4.31c-.35.52-.72,1-1.1,1.56C223.28,390.73,226.47,391.41,229.33,394.89Z" style="fill: rgb(255, 255, 255); transform-origin: 225.326px 392.291px;" id="elmcgiofiyhto" class="animable"></path>
                            <path d="M223.44,401.29a.93.93,0,0,0,1.3.12.94.94,0,0,0,.15-1.29,10.64,10.64,0,0,0-9.32-4.22c-.47.5-.95,1-1.43,1.45A10.24,10.24,0,0,1,223.44,401.29Z" style="fill: rgb(255, 255, 255); transform-origin: 219.61px 398.745px;" id="el6wq7emz4tmh" class="animable"></path>
                            <path d="M207.81,402.49c-4.16-.09-9.31,3.36-9.31,7.56v.42c4.58,7.36,15.53,6.88,22.86,3.87C220.8,404.27,211.13,402.46,207.81,402.49Z" style="fill: rgb(255, 255, 255); transform-origin: 209.93px 409.445px;" id="el69s3qdhrisx" class="animable"></path>
                            <path d="M220.35,404.31a.93.93,0,0,0,1.45-1.17,10.63,10.63,0,0,0-9.34-4.22c-.59.52-1.17,1-1.75,1.47C214.29,400.14,217.49,400.82,220.35,404.31Z" style="fill: rgb(255, 255, 255); transform-origin: 216.358px 401.772px;" id="elr8qjjkasl49" class="animable"></path>
                            <path d="M274.9,381.57c.21,4.81,0,10.47,0,10.47l2.8.16a6.78,6.78,0,0,1,6,4.46l.06.17a2.64,2.64,0,0,0,3.27,1.62h0a2.59,2.59,0,0,0,1.59-1.38L290.05,385Z" style="fill: rgb(255, 168, 167); transform-origin: 282.475px 390.07px;" id="eliqt0z21tqcm" class="animable"></path>
                            <path d="M270.8,423.48c-7.33,3.13-18.54,3.74-23.2-3.73v2c4.66,7.48,15.87,6.87,23.2,3.74s5.72-8.24,12.29-11a17.67,17.67,0,0,0,6.41-4c0-.59.13-1.34.23-2.2a22.7,22.7,0,0,1-6.64,4.23C276.52,415.24,278.13,420.36,270.8,423.48Z" style="fill: rgb(55, 71, 79); transform-origin: 268.665px 417.989px;" id="elhoueguodx9v" class="animable"></path>
                            <path d="M289.73,401.62a10.31,10.31,0,0,1,0-4.32,2.3,2.3,0,0,0-.34-1.92l-.54-.53-.27,2.22a2.59,2.59,0,0,1-1.59,1.38,2.64,2.64,0,0,1-3.27-1.62l-.06-.17a6.78,6.78,0,0,0-6-4.46l-2.84-.16a2.06,2.06,0,0,0-2,1.26c-2.92,7.05-10.27,14.89-15.94,18.47-4.16-.09-9.31,3.36-9.31,7.56v.42c4.66,7.47,15.87,6.86,23.2,3.73s5.72-8.24,12.29-11a22.7,22.7,0,0,0,6.64-4.23A24,24,0,0,0,289.73,401.62Z" style="fill: rgb(69, 90, 100); transform-origin: 268.758px 408.858px;" id="elrfm0gsarba" class="animable"></path>
                            <path d="M275.54,407.41a.93.93,0,0,0,1.3.11.91.91,0,0,0,.15-1.28,10.6,10.6,0,0,0-9.57-4.2c-.39.48-.79,1-1.19,1.43A10.2,10.2,0,0,1,275.54,407.41Z" style="fill: rgb(255, 255, 255); transform-origin: 271.708px 404.86px;" id="el5ty4065kms" class="animable"></path>
                            <path d="M278.43,404.17a.93.93,0,0,0,1.3.12.91.91,0,0,0,.15-1.28,11.13,11.13,0,0,0-10-4.31c-.35.52-.72,1-1.1,1.56C272.38,400,275.57,400.69,278.43,404.17Z" style="fill: rgb(255, 255, 255); transform-origin: 274.428px 401.57px;" id="el2ak62qlae1n" class="animable"></path>
                            <path d="M272.54,410.57A.93.93,0,0,0,274,409.4a10.62,10.62,0,0,0-9.32-4.22c-.47.5-.95,1-1.43,1.45A10.23,10.23,0,0,1,272.54,410.57Z" style="fill: rgb(255, 255, 255); transform-origin: 268.728px 408.034px;" id="elu0v3iii1eyq" class="animable"></path>
                            <path d="M256.91,411.77c-4.16-.09-9.31,3.36-9.31,7.56v.42c4.59,7.36,15.54,6.87,22.87,3.87C269.9,413.55,260.24,411.73,256.91,411.77Z" style="fill: rgb(255, 255, 255); transform-origin: 259.035px 418.722px;" id="elfrrl9g2c6kh" class="animable"></path>
                            <path d="M269.45,413.59a.93.93,0,0,0,1.45-1.17,10.61,10.61,0,0,0-9.34-4.22c-.58.52-1.17,1-1.74,1.47C263.39,409.42,266.59,410.1,269.45,413.59Z" style="fill: rgb(255, 255, 255); transform-origin: 265.462px 411.05px;" id="el5fats1snkva" class="animable"></path>
                            <path d="M253.75,353.73c-2.35,9.93-3.94,16.18-8.26,29.53,0,0-16.71,3.58-23.3-2.94L229.71,344Z" style="fill: rgb(38, 50, 56); transform-origin: 237.97px 364.12px;" id="eld05jblhlqot" class="animable"></path>
                            <path d="M294.49,356.58c-.63,10.19-.26,19.37-2.26,33.27,0,0-14.24,4.72-21.84-.59L269.14,365Z" style="fill: rgb(38, 50, 56); transform-origin: 281.815px 374.182px;" id="elp4jwrmi0jdb" class="animable"></path>
                            <polygon points="348.21 327.12 345.09 325.31 345.09 347.34 275.08 387.82 275.08 369.35 271.95 371.16 268.83 369.35 268.83 457.73 271.95 459.53 275.08 457.73 275.08 394.73 345.09 354.3 345.09 413.68 348.21 415.49 351.34 413.68 351.34 325.31 348.21 327.12" style="fill: rgb(55, 71, 79); transform-origin: 310.085px 392.42px;" id="el21m2ksmqs8t" class="animable"></polygon>
                            <polygon points="146.79 313.49 146.79 295.02 143.67 296.82 140.54 295.02 140.54 383.39 143.67 385.2 146.79 383.39 146.79 320.39 219.93 278.16 219.93 274.81 216.81 273 146.79 313.49" style="fill: rgb(55, 71, 79); transform-origin: 180.235px 329.1px;" id="elpca3wvbgq7i" class="animable"></polygon>
                            <polygon points="143.67 296.82 143.67 385.2 146.79 383.39 146.79 295.02 143.67 296.82" style="fill: rgb(69, 90, 100); transform-origin: 145.23px 340.11px;" id="el2edqlmebz05" class="animable"></polygon>
                            <polygon points="143.67 296.82 143.67 385.2 140.54 383.39 140.54 295.02 143.67 296.82" style="fill: rgb(55, 71, 79); transform-origin: 142.105px 340.11px;" id="elj9ez7zfj95" class="animable"></polygon>
                            <polygon points="146.79 320.39 219.93 278.16 219.93 274.81 146.79 317.03 146.79 320.39" style="fill: rgb(69, 90, 100); transform-origin: 183.36px 297.6px;" id="ellr5j5s441oo" class="animable"></polygon>
                            <polygon points="146.79 313.49 216.81 273 219.93 274.81 146.79 317.03 146.79 313.49" style="fill: rgb(55, 71, 79); transform-origin: 183.36px 295.015px;" id="elaos1ikpmy7a" class="animable"></polygon>
                            <polygon points="348.21 327.12 348.21 415.49 351.34 413.68 351.34 325.31 348.21 327.12" style="fill: rgb(69, 90, 100); transform-origin: 349.775px 370.4px;" id="ela780pbtaf35" class="animable"></polygon>
                            <polygon points="348.21 327.12 348.21 415.49 345.09 413.68 345.09 325.31 348.21 327.12" style="fill: rgb(55, 71, 79); transform-origin: 346.65px 370.4px;" id="eldclos40wqf" class="animable"></polygon>
                            <polygon points="271.95 371.16 271.95 459.53 275.08 457.73 275.08 369.35 271.95 371.16" style="fill: rgb(69, 90, 100); transform-origin: 273.515px 414.44px;" id="elypmczcymng" class="animable"></polygon>
                            <polygon points="271.95 371.16 271.95 459.53 268.83 457.73 268.83 369.35 271.95 371.16" style="fill: rgb(55, 71, 79); transform-origin: 270.39px 414.44px;" id="elw45mn9in7t" class="animable"></polygon>
                            <polygon points="275.08 394.73 348.21 352.5 348.21 349.14 275.08 391.37 275.08 394.73" style="fill: rgb(69, 90, 100); transform-origin: 311.645px 371.935px;" id="el9dwbz791snm" class="animable"></polygon>
                            <polygon points="275.08 387.82 345.09 347.34 348.21 349.14 275.08 391.37 275.08 387.82" style="fill: rgb(55, 71, 79); transform-origin: 311.645px 369.355px;" id="eljhlldscyfar" class="animable"></polygon>
                            <g id="el91pkemsa2f">
                                <g style="opacity: 0.2; transform-origin: 310.085px 392.42px;" class="animable">
                                    <polygon points="348.21 327.12 348.21 415.49 351.34 413.68 351.34 325.31 348.21 327.12" style="fill: rgb(255, 255, 255); transform-origin: 349.775px 370.4px;" id="el26bfmt3583v" class="animable"></polygon>
                                    <polygon points="348.21 327.12 348.21 415.49 345.09 413.68 345.09 325.31 348.21 327.12" style="fill: rgb(255, 255, 255); transform-origin: 346.65px 370.4px;" id="elob8uqzrwyd" class="animable"></polygon>
                                    <polygon points="271.95 371.16 271.95 459.53 275.08 457.73 275.08 369.35 271.95 371.16" style="fill: rgb(255, 255, 255); transform-origin: 273.515px 414.44px;" id="el3fe9x2xba7g" class="animable"></polygon>
                                    <polygon points="271.95 371.16 271.95 459.53 268.83 457.73 268.83 369.35 271.95 371.16" style="fill: rgb(255, 255, 255); transform-origin: 270.39px 414.44px;" id="elp9idgnnd6kk" class="animable"></polygon>
                                    <polygon points="275.08 394.73 348.21 352.5 348.21 349.14 275.08 391.37 275.08 394.73" style="fill: rgb(255, 255, 255); transform-origin: 311.645px 371.935px;" id="elp8hvztd5o9j" class="animable"></polygon>
                                    <polygon points="275.08 387.82 345.09 347.34 348.21 349.14 275.08 391.37 275.08 387.82" style="fill: rgb(255, 255, 255); transform-origin: 311.645px 369.355px;" id="el79g3szmovos" class="animable"></polygon>
                                </g>
                            </g>
                            <g id="el8dwduaqe4cu">
                                <g style="opacity: 0.2; transform-origin: 180.235px 329.1px;" class="animable">
                                    <polygon points="143.67 296.82 143.67 385.2 146.79 383.39 146.79 295.02 143.67 296.82" style="fill: rgb(255, 255, 255); transform-origin: 145.23px 340.11px;" id="elagpvb8la75f" class="animable"></polygon>
                                    <polygon points="143.67 296.82 143.67 385.2 140.54 383.39 140.54 295.02 143.67 296.82" style="fill: rgb(255, 255, 255); transform-origin: 142.105px 340.11px;" id="elumkbzc2d6wi" class="animable"></polygon>
                                    <polygon points="146.79 320.39 219.93 278.16 219.93 274.81 146.79 317.03 146.79 320.39" style="fill: rgb(255, 255, 255); transform-origin: 183.36px 297.6px;" id="el79szta96fag" class="animable"></polygon>
                                    <polygon points="146.79 313.49 216.81 273 219.93 274.81 146.79 317.03 146.79 313.49" style="fill: rgb(255, 255, 255); transform-origin: 183.36px 295.015px;" id="eljjiyfuhqqxf" class="animable"></polygon>
                                </g>
                            </g>
                            <polygon points="351.33 316.77 219.93 240.88 140.54 286.74 140.54 295.02 271.95 371.16 351.34 325.31 351.34 316.76 351.33 316.77" style="fill: rgb(46, 172, 124); transform-origin: 245.94px 306.02px;" id="eluvwrl5ymt89" class="animable"></polygon>
                            <polygon points="271.95 362.63 140.54 286.74 219.93 240.88 351.34 316.77 271.95 362.63" style="fill: rgb(46, 172, 124); transform-origin: 245.94px 301.755px;" id="elgfwun7q0fs6" class="animable"></polygon>
                            <polygon points="271.95 371.16 140.54 295.02 140.54 286.74 271.95 362.63 271.95 371.16" style="fill: rgb(46, 172, 124); transform-origin: 206.245px 328.95px;" id="el8ifc86gj67y" class="animable"></polygon>
                            <polygon points="271.95 362.62 351.34 316.76 351.34 325.31 271.95 371.16 271.95 362.62" style="fill: rgb(46, 172, 124); transform-origin: 311.645px 343.96px;" id="el0cnfy7tri1s6" class="animable"></polygon>
                            <g id="elp69a0hle8xp">
                                <polygon points="271.95 362.63 140.54 286.74 219.93 240.88 351.34 316.77 271.95 362.63" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 245.94px 301.755px;" class="animable"></polygon>
                            </g>
                            <g id="el923l99u8rs9">
                                <polygon points="271.95 362.62 351.34 316.76 351.34 325.31 271.95 371.16 271.95 362.62" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 311.645px 343.96px;" class="animable"></polygon>
                            </g>
                            <g id="elp8ugqja2gmq">
                                <polygon points="271.95 371.16 140.54 295.02 140.54 286.74 271.95 362.63 271.95 371.16" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 206.245px 328.95px;" class="animable"></polygon>
                            </g>
                            <path d="M204.38,293.38l32.39-18.82a7.32,7.32,0,0,1,6.65,0l53.44,30.86a2.41,2.41,0,0,1,1.37,1.83h0v2.05h0a1.26,1.26,0,0,1,0,.43.08.08,0,0,1,0,0,2.33,2.33,0,0,1-.22.45l0,.05a2.75,2.75,0,0,1-.4.45l0,0a3.9,3.9,0,0,1-.59.43L264.5,330a4.86,4.86,0,0,1-.93.41l-.36.11-.47.12-.58.1-.13,0c-.27,0-.53,0-.8,0h-.12c-.27,0-.53,0-.79,0l-.11,0a6.35,6.35,0,0,1-.76-.13l-.14,0c-.22-.06-.44-.12-.65-.2l-.11,0a4.79,4.79,0,0,1-.72-.34l-53.44-30.85a4.12,4.12,0,0,1-.61-.43c-.06-.05-.09-.11-.15-.17a3.84,3.84,0,0,1-.28-.3,1,1,0,0,1-.1-.21,2.19,2.19,0,0,1-.16-.3c0-.07,0-.15,0-.22a1.57,1.57,0,0,1-.05-.3v-1.9A2.34,2.34,0,0,1,204.38,293.38Z" style="fill: rgb(224, 224, 224); transform-origin: 250.644px 302.251px;" id="el7ou7f18j16g" class="animable"></path>
                            <g id="elstfw45d5kd">
                                <path d="M298.23,307.24a1.64,1.64,0,0,1-.06.58s0,0,0,0a2.15,2.15,0,0,1-.22.46l0,.05a2.7,2.7,0,0,1-.4.44l0,0a3.87,3.87,0,0,1-.59.42L264.5,328.09a6.54,6.54,0,0,1-.93.41l-.36.1a3.59,3.59,0,0,1-.47.12,5.4,5.4,0,0,1-.58.1l-.13,0a7.14,7.14,0,0,1-.8,0h-.12a6.85,6.85,0,0,1-.79,0h-.11c-.26,0-.51-.08-.76-.13l-.14,0c-.22-.05-.44-.12-.65-.19l-.11,0a4.79,4.79,0,0,1-.72-.34l-53.44-30.86a4.08,4.08,0,0,1-.61-.42c-.06-.06-.09-.12-.15-.17a2.7,2.7,0,0,1-.28-.31.93.93,0,0,1-.1-.2,1.82,1.82,0,0,1-.16-.31c0-.07,0-.14,0-.22a1.57,1.57,0,0,1-.05-.3v1.9a1.57,1.57,0,0,0,.05.3c0,.07,0,.15,0,.22a2.19,2.19,0,0,0,.16.3,1,1,0,0,0,.1.21,3.84,3.84,0,0,0,.28.3c.06.06.09.12.15.17a4.12,4.12,0,0,0,.61.43L257.83,330a4.79,4.79,0,0,0,.72.34l.11,0c.21.08.43.14.65.2l.14,0a6.35,6.35,0,0,0,.76.13l.11,0c.26,0,.52,0,.79,0h.12c.27,0,.53,0,.8,0l.13,0,.58-.1.47-.12.36-.11a4.86,4.86,0,0,0,.93-.41l32.39-18.82a3.9,3.9,0,0,0,.59-.43l0,0a2.75,2.75,0,0,0,.4-.45l0-.05a2.33,2.33,0,0,0,.22-.45.08.08,0,0,0,0,0,1.26,1.26,0,0,0,0-.43h0v-2.05Z" style="opacity: 0.3; transform-origin: 250.637px 313.02px;" class="animable"></path>
                            </g>
                            <path d="M207.54,295.3l51.92,30,.2.09.11,0a2.76,2.76,0,0,0,.41.12l.29.06.19,0c.14,0,.29,0,.51,0h0c.16,0,.32,0,.53,0a2,2,0,0,0,.34-.06c.09,0,.42-.11.42-.11a1.44,1.44,0,0,0,.36-.15l16.7-9.71-53.62-31Z" style="fill: rgb(224, 224, 224); transform-origin: 243.53px 305.055px;" id="elb7r94hx4cl9" class="animable"></path>
                            <path d="M261.23,325.64h0Z" style="fill: rgb(38, 50, 56); transform-origin: 261.23px 325.64px;" id="elfz3dtjt5ykk" class="animable"></path>
                            <path d="M256.93,287.06l-9.77,5.74a1,1,0,0,0,0,1.71l14.6,8.43a1.63,1.63,0,0,0,1.64,0l9.77-5.74a1,1,0,0,0,0-1.71l-14.6-8.43A1.63,1.63,0,0,0,256.93,287.06Z" style="fill: rgb(224, 224, 224); transform-origin: 260.165px 295px;" id="elw8v2u628m6q" class="animable"></path>
                            <g id="eltq8k93yvo9f">
                                <path d="M207.54,295.3l51.92,30,.2.09.11,0a2.76,2.76,0,0,0,.41.12l.29.06.19,0c.14,0,.29,0,.51,0h0c.16,0,.32,0,.53,0a2,2,0,0,0,.34-.06c.09,0,.42-.11.42-.11a1.44,1.44,0,0,0,.36-.15l16.7-9.71-53.62-31Z" style="opacity: 0.2; transform-origin: 243.53px 305.055px;" class="animable"></path>
                            </g>
                            <g id="elqrwm2pe5hcp">
                                <path d="M256.93,287.06l-9.77,5.74a1,1,0,0,0,0,1.71l14.6,8.43a1.63,1.63,0,0,0,1.64,0l9.77-5.74a1,1,0,0,0,0-1.71l-14.6-8.43A1.63,1.63,0,0,0,256.93,287.06Z" style="opacity: 0.2; transform-origin: 260.165px 295px;" class="animable"></path>
                            </g>
                            <path d="M250.32,267.89c-3.92,5.68,5.4,13.84,9.38,11.87S258.53,263.68,250.32,267.89Z" style="fill: rgb(69, 90, 100); transform-origin: 255.225px 273.585px;" id="el3lenndamhku" class="animable"></path>
                            <g id="el63hfxpxmzev">
                                <path d="M250.32,267.89c-3.92,5.68,5.4,13.84,9.38,11.87S258.53,263.68,250.32,267.89Z" style="opacity: 0.4; transform-origin: 255.225px 273.585px;" class="animable"></path>
                            </g>
                            <path d="M283.88,220.44l-10.73,32.14-24,18.79a10.34,10.34,0,0,1-4.79.74l-9.63-.79a5.46,5.46,0,0,0-3.23.76L226,275.42a5.87,5.87,0,0,0-1.46,1.26l-2.7,3.2a2,2,0,0,0,.37,2.95l1.69,1.22a6.07,6.07,0,0,0,6.24.48l4.26-2.15,8.81,1v2.3l-2.38,2.05a2.54,2.54,0,0,0,.05,3.9h0s5.9-1.74,11.23-10.29l28.18-13.92a20,20,0,0,0,10.16-11.76l16-49.28-6.3.79A19.71,19.71,0,0,0,283.88,220.44Z" style="fill: rgb(255, 168, 167); transform-origin: 263.901px 249.005px;" id="elx0si9cfyamd" class="animable"></path>
                            <path d="M299.86,205.15A21.8,21.8,0,0,0,282,219.81l-10.54,31.56L257.9,262a10.49,10.49,0,0,1,8,14.72l15.21-7.52a22.13,22.13,0,0,0,11.18-12.93l17-52.27Z" style="fill: rgb(69, 90, 100); transform-origin: 283.595px 240.36px;" id="elbq0fs5c09vv" class="animable"></path>
                            <path d="M265.59,267.35A10.76,10.76,0,0,0,257.9,262l-7.58,5.92a9.44,9.44,0,0,1,9.38,11.87l6.22-3.07A10.78,10.78,0,0,0,265.59,267.35Z" style="fill: rgb(69, 90, 100); transform-origin: 258.577px 270.895px;" id="el58e3hzpecdw" class="animable"></path>
                            <g id="elxnaw452fnk">
                                <path d="M299.86,205.15A21.8,21.8,0,0,0,282,219.81l-10.54,31.56L257.9,262a10.49,10.49,0,0,1,8,14.72l15.21-7.52a22.13,22.13,0,0,0,11.18-12.93l17-52.27Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 283.595px 240.36px;" class="animable"></path>
                            </g>
                            <g id="elo5r27ten1bp">
                                <path d="M265.59,267.35A10.76,10.76,0,0,0,257.9,262l-7.58,5.92a9.44,9.44,0,0,1,9.38,11.87l6.22-3.07A10.78,10.78,0,0,0,265.59,267.35Z" style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 258.577px 270.895px;" class="animable"></path>
                            </g>
                            <g id="elusz0ca73fz">
                                <path d="M271.44,251.37c6.79.15,10,3.65,10.86,5.4.31-10.13-10.06-7.8-10.06-7.8Z" style="opacity: 0.2; transform-origin: 276.873px 252.754px;" class="animable"></path>
                            </g>
                            <path d="M195.65,255.65h0l1.28-.64h0a1.58,1.58,0,0,1,1.43.09l53.81,31.29a6.47,6.47,0,0,1,3.15,4.6l5.53,35.18a1.59,1.59,0,0,1-.9,1.7h0l-1.24.61h0a1.61,1.61,0,0,1-1.38-.11l-53.81-31.29a6.47,6.47,0,0,1-3.15-4.6l-5.53-35.18A1.59,1.59,0,0,1,195.65,255.65Z" style="fill: rgb(224, 224, 224); transform-origin: 227.845px 291.733px;" id="elwqz3uz1xb7d" class="animable"></path>
                            <path d="M225,287.84a11.85,11.85,0,0,1,5.34,7.69c.35,2.74-1.46,3.76-4.07,2.26a11.91,11.91,0,0,1-5.34-7.69C220.58,287.35,222.4,286.34,225,287.84Z" style="fill: rgb(255, 255, 255); transform-origin: 225.635px 292.814px;" id="elfyuoqa0vno" class="animable"></path>
                            <g id="eld74t2ijrwdr">
                                <path d="M259.76,326.71l-5.53-35.18a6.5,6.5,0,0,0-3.15-4.6l-53.81-31.29a1.59,1.59,0,0,0-1.62,0h0l1.28-.64h0a1.58,1.58,0,0,1,1.43.09l53.81,31.29a6.47,6.47,0,0,1,3.15,4.6l5.53,35.18a1.59,1.59,0,0,1-.9,1.7h0l-1.24.61h0A1.61,1.61,0,0,0,259.76,326.71Z" style="opacity: 0.3; transform-origin: 228.261px 291.67px;" class="animable"></path>
                            </g>
                            <path d="M307.21,204.7l-4.71.49a11.57,11.57,0,0,0-8.47,5.12c-4.9,7.48-7.19,19-5.88,31.44,1,9.47,1.71,18.88-3.82,32.95-2,5,1.07,10.7,6.07,12.69,15.85,6.31,38.49,3.5,50.21-.34a7.08,7.08,0,0,0,4.3-9.56s-4.4-24.24-3.55-26.2c1.93-4.5,2.39-15.37,2.86-22.22a35.79,35.79,0,0,0-3.74-17.63l-18-6.74Z" style="fill: rgb(255, 255, 255); transform-origin: 314.605px 247.907px;" id="elej2r95ub4fa" class="animable"></path>
                            <path d="M315.38,196.13a8.64,8.64,0,0,0,3.66,2.93,4.58,4.58,0,0,0,6.44-4.87,7.11,7.11,0,0,0,4.88-4.42,8.08,8.08,0,0,0-.62-6.87c2.76-1.6,5.41-3.85,6.5-7s-.22-7.25-3.13-8.5a6.21,6.21,0,0,0,1.11-7.14,5.24,5.24,0,0,0-6.21-2.67,8.53,8.53,0,0,0-4.94-6.82A7.82,7.82,0,0,0,315,152a4.49,4.49,0,0,0-3.39-2.32,4.29,4.29,0,0,0-3.72,1.62,6.21,6.21,0,0,0-6.94-1.73,11.51,11.51,0,0,0-5.64,5.41,4.75,4.75,0,0,0-4.85.26,5.65,5.65,0,0,0-2.39,4.57,5.83,5.83,0,0,0,2.3,4.7,4.13,4.13,0,0,0-2.46,3.19,4.36,4.36,0,0,0,1.37,3.89,3.62,3.62,0,0,0,3.8.59c4.12,4.46,11.37,4.42,15.93,8.35a16,16,0,0,1,4.36,6.86C314.26,190,313.72,194,315.38,196.13Z" style="fill: rgb(38, 50, 56); transform-origin: 312.24px 174.315px;" id="elzcqt5phzzxc" class="animable"></path>
                            <path d="M322.6,192.8v12.25a5.79,5.79,0,0,1-2,4.35,16.44,16.44,0,0,1-11.71,4,4.15,4.15,0,0,1-2.44-.75,3.21,3.21,0,0,1-.78-3.33,6.43,6.43,0,0,1,.89-1.8,5.58,5.58,0,0,0,1-3.11V192.8Z" style="fill: rgb(255, 168, 167); transform-origin: 314.047px 203.113px;" id="elio0fpv00gf" class="animable"></path>
                            <g id="elvdgkw1p77ah">
                                <path d="M313.67,202.7a33.15,33.15,0,0,1-6.09,1.2V192.8h15v2.61a12.07,12.07,0,0,1-1.23,2.15A15,15,0,0,1,313.67,202.7Z" style="opacity: 0.2; transform-origin: 315.08px 198.35px;" class="animable"></path>
                            </g>
                            <path d="M331,178.69a4.85,4.85,0,0,0-3.86,1.13A14.75,14.75,0,0,0,324.4,183a4.7,4.7,0,0,1-1.34,1.43,1.62,1.62,0,0,1-1.85,0,2.42,2.42,0,0,1-.53-2l.24-5.12a2.06,2.06,0,0,0-1.14-1.9,5,5,0,0,1-2.29-2.63c-.07-.18-.12-.35-.18-.53a4.28,4.28,0,0,1-3.09.48,4.37,4.37,0,0,1-2.7-1.91,3.13,3.13,0,0,1-2.37,1.55,3,3,0,0,1-2.52-1.16,5.38,5.38,0,0,1-8.84-.08,5.65,5.65,0,0,1-5.27-.52,63,63,0,0,0,1.68,23.52,19.36,19.36,0,0,0,1.94,5,8.16,8.16,0,0,0,4,3.52c2.07.77,4.38.4,6.56,0,4-.71,8.07-1.45,11.54-3.54s6.2-5.88,5.87-9.92a6.94,6.94,0,0,0,6.62.37,7,7,0,0,0,3.63-5.61C334.47,181.66,333.17,179.14,331,178.69Z" style="fill: rgb(255, 168, 167); transform-origin: 313.228px 186.855px;" id="ell87btgplfp7" class="animable"></path>
                            <polygon points="303.87 182.03 299.27 189.77 304.75 190.8 303.87 182.03" style="fill: rgb(242, 143, 143); transform-origin: 302.01px 186.415px;" id="eloc35we8xwa" class="animable"></polygon>
                            <path d="M310,193.47l-4.17,2a2.73,2.73,0,0,0,3.16.9A2.45,2.45,0,0,0,310,193.47Z" style="fill: rgb(242, 143, 143); transform-origin: 307.986px 195.012px;" id="el7xzf29lvj0t" class="animable"></path>
                            <g id="elcvxxipcg87n">
                                <path d="M310,193.47l-4.17,2a2.73,2.73,0,0,0,3.16.9A2.45,2.45,0,0,0,310,193.47Z" style="opacity: 0.3; transform-origin: 307.986px 195.012px;" class="animable"></path>
                            </g>
                            <path d="M307.58,196.53a2.45,2.45,0,0,0,1.45-.14,2.21,2.21,0,0,0,1.12-2.19,2.58,2.58,0,0,0-1.65.57A2.65,2.65,0,0,0,307.58,196.53Z" style="fill: rgb(242, 143, 143); transform-origin: 308.873px 195.391px;" id="elle5ud50kt7s" class="animable"></path>
                            <path d="M311.81,182.34a1.57,1.57,0,1,1-1.73-1.41A1.56,1.56,0,0,1,311.81,182.34Z" style="fill: rgb(38, 50, 56); transform-origin: 310.247px 182.491px;" id="el5p3w723aezq" class="animable"></path>
                            <path d="M298.6,183.16a1.57,1.57,0,1,1-1.72-1.41A1.57,1.57,0,0,1,298.6,183.16Z" style="fill: rgb(38, 50, 56); transform-origin: 297.037px 183.312px;" id="el5z5b0aeh3yk" class="animable"></path>
                            <path d="M296.45,177.07l-3.23,2.76a2.25,2.25,0,0,1,.43-2.53A2.68,2.68,0,0,1,296.45,177.07Z" style="fill: rgb(38, 50, 56); transform-origin: 294.729px 178.305px;" id="elg1zpjzsaora" class="animable"></path>
                            <path d="M309.85,175.53l3.71,2.06a2.23,2.23,0,0,0-.92-2.39A2.66,2.66,0,0,0,309.85,175.53Z" style="fill: rgb(38, 50, 56); transform-origin: 311.738px 176.269px;" id="elk5qdlbe37i" class="animable"></path>
                            <path d="M349,288.15c-5.25,5.15-20.2,11.93-30.37,8.26-2.36-30.81-.2-79.47,3.91-91.71l18,6.69c10.68,18.24,3.59,48.1,3.59,48.1A106.3,106.3,0,0,0,349,288.15Z" style="fill: rgb(69, 90, 100); transform-origin: 333.327px 251.077px;" id="elezk2lsg2lb" class="animable"></path>
                            <g id="elp7jbu8r3x3q">
                                <path d="M349,288.15c-5.25,5.15-20.2,11.93-30.37,8.26-2.36-30.81-.2-79.47,3.91-91.71l18,6.69c10.68,18.24,3.59,48.1,3.59,48.1A106.3,106.3,0,0,0,349,288.15Z" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 333.327px 251.077px;" class="animable"></path>
                            </g>
                            <path d="M329.65,232.21l-6.42-7.46,5.18-3.59a3,3,0,0,0,.92-3.89l-6.81-12.57c-2.64,7.86-4.47,30.74-4.82,54.26L330,235.56A3,3,0,0,0,329.65,232.21Z" style="fill: rgb(69, 90, 100); transform-origin: 324.028px 231.83px;" id="ele9g99vemipq" class="animable"></path>
                            <g id="elct7fgvj08vd">
                                <path d="M329.65,232.21l-6.42-7.46,5.18-3.59a3,3,0,0,0,.92-3.89l-6.81-12.57c-2.64,7.86-4.47,30.74-4.82,54.26L330,235.56A3,3,0,0,0,329.65,232.21Z" style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 324.028px 231.83px;" class="animable"></path>
                            </g>
                            <path d="M307.58,204.7c-3.05,3.76-13.23,15.75-14.58,59.92-.35,11.51-5.81,25.36-5.81,25.36l-7.63-10.9s8.67-10.67,8.67-28.31-3.25-23.85,2-35,11.19-10.79,12.94-11l4.41-.55Z" style="fill: rgb(69, 90, 100); transform-origin: 293.57px 247.1px;" id="elfdzi8q6vnt6" class="animable"></path>
                            <g id="el85xbnde19tr">
                                <path d="M307.58,204.7c-3.05,3.76-13.23,15.75-14.58,59.92-.35,11.51-5.81,25.36-5.81,25.36l-7.63-10.9s8.67-10.67,8.67-28.31-3.25-23.85,2-35,11.19-10.79,12.94-11l4.41-.55Z" style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 293.57px 247.1px;" class="animable"></path>
                            </g>
                            <path d="M307.58,204.18l-13,10.86a3,3,0,0,0-.76,3.65l1.46,2.91-4.78,5.12a5,5,0,0,0-1.26,4.31l4.28,23.48c2.46-35.93,11.27-46.35,14.08-49.81Z" style="fill: rgb(69, 90, 100); transform-origin: 298.379px 229.345px;" id="el123d58l44xsl" class="animable"></path>
                            <g id="elyow6i36dou">
                                <path d="M307.58,204.18l-13,10.86a3,3,0,0,0-.76,3.65l1.46,2.91-4.78,5.12a5,5,0,0,0-1.26,4.31l4.28,23.48c2.46-35.93,11.27-46.35,14.08-49.81Z" style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 298.379px 229.345px;" class="animable"></path>
                            </g>
                            <path d="M340.55,211.39l-18.94,56.92-33.77,13.12a11.61,11.61,0,0,1-5.43.84l-9.08-1.58a6.11,6.11,0,0,0-3.66.86l-6.26,3.79a7,7,0,0,0-1.67,1.43l-3.06,3.63a2.29,2.29,0,0,0,.42,3.35l1.92,1.38a6.89,6.89,0,0,0,7.08.55l4.84-2.44,2.23.53a22.62,22.62,0,0,0,14.55-1.39h0l36.63-7.4a16.25,16.25,0,0,0,11.89-10.25s17.51-41.54,13.37-50.93C349.82,219.73,340.55,211.39,340.55,211.39Z" style="fill: rgb(255, 168, 167); transform-origin: 305.189px 253.899px;" id="el8bbohlnrrzx" class="animable"></path>
                            <path d="M340.55,211.39,321,267.66l-33.77,12.92c6.29,3.51,6.62,11.38,6,12.31l35.74-7.48a13.91,13.91,0,0,0,10.16-8.7l14.35-38c6.21-17.06-2.81-23.33-12.86-27.27Z" style="fill: rgb(69, 90, 100); transform-origin: 321.375px 252.14px;" id="elje3rw5jq4y" class="animable"></path>
                            <g id="el3s83nleee75">
                                <path d="M340.55,211.39,321,267.66l-33.77,12.92c6.29,3.51,6.62,11.38,6,12.31l35.74-7.48a13.91,13.91,0,0,0,10.16-8.7l14.35-38c6.21-17.06-2.81-23.33-12.86-27.27Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 321.375px 252.14px;" class="animable"></path>
                            </g>
                            <g id="elv532s7tcu79">
                                <path d="M301.07,283.39a13.4,13.4,0,0,0-4.71-6.32l-9.17,3.51c6.29,3.51,6.62,11.38,6,12.31l8.21-1.72A13.48,13.48,0,0,0,301.07,283.39Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 294.506px 284.98px;" class="animable"></path>
                            </g>
                            <g id="elxkx3y05jhl">
                                <path d="M321,267.66c6.21.08,10.54,2.78,11.2,4.74-1.06-9.32-10.19-7.66-10.19-7.66Z" style="opacity: 0.2; transform-origin: 326.6px 268.513px;" class="animable"></path>
                            </g>
                            <path d="M277.5,322.6l-9.91-.6-9.91.6L260.14,340h0a4.08,4.08,0,0,0,2.27,2.89,11.5,11.5,0,0,0,10.38,0A4,4,0,0,0,275,340h0Z" style="fill: rgb(255, 255, 255); transform-origin: 267.59px 333.064px;" id="el5vgsiz9l1jl" class="animable"></path>
                            <path d="M278.08,318.73H276.8a8,8,0,0,0-1.82-1.41,16.33,16.33,0,0,0-14.82,0,8,8,0,0,0-1.81,1.41h-1.24v2.88h0c0,1.56,1,3.11,3.09,4.3a16.35,16.35,0,0,0,14.83,0c2-1.19,3.06-2.74,3.05-4.3h0Z" style="fill: rgb(46, 172, 124); transform-origin: 267.595px 321.615px;" id="el6svvy6tkwq8" class="animable"></path>
                            <path d="M275,314.44a16.33,16.33,0,0,0-14.82,0c-4.09,2.37-4.06,6.22,0,8.59A16.35,16.35,0,0,0,275,323C279.11,320.66,279.09,316.81,275,314.44Z" style="fill: rgb(46, 172, 124); transform-origin: 267.599px 318.726px;" id="elssd3ukr7st" class="animable"></path>
                            <g id="eluikbmru3kqj">
                                <path d="M275,314.44a16.33,16.33,0,0,0-14.82,0c-4.09,2.37-4.06,6.22,0,8.59A16.35,16.35,0,0,0,275,323C279.11,320.66,279.09,316.81,275,314.44Z" style="opacity: 0.2; transform-origin: 267.599px 318.726px;" class="animable"></path>
                            </g>
                            <path d="M276.38,317.62h0l-.73-2.54h-1.21c-.19-.13-.39-.26-.6-.38a13.86,13.86,0,0,0-12.57,0,6.86,6.86,0,0,0-.6.38h-1.17l-.65,2.25a.24.24,0,0,0,0,.08l-.07.21h0c-.36,1.54.48,3.16,2.54,4.35a13.86,13.86,0,0,0,12.57,0C275.94,320.78,276.76,319.16,276.38,317.62Z" style="fill: rgb(46, 172, 124); transform-origin: 267.585px 318.335px;" id="elvhr5lk6l6ip" class="animable"></path>
                            <path d="M273.35,312.43a12.77,12.77,0,0,0-11.55,0c-3.17,1.85-3.16,4.84,0,6.69a12.69,12.69,0,0,0,11.54,0C276.56,317.27,276.54,314.28,273.35,312.43Z" style="fill: rgb(46, 172, 124); transform-origin: 267.588px 315.779px;" id="el78likc0haye" class="animable"></path>
                            <g id="els6lt3ujtxvh">
                                <path d="M273.35,312.43a12.77,12.77,0,0,0-11.55,0c-3.17,1.85-3.16,4.84,0,6.69a12.69,12.69,0,0,0,11.54,0C276.56,317.27,276.54,314.28,273.35,312.43Z" style="opacity: 0.1; transform-origin: 267.588px 315.779px;" class="animable"></path>
                            </g>
                            <path d="M262.43,314.23a11.46,11.46,0,0,1,10.29,0,3.36,3.36,0,0,1,1.73,1.91,1.34,1.34,0,0,0,.05-.35,3,3,0,0,0-1.78-2.27,11.46,11.46,0,0,0-10.29,0c-1.11.65-1.74,1.46-1.74,2.24a2.2,2.2,0,0,0,0,.36A3.31,3.31,0,0,1,262.43,314.23Z" style="fill: rgb(46, 172, 124); transform-origin: 267.591px 314.22px;" id="elc443ey25mn" class="animable"></path>
                            <g id="ella1m5n1h0ba">
                                <path d="M262.43,314.23a11.46,11.46,0,0,1,10.29,0,3.36,3.36,0,0,1,1.73,1.91,1.34,1.34,0,0,0,.05-.35,3,3,0,0,0-1.78-2.27,11.46,11.46,0,0,0-10.29,0c-1.11.65-1.74,1.46-1.74,2.24a2.2,2.2,0,0,0,0,.36A3.31,3.31,0,0,1,262.43,314.23Z" style="opacity: 0.4; transform-origin: 267.591px 314.22px;" class="animable"></path>
                            </g>
                            <path d="M262.47,318a10.65,10.65,0,0,0,5.15,1.22h0a10.46,10.46,0,0,0,5.13-1.22,3.27,3.27,0,0,0,1.7-1.89,3.36,3.36,0,0,0-1.73-1.91,11.46,11.46,0,0,0-10.29,0,3.31,3.31,0,0,0-1.7,1.89A3.38,3.38,0,0,0,262.47,318Z" style="fill: rgb(46, 172, 124); transform-origin: 267.59px 316.101px;" id="el54atz5zb9ya" class="animable"></path>
                            <g id="ellbr3oae7t1">
                                <path d="M262.47,318a10.65,10.65,0,0,0,5.15,1.22h0a10.46,10.46,0,0,0,5.13-1.22,3.27,3.27,0,0,0,1.7-1.89,3.36,3.36,0,0,0-1.73-1.91,11.46,11.46,0,0,0-10.29,0,3.31,3.31,0,0,0-1.7,1.89A3.38,3.38,0,0,0,262.47,318Z" style="opacity: 0.2; transform-origin: 267.59px 316.101px;" class="animable"></path>
                            </g>
                        </g>
                        <defs>
                            <filter id="active" height="200%">
                                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                                <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                                <feMerge>
                                    <feMergeNode in="OUTLINE"></feMergeNode>
                                    <feMergeNode in="SourceGraphic"></feMergeNode>
                                </feMerge>
                            </filter>
                            <filter id="hover" height="200%">
                                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                                <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                                <feMerge>
                                    <feMergeNode in="OUTLINE"></feMergeNode>
                                    <feMergeNode in="SourceGraphic"></feMergeNode>
                                </feMerge>
                                <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>
                            </filter>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <img src="media/svg/logo.svg" alt="" class="my-5 py-5 w-75">
                <div class="form-container lighter-gray p-5 rounded shadow d-flex flex-column align-items-center">
                    <h3 class="text-white mb-4">Sign in</h3>
                    <form action="backend/validate-login.php" method="post" class="d-flex flex-column align-items-center w-100">
                        <div <?php echo ($emailError === "") ? "class='form-group w-100'" : "class='form-group w-100 error'" ?>>
                            <label for="emailInput" class="form-label text-white">Email</label>
                            <input type="email" class="form-control" name="email" id="emailInput" placeholder="name@example.com" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <div class="invalid-feedback"><?php echo $emailError ?></div>
                        </div>

                        <div <?php echo ($passwordError === "") ? "class='form-group w-100 my-3'" : "class='form-group w-100 my-3 error'" ?>>
                            <label for="passwordInput" class="form-label text-white">Password</label>
                            <input type="password" class="form-control" name="password" id="passwordInput" placeholder="strong password" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <div class="invalid-feedback"><?php echo $passwordError ?></div>
                        </div>

                        <small class="text-white">Not registered? <a href="register.php">Sign up</a></small>

                        <div class="w-100 mt-4">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg w-100" value="Log In" class="submit-button" />
                        </div>
                    </form>

                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "stmtfailed") echo "<p>Something went wrong</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
</body>

</html>