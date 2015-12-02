
function hitme(){
    var now = new Date();
    var hour = now.getHours();
    
    if (hour < 6)
        // light dark
        document.body.style.backgroundImage = "-webkit-linear-gradient(top, #190A0A 0%, #F2FAFF 50%, #1C0B0A 100%)";
    else if (hour < 12)
        // light blue
        document.body.style.backgroundImage = "-webkit-linear-gradient(top, #7AA7FF 0%, #51E8D4 50%, #578FFF 100%)";
    
    else if (hour < 18)
        //orange
        document.body.style.backgroundImage = "-webkit-linear-gradient(top, #FF1212 0%, #E8E464 50%, #FF0D1D 100%)";
    else
        // dark blue
        document.body.style.backgroundImage = "-webkit-linear-gradient(top, #140A73 0%, #7AA7FF 50%, #0A1B82 100%)";
    
}

function Greetings() {
    var now = new Date();
    var hour = now.getHours();
    var message;
    if (hour < 6)
        message = "Doing a little late-night surfing, eh?";
    else if (hour < 12)
        message = "Good Morning!";
    else if (hour < 18)
        message = "Good Afternoon!";
    else
        message = "Good Evening!";
    
    return(message);
}

function textColor() {
    var now = new Date();
    var hour = now.getHours();
 
    var textClr;
    if (hour >= 6 && hour < 18)
        textClr = "black";
    else textClr="white";
    return (textClr);
}

	
// add the following to the beginning of body
/*<h2>
 <script Language="JavaScript">
 
 hitme();
 
 document.fgColor = textColor();
 var myMessage= Greetings();
 document.write(myMessage);
 </script>
 </h2>*/
