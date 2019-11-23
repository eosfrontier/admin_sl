//Update user
$("#douane-update").submit(function(event){
    event.preventDefault();
    var form_data = $("#douane-update").serialize();

    $.ajax({
        url : "xf.php",
        type: "post",
        data : form_data
    }).done(function(response){
        console.log(response);
    if(response == "true"){
            $("#douane-update").css("background", "#1a501f");
            setTimeout(function(){
                $("#douane-update").css("background", "");
            }, 2000);
        }
    });
})

//Add company
$("#add-company-form").submit(function(event){
    event.preventDefault();
    var form_data = $("#add-company-form").serialize();

    $.ajax({
        url : "xf.php",
        type: "post",
        data : form_data
    }).done(function(response){
        console.log(response);
    if(response == "true"){
            $("#add-company-form").css("background", "#1a501f");
            setTimeout(function(){
                $("#add-company-form").css("background", "");
                $(".may-empty").val("");
            }, 2000);
        }
    });
})

$(".transfer-form").submit(function(event){
    event.preventDefault();
    var form_data = $(".transfer-form").serialize();

    formsubmit(form_data);

    function formsubmit(form_data){
        $.ajax({
            url : "xf.php",
            type: "post",
            data : form_data
        }).done(function(response){
            console.log(response);
            if(response == "success"){
                $(".transfer-form").slideToggle();
                $(".transfer-success").slideToggle();
                setTimeout(function(){
                    window.location = document.URL;
                }, 3000)
            }
        });
    }

})
