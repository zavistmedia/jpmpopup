# jpmpopup
A simple dynamic overlay script

To test, just change index.html
add image, video file locations etc

Note: You will need to add your own image and video sources to index.html for them to work.

About Comment Section

To make comment section work, be sure chmod the "dbs" folder to 777
The comment section requires jQuery lib "jq.js" for the Ajax helper functions in index.html
Note: This is just for demo purposes, and I do recommend using a db system to store and get comments for better management.

 // JPM Pop-up
 // COPYRIGHT (C) 2020 James P. Malloy. ALL RIGHTS RESERVED
 // http://www.jpmalloy.com
 // james (@) jpmalloy.com
 // Credit must stay intact for legal use
 // Version 4 (build 5.4)
 // *** 100% free, do with what you like ***
 // No outside plugins required for the main script
 // Feel free to share with others

HTML

<div class="gallery">
  <div class="item">
    <img src="thumbnail image" alt="" data-file="YouTube video URL" data-id="YT-1" data-type="iframe" data-about="about video" data-allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen" data-width="760px" data-height="515px" />
  </div>
</div>

JavaScript

&#x3C;div class=&#x22;gallery&#x22;&#x3E;
  &#x3C;div class=&#x22;item&#x22;&#x3E;
    &#x3C;img src=&#x22;thumbnail image&#x22; alt=&#x22;&#x22; data-file=&#x22;YouTube video URL&#x22; data-id=&#x22;YT-1&#x22; data-type=&#x22;iframe&#x22; data-about=&#x22;about video&#x22; data-allow=&#x22;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen&#x22; data-width=&#x22;760px&#x22; data-height=&#x22;515px&#x22; /&#x3E;
  &#x3C;/div&#x3E;
&#x3C;/div&#x3E;</pre>
	<p>JavaScript</p>
<pre>
var jpmx = new jpmpopup({
  'container':'popup-container4',
  'style' :'background-color:rgba(0, 0, 0, 0.85);width:100%;z-index:5',
  'onclose' : function () {
    console.log(this);
  },
  'gallery':{
    'animation':'slide',
    'container':'.gallery',
    'thumbnav':'on',
    'onclick': function(item) {

      this.toConsole(this);
      // a thumbnail was clicked, do something
      // use ajax here to pull/get some comments about the image or video etc
      // item.id contains the id of the thumbnail clicked

      // display info etc
      //'+ (this.item.index + 1) +' of '+ this.gallerytotal +' build out navigation like on this page

      item.data = '&#x3C;div style=&#x22;padding:20px&#x22;&#x3E;&#x27;+ item.about +&#x27;&#x3C;p&#x3E;comment interface can go here&#x3C;/p&#x3E;&#x3C;/div&#x3E;';

      item.html = '&#x3C;div class=&#x22;wrap-container&#x22;&#x3E;&#x3C;div class=&#x22;left-column&#x22; id=&#x22;left-column&#x22;&#x3E;&#x3C;/div&#x3E;&#x3C;div id=&#x22;right-column&#x22; class=&#x22;right-column&#x22;&#x3E;&#x27;+item.data+&#x27;&#x3C;/div&#x3E;';

      this.fullScreen(item.html);
    }
  }
});
