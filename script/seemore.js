  /////load more
$(document).ready(function(){  
    $(document).on('click', '#load_more', function(e){  
        var loisirid=$(e.target).attr('data-id');
        console.log(loisirid);
        //alert(loisirid);
        $.ajax({
            url:"seemore.php",
            type:"POST",
            data:'id_loisir='+loisirid,
            success:function(response){ 

                if(response != '')  
                {     
                    $('.col-lg'+loisirid).remove("chargement");
                $('#grand').append(response);
                }  
                else  
                {  
                     $('#load_more').html("No Data");  
                }  
                
            }
        })
    });  
});