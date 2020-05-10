function Validar(user, pass){
    $.ajax({
        url: "validar.php",
        type: "POST",
        data: "user=" + user + "&pass=" + pass,
        success: function (resp) {
            $('#resultado').html(resp);
        }
    });
}