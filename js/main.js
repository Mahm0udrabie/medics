var vm = new Vue({
    el:"#input",
    data: {
        error:"",
        url:null,
        title:"Medics"
    },
    methods: {
        checkError(event) {
            this.error = event.target.value.length < 4 ?  event.target.name +" needs to be longer" : "";
        } ,
        upload(event){
            const file = event.target.files[0];
            this.url = URL.createObjectURL(file);
        }           
    },
    watch : {
       error: function(value) {
           var vm = this;
            setTimeout(() => {
                vm.error = "";
            }, 5000);
        }
    }
});


var images = [
    "images/background.jpg" ,
    "images/background2.jpg",
];
    var imageHead = document.getElementById("backgroundImage");
    var i = 0;
    setInterval(slider, 4000);
    function slider() {
        imageHead.style.backgroundImage = "url(" + images[i] + ")";
        i = i + 1;
        if (i == images.length) {
            i =  0;
        }
    }


//var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}
function showPosition(position) {
    document.getElementById("latitude").value = position.coords.latitude;
    document.getElementById("longitude").value = position.coords.longitude;
    document.getElementById("location").style.color = "rgb(27, 92, 217)";
}


window.onload = document.getElementById('hidden_div').style.display ="block";
function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == "doctor" ? 'block' : 'none';
}

function get_data(lat,lng) {
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
  }      