var vm1 =new Vue({
    el:`#app`,
    data: {
        title:`Hello world!`,
        error:"",
        link : `https://google.com`,
        finishedLink : "<a href='https://google.com'>google</a>",
        counter:0,
        secondCounter:0,
        x:0,
        y:0,
        name:"Mahmoud",
        num:12345
    },
    computed: {
        output:function() {
            console.log("Computed");
            return this.counter < 5 ? "Smaller than 5" :  "Greater than 5" ;
        }
    } ,
    methods: {
        changeTitle: function(event) {
            this.error = event.target.value.length <10 ? event.target.name+" needs to be longer" : "";
        },
        sayHello() {
            this.title ="Hello";
            return this.title;
        },
        increase(step, event) {
            event.target.style.color = "red";
            this.counter += step;
        },
        result:function() {
            console.log("Method");
            return this.counter < 5 ? "Smaller than 5" :  "Greater than 5" ;
        },
        updateCoordinates(event) {
            this.x = event.clientX;
            this.y = event.clientY;
        },
        dummy: function(event) {
            event.stopPropagation()
        },
        alertMe: (event)=> {
                alert(event.target.value);
        },
        calc() {
            var y = 0;
            var x = this.num.toString().split('');

            for(var i = 0;i< x.length;i++) {
                y += parseInt(i);
            }
            console.log(y);
        }
    }
});


// var vm = new Vue({
//     template:`<h1>Hello World</h1>`,
// });
// vm.$mount();
// document.getElementById('app3').appendChild(vm.$el);


// var data = {
//     status:"Cirtical"
//   };

Vue.component('tmp',{ // global component
    data:function() {
      return {
        status:"Cirtical"
      };
    },
    template: "<p>Server Status: {{status}} (<button @click='changeText'>change</button>)</p>",
    methods: {
        changeText() {
            this.status = "Normal"
        }
    }
  });
  var cmp = { //local component
    data:function() {
      return {
        status:"Cirtical"
      };
    },
    template: "<p>Server Status: {{status}} (<button @click='changeText'>change</button>)</p>",
    methods: {
        changeText() {
            this.status = "Normal"
        }
    }
  };
  new Vue({
      el:'#app2',
      component: {
          'tmp':cmp
      }
  })