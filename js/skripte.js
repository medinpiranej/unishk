function kerko(){
	var json,kerko,i;
	kerko=document.getElementById("search").value;
    var cont =$(".bottomfilterdiv").html();
    
    $(".topfilterdiv").css('display','inline-block');
	$(".topfilterdiv").html(cont);
     $(".bottomfilterdiv").hide();
    $(".topfilterdiv").hide();
   
   
     $(".topfilterdiv").slideDown('normal');
	document.getElementById("divi_i_rezultatit").style.display="block";
	
    json=JSON.parse(httpGet("kerko.php?kerko="+kerko));
    i=0;
    document.getElementById("divi_i_rezultatit").innerHTML="";//fshijem divin
    document.getElementById("divi_i_rezultatit").style.display="inline-block";
   $("#divi_i_rezultatit").css("width","100%");
    if(json[0][0]!=undefined)//kontrollojme nese kemi ndonje rezultat
	while(json[i]!=undefined){ // printojme rezultatet 
         var temphtml =$("#divi_i_rezultatit").html();
        $("#divi_i_rezultatit").html(temphtml+"<a href='student.php?student="+json[i]["stud_id"]+"'> <div class='rezdivleft' ><div id='div_rez_foto'><img src='"+json[i]["s_foto"]+"' width='70'></div><h4 id='div_rez_emer'>"+json[i]["s_emri"]+" "+json[i]["s_mbiemri"]+"</h4><h5 id='div_rez_dega'>Email:&nbsp;<i>"+json[i]["s_email"]+"</i></h5> <h5 id='div_rez_dega'>Dega:&nbsp;<i>"+json[i]["s_dega"]+"</i></h5> <h5 id='div_rez_adresa'>Adresa:&nbsp;<i>"+json[i]["s_adr"]+"</i></h5></div></a>");
        
	
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
function umor_foto(eventi){
	if(eventi==1)document.getElementById("upload_pic_path").value=document.getElementById("ngarko").value.replace(/^.*\\/, "");
	else {
		document.getElementById("upload_pic_path").value="Zgjidhni nje foto ...";
		document.getElementById("ngarko").value="";
	}
}
	