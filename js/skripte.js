function shfaq_login(){
	$("#kerko_id").slideUp('normal');
	$("#login_id").slideDown('normal');
}
function kerko(){
	var json,kerko,i;
	kerko=document.getElementById("search").value;
	document.getElementById("filtersearchdiv").style.display="none";
	document.getElementById("divi_i_rezultatit").style.display="inherit";
	
    json=JSON.parse(httpGet("kerko.php?kerko="+kerko));
    i=0;
    document.getElementById("divi_i_rezultatit").innerHTML="";//fshijem divin
    if(json[0][0]!=undefined)//kontrollojme nese kemi ndonje rezultat
	while(json[i]!=undefined){ // printojme rezultatet 
	document.getElementById("divi_i_rezultatit").innerHTML+="<div style='rez'><a href='student.php?student="+json[i]["stud_id"]+"'>"+json[i]["emri"]+" "+json[i]["mbiemri"]+"</a> ktu do fusim te dhena te tjera mrapa </div>";
    i++;
    }
    else document.getElementById("divi_i_rezultatit").innerHTML="nuk u gjet gje"+json[0];
    
}

function httpGet(theUrl){
    var xmlHttp = null;
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
	