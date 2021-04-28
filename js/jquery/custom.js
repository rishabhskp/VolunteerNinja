$(document).ready(function(){	
	$("#slider").easySlider({
		auto: true, 
		continuous: true,
		numeric: true
	});
	
//$('#myModal').modal('hide')
//$('#myModal').modal('show')
// Thumbnil fade effect	
	
	
/*        $('.box').mouseenter(function(e) {
            $(this).children('a').children('.gray').animate({ height: '232', left: '0', top: '0', width: '232'}, 1000);
            $(this).children('a').children('.gray, .color').fadeIn(500);
        }).mouseleave(function(e) {
            $(this).children('a').children('.gray').animate({ height: '232', left: '0', top: '0', width: '232'}, 1000);
            $(this).children('a').children('.gray, .color').fadeOut(500);
        });
*/


// Top Msg hide/show

    $('a.closeMsg').click(function(){
		$(this).parents('#topMsg').slideUp("fast");
		$('header').css({'margin-top':0, 'position':'fixed'});
		$('section.extraMarTop').css({"margin-top":39});
		})
	
if ($('#topMsg').length){
	$('header').addClass('topMsgMar');
	$('section').addClass('topMsgMar');
	$(window).scroll(function () {
		if ($('#topMsg').length){
		var wscroll = $(window).scrollTop();                          
        if ($(this).scrollTop() > 31) {
            $('header').removeClass('topMsgMar');
			$('section.extraMarTop').addClass('scrollTop');
        }
        else {
            $('header').addClass('topMsgMar');
			$('section').addClass('topMsgMar');
			$('section.extraMarTop').removeClass('scrollTop');
        }
		}
    });
	
}
//var hdr = $(".navbar-fixed-top");
//	
//
//	
//    $(window).scroll(function () {
//		if($('#topMsg')){
//		$('header').css({"top":31});
//		var wscroll = $(window).scrollTop();
//		$('.scroll').html(wscroll);
//		//alert();
//        //var mainWrap = $('.mainWrapper').width();
//        //var socialright = Math.floor(((bodywidth - mainWrap) / 2)-89);                          
//        if ($(this).scrollTop() > 31) {
//            hdr.css({
//                "top":0,
//                "margin-top":0,
//				"position":'fixed'
//            });
//
//        }
//        else {
//            hdr.css({
//                "margin-top":31,
//				"position":'static'
//            });
//        }
//		}else{
//			$('header').css({"top":0});
//			}
//    });

	
	
	
	
// Jplayer
	
//<![CDATA[
//$(document).ready(function(){
//
//	new jPlayerPlaylist({
//		jPlayer: "#jquery_jplayer_1",
//		cssSelectorAncestor: "#jp_container_1"
//	}, [
//		{
//			title:"Cro Magnon Man",
//			mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
//		},
//		{
//			title:"Your Face",
//			mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg"
//		},
//		{
//			title:"Cyber Sonnet",
//			mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg"
//		},
//		{
//			title:"Tempered Song",
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg"
//		},
//		{
//			title:"Hidden",
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg"
//		},
//		{
//			title:"Lentement",
//			free:true,
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg"
//		},
//		{
//			title:"Lismore",
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-04-Lismore.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-04-Lismore.ogg"
//		},
//		{
//			title:"The Separation",
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-05-The-separation.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-05-The-separation.ogg"
//		},
//		{
//			title:"Beside Me",
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-06-Beside-me.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-06-Beside-me.ogg"
//		},
//		{
//			title:"Bubble",
//			free:true,
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-07-Bubble.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
//		},
//		{
//			title:"Stirring of a Fool",
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-08-Stirring-of-a-fool.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-08-Stirring-of-a-fool.ogg"
//		},
//		{
//			title:"Partir",
//			free: true,
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-09-Partir.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-09-Partir.ogg"
//		},
//		{
//			title:"Thin Ice",
//			mp3:"http://www.jplayer.org/audio/mp3/Miaow-10-Thin-ice.mp3",
//			oga:"http://www.jplayer.org/audio/ogg/Miaow-10-Thin-ice.ogg"
//		}
//	], {
//		swfPath: "js",
//		supplied: "oga, mp3",
//		wmode: "window"
//	});
//});
//]]>	
	
	
});	


  $.Isotope.prototype._masonryResizeChanged = function() {
    return true;
  };

//  $.Isotope.prototype._masonryReset = function() {
//	// layout-specific props
//	this.masonry = {};
//	this._getSegments();
//	var i = this.masonry.cols;
//	this.masonry.colYs = [];
//	while (i--) {
//	  this.masonry.colYs.push( 0 );
//	}
//	
//	if ( this.options.masonry.cornerStampSelector ) {
//	  var $cornerStamp = this.element.find( this.options.masonry.cornerStampSelector ),
//		  stampWidth = $cornerStamp.outerWidth(true) - ( this.element.width() % this.masonry.columnWidth ),
//		  cornerCols = Math.ceil( stampWidth / this.masonry.columnWidth ),
//		  cornerStampHeight = $cornerStamp.outerHeight(true);
//	  for ( i = ( this.masonry.cols - cornerCols ); i < this.masonry.cols; i++ ) {
//		this.masonry.colYs[i] = cornerStampHeight;
//	  }
//	}
//  };


  $(function(){
    var screenWidht = $(window).width();
	if(screenWidht >= 481){
		var boxSize = 236
		}else {
		var boxSize = 158
			}
    var $container = $('#container');
    
    
      // add randomish size classes
      $container.find('.element').each(function(){
        var $this = $(this),
            number = parseInt( $this.find('.number').text(), 10 );
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.isotope({
      itemSelector : '.element',
      masonry : {
        columnWidth : boxSize,
        cornerStampSelector: '.corner-stamp'
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        name : function ( $elem ) {
          return $elem.find('.name').text();
        }
      }
    });
      
    
      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });


    
      $('#insert a').click(function(){
        var $newEls = $( fakeElement.getGroup() );
        $container.isotope( 'insert', $newEls );

        return false;
      });

      $('#append a').click(function(){
        var $newEls = $( fakeElement.getGroup() );
        $container.append( $newEls ).isotope( 'appended', $newEls );

        return false;
      });


    
//      // change size of clicked element
//      $container.delegate( '.element', 'click', function(){
//        $(this).toggleClass('large');
//        $container.isotope('reLayout');
//      });
//
//      // toggle variable sizes of all elements
//      $('#toggle-sizes').find('a').click(function(){
//        $container
//          .toggleClass('variable-sizes')
//          .isotope('reLayout');
//        return false;
//      });


//    var $sortBy = $('#sort-by');
//    $('#shuffle a').click(function(){
//      $container.isotope('shuffle');
//      $sortBy.find('.selected').removeClass('selected');
//      $sortBy.find('[data-option-value="random"]').addClass('selected');
//      return false;
//    });
    
  });
  
  
  
  
