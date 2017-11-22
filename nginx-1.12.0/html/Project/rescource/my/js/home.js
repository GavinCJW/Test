/* 
* @Author: anchen
* @Date:   2017-10-20 23:20:14
* @Last Modified by:   anchen
* @Last Modified time: 2017-10-22 00:08:17
*/

$(document).ready(function(){
    $.ajax({  
        url:"/login/isLogin",  
        dataType : "json",
        success: function(ret){  
            if(ret.code != "0000"){
                $("#login").attr("href","login/"); 
                $("#login").append("<span class='glyphicon glyphicon-user'></span> Sign in"); 

                $("#user").attr("href","login/"); 
                $("#user").removeClass("dropdown-toggle");
                $("#user").removeAttr("data-toggle");
                $("#user").text("Sign in"); 
            }else{
                $("#login").append("<span class='glyphicon glyphicon-user'></span> "+ret.data);
                $("#user").append("<span class='glyphicon glyphicon-user'> "+ret.data+" <span class='caret'></span>"); 
            }

            console.log(ret.msg);
        },  
        error: function(){  
          console.log("false");  
        }  
    }); 
});

$("#sign_up").click(function(){
    $.ajax({  
        url:"/login/signUp",
        success: function(){  
            window.location.reload();
            console.log("success");
        },  
        error: function(){  
          console.log("false");  
        }  
    }); 
    //return true;
});