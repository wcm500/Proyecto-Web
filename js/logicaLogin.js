document.getElementById('inicio').addEventListener('click',
inicarSession());

         function inicarSession(){
            
            var sCorreo= '';
            var sContrasena = '';
            var bAcceso = false;


            sCorreo = document.getElementById('correo').value;
            sContrasena = document.getElementById('contrasena').value;

            bAcceso = validarCredenciales(sCorreo, sContrasena);
            
            if(bAcesso == true){
                ingresar();
            }

        }

        function ingresar() {
            var rol = sessionStorage.getItem('rolUsuarioActivo');
            switch (rol) {
                case '1':
                    window.location.href = "../html/AprobadorFinanciero.html";
                    break;

                    case '2':
                        window.location.href = "../html/formularioProductos.html";
                        break;
            
                default:
                    break;
            }
        }