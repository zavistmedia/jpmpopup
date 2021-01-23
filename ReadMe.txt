To test, just change index.html
add image, video file locations etc

Note: You will need to add your own image and video sources to index.html for them to work.

About Comment Section

To make comment section work, be sure chmod the "dbs" folder to 777
The comment section requires jQuery lib "jq.js" for the Ajax helper functions in index.html
Note: This is just for demo purposes, and I do recommend using a db system to store and get comments for better management.

/*

 // JPM Pop-up
 // COPYRIGHT (C) 2020 James P. Malloy. ALL RIGHTS RESERVED
 // http://www.jpmalloy.com
 // james (@) jpmalloy.com
 // Credit must stay intact for legal use
 // Version 4 (build 5.4)
 // *** 100% free, do with what you like ***
 // Note: much of this code will be condensed soon. For example, document.getElementById will be replaced etc
 // No outside plugins required for the main script
 // Feel free to share with others
 
 // example usage
 function popUp(){
	jpmx2.item = {
	'id':'1',
	'type':'image',
	'file':'x.jpg',
	'html':'<div class="wrap-container"><div class="left-column" id="left-column"></div><div class="right-column" id="right-column"><div style="padding:20px"><h2>Comments</h2><p>comment interface can go here</p></div></div>'
	};
	jpmx2.container = 'test';
	jpmx2.style = 'width:100%;z-index:5;background-color:rgba(0, 0, 0, 0.4)';
	jpmx2.fullScreen(jpmx2.item.html);
}
 
 */