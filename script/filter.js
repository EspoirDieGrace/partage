//  $(document).ready(function(){
//      $('#typpub').on('change',function(){
//          var value = $(this).val();
//          //alert(value);
//          $.ajax({
//              url:'filter.php',
//              //method:POST,
//              data:'request=' + value,
//              beforeSend:function(){
//                  $("#grand").html("<span>loading...</span>")
//              },
//              success:function(data){
//                  $("#grand").html(data);
//                     alert(value);
//              }
//          });
//      });
//  });

const filterForm = document.getElementById('filterForm');
alert('test'),
    filterForm.addEventListener('change', filter)

    function filter(event) {
      event.preventDefault();
      console.log('form submit');
      this.form.submit();
    }