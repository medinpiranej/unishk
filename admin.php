<?php
     include 'php/func.php';
     session_start();
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else $admin=-1;
     
     if($admin==-1)header("location: hyr_admin.php");

     
      $perd=-1;
     $kat="admin ";
     shfaq_koken_e_faqes($kat,"");// te krijohet koka e faqes per adminat #########
?>
<div class="content" id="kerko_id" >
    <div id="divqendror" > 
        <div id="filtersearchdiv" class="topfilterdiv">
            
        </div>
       <div class="searchdiv" >
           
               <input type="text" name="search" id="search" placeholder="Kerko student ...">
               <input type="button" name="searchbtn" onclick="kerko(1)" id="searchbtn" value="Kerko">
           
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
       <input type="button" onclick="shfaq_listen_e_studentave()" value="lista e studentave te mi" />
       <a href="kolege.php">Kolege e mi</a>
       <a href="log.php">log mbi aktivitetin e faqes</a>
       <div style="display: none" id="divi_listes_se_studentave">
       	
       </div>
       </div>
    </div><!--fundi i DIV content -->

<?php shfaq_footer(""); ?>

