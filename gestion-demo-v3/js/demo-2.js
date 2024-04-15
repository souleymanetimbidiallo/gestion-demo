var champs1 = document.getElementById('champs1');
                    champs1.style.display = 'none';

var champs2 = document.getElementById('champs2');
    champs2.style.display = 'none';

var champs3 = document.getElementById('champs3');
    champs3.style.display = 'none';

var radio1 = document.getElementById('pre_demande')
radio1.addEventListener('click',function(){
    champs1.style.display = 'block';
    champs2.style.display = 'none';
    champs3.style.display = 'none';
});

var radio2 = document.getElementById('copie')
radio2.addEventListener('click',function(){
    champs2.style.display = 'block';
    champs1.style.display = 'none';
    champs3.style.display = 'none';
});

var radio3 = document.getElementById('renouvellement')
radio3.addEventListener('click',function(){
    champs3.style.display = 'block';
    champs1.style.display = 'none';
    champs2.style.display = 'none';
});

//Affiche les notifications
var notification = document.getElementById('notification');
var formulaire_date = document.getElementById('formulaire_date');
formulaire_date.style.display = 'none';
var etat = document.getElementById('etat').textContent;
etat = parseInt(etat);
notification.addEventListener('click',function(e){
    if(etat==0){
        e.preventDefault();
        formulaire_date.style.display = 'none';
        
    }else{
        formulaire_date.style.display = 'flex';
        //etat.setAttribute('class', 'badge badge-pill badge-warning');
    }
});