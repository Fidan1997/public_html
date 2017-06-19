<?
include $_SERVER['DOCUMENT_ROOT'].'/checkphp.php';
if($ffffff_no == '1'){
		echo $echo_text;
	}else{
?>
 <form name="mailform" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top">
  <p><label for="Name">Adınız: </label>   
    <input required type="text" name="Name" id="Name">
  </p>
  <p><label for="SurName">Soyadınız:</label>
    <input required type="text" name="SurName" id="SurName">
  </p>
  <p><label for="FatherName">Atanızın adı:</label>
    <input required type="text" name="FatherName" id="FatherName">
  </p>
  <p><label for="WorkPlace">İş yeriniz:</label>
    <input required type="text" name="WorkPlace" id="WorkPlace">
  </p>
  <p>
    <label for="Adress">Ünvanınız:</label>
    <input required type="text" name="Adress" id="Adress">
  </p> 
</td>
      <td valign="top"> 
        <p>
          <label for="PhoneNumber">Telefonunuz:</label>
          <input required type="tel"  pattern="\d+"  name="PhoneNumber" id="PhoneNumber">
        </p>
        <p>
          <label for="EmailAdress">E-poçt ünvanınız:</label>
          <input required type="email" name="EmailAdress" id="EmailAdress">
        </p>
        <p>
          <label for="Message">Müraciətin mətni:</label>
          <textarea required name="Message" id="Message" cols="45" rows="5"></textarea>
        </p>
        <p>
        	<div class="g-recaptcha" data-sitekey="6LdfQQwUAAAAAAjZNlAjB9VEDC_DulDDcJMokeQR"></div>
        </p>
        <p>
          <input type="submit" name="submit" id="submit" value="Göndər">
          <input name="s" type="hidden" id="s" value="1">
      </p></td>
    </tr>
  </tbody>
</table></form> 
<? }?>


