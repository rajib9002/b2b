<div class='form_content' style="width:880px;">    
<h3><?=$page_title ?></h3>    
<form action='<?=site_url('static_pages/save/'.$content); ?>' method='post'>        
<table cellpadding=0 cellspacing=1 width="100%" align="center">           
 <tbody>                <tr>                    
<td><input type='submit' name='save' value='Save' class="button" /> 
<input type='button' value='cancel' class="cancel" /></td>               
 </tr>               
 <tr>                
    <td>                    
    <textarea name='static_content' id='content' rows="5" cols="40">                          
  <?=read_file(FRONT_END ."views/static/".$content .".php"); ?>                       
 </textarea>                    </td>                </tr>           
 </tbody>        </table>  
  </form>
</div>