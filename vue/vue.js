new Vue({
    el:"#app",
    data: {
        attachRed:false,
        color:"green",
        width:100,
        height:100,
        show: true
    },
    computed: {
        divClasses: function() {
            return {
                red: this.attachRed,
                blue: !this.attachRed
            }
        }, 
        myStyle() {
            return {
                backgroundColor: this.color,
                width: this.width +"px",
                height: this.height +"px"
            }
        }

    }
})