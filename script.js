let rychlost_pohybu = 6, gravitace = 0.3;
let uzivatel = document.querySelector('.bird');
let img = document.getElementById('bird-1');


let vlastnosti_uzivatele = uzivatel.getBoundingClientRect();

let pozadi = document.querySelector('.background').getBoundingClientRect();

let hodnota = document.querySelector('.hodnota');
let zprava = document.querySelector('.zprava');
let vypis = document.querySelector('.vypis');

let stav_hry = 'Start';
img.style.display = 'none';
zprava.classList.add('messageStyle');


document.addEventListener('click', (e) => {
    if(e.button == '0' && stav_hry != 'Play')
    {
        document.querySelectorAll('.vlastnosti_prekazek').forEach((e) => {
            e.remove();
        });
        img.style.display = 'block';
        stav_hry = 'Play';
        zprava.innerHTML = '';
        vypis.innerHTML = 'Skóre: ';
        hodnota.innerHTML = '0';
        zprava.classList.remove('messageStyle');
        spustit();
    }
});

function spustit(){
    function pohyb(){
        if(stav_hry != 'Play') return;

        let prekazky = document.querySelectorAll('.vlastnosti_prekazek');
        prekazky.forEach((element) => {
            let vlastnosti_prekazek = element.getBoundingClientRect();
            vlastnosti_uzivatele = uzivatel.getBoundingClientRect();

            if(vlastnosti_prekazek.right <= 0){
                element.remove();
            }

            else if(vlastnosti_uzivatele.left < vlastnosti_prekazek.left + vlastnosti_prekazek.width && vlastnosti_uzivatele.left + vlastnosti_uzivatele.width > vlastnosti_prekazek.left && vlastnosti_uzivatele.top < vlastnosti_prekazek.top + vlastnosti_prekazek.height && vlastnosti_uzivatele.top + vlastnosti_uzivatele.height > vlastnosti_prekazek.top){
                    stav_hry = 'End';
                    window.location.reload();
                    return;
                }
                else{
                    if(vlastnosti_prekazek.right < vlastnosti_uzivatele.left && vlastnosti_prekazek.right + rychlost_pohybu >= vlastnosti_uzivatele.left && element.increase_score == '1'){
                        hodnota.innerHTML =+ hodnota.innerHTML + 1;
                    }
                    element.style.left = vlastnosti_prekazek.left - rychlost_pohybu + 'px';
                }
            }
        );
        requestAnimationFrame(pohyb);
    }
    requestAnimationFrame(pohyb);

    let vyska_uzivatele = 0;
    function vyuziti_gravitace(){
        if(stav_hry != 'Play') return;
        vyska_uzivatele = vyska_uzivatele + gravitace;
        document.addEventListener('click', (e) => {
            if(e.button == '0' || e.button == ' '){
                img.src = 'bird.png';
                vyska_uzivatele = -8.1;
            }
        });

        if(vlastnosti_uzivatele.top <= 0 || vlastnosti_uzivatele.bottom >= pozadi.bottom){
            stav_hry = 'End';
            window.location.reload();
            zprava.classList.remove('messageStyle');
            return;
        }
        uzivatel.style.top = vlastnosti_uzivatele.top + vyska_uzivatele + 'px';
        vlastnosti_uzivatele = uzivatel.getBoundingClientRect();
        requestAnimationFrame(vyuziti_gravitace);
    }
    requestAnimationFrame(vyuziti_gravitace);

    let mezeraZa = 0;

    let mezeraMezi = 43;

    function vytvoreni_prekazek(){
        if(stav_hry != 'Play') return;

        if(mezeraZa > 115){
            mezeraZa = 0;

            let pozice = Math.floor(Math.random() * 43) + 8;
            
            let vlastnosti_prekazek_horni = document.createElement('div');
            vlastnosti_prekazek_horni.className = 'vlastnosti_prekazek';
            vlastnosti_prekazek_horni.style.top = pozice - (2*mezeraMezi) + 'vh';
            vlastnosti_prekazek_horni.style.left = '100%';

            document.body.appendChild(vlastnosti_prekazek_horni);

            
            let vlastnosti_prekazek_spodni = document.createElement('div');
            vlastnosti_prekazek_spodni.className = 'vlastnosti_prekazek';
            vlastnosti_prekazek_spodni.style.top = pozice + mezeraMezi + 'vh';
            vlastnosti_prekazek_spodni.style.left = '100%';
            vlastnosti_prekazek_spodni.increase_score = '1';

            document.body.appendChild(vlastnosti_prekazek_spodni);

            /*let pozice = 0;
            let vlastnosti_prekazek_horni;
            let vlastnosti_prekazek_spodni;
            if(pozice != null)
            {
                pozice = -50 + Math.random(32767) % (50 - (-50) + 1);
                vlastnosti_prekazek_horni = document.createElement('div');
                vlastnosti_prekazek_horni.className = 'vlastnosti_prekazek';
                vlastnosti_prekazek_horni.style.top = vlastnosti_prekazek_horni - pozice;
            }
            else
            {
                pozice = Math.floor(Math.random() * 43) + 8;
                let vlastnosti_prekazek_horni = document.createElement('div');
                vlastnosti_prekazek_horni.className = 'vlastnosti_prekazek';
                vlastnosti_prekazek_horni.style.top = pozice - 70;
                vlastnosti_prekazek_horni.style.left = '100%';
            }
            
            document.body.appendChild(vlastnosti_prekazek_horni);

            if(pozice>0)
            {
                vlastnosti_prekazek_spodni = document.createElement('div');
                vlastnosti_prekazek_spodni.className = 'vlastnosti_prekazek';
                vlastnosti_prekazek_spodni.style.top = pozice + mezeraMezi;
                vlastnosti_prekazek_spodni.style.left = '100%';
            }
            else
            {
                vlastnosti_prekazek_spodni = document.createElement('div');
                vlastnosti_prekazek_spodni.className = 'vlastnosti_prekazek';
                vlastnosti_prekazek_spodni.style.top = pozice + mezeraMezi;
                vlastnosti_prekazek_spodni.style.left = '100%';
            }
            vlastnosti_prekazek_spodni.increase_score = '1';
            document.body.appendChild(vlastnosti_prekazek_spodni);*/
        }
        mezeraZa++;
        requestAnimationFrame(vytvoreni_prekazek);
    }
    requestAnimationFrame(vytvoreni_prekazek);
}