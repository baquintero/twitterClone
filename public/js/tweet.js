$(document).ready(function() {
      if(localStorage.getItem('Token')){
            console.log('usuario autenticado');
      }else{
            location.href = '/';
      }

      $('.btn-tweet').click(function() {
          var descripcion = $('#description').val();
          var usuario = JSON.parse(localStorage.getItem('TokenUser'));
          var datos = {
            description: descripcion,
            fk_user: usuario['id']
          };
          var token = localStorage.getItem("Token");

          $.ajax({
              type: "POST",
              url: "/home",
              headers: { 'Authorization': token },
              dataType: "json",
              data: (datos),
              success: function(data) {
                  if(data['code']==404){
                        swal({
                              title: 'Tweet Erroneo', 
                              text: data['message'], 
                              icon: 'error'
                        });
                  }
                  swal({
                        title: 'Tweet Registrado Exitosamente', 
                        text: data['message'], 
                        icon: 'success'
                  });
                  location.reload();
                  
                  console.log(data);
              }
          }); 
  
      });

      $('.btn-logout').click(function() {
           localStorage.clear();
           location.reload();
        });
  });