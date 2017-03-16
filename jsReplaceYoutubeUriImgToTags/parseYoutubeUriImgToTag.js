function parseYoutubeUriImgToTag($string){
	var __imgRegex = /\.(?:jpe?g|gif|png)$/i;
	var __YouRegex = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
	var __urlRegexHttp = /(\b(http|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
	var __urlRegex = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
	var exp = __urlRegex;
	return $string.replace(exp,function(url){ 
		__imgRegex.lastIndex=0;
   		// youtube
		if(__YouRegex.test(url)){			
			if (url.indexOf('embed') < 0) {
			    var u = url.match(__YouRegex);
			    if (u && u[2].length == 11) {			    	
			        return '<iframe width="300" height="166" src="//www.youtube.com/embed/' + u[2]+ '" frameborder="0" allowfullscreen></iframe>';
			    } else {
			        return url;
			    }
			}
        }
        if(__urlRegexHttp.test(url)){
        	return '<a href="'+url+'" target="_blank" class="links external">'+url+'</a>'; 
        }else if(__imgRegex.test(url)){
            return '<img src="'+url+'" class="links external" />';
        }else{
			return '<a href="'+url+'" target="_blank" class="links external">'+url+'</a>'; 
		}
	});
}
