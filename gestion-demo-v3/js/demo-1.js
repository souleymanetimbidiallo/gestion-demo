var champs1 = document.getElementById('champs1');
            champs1.style.display = 'none';

        var champs2 = document.getElementById('champs2');
            champs2.style.display = 'none';

        var radio1 = document.getElementById('pre_demande')
        radio1.addEventListener('click',function(){
            champs1.style.display = 'block';
            champs2.style.display = 'none';
        });

        var radio2 = document.getElementById('copie')
        radio2.addEventListener('click',function(){
            champs2.style.display = 'block';
            champs1.style.display = 'none';
        });


        var notification= document.getElementById('notification');
        var formulaire_date = document.getElementById('formulaire_date');
        formulaire_date.style.display = 'none';
        var etat = document.getElementById('etat').textContent;
        etat = parseInt(etat);
        notification.addEventListener('click',function(e){
            if(etat==0){
                e.preventDefault();
                formulaire_date.style.display = 'none';
                //etat.className = 'badge badge-pill badge-light';

            }else{
                formulaire_date.style.display = 'flex';
                //etat.className = 'badge badge-pill badge-warning';
            }
        });