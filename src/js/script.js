window.onload = function(){
    loadChat();
    $("#chat").html('');
    window.setInterval(loadChat, 1000);
}

$("#messageInput").keydown(function(e){
    if(e.key == "Enter"){
        sendMessage();
    }
});


function sendMessage() {
    const message = $("#messageInput").val();
    if(message != ""){
        $.get('saveMessage.php', {m: localStorage.getItem('userName') + ":" + message});
        $("#messageInput").val('');
    }
}

function sendImage() {
    let form = new FormData();
    const image = $("#imageInput")[0].files[0];
    form.set("username", localStorage.getItem('userName'));
    form.set("image", image, image.name);
    $.ajax({
        url: "saveImage.php",
        data: form,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
            alert(data);
          }
    });
    $("#imageInput").empty();
}

function loadChat(){
    const chat = $("#chat");
    $.get("loadChat.php", {l: chat.children().length}, function(data){
        if(data != ""){
            chat.append(data);
            chat.stop().animate({
                scrollTop: chat[0].scrollHeight
            }, 800);
        }
    });
}