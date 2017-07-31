$(function() {
        $(".done").click(function () {
            var id = $(this).attr("data-id");
            $.post("testtask/app/is_done/"+id, {}, function (data) {
                console.log(data);
            });
            if($(this).html()==="Done"){
                $(this).html("Not Done");
            }else {
                $(this).html("Done");
            }
            return false;
        });
        $(".edit").click(function () {
            console.log("edit");
            let id = $(this).attr("data-id");
            let text = $(".text-"+id).val();

            $.ajax({
                type: 'POST',
                url: `testtask/app/edittext/`+id,
                data: 'text='+text,
                success: function(data){
                    console.log(data);
//                        $('.results').html(data);
                }
            });
            return false;
        });
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-load').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInput").change(function(){
        readURL(this);
    });
});
