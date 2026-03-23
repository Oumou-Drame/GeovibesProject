    let editeur = document.getElementById("editeur");
    let admin = document.getElementById("admin");
    let roleText = document.getElementById("roleText");
    let body = document.body;
    let bouton = document.getElementById("actif-bouton");
    let input = document.querySelectorAll(".input-actif")

    //pour nettoyer la couleur sur les boutons
    function resetBoutons() {
    editeur.classList.remove("role-editeur");
    admin.classList.remove("role-admin");
    }

    //lorsque l'on clique sur le bouton editeur
    editeur.addEventListener("click",()=>{

        //on remplie le contenu du texte role 
        //on active le mode editeur et on remove le mode admin
        roleText.textContent = "Editeur";
        roleText.style.color = "rgba(248, 80, 110, 0.57)";
        roleText.style.letterSpacing = "1px";

        //ajout du mode editeur pour le background
        body.classList.add("editeur-mode");
        body.classList.remove("admin-mode");

        //ajout du style pour le bouton
        bouton.classList.remove("bouton");
        bouton.classList.add("editeur-bouton");
        bouton.classList.remove("admin-bouton");

        //ajout du style pour les inputs
        input.forEach((e)=>{
            e.classList.remove("input-actif");
            e.classList.add("input-editeur");
            e.classList.remove("input-admin");

        })

        //ajout du style sur le bouton
        resetBoutons();
        editeur.classList.remove("role-admin");
        editeur.classList.add("role-editeur");
  
    })

    //lorsque l'on clique sur le bouton administrateur
    admin.addEventListener("click",()=>{

        //on remplie le contenu du texte role
        //on active le mode admin et on remove le mode editeur
        roleText.textContent = "Administrateur";
        roleText.style.color = "rgba(59, 131, 246, 0.51)";
        roleText.style.letterSpacing = "1px";

        //ajout du mode admin pour le background
        body.classList.add("admin-mode");
        body.classList.remove("editeur-mode");

        //ajout du style pour les boutons
        bouton.classList.remove("bouton");
        bouton.classList.add("admin-bouton");
        bouton.classList.remove("editeur-bouton");

        //ajout du syle pour les inputs
        input.forEach((e)=>{
            e.classList.remove("input-actif");
            e.classList.add("input-admin");
            e.classList.remove("input-editeur");

        })

        //ajout du style sur le bouton
        resetBoutons();
        admin.classList.add("role-admin");
        admin.classList.remove("role-editeur");

        
    })
    editeur.click();