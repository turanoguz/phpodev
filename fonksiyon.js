


function yorum(){
    
    let data = $("#yorum").serialize()
    //alert(data)
    
    $.ajax({
        url: "yorum.php",
        data: data,
        type: "post",
        dataType: "JSON",
        success: function (e){
            if(e.hata){
                
                alert(e.hata)

            }else{
                alert(e.ok)
                
                $("#sonuc").prepend(e.mesaj)
                $("#yorumyaztext").val('')
                
            }

        } 
    });
    
}
