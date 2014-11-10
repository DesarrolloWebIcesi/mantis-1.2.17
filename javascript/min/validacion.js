function isEmailAddress (theElement)
{
  var s = theElement.value;
  var localPartfilter1 = /^[^<>()\[\]\x5C.,;:@" ]+(\.[^<>()\[\]\x5C.,;:@" ]+)*@$/;
  var localPartfilter2 = /^"[^\r\n]+"@$/;
  var domainfilter = /^([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]|[a-zA-Z0-9])(\.([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]|[a-zA-Z0-9]))*$/;
  var sepPos = 0;
  var localPart;
  var domain;
  var localPartOk = false;
  var domainOk    = false;
  sepPos = s.lastIndexOf("@");
  localPart = s.substring(0,sepPos+1);
  domain    = s.substring(sepPos+1,s.length);
  if (localPartfilter1.test(localPart)){
    localPartOk = true;
  }
  else if (localPartfilter2.test(localPart)){
    localPartOk = true;
  }
  else{
    localPartOk = false;
  }
  if (domainfilter.test(domain)){
    if(domain.indexOf(".") > 1){
      domainOk = true;
		}
    else{
      domainOk = false;
    }
	}
  else{
    domainOk = false;
  }
  if ( (localPartOk==true && domainOk==true)||(s=="") ){
    return true;
  }
  else{
    alert("Por favor ingrese una dirección de correo electrónico válida" );
  }
  theElement.focus(); 
  theElement.select(); 
  return false;
}