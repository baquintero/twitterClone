$(document).ready(function() {
      $('.btn-login').click(function() {
          var nameuser        = $('#user').val();
          var name            = $('#name').val();
          var surname         = $('#surname').val();
          var email           = $('#email').val();
          var contrasena      = $('#password').val();
  
           var datos = {
              name_user:     nameuser,
              name:     name,
              surname:  surname,
              email:    email,
              password: contrasena
          };

          console.log(datos);

          $.ajax({
              type: "POST",
              url: "/api/register",
              dataType: "json",
              data: (datos),
              success: function(data) {
                  
                  

                  if(data['code']==404){
                        swal({
                              title: 'Mensaje de Registro', 
                              text: data['message'], 
                              icon: 'error'
                        });
                  }else{
                        if(data['code']==202){
                              swal({
                                    title: 'Mensaje de Registro', 
                                    text: data['message'], 
                                    icon: 'success'
                              });
                        }
                  }

                  console.log(data);
                
              }
          }); 
  
      });
  });