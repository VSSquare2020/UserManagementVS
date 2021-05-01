$(document).ready(function () {
    $("#user_view_table").DataTable();

    setTimeout(function(){
        $(".alert").remove();
     }, 4000 ); // 5 secs

     $('.fetch_user').on('click',function(){
         var clo_no = $('#clo_number').val();
         $('.proceed_div').css("display","none");
         console.log(clo_no);
         if(clo_no != "")
         {
            $.ajax({
                type: "GET",
                url: '/fetch_user',
                data:{'clo_no':clo_no},
                success: function(response){

                    if(response.status == "success")
                    {
                        console.log(response);
                        $('.user_name').text(response.data.name);
                        $('.army_no').text(response.data.army_no);
                        $('.rank').text(response.data.rank_id);
                        $('.battery').text(response.data.trade_id);
                        $('.proceed_div').css("display","block");

                    }
                    else{
                        $('.proceed_div').css("display","none");
                    }
                }
              });
         }
         else{
         console.log("clo required");
         }
     });

     $('.proceed_btn').on('click',function(){
        var clo_no = $('#clo_number').val();
        window.location.href='/issue_details/'+clo_no;
     });

    //  $('.add_more').on('click',function(){
    //      console.log("hhhh");
    //      $('.product_div').clone().insertAfter('div.product_div:last');
    //  })



     var maxField = 10; //Input fields increment limitation
     var addButton = $('.add_more'); //Add button selector
     var wrapper = $('.product_div'); //Input field wrapper

     var fieldHTML ='<div class="product-field-group"> <div class="form-group"><label for="permissionSelect">Product</label><select class="form-control" name="product_id[]" id="product_id"><option value="-1">Select Product</option> @if(@$products && count($products)>0) @foreach($products as $key=>$product)<option value="{{$product->id}}"> {{($product->product_name)}} </option> @endforeach @endif </select></div><div class="form-group"><label for="quantity">Quantity.</label><input type="number" name="quantity[]" class="form-control @error("quantity") is-invalid @enderror" id="quantity"></div><div class="col-sm-2">   <a href="javascript:void(0);" class="btn btn-danger remove_button" title="Add field"><i class="fa fa-remove"></i></a></div></div></div>';




    // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
    //var fieldHTML = '<div class="form-group"><label for="name" class="col-sm-2 col-md-3 control-label">@lang("labels.ChooseCategory")</label><div class="col-sm-10 col-md-4"><select name="home_category[]" class="form-control"><option value=""> @lang("labels.ChooseCategory")</option> @if(!empty($categories) and count($categories)>0) @foreach($categories as $category) <option value="{{$category->id}}"> {{$category->name}}</option>  @endforeach @endif </select> </div> <div class="col-sm-2">   <a href="javascript:void(0);" class="btn btn-danger remove_button" title="Add field"><i class="fa fa-remove"></i></a></div> </div>'
     var x = 1; //Initial field counter is 1
     
     //Once add button is clicked
     $(addButton).click(function(){
         //Check maximum number of input fields
         $('.product-field-group:last').clone().insertAfter('div.product-field-group:last')
        //  if(x < maxField){ 
        //      x++; //Increment field counter
        //      $(wrapper).append(fieldHTML); //Add field html
        //  }
     });
     
     //Once remove button is clicked
     $(wrapper).on('click', '.remove_button', function(e){
         e.preventDefault();
         console.log("click");
         $(this).parents('.product-field-group').remove(); //Remove field html
         x--; //Decrement field counter
     });












 
});
$("document").ready(function(){
   
});
