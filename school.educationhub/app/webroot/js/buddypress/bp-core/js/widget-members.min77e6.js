/*! buddypress - v2.2.1 - 2015-02-17 11:13:54 PM UTC - https://wordpress.org/plugins/buddypress/ */
function member_widget_response(a){a=a.substr(0,a.length-1),a=a.split("[[SPLIT]]"),"-1"!==a[0]?jQuery(".widget ul#members-list").fadeOut(200,function(){jQuery(".widget ul#members-list").html(a[1]),jQuery(".widget ul#members-list").fadeIn(200)}):jQuery(".widget ul#members-list").fadeOut(200,function(){var b="<p>"+a[1]+"</p>";jQuery(".widget ul#members-list").html(b),jQuery(".widget ul#members-list").fadeIn(200)})}jQuery(document).ready(function(){jQuery(".widget div#members-list-options a").on("click",function(){var a=this;return jQuery(a).addClass("loading"),jQuery(".widget div#members-list-options a").removeClass("selected"),jQuery(this).addClass("selected"),jQuery.post(ajaxurl,{action:"widget_members",cookie:encodeURIComponent(document.cookie),_wpnonce:jQuery("input#_wpnonce-members").val(),"max-members":jQuery("input#members_widget_max").val(),filter:jQuery(this).attr("id")},function(b){jQuery(a).removeClass("loading"),member_widget_response(b)}),!1})});