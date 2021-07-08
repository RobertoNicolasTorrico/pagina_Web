
class Header {
    menuNav = [];

    crearHeader() {
    
      if(true){
        this.menuNav = this.cargarItemsMenuSinUsuario(); 
      }else{
        this.menuNav = this.cargarItemsMenuConUsuario(); 
      }
    }

    cargarItemsMenuSinUsuario(){
        var arr_itemsMenu = [
            {  clase: "nav-link", nomhtml: "index.php", nomItem: "Inicio"}, 
            {  clase: "nav-link",  nomhtml: "paginas/contacto.php",  nomItem: "Contacto"},
            {  clase: "nav-link",  nomhtml: "",  nomItem: "Ingresar"},
            {  clase: "nav-link",  nomhtml: "",  nomItem: "Registrarse"}
        ];
        return arr_itemsMenu;
    }
    cargarItemsMenuConUsuario(){
      var arr_itemsMenu = [
          {  clase: "nav-link", nomhtml: "index.php", nomItem: "Inicio"}, 
          {  clase: "nav-link",  nomhtml: "paginas/contacto.php",  nomItem: "Contacto"},
          {  clase: "nav-link",  nomhtml: "",  nomItem: "Perfil"}
      ];
      return arr_itemsMenu;
    }

    cargarMenu(){
          var texto_nav="";
          var item_menu="";
          
          texto_nav=`
          <nav class="navbar navbar-expand-lg fixed-top bg-negro">  
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/logos/logo-zonagamer.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">  
                  <ul class="navbar-nav ml-auto">`;
            this.menuNav.forEach(element => {
            // ejemplo de item en HTML: <a class="nav" href="index.html">Home</a>
            item_menu = `
            <li class="nav-item">
              <a class="${element.clase}" href="${element.nomhtml}" > ${element.nomItem} </a>
            </li>`;
            
            texto_nav = texto_nav + item_menu;
            });
            texto_nav = texto_nav+ 
                  `</ul>
                </div>
            </div>
          </nav>`;
          document.getElementById("header").innerHTML= texto_nav;

    }  

  }



  
var miHeader = new Header();
miHeader.crearHeader();
miHeader.cargarMenu();

  







             