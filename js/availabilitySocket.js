// var availabilitySocket = new WebSocket("ws://localhost/keilewerf-map/php/AvailabilityCheck.php", "protocolOne");
//
// // Send text to all users through the server
// function sendText() {
//     // Construct a msg object containing the data the server needs to process the message from the chat client.
//     var msg = {
//         type: "message",
//         text: document.getElementById("text").value,
//         id: clientID,
//         date: Date.now()
//     };
//
//     // Send the msg object as a JSON-formatted string.
//     availabilitySocket.send(JSON.stringify(msg));
//
//     // Blank the text input element, ready to receive the next line of text from the user.
//     // document.getElementById("text").value = "";
// }
//
//
// availabilitySocket.onmessage = function (event) {
//     console.log(event.data);
// }


console.log('Availability Socket.');

var conn = new WebSocket('ws://localhost/keilewerf-map/php/AvailabilityCheck.php');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);
};