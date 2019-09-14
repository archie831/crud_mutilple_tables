
//ajax for customers
    var xhr2 = new XMLHttpRequest();
    var url2 = "http://localhost/mysql_test/json/cJson.php";

    xhr2.onreadystatechange = function(){

        if(xhr2.readyState == 4 && xhr2.status == 200){
            var data = JSON.parse(xhr2.responseText);

            data.forEach(function(item){
                var option = document.createElement("option");
                option.innerText = item.cid + " - " + item.cName;
                document.querySelector("#cid").appendChild(option);
            });
        }
    }
    xhr2.open("GET", url2);
    xhr2.send();


//ajax for Users
    var xhr1 = new XMLHttpRequest();
    var url1 = "http://localhost/mysql_test/json/uJson.php";

    xhr1.onreadystatechange = function(){

        if(xhr1.readyState == 4 && xhr1.status == 200){
            var data = JSON.parse(xhr1.responseText);

            data.forEach(function(item){
                var option = document.createElement("option");
                option.innerText = item.uid + " - " + item.uUsername;
                document.querySelector("#uid").appendChild(option);
            });
        }
    }
    xhr1.open("GET", url1);
    xhr1.send();


//ajax for Products
    var xhr3 = new XMLHttpRequest();
    var url3 = "http://localhost/mysql_test/json/pJson.php";

    xhr3.onreadystatechange = function(){

        if(xhr3.readyState == 4 && xhr3.status == 200){
            var data = JSON.parse(xhr3.responseText);

            data.forEach(function(item){
                var option = document.createElement("option");
                option.innerText = item.pid + " - " + item.pName;
                document.querySelector("#pid").appendChild(option);
            });
        }
    }
    xhr3.open("GET", url3);
    xhr3.send();

 
/*******************************************************************************/   














// //ajax for customers in Edit modal
// var custModxhr2 = new XMLHttpRequest();
// var custModurl2 = "http://localhost/mysql_test/json/cJson.php";  
// // console.log( document.getElementsByClassName("oEditMod")); 

// custModxhr2.onreadystatechange = function(){

//     if(custModxhr2.readyState == 4 && custModxhr2.status == 200){
//         var data = JSON.parse(custModxhr2.responseText);

//         data.forEach(function(item){
//             var option = document.createElement("option");
//             option.innerText = item.cid + " - " + item.cName;
//             // document.querySelector("#cId2").appendChild(option)
//             var selectAll = document.querySelectorAll("#cId2 ");
//             console.log(selectAll);

//             // console.log(document.querySelector("#cId2").appendChild(option));

//             // var array = document.getElementsByClassName("oEditMod");
//             // console.log(array);
//             // console.log(array[0]);
//             // console.log(array[1]);



//             // array.forEach(function(item2){
//             //     item2.appendChild(option);
//             // });

//             // console.log(document.getElementsByClassName("oEditMod")[0].appendChild(option));
//             // console.log(document.getElementsByClassName("oEditMod")[1].appendChild(option));
//             // console.log(document.querySelector("#cId2").appendChild(option));
//         });
//     }
// }
// custModxhr2.open("GET", custModurl2);
// custModxhr2.send();



//     //ajax for users in Edit modal
//     var userModxhr2 = new XMLHttpRequest();
//     var userModurl2 = "http://localhost/mysql_test/json/uJson.php";   

//     userModxhr2.onreadystatechange = function(){

//         if(userModxhr2.readyState == 4 && userModxhr2.status == 200){
//             var data = JSON.parse(userModxhr2.responseText);

//             data.forEach(function(item){
//                 var option = document.createElement("option");
//                 option.innerText = item.uid + " - " + item.uUsername;
//                 document.querySelector("#uId2").appendChild(option);
//             });
//         }
//     }
//     userModxhr2.open("GET", userModurl2);
//     userModxhr2.send();


//    //ajax for Products in Edit modal
//     var prodModxhr2 = new XMLHttpRequest();
//     var prodModurl2 = "http://localhost/mysql_test/json/pJson.php";   

//     prodModxhr2.onreadystatechange = function(){

//         if(prodModxhr2.readyState == 4 && prodModxhr2.status == 200){
//             var data = JSON.parse(prodModxhr2.responseText);

//             data.forEach(function(item){
//                 var option = document.createElement("option");
//                 option.innerText = item.pid + " - " + item.pName;
//                 document.querySelector("#pId2").appendChild(option);
//             });
//         }
//     }
//     prodModxhr2.open("GET", prodModurl2);
//     prodModxhr2.send();



















