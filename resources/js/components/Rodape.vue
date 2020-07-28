<template>
<div class="footer">
    <div id="myFooter">
        <div class="row">
            <div class="col-sm-3">
                <h6>Início</h6>
                    <ul>
                        <li><img src="https://image.flaticon.com/icons/png/512/25/25694.png"></li>
                    </ul>
            </div>
            <div class="col-sm-3">
                <h6>Contato</h6>
                    <ul>
                        <li>Email: ufindsystem@gmail.com</li>
                    </ul>
            </div>
            <div class="col-sm-3">
                <h6>Redes Sociais</h6>
                    <ul>
                        <li>
                            <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_black-512.png">
                            <img src="https://cdn4.iconfinder.com/data/icons/picons-social/57/38-instagram-3-512.png">
                            <img src="https://cdn3.iconfinder.com/data/icons/picons-social/57/43-twitter-512.png">
                        </li>
                    </ul>
            </div>
            <div class="col-sm-3 logo">
                <img src="/img/logo/logoNome.png">
            </div>
        </div>
    </div>
</div>
</template>



<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 70px;
  background-color: #3a3f46;
  color: white;
  text-align: center;
}

.footer-copyright {
    background-color: #33373e;
    padding-top: 3px;
    padding-bottom: 3px;
    text-align: center;
}

#myFooter ul {
    list-style-type: none;
    padding-left: 0;
    line-height: 1.7;
}

#myFooter img {
    width: 30px;
    height: 30px;
}

#myFooter .logo img {
    width: 130px;
    height: 60px;
}
</style>