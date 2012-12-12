function tabshow(a){document.getElementById(a).style.visibility="visible";}
function tabhide(a){document.getElementById(a).style.visibility="hidden";}

function changelocation(action)
    {
        if( !isSelected() ) {
            alert('Please select an option from the table above.');
            return false;
        } else {
            document.getElementById('product').action=action;
            document.getElementById('product').target='_self';
            document.getElementById('product').submit();
            return true;
        }
    }
    var isSelected = function() {
        var radioObj = document.product.subid;
        //console.log('hello');   // for just 1 checkbox, the code shows the length of radioObj as 'undefined'
        if(radioObj.length){
            for(var i=0; i<=radioObj.length; i++) {
                if( radioObj[i].checked ) {
                    //console.log('inside multiple and true');
                    return true;
                }
            }
        } else {
            if (document.product.subid.checked) {
                //console.log('inside single and true');
                return true;
            } else{
                //console.log('inside single and false');
                return false;
            };
        }
        //console.log('outside and false');
        return false;
    };
//-------------------------------------------------------------------------------------
//----------------------All jquery functions to be written below---------------------//
$(document).ready(function() {

$('input[name="sameaddr"]').change(function(){
    $('div.address').toggle(200);
  if($('input[name="sameaddr"]').is(':checked')){
    $('.removeattr').removeAttr('required');
  } else {
    $('.removeattr').attr('required','');
  }
});
//--------------------------------------------------------------------------------//
/*
$('#account').hover(function() {
		$('#sign a').stop().animate({"background-color": "#ffc200","color": "#000","padding": "5px"},1);
	},function() {
		$('#sign a').stop().animate({"background-color": "#000000"},1);	}
);
*/
//--------------------------------------------------------------------------------//
/*
$('.main-nav-tab').hover(function() {
		$(this).stop().animate({"background-color": "#ffc200"},"fast");
	},function() {
		$(this).stop().animate({"background-color": "#000000"},100);
	
});
*/
/*-------------------------------------------------------------------*/
/*                         Main Navigation
/*-------------------------------------------------------------------*/
$(function() {
    var $mainNav = $('#main-nav'),
    navWidth = $mainNav.width();
    //console.log(navWidth);
    
    $mainNav.children('.main-nav-item').hover(function(ev) {
        var $this = $(this),
        $dd = $this.find('.main-nav-dd');
		$this.find('.main-nav-tab').addClass('opposite');
        
        // get the left position of this tab
        var leftPos = $this.find('.main-nav-tab').position().left;
        //console.log('Left Position = ',leftPos);
        
        // get the width of the dropdown
        var ddWidth = $dd.width(),
        leftMax = navWidth - ddWidth;
        //console.log('Dropdown\'s width = ',leftMax);
        
        // position the dropdown
        $dd.css('left', Math.min(leftPos, leftMax) );
        
        // show the dropdown
        $this.addClass('main-nav-item-active');
    }, function(ev) {

        // hide the dropdown
        $(this).removeClass('main-nav-item-active');
		 $(this).find('.main-nav-tab').removeClass('opposite');
		});
	});

/*-------------------------------------------------------------------*/
/*                         Rating System Display
/*-------------------------------------------------------------------*/

var ratingdiv=$('#rating');
var rating = ratingdiv.attr('data-rating');
ratingdiv.find('a.ratinglink').hover(
     function() {   //   Manages the mouseover function
          $(this).prevAll().andSelf().children('img.left').attr("src","img/star_green.png");
          $(this).nextAll().children('img.left').attr("src","img/star_gray.png");
     },
     function(){    //   Manages the mouseout function
          ratingdiv.find('a.ratinglink').children('img.left').attr("src","img/star_gray.png");
          for (var i = 1; i <= rating; i++) {
               ratingdiv.find('.star_'+i).attr("src","img/star_green.png");
          };
     }
);
/*-------------------------------------------------------------------*/
/*                         Header Hover Boxes
/*-------------------------------------------------------------------*/
var login = $('#logindiv').attr('data-login');
if (login =='no') {
    $("#logindiv").hover(
        function () {
            $('#login').stop().fadeIn(200);
        },
        function () {
            $('#login').stop().delay(800).fadeOut(800);
        }
    );
}
/*-------------------------------------------------------------------*/
/*                         FAQ Styling
/*-------------------------------------------------------------------*/
$("span.answer").hide();
$("li.answer").click(function () {
    $(this).next("span.answer").toggle(500);
});
/*-------------------------------------------------------------------*/
/*                         Registration Form Validation
/*-------------------------------------------------------------------*/
$('#rptpwd').blur(function() {
     var rptpwd    =    $(this);
     var newpwd    =    $('#newpwd');
     if (rptpwd.val() !== newpwd.val()) { 
          alert('Your passwords do not match !');
          return false;
     } else{
          return true;  
     };
});
$('#rptemail').blur(function() {
     var rptemail    =    $(this);
     var newemail    =    $('#newemail');
     if (rptemail.val() !== newemail.val()) { 
          alert('Your emails do not match !');
          return false;
     } else{
          return true;  
     };
});
/*
$('.details').hide();

$('.product4,.product3').hover(function() {
		$(this).stop().animate({"border-bottom-color": "#ffc200"},100);
		$(this).children().last().stop().show();
	},function() {
		$(this).stop().animate({"border-bottom-color": "#ffffff"},100);
		$(this).children().last().stop().hide();
	}
);
*/
/*-------------------------------------------------------------------*/
/*                         Customise Form Validation
/*-------------------------------------------------------------------*/
$('#customiseform').submit(function () {
    var duffel = ['name', 'flag', 'url', 'logo1', 'logo2', 'logo3'],
        minitour = ['name', 'flag', 'url', 'logo1', 'logo2', 'logo3', 'logo4', 'logo5', 'logo6'],
        shoe = ['name', 'flag', 'url', 'logo1', 'logo2'],
        staff = ['name', 'flag', 'url', 'logo1', 'logo2', 'logo3', 'logo4', 'logo5', 'logo6', 'logo7'],
        tour = ['name', 'flag', 'url', 'logo1', 'logo2', 'logo3', 'logo4', 'logo5', 'logo6', 'logo7', 'logo8'],
        page = $('#customiseform').attr('name'),
        arr = [];
    switch (page) {
    case ('duffel'):
        arr = duffel;
        break;
    case ('minitour'):
        arr = minitour;
        break;
    case ('shoe'):
        arr = shoe;
    break;
        case ('staff'):
        arr = staff;
        break;
    case ('tour'):
        arr = tour;
        break;
    default:
        alert('error');
    }
//-------------------------------------------------------
    var cerr = 0,       // Checkbox Error
        lerr = 0,       // Logo Upload Error
        verr = 0,       // Value Error
        perr = 0,       // Position Error
        count = 0,      // Total Count
        counterr = 0,   // Count Error
        conflicterr = 0,
        quantityerr = 0,
        cmsg = '',
        lmsg = '',
        vmsg = '',
        pmsg = '',
        countmsg = '',
        conflictmsg = '',
        positionlist = '',
        quantitymsg = '';
    jQuery.each(arr, function () {
        var posvalue = $('[name="' + this + 'position"]').val(),
            valvalue = $('[name="' + this + 'value"]').val(),
            checkbox = $('[name="' + this + '"]').is(':checked'),
            filvalue = $('[name="' + this + 'file"]').val(),
            checkval = $('[name="' + this + '"]:checked').val();

        if (posvalue != 0) {
            if (!checkbox) {
                if (cmsg.indexOf(this) == -1) { cmsg += this+', '; }
                cerr++;
            }
            if (!(checkval == "no" )) {
                if (this.indexOf('logo') != -1) {
                    if (filvalue == '') {
                        if (lmsg.indexOf(this) == -1) { lmsg += this+', '; }
                        lerr++;
                    }
                } else {
                    if (valvalue == '') {
                        if (vmsg.indexOf(this) == -1) { vmsg += this+', '; }
                        verr++;
                    }
                }
            }
        }

        if (this.indexOf('logo') == -1 && valvalue != '') {
            if(!checkbox){
                if (cmsg.indexOf(this) == -1) { cmsg += this+', '; }
                cerr++;
            }
            if (!(checkval == "no" ) && posvalue == 0) {
                if (pmsg.indexOf(this) == -1) { pmsg += this+', '; }
                perr++;
            }
        }

        if (checkval == "yes") {
            if (this.indexOf('logo') != -1) {
                if (filvalue == '') {
                    if (lmsg.indexOf(this) == -1) { lmsg += this+', '; }
                    lerr++;
                }
            } else {
                if (valvalue == '') {
                    if (vmsg.indexOf(this) == -1) { vmsg += this+', '; }
                    verr++;
                }
            }
            if (posvalue == 0) {
                if (pmsg.indexOf(this) == -1) { pmsg += this+', '; }
                perr++;
            }
        }

        if (this.indexOf('logo') != -1 && filvalue != '') {
            if(!(checkval == "no" ) && posvalue == 0){
                if (pmsg.indexOf(this) == -1) { pmsg += this+', '; }
                perr++;
            }
            if(!checkbox){
                if (cmsg.indexOf(this) == -1) { cmsg += this+', '; }
                cerr++;
            }
        }

        if (checkval == "yes" && posvalue != '0') {
            var exists = positionlist.indexOf(posvalue);
            if (exists != -1) {
                var spacepos = positionlist.indexOf(' ',exists);
                if (posvalue == '10' || posvalue == '11') {
                    var theother = positionlist.substring(exists+2,spacepos);
                } else{
                    var theother = positionlist.substring(exists+1,spacepos);
                };
                conflictmsg += this+' & '+theother+', ';
                conflicterr++;
            } else {
                positionlist += posvalue+this+' ';
            }
            //console.log(conflictmsg + '\n');
        }

        if (page == 'shoe') {
            if (checkval == "yes" && posvalue != '0'){
                count++;
            }
            if (count > 2) {
                counterr++;
            }
            if ($('[name="quantity"]').val() < 50) {
                quantityerr++;
            }
        }
        if (page == 'duffel') {
            if (checkval == "yes" && posvalue != '0'){
                count++;
            }
            if (count > 3) {
                counterr++;
            }
            if ($('[name="quantity"]').val() < 50) {
                quantityerr++;
            }
        }
    });
  //-------------------------------------------------------
    $("#error ul").empty();
    if ((cerr != 0) || (lerr != 0) || (verr != 0) || (perr != 0) || (conflicterr != 0) || (counterr != 0) || (quantityerr != 0)) {
        $("#error").css('display','block');
    }
    if(cerr > 0){
        cmsg = cmsg.slice(0, -2);
        cerror = "<li>Check Yes or No, as applicable for the presence of "+cmsg+" on the bag.</li>";
        $('#error ul').append(cerror);
    };
    if (lerr > 0) {
        lmsg = lmsg.slice(0, -2);
        lerror = "<li>Please upload a file for "+lmsg+".</li>";
        $('#error ul').append(lerror);
    };
    if(verr > 0){
        vmsg = vmsg.slice(0, -2);
        verror = "<li>Please fill in the field for "+vmsg+".</li>";
        $('#error ul').append(verror);
    };
    if(perr > 0){
        pmsg = pmsg.slice(0, -2);
        perror = "<li>Please provide a position for "+pmsg+" on the bag.</li>";
        $('#error ul').append(perror);
    };
    if(conflicterr > 0){
        conflictmsg = conflictmsg.slice(0, -2);
        conflicterror = "<li>There was a position conflict for the placement of "+conflictmsg+" on the bag.</li>";
        $('#error ul').append(conflicterror);
    };
    if(counterr > 0){
        if (page == 'duffel') { var number = 3; } else if (page == 'shoe') { var number = 2; }
        countmsg = "<li>Sorry, you can only select " + number + " customised embroideries on this product</li>";
        $('#error ul').append(countmsg);
    };
    if(quantityerr > 0){
        quantitymsg = "<li>Sorry, the minimum order is 50 Pieces.</li>";
        $('#error ul').append(quantitymsg);
    };
    if ((cerr != 0) || (lerr != 0) || (verr != 0) || (perr != 0) || (conflicterr != 0) || (counterr != 0) || (quantityerr != 0)) {
        return false;
    } else {
        $("#error ul").empty();
        $("#error").css('display','block');
        $('#error ul').append('<li>It may take some time for your files to upload depending on your internet connection. Please do not refresh while the upload is taking place. Thank you!</li>');
    }
});
/*-------------------------------------------------------------------*/
/*              Pinterest pin-it button margin resetting
/*-------------------------------------------------------------------*/
/*
$('div.recommend a').filter(function() { return this.id.match(/pin_it_button/);    }).css("margin-top","-25px");
*/
});