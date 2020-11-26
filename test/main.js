// // var str = "Hello";

// // var text2 = str.concat(" ", "World");

// // console.log(text2);
// // var spc = "            Hello world";
// // console.log(spc.trim());
// // var index = "Hello World";
// // console.log(index.charAt(0));

// // var st = "HeLOo WorLd";

// // console.log(st.charCodeAt(0));

// // console.log(st[2]);

// // var txt = "a, b,c .sd Aj";

// // var arr1 = txt.split(",");

// // var arr2 = txt.split(" ");

// // var arr3 = txt.split(".");

// // var txt1 = "Hello";
// // var arrX = txt1.split("");

// // console.log(arrX);

// // console.log(arr3);
// // console.log(arr1);
// // console.log(arr2);


// var string = "Hello from the other side";
// var arr="";
// for (let index = string.length-1;index >= 0 ; index--) {
//      arr += string[index];
// }
// var reversed = string.split("").reverse().join("");
// console.log(arr);
// console.log(reversed);


// var cars = ["volov", "toyta", "logan","kia","volov","logan"];
// for (let i = 0; i < cars.length; i++) {
//     for (let j = 0; j < i; j++) {
//         if(cars[i] == cars[j]) {
//                 console.log(cars[i]);
//         }
//     }
// }
// var array = [3 , 6, 2, 56,200, 32, 5, 89, 32];
// var largest= 0;

// for (i=0; i<=largest;i++){
//     if (array[i]>largest) {
//         var largest=array[i];
//     }
// }
// console.log(largest);
// // var arr = [];
// // for (let index = 0; index < cars.length; index++) {
// //     arr.push(cars[index]);
// // }
// // console.log(arr);

// // var arr = [1, 2, 5, 2, 1];
// // console.log(arr[arr.length-1]);
// // for (let i = 0; i < arr.length; i++) {
// //     for (let j = arr.length-1; j > 0 ; j--) {
// //         if(arr[i] == arr[j]) {
// //             console.log(arr[i],arr[j], true);
// //         } else {
// //             console.log(arr[i],arr[j], false);
// //         }
// //     }
// // }


 
// // PHP Program to check whether the 
// // Array is palindrome or not 

// function palindrome(arr, n) 
// { 
// 	// Initialise flag to zero. 
// 	var flag = 0; 

// 	// Loop till array size n/2. 
// 	for (var i = 0; i <= n / 2 && n != 0; i++) { 
// 		// Check if first and last element are 
//         // different then set flag to 1. 
        
//         console.log(n ,arr[i], arr[n - i - 1]);
// 		if (arr[i] != arr[n - i - 1]) { 
// 			flag = 1; 
// 			break; 
// 		} 
// 	} 

// 	// If flag is set then print Not Palindrome 
// 	// else print Palindrome. 
// 	if (flag == 1) {
//         console.log("Not Palindrome"); 
//     } else {
//         console.log("Palindrome"); 
//     }
		
// } 

// // Driver code. 
// // var arr = [ 1,2, 3, 2, 1 ]; 
// // var n = arr.length; 

// // palindrome(arr, n); 

// // This code is contributed by chandan_jnu 

// function rand(array , num) {
//     var flg = 0;

//     for (let i = 0; i < num / 2 && num !=0; i++) {
//         if(array[i] != array[num - i -1]) {
//             flg = 1;
//             break; 
//         }
//     }

//     if (flg == 1) {
//         console.log("Not Palindrome"); 
//     } else {
//         console.log("Palindrome"); 
//     }
// }


// var array = [1,2,5,2,1];
// var num   = array.length; 
// rand(array, num);
// var myParent = document.body;
// var arr = ['Html','css','js','bootstrap','php','mysql'];
// var select = document.createElement('select');
// select.id = "mySelect";
// myParent.appendChild(select);    


// var disOption = document.createElement("option");  
// disOption.text = 'selected';


// select.appendChild(disOption); 

// for (let i = 0; i < arr.length; i++) {
    
//     var option = document.createElement("option");
//     option.value = arr[i];
//     option.text = arr[i];   
//     select.appendChild(option);
//     var course = document.getElementById(select.id).value;
    
// }
var obj = new Object();

obj.Name = "Mahmoud";

console.log(obj.Name);


var myObj = {};

function emp(name,dept,salary, info ,nickname) {
    this.name   = name;
    this.dept   = dept;
    this.salary = salary; 
    this.info   = function() {
        return this.name + " work in " + this.dept + " and salary is " + this.salary;
    },
    this.nickName = nickname;
}

var employee = new emp("Mahmoud", "accounting", 4500,"Hello from the other side");
console.log(employee.hasOwnProperty("dept"));
console.log(employee.info());
console.log(Object.keys(employee));
console.log(Object.values(employee));

delete employee.nickName;
console.log(Object.values(employee));

for( var i in employee) {
    console.log(i +" : " + employee[i]);
}


// Object.seal(employee);
Object.freeze(employee);
employee["secondName"]= "ds";
employee["name"]= "Ali";

console.log(employee.name);




var fun = function () {
    console.log("length : " + arguments.length)
    var sum = 0;
    for (let i = 0; i < arguments.length; i++) {
        sum += arguments[i];  
    }
    return sum;
}                 

console.log(fun(1,2));
console.log(fun(1,2,3))
console.log(fun(1,2,3,4));

var str = "this is javascript";
var arr = [1,2,3,'abc'];
console.log(arr.join.apply("this is javascript",["-_-"]));
console.log(arr.join("_---_"));
console.log(arr.join.bind(str)("_*_"));

var a = 5;

function mainFun(x,y) {
    function innerFun(z) {
        var w = 10;
        function thirdLevelFun() {
            var a = 101;
        }
        thirdLevelFun();
        return x+y+w+z +a;
    }
console.log(innerFun(3));
    return "simple fun exec.";
}
var result = mainFun(1,2);
console.log(result);
var win;
function openNewWin() {
    win = open("childWin.html", "","width=150, height=150");
}

function closeNewWin() {
    win.close();
}


function changebackground() {
    win.document.bgColor ="red";  
    win.focus();
}

function moveNewWindow() {
    win.moveTo(150,150);
    win.focus();
}
var timerID;
function startAlert(x) {       
    alert("Interval fierd" +x);
    x++;
    timerID = setTimeout(startAlert,2000,x)
}

function stopAlert() {
    clearTimeout(timerID);
}

function go() {
   var x = document.getElementById('page').value;
   history.go(x);
}

function pageDetails() {
    console.log(`
    ${location.href} 
    ${location.hostname}
    ${location.host} 
    ${location.protocol}
    `);
    location.assign("https://facebook.com");
}


var elem = document.getElementsByTagName('div');

