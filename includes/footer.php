<style>
    footer{
        background: rgba(255, 254, 254, 0.8);
        padding: 60px 10%;
        display: flex;
        flex-direction: column;
        font-family: 'Inter', system-ui, sans-serif;
    }
   
    .container2{
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        color: #999;
    }


    .texte{
        display: flex;
        margin-right: 10px;
        font-size: 13px;
    }
    .container1{
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1.5fr;
        gap: 40px;
        margin-bottom: 20px;
    
    }
    .first{
        display: flex;
        flex-direction: column;

    }
    #logo{
        font-size: 32px;
        font-family: 'Playfair Display', serif;
        font-weight: 800; /*effet gras*/
        font-style: italic;
        letter-spacing: 0.5px; /*resserré les écritures*/

    }

    #logo:hover{
        transform: scale(1.02);
    }
    .vibes{
        color: rgb(220, 3, 3);
    }
    #first2{
        text-transform: uppercase;
        font-weight: 500;
        font-size: 10px;
        margin-bottom: 20px;
        letter-spacing: 2.5px;
        color: rgba(4, 4, 4, 0.653);
    }
    .first #firsttexte{
        font-size: 14px;
        line-height: 1.6;
        color: #666;
        max-width: 250px;
        font-size: 14px;
    }

    #title{
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
        color: #1a1a1a;
        margin-bottom: 25px;
        text-transform: uppercase;
    }
    .regions p{
        font-size: 14px;
        margin-bottom: 12px;
        color: #555;
        cursor: pointer;
        transition: all 0.3s ease;
        display: block;
    }

    .rubriques p{
        font-size: 14px;
        margin-bottom: 12px;
        color: #555;
        cursor: pointer;
        transition: all 0.3s ease;
        display: block;
    }

    .news #newstexte{
        font-size: 14px;
        line-height: 1.6;
        color: #666;
        max-width: 250px;
        font-size: 14px;
    }

    p:hover{
        color: #dc0303;
        transform: translateX(5px); /* Petit décalage élégant */
    }
    p{
        color: rgba(4, 4, 4, 0.897);
        margin-top: -2px;
    }
    #divider{
        height: 1px;
        background: linear-gradient(to right, transparent, #e4e4e4, transparent);
        margin: 20px 0;
    }
    .texte span{
        margin-left: 20px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 400;
    }

    .texte span:hover { 
        color: #1a1a1a;
    }

    #logo3{
        color: rgb(220, 3, 3);
    }
    .copyright{
        font-size: 14px;
        color: rgba(4, 4, 4, 0.421);
        font-weight: 500;
    }
</style>
    <footer>
            <div class="container1">
                <div class="first">
                    <span id="logo">Geo<span class="vibes">Vibes</span></span>
                    <span id="first2">L'ACTUALITE MONDIALE</span>
                    <p id="firsttexte">L'information internationale, filtrée selon vos préférences et vos régions d'intérêts</p>
                </div>
                <div class="regions">
                    <h4 id="title">REGIONS</h4>
                    <p>Afrique</p>
                    <p>Europe</p>
                    <p>Asie</p>
                    <p>Amérique</p>
                    <p>Océanie</p>
                </div>
                <div class="rubriques">
                    <h4 id="title">RUBRIQUES</h4>
                    <p>Politique</p>
                    <p>Economie</p>
                    <p>Culture</p>
                    <p>Sport</p>
                    <p>Technologie</p>
                </div>
                <div class="news">
                    <h4 id="title">NEWSLETTER</h4>
                    <p id="newstexte">Recevez chaque matin les titres qui comptent, directement dans votre boîte mail</p>
                </div>
            </div>
        <div id="divider"></div>
        <div class="container2">
                <div class="copyright">
                    © 2026 <span id="logo3" style="font-weight: 600; color: #dc0303;">GeoVibles</span>. Tous droits réservés.
                </div>
                <div class="texte">
                    <span>Confidentialité</span>
                    <span>CGU</span>
                    <span>Cookies</span>
                </div>
        </div>
    <footer>