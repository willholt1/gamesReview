$(document).ready(function(){
    //connect to the server
    var socket = io.connect("http://localhost:8080");

    //when the form submits...
    $("form").submit(function(e){
        e.preventDefault();
        //send a message to the server in the client message namespace
        socket.emit("client message", $("#message").get(0).value);
        //reset the input field to blank
        $("#message").get(0).value = "";
    });

    //when we receive a message from the server...
    socket.on("server message", function(data){
        //send over to the view
        $("#chat").append(data + "<br>");
    });
})