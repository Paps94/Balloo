$(document).ready(function(){

    $(document).on('change','.productcategory',function () {
        var prod_id=$(this).val();

        var a=$(this).parent();
        console.log(prod_id);
        var op="";
        $.ajax({
            type:'get',
            url:'{!!URL::to('findPrice')!!}',
            data:{'id':prod_id},
            dataType:'json',//return data will be json
            success:function(data){
                console.log("PricePerWeek");
                console.log(data.PricePerWeek);

                // here price is coloumn name in products table data.coln name

                a.find('.prod_price').val(data.PricePerWeek);

            },
            error:function(){

            }
        });


    });

});
