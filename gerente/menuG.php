<style>
*{
    margin: 0;
    padding: 0;
}

header{
    background: #e0e0e0;
    color: white;
    margin: 0;
    font-size: 1.2em;
}

.menu{
    color: white;
    text-decoration: none;
    display: block;
    padding: 8px;
    cursor: pointer;
    font-size: 1em;
    letter-spacing: 3px;
    font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
}

.menu{
    background-image: linear-gradient(to right, #D97904, #D97904 50%, #fff 50%);
    background-size: 200% 100%;
    background-position: -100%;
    display: inline-block;
    padding: 5px 0;
    position: relative;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.3s ease-in-out;
}
  
.menu:before{
    content: '';
    background: #D97904;
    display: block;
    position: absolute;
    bottom: -3%;
    left: 0;
    width: 0;
    height: 6%;
    transition: all 0.3s ease-in-out;
}
  
.menu:hover {
   background-position: 0;
}
  
.menu:hover::before{
    width: 100%;
}

ul{
    padding: 5px;
    list-style: none;
    position: relative;
    margin-top: 50%;
    width: 100%;
    display: inline-block;
}

label{
    left: 35%;
    position: relative;
    display: inline;
}

#check{
    display: none;
}

hr{
    width: 80%;
    margin-top: 5em;
}

nav{
    left: 50%;
    background-color: #590202;
    width: 50%;
    height: 250%;
    position: absolute;
    display: none;
    opacity: 75%;
    animation: fade-in 1s;
}

#check:checked ~ nav{
    display: block;
    animation: fade-in 1s;
}

@keyframes fade-in {
    from {
      opacity: 0;
    }
    to {
      opacity: 75%;
    }
}
  
  @keyframes fade-out {
    from {
      opacity: 75%;
    }
    to {
      opacity: 0;
    }
}
</style>
    <header>
        <a class="ftlogo" href="#"><img src="../img/logo2.png" style="width: 8em; margin-top: 4.2px; margin-left: 1.5em; display: inline-block;"></a>
        <input type="checkbox" id="check">
            <label for="check">
                <img src="../img/menu.svg" alt="" style="width: 2em; cursor: pointer; display: inline-block; margin-bottom: 1em;">
            </label>
        <nav>
            <center>
            <ul>
                <li><a href="edit.php" class="menu" style="margin-top: 5em;">Editar <br> Categorias</a></li>
                <li><a href="editP.php" class="menu" style="margin-top: 5em; margin-right: 0.5em;">Editar Pratos</a></li>
                <li><a href="mesas.php" class="menu" style="margin-top: 5em;">Editar Mesas</a></li>
                <hr>
                <li><a href="controle/controleLoginG.php" class="menu" style="margin-top: 1em;">Sair</a></li>
            </ul>
            </center>
        </nav>
    </header>