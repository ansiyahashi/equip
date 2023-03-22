function open_image_modal(id=null){
  $('div.file_holder').val(id);
  $("#emdadUploader").modal('show');
} 

$('body').on('click','.custom-upload',function(){
  console.log($(this));
  console.log($(this).data('cat_id'));
  console.log('id............');
  $('body').find('.ref_id').val($(this).data('ref_id'));
  $('body').find('.upload_url').val($(this).data('url'));
open_image_modal()
});

$(document).ready(function() {
   
    $(document).on('click','.file-upload', function(){
      open_image_modal(this.id);
    });


  $(document).on('click','.uploaded_images', function(){
      arrp=[];
      var type;
      
      var type = $("#inputGroupFile01").data('type');
      var type1 = $("#slider_banner").data('type');
      console.log("type",type);
      console.log(type1);
      if(type != 'multiple')
      {  
        console.log("thuthuru");
        $("div").removeClass("item_selected");

      }
      $(this).toggleClass('item_selected'); 
     });


      
     $(document).on('click','#add_files', function()
     {  
       

   
         let inp=$('div.file_holder').val(); 
        let dv='';
        console.log(inp);

       
        let ids=[];
        var html='';
        $('.item_selected').each(function(i, obj) {
           
            ids.push($(this).data('id'));
            html+='<div class="card p-1 mr-1" style="width: 5rem;"><img class="card-img-top" src="/public/'+$(this).data('name')+'" alt="Card image cap">'+
            '<button class="btn btn-sm  remove-attachment" data-id="'+inp+'" data-value="'+$(this).data('id')+'" type="button">X</button></div>';
        });

        if($('body').find('.ref_id').val()!=undefined){
        
        
        
        
        var data={
          ref_id:$('body').find('.ref_id').val(),
          image_id:ids
        }
        
        
         $.ajax({
          url : $('body').find('.upload_url').val(),
          data : data,
          type :"POST",
          success: function(response) {
            // console.log(response.code);
            if (response.code == 200) {
                swal_success();
                
            }
        },
        error: function(response) {

        }
         });
        
        
          return false;
      
  
  
  
        }
        document.getElementById(inp).value=ids;
        $("label[for='" + inp + "']").html(ids.length+' files selected');
          $("div[for='" + inp + "']").html(html);
       
        $("#emdadUploader").modal('hide');

        


     });
     $(document).on('click','.remove-attachment', function(){
        //  var ids = document.getElementById($(this).data('id')).value;
        $(this).parent().remove();
    //     let id_arr;
        
    //     id_arr = ids.split(',');
        
    //     id_arr.splice( $.inArray($(this).data('value'), id_arr), 1 );
    //   // console.log(id_arr);
    //     document.getElementById($(this).data('id')).value = id_arr;

    //     $("label[for='" + $(this).data('id') + "']").html(id_arr.length+' files selected');
        
     });

     //<<...............seller module.............>>>
    //  $(document).on('click','#seller_tab',function(){
    //   $('#seller_btn').prop('disabled', false);
    //  });
    //  $(document).on('click','#shop_tab',function(){
    //   $('#seller_btn').prop('disabled', true);
    //  });
     
     
 
  

});


function dd(t){
  console.log(t);
}

