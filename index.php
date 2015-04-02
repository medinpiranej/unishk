<?php
     include 'php/func.php';
	 
	 session_start();
	 
	 if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
	 else $perd=-1;
	 
	 if(isset($_GET['login']))$kat="Login";
	 else $kat="Miresevini";
	 
	 shfaq_koken_e_faqes($kat,"");
?>
<div class="content" id="kerko_id" >
	<div id="divqendror" > 
	   	<div id="filtersearchdiv" class="topfilterdiv">
            
        </div>
       <div class="searchdiv" >
           
               <input type="text" name="search" id="search" placeholder="Kerko student ...">
               <input type="button" name="searchbtn" onclick="kerko(0)" id="searchbtn" value="Kerko">
    
       </div>
	   	<div id="filtersearchdiv" class="bottomfilterdiv">
	         <div id="divheaderlabel">
	          Filtro kerkimin
	          </div>
	          <div id="filteritemdiv">
	               <div id="divheaderlabelgray">
	                Dega
	               </div>
	               <select id="combobox">
                    <option value="informatike" selected="selected">Informatike</option>
                   <option value="matematike">Matematike</option>
                   <option value="fizike">Fizike</option>
                   <option value="letersi">Letersi</option>
                   </select>
	           </div>
	           <div id="filteritemdiv">
	                <div id="divheaderlabelgray">
	                Gjinia
	               </div>
	              <select id="combobox">
                 <option value="mashkull" selected="selected">Mashkull</option>
                  <option value="femer">Femer</option>
                 </select>
	          </div>
	         <div id="filteritemdiv">
	              <div id="divheaderlabelgray">
	              Qyteti
	 			 </div>
				   <select id="combobox">
                 <option value="shkoder" selected="selected">Shkoder</option>
                  <option value="lezhe">Lezhe</option>
				  <option value="tirane">Tirane</option>
				  <option value="durres">Durres</option>
				  <option value="etj">etj...</option>
                 </select>
	  		</div>
	  		 <div id="filteritemdiv">
	   			<div id="divheaderlabelgray">
	  			 Mosha
	  			</div>
				 <select id="combobox">
                 <option value="18" selected="18">18</option>
                  <option value="19">19</option>
				  <option value="20">20</option>
				  <option value="21">21</option>
				  <option value="22">22</option>
				  <option value="23">23</option>
				  <option value="24">24</option>
				  <option value="25">25</option>
				  <option value="26">27</option>
				  
                 </select>
	  		</div>
	  		<div id="filteritemdiv">
	  			 <div id="divheaderlabelgray">
	   				Viti 
	  			</div>
				<select id="combobox">
                 <option value="1" selected="1">1 (I pare)</option>
                  <option value="2">2 (I dyte)</option>
				  <option value="3">3 (I trete)</option>
				  </select>
	  		</div>
	  </div>
	 <div id="divi_i_rezultatit" >
	 	<img src="img/loadingimg.gif" width="100">
	 	
	 </div>
	   
	   
	   </div>
    </div><!--fundi i DIV content -->

<?php shfaq_footer(""); ?>

