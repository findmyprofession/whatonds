jQuery(document).ready(function() {
    get_post_users();
    
    jQuery('.rating_thumbup').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin === 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                    url:"/wp-admin/admin-ajax.php",
                    type:'POST',
                    data:'action=rate_post&post_id=' + $postID + '&rating=1',
                    dataType: 'html',
                    context: jQuery(this),
                    success:function(results) {
                        jQuery(this).html(results);
                    }
            });
        }
    });
    
    
     jQuery('#rating_thumbup1').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin === 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                    url:"/wp-admin/admin-ajax.php",
                    type:'POST',
                    data:'action=rate_post&post_id=' + $postID + '&rating=1',
                    dataType: 'html',
                    context: jQuery(this),
                    success:function(results) {
                        jQuery(this).html(results);
                    }
            });
        }
    });
    
    
     jQuery('#rating_thumbup2').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin === 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                    url:"/wp-admin/admin-ajax.php",
                    type:'POST',
                    data:'action=rate_post&post_id=' + $postID + '&rating=1',
                    dataType: 'html',
                    context: jQuery(this),
                    success:function(results) {
                        jQuery(this).html(results);
                    }
            });
        }
    });

     jQuery('#rating_thumbup3').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin === 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                    url:"/wp-admin/admin-ajax.php",
                    type:'POST',
                    data:'action=rate_post&post_id=' + $postID + '&rating=1',
                    dataType: 'html',
                    context: jQuery(this),
                    success:function(results) {
                        jQuery(this).html(results);
                    }
            });
        }
    });


    jQuery('.rating_thumbdown').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=rate_post&post_id=' + $postID + '&rating=2',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                }
            });
        }
    });
    
    
      jQuery('#rating_thumbdown1').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=rate_post&post_id=' + $postID + '&rating=2',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                }
            });
        }
    });
    
    
    
       jQuery('#rating_thumbdown2').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=rate_post&post_id=' + $postID + '&rating=2',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                }
            });
        }
    });
    
    
    
     jQuery('#rating_thumbdown3').click(function(){
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=rate_post&post_id=' + $postID + '&rating=2',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                }
            });
        }
    });


    jQuery('.btn-popover-share').click(function(){
        
        var popoverURL = jQuery(this).data('url');
        var btnClicked = jQuery(this);
        var showShareButtomTimer = setInterval(showShareButtons ,1000);

        function showShareButtons() {
           
            console.log('Interval');
            var popoverID = jQuery(btnClicked).attr('aria-describedby');
            /*if(jQuery('#'+popoverID+' .popover-content').length) {
                var popoverContent = jQuery('#'+popoverID+' .popover-content').html();
                if(popoverContent == "Loading...") {*/
                    clearInterval(showShareButtomTimer);
                    
                    var sharbtn = '<a href="https://www.facebook.com/sharer/sharer.php?u='+popoverURL+'" onclick="window.open(this.href, \'twitterwindow\',\'left=20,top=20,width=600,height=300,toolbar=0,resizable=1\'); return false;"><i class="fab fa-facebook"></i> '+
                        '<a href="http://twitter.com/intent/tweet?text='+popoverURL+'" onclick="window.open(this.href, \'twitterwindow\',\'left=20,top=20,width=600,height=300,toolbar=0,resizable=1\'); return false;"><i class="fab fa-twitter"></i> '+
                        '<a href="fb-messenger://share/?link='+popoverURL+'"><i class="fab fa-facebook-messenger"></i> '+
                        '<a href="whatsapp://send?text='+popoverURL+'"><i class="fab fa-whatsapp"></i>';
                        
                        
                        jQuery("#popover-share").html(sharbtn);
                   //jQuery(".popover-share").attr("data-content", sharbtn);
                    
                    var popoverLeft = jQuery('#'+popoverID).css('left');
                    popoverLeft = parseInt(popoverLeft, 10);
                    popoverLeft = popoverLeft - 56.00125;
                    jQuery('#'+popoverID ).css('left', popoverLeft+"px");
               /* } else {
                    //clearInterval(showShareButtomTimer);
                    //jQuery('.popover-content').html("Loading...");
                }
            }*/
        }
    });

    function showShareButtons(){
           
            console.log('Interval');
            var popoverID = jQuery(btnClicked).attr('aria-describedby');
            /*if(jQuery('#'+popoverID+' .popover-content').length) {
                var popoverContent = jQuery('#'+popoverID+' .popover-content').html();
                if(popoverContent == "Loading...") {*/
                    clearInterval(showShareButtomTimer);
                    
                    var sharbtn = '<a href="https://www.facebook.com/sharer/sharer.php?u='+popoverURL+'" onclick="window.open(this.href, \'twitterwindow\',\'left=20,top=20,width=600,height=300,toolbar=0,resizable=1\'); return false;"><i class="fab fa-facebook"></i> '+
                        '<a href="http://twitter.com/intent/tweet?text='+popoverURL+'" onclick="window.open(this.href, \'twitterwindow\',\'left=20,top=20,width=600,height=300,toolbar=0,resizable=1\'); return false;"><i class="fab fa-twitter"></i> '+
                        '<a href="fb-messenger://share/?link='+popoverURL+'"><i class="fab fa-facebook-messenger"></i> '+
                        '<a href="whatsapp://send?text='+popoverURL+'"><i class="fab fa-whatsapp"></i>';
                        
                        
                        jQuery("#popover-share").html(sharbtn);
                   //jQuery(".popover-share").attr("data-content", sharbtn);
                    
                    var popoverLeft = jQuery('#'+popoverID).css('left');
                    popoverLeft = parseInt(popoverLeft, 10);
                    popoverLeft = popoverLeft - 56.00125;
                    jQuery('#'+popoverID ).css('left', popoverLeft+"px");
               /* } else {
                    //clearInterval(showShareButtomTimer);
                    //jQuery('.popover-content').html("Loading...");
                }
            }*/
        }



jQuery('.sharebtncon').click(function(e){
    
      var popoverURL = jQuery(this).data('url');
    
    //alert('here');
    
     /* var sharbtn = '<a href="https://www.facebook.com/sharer/sharer.php?u='+popoverURL+'" onclick="window.open(this.href, \'twitterwindow\',\'left=20,top=20,width=600,height=300,toolbar=0,resizable=1\'); return false;"><i class="fab fa-facebook"></i> '+
                        '<a href="http://twitter.com/intent/tweet?text='+popoverURL+'" onclick="window.open(this.href, \'twitterwindow\',\'left=20,top=20,width=600,height=300,toolbar=0,resizable=1\'); return false;"><i class="fab fa-twitter"></i> '+
                        '<a href="fb-messenger://share/?link='+popoverURL+'"><i class="fab fa-facebook-messenger"></i> '+
                        '<a href="whatsapp://send?text='+popoverURL+'"><i class="fab fa-whatsapp"></i>';*/
       /// var  sharbtn = '<a class="icon icon-facebook icon-replacement" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fab fa-facebook"></i></a><a class="icon icon-facebook icon-replacement" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?><?php echo get_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a><a class="icon icon-facebook icon-replacement" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fab fa-google-plus"></i></a>';               
    //alert('here');
    //$(this).html(sharbtn);
    e.stopPropagation();
    jQuery(this).closest(".sharebtncon").find(".social-share-box").slideToggle();
    
})
    jQuery('.save_event').click(function(){
 
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
    
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=save_post&post_id=' + $postID + '&save=1',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                    
                    jQuery.ajax({
                        url:"/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=get_data&post_id=' + $postID,
                        dataType: 'html',
                        context: jQuery(this),
                        success:function(results) {
                            jQuery("#interested").html(results);
                        }
                    });
                }
            });
            
            
        }
    });
    
    
    
    
     jQuery('#save_event1').click(function(){
 
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
    
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=save_post&post_id=' + $postID + '&save=1',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                    
                    jQuery.ajax({
                        url:"/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=get_data&post_id=' + $postID,
                        dataType: 'html',
                        context: jQuery(this),
                        success:function(results) {
                            jQuery("#interested").html(results);
                        }
                    });
                }
            });
            
            
        }
    });
    
    
     jQuery('#save_event2').click(function(){
 
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
    
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=save_post&post_id=' + $postID + '&save=1',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                    
                    jQuery.ajax({
                        url:"/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=get_data&post_id=' + $postID,
                        dataType: 'html',
                        context: jQuery(this),
                        success:function(results) {
                            jQuery("#interested").html(results);
                        }
                    });
                }
            });
            
            
        }
    });
    
    
    
       jQuery('#save_event3').click(function(){
 
        var $postID=jQuery(this).data( "postid" );
        var $loggedin=jQuery(this).data( "loggedin" );
    
        if($loggedin == 0) {
            // user not logged in - redirect
            window.location = "/login";
        } else {
            // call ajax
            jQuery.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=save_post&post_id=' + $postID + '&save=1',
                dataType: 'html',
                context: jQuery(this),
                success:function(results) {
                    jQuery(this).html(results);
                    
                    jQuery.ajax({
                        url:"/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=get_data&post_id=' + $postID,
                        dataType: 'html',
                        context: jQuery(this),
                        success:function(results) {
                            jQuery("#interested").html(results);
                        }
                    });
                }
            });
            
            
        }
    });
    
});


function get_post_users(){
    var post_id = jQuery("#get_post_id").val();
    
    jQuery.ajax({
        url:"/wp-admin/admin-ajax.php",
        type:'POST',
        data:'action=get_data&post_id=' + post_id,
        dataType: 'html',
        context: jQuery(this),
        success:function(results) {
            jQuery("#interested").html(results);
        }
    });
              
   
}