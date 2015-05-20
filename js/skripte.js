var shfaq_div_ndrysho_foto_profili_hapur=false;
var cv_hapur=false; 
var tema_hapur=false; 
var ndrysho_pas_hapur=false; 
var ndrysho_cv_hapur=false; 
var menu_djathtas_hapur=false;
function shfaq_menu_djathtas(){
	if(menu_djathtas_hapur){
			    document.getElementById("img_men_ndrysho").style.display="block";
				$(".menu_ndrysho_container").animate({'right':'-300px'});
				menu_djathtas_hapur=false;
		}else{
			    document.getElementById("img_men_ndrysho").style.display="none";
				$(".menu_ndrysho_container").animate({'right':'0px'});
				menu_djathtas_hapur=true;
				
		}
}
function shfaq_div_ndrysho_cv(){
	if(ndrysho_cv_hapur){
				$("#but_ndr_cv").slideDown('normal');
				$("#div_ngarko_cv").slideUp('normal');
				ndrysho_cv_hapur=false;
		}else{
			    $("#but_ndr_cv").slideUp('normal');
				$("#div_ngarko_cv").slideDown('normal');
				ndrysho_cv_hapur=true;
		}
}
function hap_mbyll_cv(){
	if(cv_hapur){
				$(".cv_div").slideUp('normal');
				document.getElementById('but_hap_cv').value='Hap CV e studentit';
				cv_hapur=false;
		}else{
			if(tema_hapur){
				$(".tema_div").slideUp('normal');
				document.getElementById('but_hap_tema').value='Hap temen e diplomes';
				tema_hapur=false;
		     }
				$(".cv_div").slideDown('normal');
				document.getElementById('but_hap_cv').value='Mbyll CV e studentit';
				
				cv_hapur=true;
		}
}
function umor_cv(eventi){
	if(eventi==1){
		$("#konfirmo_cv").slideDown('normal');
		}
	else {
		document.getElementById("ngarko_cv").value="";
		shfaq_div_ndrysho_cv();
		$("#konfirmo_cv").slideUp('normal');
	}
}
function hap_mbyll_teme(){
	if(tema_hapur){
				$(".tema_div").slideUp('normal');
				document.getElementById('but_hap_tema').value='Hap temen e diplomes';
				tema_hapur=false;
		}else{
			if(cv_hapur){
				$(".cv_div").slideUp('normal');
				document.getElementById('but_hap_cv').value='Hap CV e studentit';
				cv_hapur=false;
		      }
				$(".tema_div").slideDown('normal');
				document.getElementById('but_hap_tema').value='Mbyll temen e diplomes';
				
				tema_hapur=true;
		}
}
function shfaq_div_ndrysho_foto_profili(){
	if(shfaq_div_ndrysho_foto_profili_hapur){
				$("#uploadprofilepic").slideUp('normal');
				shfaq_div_ndrysho_foto_profili_hapur=false;
		}else{
				$("#uploadprofilepic").slideDown('normal');
				shfaq_div_ndrysho_foto_profili_hapur=true;
		}
}
function umor_foto(eventi){
	if(eventi==1){
		document.getElementById("upload_pic_path").value=document.getElementById("ngarko").value.replace(/^.*\\/, "");
		$("#konfirmo_foto").slideDown('normal');
		}
	else {
		document.getElementById("upload_pic_path").value="Zgjidhni nje foto ...";
		document.getElementById("ngarko").value="";
		shfaq_div_ndrysho_foto_profili();
		$("#konfirmo_foto").slideUp('normal');
	}
}
function shfaq_div_ndrysho_pas(){
	if(ndrysho_pas_hapur){
				$("#ndryshofjalkalimindiv").slideUp('normal');
				$("#ndryshofjalkalimintext").slideDown('normal');
				ndrysho_pas_hapur=false;
		}else{
				$("#ndryshofjalkalimindiv").slideDown('normal');
				$("#ndryshofjalkalimintext").slideUp('normal');
				ndrysho_pas_hapur=true;
		}
}
function kerko(tipi_output){
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
        if(tipi_output==0) $("#divi_i_rezultatit").html(temphtml+"<a href='student.php?student="+json[i]["stud_id"]+"'> <div class='rezdivleft' ><div id='div_rez_foto'><img src='"+json[i]["s_foto"]+"' width='70'></div><h4 id='div_rez_emer'>"+json[i]["s_emri"]+" "+json[i]["s_mbiemri"]+"</h4><h5 id='div_rez_dega'>Email:&nbsp;<i>"+json[i]["s_email"]+"</i></h5> <h5 id='div_rez_dega'>Dega:&nbsp;<i>"+json[i]["s_dega"]+"</i></h5> <h5 id='div_rez_adresa'>Adresa:&nbsp;<i>"+json[i]["s_adr"]+"</i></h5></div></a>");
        else if(tipi_output==1) $("#divi_i_rezultatit").html(temphtml+"<a href='admin_student.php?student="+json[i]["stud_id"]+"'> <div class='rezdivleft' ><div id='div_rez_foto'><img src='"+json[i]["s_foto"]+"' width='70'></div><h4 id='div_rez_emer'>"+json[i]["s_emri"]+" "+json[i]["s_mbiemri"]+"</h4><h5 id='div_rez_dega'>Email:&nbsp;<i>"+json[i]["s_email"]+"</i></h5> <h5 id='div_rez_dega'>Dega:&nbsp;<i>"+json[i]["s_dega"]+"</i></h5> <h5 id='div_rez_adresa'>Adresa:&nbsp;<i>"+json[i]["s_adr"]+"</i></h5></div></a>");
        
	
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
function shfaq_listen_e_studentave(){
	var json,i;
	json=JSON.parse(httpGet("lista_studentave.php"));
    i=0;
    document.getElementById("divi_listes_se_studentave").innerHTML="";//fshijem divin
    document.getElementById("divi_listes_se_studentave").style.display="inline-block";
    //$("#divi_listes_se_studentave").css("width","100%");
    if(json[0][0]!=undefined)//kontrollojme nese kemi ndonje rezultat
	while(json[i]!=undefined){ // printojme rezultatet 
		
       document.getElementById("divi_listes_se_studentave").innerHTML+="<a href='admin_student.php?student="+json[i]["stud_id"]+"'> <div class='rezdivleft' ><div id='div_rez_foto'><img src='"+json[i]["s_foto"]+"' width='70'></div><h4 id='div_rez_emer'>"+json[i]["s_emri"]+" "+json[i]["s_mbiemri"]+"</h4><h5 id='div_rez_dega'>Email:&nbsp;<i>"+json[i]["s_email"]+"</i></h5> <h5 id='div_rez_dega'>Dega:&nbsp;<i>"+json[i]["s_dega"]+"</i></h5> <h5 id='div_rez_adresa'>Adresa:&nbsp;<i>"+json[i]["s_adr"]+"</i></h5></div></a>";
        
	   i++;
	}
	
	alert("ok");
}
