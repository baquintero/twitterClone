$(document).ready(function() {
    if(localStorage.getItem('Token')){
        swal({
            title: 'Sesion ya Iniciada', 
            text: 'Si desea ingresar con otra cuenta tiene que cerrar sesion', 
            icon: 'error'
        });
        setTimeout(function(){location.href = 'home'; }, 5000);
    }

      $('.btn-login').click(function() {
          var user = $('#loginUser').val();
          var contrasena = $('#loginPassword').val();
  
           var datos = {
              email: user,
              password: contrasena
          };

          $.ajax({
              type: "POST",
              url: "/api/login",
              dataType: "json",
              data: (datos),
              success: function(data) {
                  if(data['code']==404){
                        swal({
                              title: 'Mensaje de Sesión', 
                              text: data['message'], 
                              icon: 'error'
                        });
                  } 
                localStorage.setItem("Token", data['token']);
                var userlogin = JSON.parse(JSON.stringify(datos));

                 $.ajax({
                    type: "GET",
                    url: "/api/user/"+userlogin['email'],
                    dataType: "json",
                    success: function(datauser) {
                        localStorage.setItem("TokenUser", JSON.stringify(datauser['user']));
                        console.log(datauser);
                    }
                }); 

                location.href = 'home';
              }
          }); 

          
  
      });
  });