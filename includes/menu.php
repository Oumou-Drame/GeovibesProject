<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap');
    body{
        font-family: 'Inter', system-ui, sans-serif;
    }

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    nav{
        margin-top: 0px;
        display: flex;
        justify-content: center;
        background: #ffffff;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
        backdrop-filter: blur(20px);
    }
    .menu a{
        font-size: 12px;
        font-weight: 500;
        position: relative;
        text-decoration: none;
        color: #555;
        margin: 0 20px;
        letter-spacing: 1.5px;
        transition: all 0.3s ease;
    }
    a:hover{
        color: rgba(0, 0, 0, 0.86);
    }

    /* Soulignement élégant qui part du milieu */
    .menu a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 1.5px;
        bottom: -8px;
        left: 50%;
        background-color: #dc0303;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        transform: translateX(-50%);
    }

    .menu a:hover::after, .menu a.active::after {
        width: 60%; /* On ne souligne pas tout le mot, c'est plus chic */
    }
 
</style>
    <nav class="menu">
        <a href="">A LA UNE</a>
        <a href="#">SPORT</a>
        <a href="#">TECHNOLOGIE</a>
        <a href="#">POLITIQUE</a>
        <a href="#">EDUCATION</a>
        <a href="#">CULTURE</a>
        <a href="#">SANTE</a>
    </nav>

