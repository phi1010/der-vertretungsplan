var ownurlpatt = /der-vertretungsplan\.de\.vu/;

function addEvent(obj, evType, fn){
  if (obj.addEventListener){
    obj.addEventListener(evType, fn, false);
    return true;
  } else if (obj.attachEvent){
    var r = obj.attachEvent("on"+evType, fn);
    return r;
  } else {
    return false;
  }
}
function getEventTarget(e){
	//by Peter Paul Koch - http://www.quirksmode.org/js/events_compinfo.html#link7
	return (e.target) ? e.target : e.srcElement
}

blankclick = function(e){
	var tg = getEventTarget(e);
	if ( tg.tagName.toLowerCase() == 'a' ) {
		tg.target ='_blank';
	} else if ( tg.parentNode.tagName.toLowerCase() == 'a' ) {
		tg.parentNode.target ='_blank';
	}
	return true;
}


onPageLoad = function(){
	var doclinks = document.getElementsByTagName("a");
	for (var i = 0; i < doclinks.length; i++) {
	//alert(doclinks[i].href);
		if ( doclinks[i].rel == 'noblank' ) {
			;
		}
		else if ( ! doclinks[i].href.match(ownurlpatt) && ! doclinks[i].href.match(/^(mailto|javascript):/) ) {
		  if ( doclinks[i].attributes['title'] ) {
		  	doclinks[i].attributes['title'].value =  "external link - new window: " + doclinks[i].attributes['title'].value;
		  }
		  addEvent(doclinks[i], "click", blankclick);
		}
	}
}
	
window.onload = onPageLoad;