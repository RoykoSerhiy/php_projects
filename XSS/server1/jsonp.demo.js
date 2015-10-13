
$(window).load(function(){
    //-----------------
    $('input#btn1').click(function(){
        var script = document.createElement('script');
        var scriptId = "id_" + (new Date()).getTime();
        scropt.setAttribute("id" , scriptId);
        document.getElementById('result1').appendChild(script);
        var func = "json_data_" + scriptId;
        script.src = "http://test4.com:81/XSS/server2/purejs.jsonp.php?func=" + func;
        
        script.onload = function(){
          console.log('onload');  
          var data = func();
            console.log(data);
        };
    });
    //****************************
    
});