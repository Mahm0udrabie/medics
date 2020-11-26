document.getElementById('btn1').onclick = function() {
    var sel = document.getElementById('menu');
    var len =  sel.length;
    for(var i = 0 ; i < len; i++) {
        if(sel.options[i].selected == true) {
            
        document.getElementById('sVal').innerHTML +=  " "+sel.options[i].value;
        document.getElementById('sTxt').innerHTML +=  sel.options[i].text;
        }


    }
    var a = 15;
    if({}) {
        console.log(a+1) } console.log(a+2);
// var idx = document.getElementById('menu').selectedIndex;
// var val = document.getElementById('menu').options[idx].value;
// var txt = document.getElementById('menu').options[idx].text;
//           document.getElementById('sVal').innerHTML+=  val;
//           document.getElementById('sTxt').innerHTML+=  txt;

}