<template>
  <div class="container body-content">
    <footer class="fixar-rodape navbar">

    <p class="footer-copyright">© 2020 Copyright - Ufind</p>  
    </footer>
    
</div>

</template>



<style>

div.body-content{
  /** Essa margem vai evitar que o conteudo fique por baixo do rodapé **/
  margin-bottom: 40px;
}

footer.fixar-rodape{
  border-top: 1px solid #333;
  bottom: 0;
  left: 0;
  height: 40px;
  position: fixed;
  width: 100%;
  color: white;
  background-color: #3490dc;
  text-align: center;
  
}

footer.footer-copyright {
    background-color: write;
    padding-top: 3px;
    padding-bottom: 3px;
    text-align: center;
}
</style>