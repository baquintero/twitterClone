$(document).ready(function() {
      $('.btn-login').click(function() {
          var user = $('#loginUser').val();
          var contrasena = $('#loginPassword').val();
  
           var datos = {
              email: user,
              password: contrasena
          };
          //localStorage.setItem("TokenUsuario", JSON.stringify(datos));

          $.ajax({
              type: "POST",
              url: "/api/login",
              dataType: "json",
              data: (datos),
              success: function(data) {
                  if(data['code']=404){
                        swal({
                              title: 'Mensaje de Sesión', 
                              text: data['message'], 
                              icon: 'error'
                        });
                  }
                  console.log(data);
              }
          }); 
  
      });
  });