function createEmail(){
    var receiver = "iic.spit.ac.in";
    var name = document.querySelector("#name").value;
    var subject = document.querySelector("#email").value+" | "+name;
    var body = document.querySelector("#message").value;
    var mail_text = "mailto: "+receiver+"?subject="+encodeURIComponent(subject)+"&body=" + encodeURIComponent(body);
    window.location.href = mail_text;
    

}