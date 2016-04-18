var Days = ["","Mon","Tue","Wed","Thur","Fri","Sat","Sun"];
var Time =["1:00 A.M.","1:30 A.M.","2:00 A.M.","2:30 A.M.","3:00 A.M.","3:30 A.M.","4:00 A.M.","4:30 A.M.","5:00 A.M.","5:30 A.M.","6:00 A.M.","6:30 A.M.","7:00 A.M.","7:30 A.M.","8:00 A.M.","8:30 A.M.","9:00 A.M.","9:30 A.M.","10:00 A.M.","10:30 A.M.","11:00 A.M.","11:30 A.M.","12:00 P.M.","12:30 P.M.","1:00 P.M.","1:30 P.M.","2:00 P.M.","2:30 P.M.","3:00 P.M.","3:30 P.M.","4:00 P.M.","4:30 P.M.","5:00 P.M.","5:30 P.M.","6:00 P.M.","6:30 P.M.","7:00 P.M.","7:30 P.M.","8:00 P.M.","8:30 P.M.","9:00 P.M.","9:30 P.M.","10:00 P.M.","10:30 P.M.","11:00 P.M.","11:30 P.M.","12:00 A.M.","12:30 A.M."];


// creates the table
function checkschedule(){
        $.ajax({
            url:"GetSchedule.php",
			data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
			dataType: 'json',   
            success: function(data){
				var cat = data[0];
				if (cat == 0)
					newschedule();
				$(document).ready(function() {
					$('div').click(function() {
						$(this).toggleClass("green");
					});
				});
            }
        });

 }
    

function newschedule(){
$('#dynamictable').append('<tr></tr>');
var table = $('#dynamictable').children();
for(i=0;i<Time.length+1;i++){
    for(j=0;j<Days.length;j++){
        if(i==0 )
            table.append('<td>'+Days[j]+'</td>');
        else{
            if(j!=0)
                table.append('<td><div class="green"></div></td>');
            else
                table.append('<td>'+Time[i-1]+'</td>');
        }
    }
    table.append('<tr></tr>');
}
}



$(document).ready(function() {
    $('div').click(function() {
        $(this).toggleClass("green");
    });
});

checkschedule();