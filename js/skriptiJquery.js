
$(document).ready(function () {
    
 
    // Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
	
}

var pageID = getUrlVars()["pageid"];
if (pageID != null ){
	 $("#"+pageID).css('background-color','#1b9bff');
	
	}
	
	var emerstudenti="student";
	$('#butonprofili').html(emerstudenti +"<img id='atagfoto'src='img/def_profile_pic.jpg' alt='foto profili' >");

//funksion per shfaqjen e butonit ngarko dhe anullo kur klikohet buttoni ndrysho foton
$("#ndryshofotobtn").click(function(){
	var currenth = $(".leftdiv").height();
	if(currenth < 350){
	$(".leftdiv").animate({
		height:'350px'
		});
		
		$("#uploadprofilepic").css('display','inline-block');
		$("#uploadprofilepic").fadeIn(slow);
		}
		else if (currenth = 350){
			$("#uploadprofilepic").fadeToggle(300);
			$(".leftdiv").animate({
		height:'300px'
		});
		
			}
	
	});
	
	$("#ndryshofjalkalimintext").click(function(){
		
		$(".rightdiv").animate({
		height:'455px'
		});
		$(this).fadeOut(200);
		$("#ndryshofjalkalimin_kutite").hide();
		$("#ndryshofjalkalimin_kutite").css('display','inline');
		$("#ndryshofjalkalimin_kutite").fadeIn(1000);
		
		});
	
	$("#anullo_pass").click(function(){
		
		$("#ndryshofjalkalimin_kutite").fadeToggle(300);
			$(".rightdiv").animate({
		height:'300px'
		
		});
		$("#ndryshofjalkalimintext").fadeIn(300);
		});
	
	$("#anulo").click(function(){
		
		$("#uploadprofilepic").fadeToggle(300);
			$(".leftdiv").animate({
		height:'300px'
		
		});
	});
	
});