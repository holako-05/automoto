<style>
    @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap');

    body {
        background-color: #1991ce;
        color: #fff;
        font-size: 100%;
        padding: 2em;
        line-height: 1.5;
        font-family: 'Heebo', sans-serif;
    }

    .button {
        font-weight: 300;
        color: #fff;
        font-size: 1.2em;
        text-decoration: none;
        border: 1px solid #efefef;
        padding: .5em;
        border-radius: 3px;
        text-align: center;
        transition: all .3s linear;
    }

    .button:hover {
        background-color: #c81537;
        color: #fff;
    }

    p {
        font-size: 2em;
        text-align: center;
        font-weight: 100;
    }

    img{
        margin-bottom: 30px;
    }



</style>


<body>

<center>

    <svg id="wrap" width="300" height="300">

        <!-- background -->
        <svg>
            <circle cx="150" cy="150" r="130" style="stroke: #8a1229; stroke-width:18; fill:transparent"/>
            <circle cx="150" cy="150" r="115" style="fill:#c81537"/>
            <path style="stroke: #c81537; stroke-dasharray:820; stroke-dashoffset:820; stroke-width:18; fill:transparent" d="M150,150 m0,-130 a 130,130 0 0,1 0,260 a 130,130 0 0,1 0,-260">
                <animate attributeName="stroke-dashoffset" dur="6s" to="-820" repeatCount="indefinite"/>
            </path>
        </svg>

        <!-- image -->
        <svg>
            <path id="hourglass" d="M150,150 C60,85 240,85 150,150 C60,215 240,215 150,150 Z" style="stroke: white; stroke-width:5; fill:white;" />

            <path id="frame" d="M100,97 L200, 97 M100,203 L200,203 M110,97 L110,142 M110,158 L110,200 M190,97 L190,142 M190,158 L190,200 M110,150 L110,150 M190,150 L190,150" style="stroke:#8a1229; stroke-width:6; stroke-linecap:round" />

            <animateTransform xlink:href="#frame" attributeName="transform" type="rotate" begin="0s" dur="3s" values="0 150 150; 0 150 150; 180 150 150" keyTimes="0; 0.8; 1" repeatCount="indefinite" />
            <animateTransform xlink:href="#hourglass" attributeName="transform" type="rotate" begin="0s" dur="3s" values="0 150 150; 0 150 150; 180 150 150" keyTimes="0; 0.8; 1" repeatCount="indefinite" />
        </svg>

        <!-- sand -->
        <svg>
            <!-- upper part -->
            <polygon id="upper" points="120,125 180,125 150,147" style="fill:#c81537;">
                <animate attributeName="points" dur="3s" keyTimes="0; 0.8; 1" values="120,125 180,125 150,147; 150,150 150,150 150,150; 150,150 150,150 150,150" repeatCount="indefinite"/>
            </polygon>

            <!-- falling sand -->
            <path id="line" stroke-linecap="round" stroke-dasharray="1,4" stroke-dashoffset="200.00" stroke="#c81537" stroke-width="2" d="M150,150 L150,198">
                <!-- running sand -->
                <animate attributeName="stroke-dashoffset" dur="3s" to="1.00" repeatCount="indefinite"/>
                <!-- emptied upper -->
                <animate attributeName="d" dur="3s" to="M150,195 L150,195" values="M150,150 L150,198; M150,150 L150,198; M150,198 L150,198; M150,195 L150,195" keyTimes="0; 0.65; 0.9; 1" repeatCount="indefinite"/>
                <!-- last drop -->
                <animate attributeName="stroke" dur="3s" keyTimes="0; 0.65; 0.8; 1" values="#c81537;#c81537;transparent;transparent" to="transparent" repeatCount="indefinite"/>
            </path>

            <!-- lower part -->
            <g id="lower">
                <path d="M150,180 L180,190 A28,10 0 1,1 120,190 L150,180 Z" style="stroke: transparent; stroke-width:5; fill:#c81537;">
                    <animateTransform attributeName="transform" type="translate" keyTimes="0; 0.65; 1" values="0 15; 0 0; 0 0" dur="3s" repeatCount="indefinite" />
                </path>
                <animateTransform xlink:href="#lower" attributeName="transform"
                                  type="rotate"
                                  begin="0s" dur="3s"
                                  values="0 150 150; 0 150 150; 180 150 150"
                                  keyTimes="0; 0.8; 1"
                                  repeatCount="indefinite"/>
            </g>

            <!-- lower overlay - hourglass -->
            <path d="M150,150 C60,85 240,85 150,150 C60,215 240,215 150,150 Z" style="stroke: white; stroke-width:5; fill:transparent;">
                <animateTransform attributeName="transform"
                                  type="rotate"
                                  begin="0s" dur="3s"
                                  values="0 150 150; 0 150 150; 180 150 150"
                                  keyTimes="0; 0.8; 1"
                                  repeatCount="indefinite"/>
            </path>

            <!-- lower overlay - frame -->
            <path id="frame" d="M100,97 L200, 97 M100,203 L200,203" style="stroke:#8a1229; stroke-width:6; stroke-linecap:round">
                <animateTransform attributeName="transform"
                                  type="rotate"
                                  begin="0s" dur="3s"
                                  values="0 150 150; 0 150 150; 180 150 150"
                                  keyTimes="0; 0.8; 1"
                                  repeatCount="indefinite"/>
            </path>
        </svg>

    </svg>

<p>Oops! Votre session a expiré.</p>

@if(!isset(auth()->user()->role))
<a class="button" href="{{route('home')}}"><i class="icon-home"></i>Revenir à la page initiale, c'est mieux.</a>
@elseif(auth()->user()->role == '6' )
<a class="button" href="{{route('Dashboard_Commercial')}}"><i class="icon-home"></i>Revenir à la page initiale, c'est mieux.</a>
@elseif(auth()->user()->role == '2' || auth()->user()->role == '5' || auth()->user()->role == '7' || auth()->user()->role == '8')
<a class="button" href="{{route('Dashboard_Pilotage')}}"><i class="icon-home"></i>Revenir à la page initiale, c'est mieux.</a>
@elseif(auth()->user()->role == '3')
<a class="button" href="{{route('Dashboard_Client')}}"><i class="icon-home"></i>Revenir à la page initiale, c'est mieux.</a>
@elseif(auth()->user()->role == '1')
<a class="button" href="{{route('admin')}}"><i class="icon-home"></i>Revenir à la page initiale, c'est mieux.</a>
@else
<a class="button" href="{{route('home')}}"><i class="icon-home"></i>Revenir à la page initiale, c'est mieux.</a>
@endif
</center>
<img src="/assets/images/logo_GoTawsil_vertical.png" height="70" style="position:fixed;margin-top:30px;left:20px;bottom: 0px;opacity: 0.6;">
</body>
