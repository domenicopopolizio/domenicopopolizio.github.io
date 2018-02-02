'use strict';
//costanti
const stecWidth = 17.5;
const stecHeight = 300;
const onSideMargin = 0.125*window.innerWidth;

//variabili globali
let presi = 0; //rappresenta il numero di stecchini presi dal giocatore
let stecchini;
let margin;
let endAnim = true;

//funzioni
const randrange = ( min, max ) => Math.floor(Math.random()*max)%(max-min) + min

function testoTurno(player) {
    let testo = "";
    switch(player) {
        case 'p':
            testo = "È il tuo turno!";
        break;
        case 'c':
            testo = "È il turno del computer!";
        break;
    }
    return testo;
}

function prendiStec(player, stec) {

}


function rmEventStecchini() {
    /*https://stackoverflow.com/questions/9251837/how-to-remove-all-listeners-in-an-element*/
    let stecchini = document.querySelectorAll(".stecchino");
    stecchini.forEach( 
        stecchino => {
            var newStecchino = stecchino.cloneNode(true);
            stecchino.parentNode.replaceChild(newStecchino, stecchino);
        }
    );
}

async function displayBanner() {
    return new Promise(
        (resolve, reject) => {
            let bannerContent = document.querySelector("#banner");
            bannerContent.style.left = "0";
            bannerContent.style.right = "";
            Velocity(
                bannerContent,
                {
                    width: "100%"
                },
                {
                    delay: 600,
                    duration: 300,
                    complete: newbanner => {
                        bannerContent.style.left = "";
                        bannerContent.style.right = "0";
                        Velocity(
                            bannerContent,
                            {
                                width:"0%"
                            },
                            {
                                delay: 1500,
                                duration: 300,
                                complete: newbanner => {
                                    resolve();
                                }
                            }
                        );
                    }
                }
            )
        }
    );
}

async function computerPrendi(n, i = 0, resolvePrec = () => {}) {
    return new Promise (
        (resolve, reject) => {
            if( !(i < n) ) {
                resolve("i<n");
            }
            else {
                let stecchini = document.querySelectorAll(".stecchino.tavolo");
                let inMano = document.querySelectorAll(`.stecchino.computer`).length | 0;
                let stecchino = stecchini[randrange(0, stecchini.length)];
                stecchino.classList.remove("tavolo");
                stecchino.classList.add("computer");
                
                Velocity(
                    stecchino, 
                    {
                        left : ( (inMano+1) * margin + inMano*stecWidth) + "px",
                        top : `-${stecHeight/2}px`,
                        marginTop: "0px"
                    },
                    {
                        complete: newStecchino => {
                           computerPrendi(n, ++i).then(
                             resolve
                           );

                        }
                    }
                );
                
            }
        }
    );
    
}


async function turnoComputer(daPrendere) {
    document.querySelector("#banner-content").innerHTML = testoTurno('c');
    await displayBanner();
    document.querySelector("#end").style.display = "none";
    return new Promise(
        async (resolve, reject) => {
            computerPrendi(daPrendere).then(resolve);

            

        }
    );
}

async function turnoPlayer() {
    presi = 0;
    document.querySelector("#banner-content").innerHTML = testoTurno('p');
    await displayBanner();
    document.querySelector("#end").style.display = "flex";
    return new Promise(
        (resolve, reject) => {
            document.querySelectorAll('.stecchino.tavolo').forEach(
                (stecchino) => {
                    stecchino.addEventListener(
                        "click", 
                        function selStecEv(event) {
                            if(endAnim) {
                                endAnim = false;
                                let stecchino = event.target;
                                let inMano = document.querySelectorAll(`.stecchino.giocatore`).length | 0;

                                presi++
                                
                                Velocity(
                                    stecchino, 
                                    {
                                        left : ( (inMano+1) * margin + inMano*stecWidth) + "px",
                                        marginTop: "0px",
                                        top: (window.innerHeight-stecHeight/2)+"px"
                                    },
                                    {
                                        complete: newStecchino => {
                                            stecchino.classList.remove("tavolo");
                                            stecchino.classList.add("giocatore");
                                            stecchino.removeEventListener("click", selStecEv);
                                            if(presi == 3) {
                                                resolve("3Stecchini");
                                                rmEventStecchini();
                                            }
                                            endAnim = true;
                                        }
                                    }
                                    
                                );
                            }

                            
                        }
                    );
                }
            );
            document.querySelector("#end").addEventListener(
                "click", 
                function selStecEv(event) {
                    if(presi > 0 && presi < 3) {
                        resolve("schiacciato bottone");
                        rmEventStecchini();
                    } 
                }
            );
        
        }
    );
    
    
}

function turno(player) {
    switch(player) {
        case 'p':
            turnoPlayer();
        break;
        case 'c':
            turnoComputer();
        break;
    }
}

function resize(event = 0) {
    margin = (window.innerWidth - onSideMargin*2 - stecchini.length*stecWidth) / 12;
    
    for(let i = 0; i < stecchini.length; i++) {
        stecchini[i].style.left = ( (i+1) * margin + i*stecWidth + onSideMargin) + "px";
    }
}

async function inizia() {
    await turnoComputer(2);
    do {
        await turnoPlayer();
        await turnoComputer(4-presi);
    } while(document.querySelectorAll(".stecchino.tavolo").length > 1);

    document.querySelector("#banner-content").innerHTML = "HAI PERSO!";
    await displayBanner();
}

//main
document.addEventListener(
    "DOMContentLoaded",
    () => {
        stecchini = document.querySelectorAll(".stecchino.tavolo");

        resize();
        window.addEventListener( "resize", resize );
        /*setTimeout(
            inizia,
            2000
        );*/
        let background = new Image();
        background.addEventListener("load", inizia);
        background.src="background.png";


    }
)
