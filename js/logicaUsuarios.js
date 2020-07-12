function obtnerListaUsuarios (){
    var listaUsuarios =JSON.parse(localStorage.getItem('listaUsuariosLs'));
    
    if(listaUsuarios == null){
        listaUsuarios=
        [
            ['1', 'Pablo', 'Martinez', 'pmartinez248@gmail.com','pmartinez248','1'],
            ['2', 'Olman', 'Hernandez', 'ohernandez123@gmail.com','ohernandez123','2']
        ]
    }
    return listaUsuarios;
}

function validarCredenciales(pCorreo, pContrasena){
    var listaUsuarios = obtnerListaUsuarios();
    var bAcceso =false;

    for(var i = 0; i < listaUsuarios.length; i++){
        if(pCorreo == listaUsuarios[i][3] && pContrasena == listaUsuarios[i][4]){
            bAcceso=true;
            sessionStorage.setItem('usuarioActivo',listaUsuarios[i][1] + '' + listaUsuarios[i][2]);
            sessionStorage.setItem('rolUsuarioActivo', listaUsuarios[i][5]);
        }
    }

    return bAcceso;}