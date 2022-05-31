jQuery(function($) {
    $('#toggle-fooTdimes').bind("click",function (e) { 
        $.ajax({
            type: "GET",
            url: "getFoodTimes",
            data: $(this).serialize(),
            success: function (data) {
                var table="";
                data.forEach(obj => {
                    Object.entries(obj).forEach(([key, value]) => {
                     if (key==='foodTimesName') {
                         
                         table=table+'<tr><td>'+value+'</td><td></td></tr>';                     
                     }
                    });                              
                  }); 
                  document.getElementById('foodTimesTable').innerHTML=table;  
                  console.log("eecho");           
            },
            error: function(error){
                console.log(error);
            }
            
        });
        
    });
    
    
}
);