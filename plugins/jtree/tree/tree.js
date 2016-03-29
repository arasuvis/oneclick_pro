//--------------------------------------------------------------
// Author : Muhammad Irfan
// jugnoon.com / support@jugnoon.com
//---------------------------------------------------------------
// Tree Reference IDs
// me (1), partner (2), ex-partner (3), subling (4), parent (5), child p(6), child ex p (7), male (m), female (f), index (i)
var iDs = [];
var nConnects = [];
// tree information
var maxGen = 4; // unlimited
var genCounter = 0; // stor current stats of generations
var conWidth = 100;
var conHeight = 40;
var pWidth = 90;
var pHeight = 70;
var zout = 0.05;
var currZoom = 1;
var tpt = 0;
var lpt = 0;
var flowchartSettings = {
	stub: [30, 30],
	gap: 0,
	cornerRadius: 0,
	alwaysRespectStubs: true
};
var bezierSettings = {
	curviness: 5
};
var statemachineSettings = {
	curviness: 5
};
var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
var isIE = /*@cc_on!@*/false || !!document.documentMode; // At least IE6
$(function () {
	loadInit();
	//*******************************************************
	// Zoom In / Out Script
	//*******************************************************
	$('#chart-demo').on('mousewheel', function (e) {
	    // enable zoom on chrome or tree is in ready only mode
		if(isChrome || readOnly) {
			var top = ((getHeight() + conHeight) / 2) - ($("#vcart").height() / 2);
			var left = ((getWidth() + conWidth) / 2) - ($("#vcart").width() / 2);
			if (e.deltaY == 1) {
				currZoom = currZoom + zout;
				tpt = tpt + 125;
				lpt = lpt + 125;
				$("#vcart").scrollTop(top + tpt);
				$("#vcart").scrollLeft(left + lpt);
			} else {
				currZoom = currZoom - zout;
				tpt = tpt - 125;
				lpt = lpt - 125;
				$("#vcart").scrollTop(top + tpt);
				$("#vcart").scrollLeft(left + lpt);
			}
			$("#chart-demo").css("zoom", currZoom);
			$("#chart-demo").css("-moz-transform", "Scale(" + currZoom + ")");
			$("#chart-demo").css("-moz-transform-origin", "0 0");
		}
	});
	//*******************************************************
	// PlUploader Script
	//*******************************************************
	var uploader = new plupload.Uploader({
		runtimes: 'gears,html5,flash,silverlight',
		browse_button: 'tchange',
		container: 'modaledthumb',
		max_file_size: maxFileSize,
		url: dn + plUploadHandler,
		flash_swf_url: dn + plupload_flash_url,
		silverlight_xap_url: dn + plupload_silverlight_url,
		filters: [{
			title: "Image files",
			extensions: "jpg,gif,png"
		}]
	});
	uploader.bind('Init', function (up, params) {});
	$('#modaledthumb').on({
		click: function (e) {
			uploader.start();
			e.preventDefault();
			return false;
		}
	}, '#tchange');
	uploader.init();
	uploader.bind('FilesAdded', function (up, files) {
		var count = 0;
		$('#umsg').html("");
		$.each(files, function (i, file) {
			count++;
		});
		if (count > 1) {
			$.each(files, function (i, file) {
				uploader.removeFile(file);
			});
			Display_Message("#modalmsg", "Please select only one photo!", 0, 1);
			return false;
		} else {
			uploader.start();
		}
		up.refresh(); // Reposition Flash/Silverlight
	});
	uploader.bind('UploadProgress', function (up, file) {
		$('#' + file.id + " b").html(file.percent + "%");
	});
	uploader.bind('Error', function (up, err) {
		$('#modalmsg').append("<div>Error: " + err.code +
			", Message: " + err.message +
			(err.file ? ", File: " + err.file.name : "") +
			"</div>"
		);
		up.refresh(); // Reposition Flash/Silverlight
	});
	uploader.bind('FileUploaded', function (up, file, info) {
		var rpcResponse = JSON.parse(info.response);
		var result;
		if (typeof (rpcResponse) != 'undefined' && rpcResponse.result == 'OK') {
			// uploaded successfully
			if (rpcResponse.url != '' && rpcResponse.filetype == 'image') {
				$('#modaledchange').attr('src', rpcResponse.url);
				var nodeid = $('#findex').html();
				$('#' + nodeid).data('photo', rpcResponse.url);
			} else { /* normal */ }
		} else {
			var code;
			var message;
			if (typeof (rpcResponse.error) != 'undefined') {
				code = rpcResponse.error.code;
				message = rpcResponse.error.message;
				if (message == undefined || message == "") {
					message = rpcResponse.error.data;
				}
			} else {
				code = 0;
				message = "Error uploading the file to the server";
			}
			Uploader.trigger("Error", {
				code: code,
				message: message,
				file: File
			});
		}
	});

	//*******************************************************
	// Node Options
	//*******************************************************
	$('#cpartners').on({
		click: function (e) {
			AddParent();
			return false;
		}
	}, '#aparent');
	

	
	 
	$('#cpartners').on({
		click: function (e) {
			// add new mother
			addParents(1); // 1: mother, 0: father
			return false;
		}
	}, '#aparent01');
	$('#cpartners').on({
		click: function (e) {
			// add new father
			addParents(0); // 1: mother, 0: father
			return false;
		}
	}, '#aparent02');
	//----------------------------------------------------------------
	// add partner // ex-partner
	//----------------------------------------------------------------
	$('#epartner').on({
		click: function (e) {
			AddPartner(0); // 0: partner, 1: ex-partner
			return false;
		}
	}, '#apartner');
	$('#epartner').on({
		click: function (e) {
			AddPartner(1); // 0: partner, 1: ex-partner
			return false;
		}
	}, '#aexpartner');
	//----------------------------------------------------------------
	// add brother / sister
	//----------------------------------------------------------------
	$('#cModal').on({
		click: function (e) {
			AddSiblings(0); // no parent connects
			return false;
		}
	}, '#asublings');
	// with parent connects
	$('#cModal').on({
		click: function (e) {
			$('#fseindex').html($(this).data('mid'));
			$('#fteindex').html($(this).data('fid'));
			AddSiblings(1); // parent connects
			return false;
		}
	}, '#asublings01');
	$('#cModal').on({
		click: function (e) {
			if (typeof $(this).data('mid') != 'undefined') {
				$('#fseindex').html($(this).data('mid'));
				AddSiblings(2); // with mother only
			} else if (typeof $(this).data('fid') != 'undefined') {
				$('#fteindex').html($(this).data('fid'));
				AddSiblings(3); // with father only
			}
			return false;
		}
	}, '.dsublings');
	//-----------------------------------------------------------------
	// add child without father
	//-----------------------------------------------------------------
	$('#cpartners').on({
		click: function (e) {
			AddChild(0, ''); // add child without mother or father
			return false;
		}
	}, '#achildnoftr');
	$('#cpartners').on({
		click: function (e) {
			if (typeof $(this).data('mid') != 'undefined') {
				$('#fseindex').html($(this).data('mid'));
				AddChild(1, '', 0); // with selected partner or ex partner
			}
			return false;
		}
	}, '.dpartner');
	$('#cpartners').on({
		click: function (e) {
			if (typeof $(this).data('mid') != 'undefined') {
				$('#fseindex').html($(this).data('mid'));
				AddChild(1, '', 1); // with selected partner or ex partner
			}
			return false;
		}
	}, '.dexpartner');
	$('#einfo').on({
		click: function (e) {
			var nodeid = $('#findex').text();
			var uName = trim(setName());
			if (uName.length > 0) {
				// mark selected node as updated
				$('#' + nodeid).data('isupd', '1');
				$('#' + nodeid).html(setName());
				$('#' + nodeid).data('name', setName());
				$('#' + nodeid).data('fname', $('#txt_fname').val());
				$('#' + nodeid).data('sname', $('#txt_sname').val());
			}
			// photo setup
			if (typeof $('#' + nodeid).data('photo') != 'undefined')
				$('#' + nodeid).append('<br /><img class="img-rounded" src="' + $('#' + nodeid).data('photo') + '" style="width:' + pWidth + 'px; height:' + pHeight + 'px;" alt="' + setName() + ' Photo">');
			if ($("#modalckmale:checked").val() != undefined) {
				// male selected
				$('#' + nodeid).removeClass('female');
				$('#' + nodeid).addClass('male');
				$('#' + nodeid).data('gender', 'male');
			} else if ($("#modalckfemale:checked").val() != undefined) {
				$('#' + nodeid).removeClass('male');
				$('#' + nodeid).addClass('female');
				$('#' + nodeid).data('gender', 'female');
			}
			// birth date data processing
			var bmonth = trim($('#dbirthmon').val());
			var bday = trim($('#dbirthday').val());
			var byear = trim($('#dbirthyr').val());
			if (bmonth != "" && bday != "" && byear != "") {
				$('#' + nodeid).data('dbirthmon', bmonth);
				$('#' + nodeid).data('dbirthday', bday);
				$('#' + nodeid).data('dbirthyr', byear);
			}
			// living / death processing
			if ($('#chkliving').is(":checked"))
				$('#' + nodeid).data('isliving', '1');
			else {
				// person dead
				$('#' + nodeid).data('isliving', '0');
				var dmonth = trim($('#ddeathmon').val());
				var dday = trim($('#ddeathday').val());
				var dyear = trim($('#ddeathyear').val());
				if (dmonth != "" && dday != "" && dyear != "") {
					$('#' + nodeid).data('ddeathmon', dmonth);
					$('#' + nodeid).data('ddeathday', dday);
					$('#' + nodeid).data('ddeathyear', dyear);
				}
			}
			// contact info
			var cemail = trim($('#txt_email').val());
			if (cemail != "")
				$('#' + nodeid).data('email', cemail);
			var cweb = trim($('#txt_website').val());
			if (cweb != "")
				$('#' + nodeid).data('website', cweb);
			var ctel = trim($('#txt_tel').val());
			if (ctel != "")
				$('#' + nodeid).data('tel', ctel);
			var mob = trim($('#txt_mobile').val());
			if (mob != "")
				$('#' + nodeid).data('mobile', mob);
			// biographical info
			var bplace = trim($('#txt_bplace').val());
			if (bplace != "")
				$('#' + nodeid).data('birthplace', bplace);
			var dplace = trim($('#txt_dplace').val());
			if (dplace != "")
				$('#' + nodeid).data('deathplace', dplace);
			var profession = trim($('#txt_profession').val());
			if (profession != "")
				$('#' + nodeid).data('profession', profession);
			var company = trim($('#txt_company').val());
			if (company != "")
				$('#' + nodeid).data('company', company);
			var interests = trim($('#txt_interests').val());
			if (interests != "")
				$('#' + nodeid).data('interests', interests);
			var bio = trim($('#txt_bio').val());
			if (bio != "")
				$('#' + nodeid).data('bio', bio);
			$('#cModal').modal('hide');
			return false;
		}
	}, '#btnmodok');
	$('#txt_fname').on('input', function () {
		$('#aheading').html(setName());
	})
	$('#txt_sname').on('input', function () {
		$('#aheading').html(setName());
	})
	$('#modaldmode').on({
		click: function (e) {
			togglePanel('', 0); // 0: edit mode
			return false;
		}
	}, '#modaleditinfo');
	$('#chkliving').change(function () {
		if ($(this).is(":checked")) {
			$('#modaledeath').hide();
		} else {
			$('#modaledeath').show();
		}
	});
	$('#cpartners').on({
		click: function (e) {
			AddPartner(0); // add partner
			var gender = $(this).data("gender");
			if (gender == 'mother')
				gender = 'm';
			else
				gender = 'f';
			AddChild(1, gender); // 0: without parent, with mother or father
			return false;
		}
	}, '#achildnfthr');
	$('#vcart').on({
		click: function (e) {
			$('.window').each(function () {
				$(this).removeClass('active');
			});
			$(this).addClass('active');
			// reset modal form
			$('#modalfrm')[0].reset();
			// toggle mode();
			togglePanel(this, 2); // type: auto
			// load current node data
			loadModalData(this);
			if ($(this).data("id").indexOf("6f") != -1 || $(this).data("id").indexOf("6m") != -1 || $(this).data("id").indexOf("4f") != -1 || $(this).data("id").indexOf("4m") != -1) {
				$('#modalp1').hide(); // disable add parent feature for childs as it already marked as parent
				if ($(this).data("id").indexOf("4f") != -1 || $(this).data("id").indexOf("4m") != -1)
					$('#modalp3').hide(); // its type brother, can't add brother or sister
				else
					$('#modalp3').show();
			} else {
				$('#modalp1').show();
				$('#modalp3').show();
			}
			var gd = $(this).data('gender');
			if (gd == 'male')
				$("#modalckmale").prop("checked", true);
			else
				$("#modalckfemale").prop("checked", true);
			// generation restrictions
			/*if(maxGen > 0 && genCounter >= (maxGen -1))
			{
				// restrict increasing generation
				$('#modalp1').hide();
				$('#modalp4').hide();
			}*/
			//$('#vinfo').html($(this).attr('id'));
			//var values = "<strong>ID: </strong> " + $(this).data("id") + "<br /><strong>Name:</strong> " + $(this).data("name") + "<br /><strong>Gender: </strong> " + $(this).data("gender");
			$('#findex').html($(this).data("id"));
			var childPos = $(this).offset();
			var parentPos = $('.vcart-inner').offset();
			var childOffset = {
				top: childPos.top - parentPos.top,
				left: childPos.left - parentPos.left
			}
			$('#postop').html(childOffset.top);
			$('#posleft').html(childOffset.left);
			$('#aheading').html(genFullName(this));
			$('#cModal').modal('show');
			rpanels();
			//$('#vinfo').html(values);
			return false;
		}
	}, '.window');
	//---------------------------------------------------------------
	// Modal Processings
	//---------------------------------------------------------------
	$('#modaldmode').on({
		click: function (e) {
			var nodeid = $('#findex').text();
			$('#' + nodeid).data('deleted', 'yes');
			$('#' + nodeid).hide();
			$('#cModal').modal('hide');
			return false;
		}
	}, '#modaldelete');
	$('.navbar-nav').on({
		click: function (e) {
			$("li").removeClass("active");
			$(this).addClass("active");
		}
	}, 'li');
	$('#cModal').on({
		click: function (e) {
			rpanels();
			return false;
		}
	}, '.acancel');
	
	$('#cModal').on({
		click: function (e) {
			prepareParentOptions();
			return false;
		}
	}, '#_parentOptions');
	
	$('#cModal').on({
		click: function (e) {
			$('#epartner').show();
		    $('#einfo').hide();
		    $('#esubling').hide();
			return false;
		}
	}, '#_partnerOptions');


   $('#cModal').on({
	    mouseenter: function () {
	        $(".dur").show();
	    },
	
	    mouseleave: function () {
	         $(".dur").hide();
	    }
   }, '#_tThumb');
   
   $('#cModal').on({
		click: function (e) {
			prepareSiblingOptions();
			return false;
		}
	}, '#_siblingOptions');
	
   $('#cModal').on({
		click: function (e) {
			prepareChildOptions();
			return false;
		}
	}, '#_childOptions');


	$('#tcontainer').on({
		click: function (e) {
		 	$('#treemsg').html('<h3>Saving....</h3>');
	        Save(defaultUName, 0);
	        prepareMsg("Tree Saved Successfully");
			return false;
		}
	}, '#_saveTree');
	
	$('#tcontainer').on({
		click: function (e) {
		 	$('#treemsg').html('<h3>Saving....</h3>');
		    Save(defaultUName, 1);
			prepareMsg("Tree Saved Successfully");
			return false;
		}
	}, '#_saveTree02');
	
	$('#tcontainer').on({
		click: function (e) {
		 	$('#treemsg').html('<h3>Saving....</h3>');
		    Save(defaultUName, 2);
			prepareMsg("Tree Saved Successfully");
			return false;
		}
	}, '#_saveTree03');
	
	$('#tcontainer').on({
		click: function (e) {
		    window.open(dn + 'print.php?fid=' + familyID,"_blank","toolbar=no, scrollbars=no, resizable=no, top=500, left=500, width=1100, height=700");
			return false;
		}
	}, '#_printTree');
	
	$('#tcontainer').on({
		click: function (e) {
		   document.location = dn + '' + redirectPageName + '&scroll=true';
			return false;
		}
	}, '#_smoothScroll');
	
	$('#tcontainer').on({
		click: function (e) {
		    document.location = dn + '' + redirectPageName + '&connect=0';	
			return false;
		}
	}, '#_flowchart');
	
	$('#tcontainer').on({
		click: function (e) {
		    document.location = dn + '' + redirectPageName + '&connect=1';	
			return false;
		}
	}, '#_bezier');
	
	$('#tcontainer').on({
		click: function (e) {
		    document.location = dn + '' + redirectPageName + '&connect=2';	
			return false;
		}
	}, '#_statemachine');
	
	$('#tcontainer').on({
		click: function (e) {
		    document.location = dn + '' + redirectPageName + '&readonly=true';	
			return false;
		}
	}, '#_readonly');
	//*********************************************************
	// JS Plumb Options
	//*********************************************************
	jsPlumb.ready(function () {
		if (familyID > 0) {
			LoadData(familyID);
		} else {
			AddDiv(conWidth, conHeight, 0, 0, '', 'Me', '1m', 0);
		}
	});
});

function loadInit() {
	if (readOnly) {
		$("#vcart").overscroll();
		$("#modaltopnav").hide();
	}
	if (smoothScroll)
		$("#vcart").overscroll();
	$("#vcart").scrollTop(((getHeight() + conHeight) / 2) - ($("#vcart").height() / 2));
	$("#vcart").scrollLeft(((getWidth() + conWidth) / 2) - ($("#vcart").width() / 2));
}

function trim(val) {
	return val.replace(/^\s+|\s+$/g, '');
}
// 0: edit mod, 1: display mode, 2 : auto
function togglePanel(obj, type) {
	if (type == 2) {
		if (typeof $(obj).data('isupd') != 'undefined') {
			// display mode
			$('#modalemode').hide();
			getNodeDisplay(obj);
		} else {
			$('#modalemode').show();
			$('#modaldmode').hide();
			// remove photo if exist
			var photourl = defaultThumbUrl;
			if (typeof $(obj).data('photo') != 'undefined')
				photourl = $(obj).data('photo');
			$('#modaledchange').attr('src', photourl);
		}
	} else if (type == 0) {
		// edit mode
		$('#modalemode').show();
		$('#modaldmode').hide();
	} else if (type == 1) {
		// display mode
		$('#modalemode').hide();
		getNodeDisplay(obj);
	}
}

function getNodeItem(caption, name) {
	var str = '<div class="row item_pad"><div class="col-md-3">';
	str += caption;
	str += '</div><div class="col-md-9">';
	str += name;
	str += '</div></div>';
	return str;
}

function getNodeDisplay(obj) {
	var str = '<div class="row"><div class="col-md-3"><div class="pd_5">';
	var photourl = dn + 'images/holder.png';
	if (typeof $(obj).data('photo') != 'undefined')
		photourl = $(obj).data('photo');
	str += '<img src="' + photourl + '" style="width:100px; height:100px;" alt="Profile Photo" class="img-rounded">';
	str += '</div></div>';
	str += '<div class="col-md-9">';
	str += '<strong class="xxmedium-text bold">Personal Info</strong>';
	var name = genFullName(obj);
	if (name != "")
		str += getNodeItem('Name', name);
	var gender = trim($(obj).data('gender'));
	if (gender != "")
		str += getNodeItem('Gender', gender);
	if (typeof $(obj).data('dbirthmon') != 'undefined') {
		str += getNodeItem('Gender', $(obj).data('dbirthmon') + "-" + $(obj).data('dbirthday') + "-" + $(obj).data('dbirthyr'));
	}
	var isliving = true;
	var isdefault = true;
	if (typeof $(obj).data('isliving') != 'undefined') {
		// person is living
		isdefault = false;
		if ($(obj).data('isliving') == 0)
			isliving = false;
	} else {
		isliving = false;
	}
	if (isliving) {
		str += getNodeItem('Is Alive', "Yes");
	} else {
		if (typeof $(obj).data('ddeathmon') != 'undefined')
			str += getNodeItem('Death Date', $(obj).data('ddeathmon') + "-" + $(obj).data('ddeathday') + "-" + $(obj).data('ddeathyear'));
	}
	str += '<hr />';
	str += '<strong class="xxmedium-text bold">Contact Info</strong>';
	// contact information
	if (typeof $(obj).data('email') != 'undefined')
		str += getNodeItem('Email', $(obj).data('email'));
	if (typeof $(obj).data('website') != 'undefined')
		str += getNodeItem('Website', $(obj).data('website'));
	if (typeof $(obj).data('tel') != 'undefined')
		str += getNodeItem('Home Tel', $(obj).data('tel'));
	if (typeof $(obj).data('mobile') != 'undefined')
		str += getNodeItem('Mobile', $(obj).data('mobile'));
	str += '<hr />';
	str += '<strong class="xxmedium-text bold">Biographical</strong>';
	if (typeof $(obj).data('birthplace') != 'undefined')
		str += getNodeItem('Birth Place', $(obj).data('birthplace'));
	if (typeof $(obj).data('deathplace') != 'undefined')
		str += getNodeItem('Death Place', $(obj).data('deathplace'));
	if (typeof $(obj).data('profession') != 'undefined')
		str += getNodeItem('Profession', $(obj).data('profession'));
	if (typeof $(obj).data('company') != 'undefined')
		str += getNodeItem('Company', $(obj).data('company'));
	if (typeof $(obj).data('interests') != 'undefined')
		str += getNodeItem('Interests', $(obj).data('interests'));
	if (typeof $(obj).data('bio') != 'undefined')
		str += getNodeItem('Bio Info', $(obj).data('bio'));
	str += '<hr />';
	str += '<div class="row"><div class="col-lg-12">';
	if (!readOnly) {
		str += '<button id="modaleditinfo" class="btn btn-primary btn-sm">Edit Information</button>&nbsp;';
		if ($(obj).attr('id') != "1m")
			str += '<button id="modaldelete" class="btn btn-danger btn-sm">Delete</button>&nbsp;';
	}
	str += '<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>';
	str += '<hr />';
	str += '</div>'; // close col-md-9                
	str += '</div>'; // close row
	$('#modaldmode').html(str);
	$('#modaldmode').show(); // display if hidden
}

function loadModalData(obj) {
	// photo url
	var photourl = dn + 'images/holder.png';
	if (typeof $(obj).data('photo') != 'undefined')
		photourl = $(obj).data('photo');
	if (typeof $(obj).data('fname') != 'undefined')
		$('#txt_fname').val($(obj).data('fname'));
	if (typeof $(obj).data('sname') != 'undefined')
		$('#txt_sname').val($(obj).data('sname'));
	if (typeof $(obj).data('isupd') != 'undefined') {
		if ($(obj).data('gender') == 'male')
			$("#modalckmale").prop("checked", true);
		else
			$("#modalckfemale").prop("checked", true);
	}
	if (typeof $(obj).data('dbirthmon') != 'undefined') {
		$('#dbirthmon').val($(obj).data('dbirthmon'));
		$('#dbirthday').val($(obj).data('dbirthday'));
		$('#dbirthyr').val($(obj).data('dbirthyr'));
	}
	var isliving = true;
	var isdefault = true;
	if (typeof $(obj).data('isliving') != 'undefined') {
		// person is living
		isdefault = false;
		if ($(obj).data('isliving') == 0)
			isliving = false;
	} else {
		// set is living value as check by default
		$("#chkliving").prop("checked", true);
		isliving = false;
	}
	if (isliving) {
		$("#chkliving").prop("checked", true);
	} else {
		if (isdefault)
			$("#chkliving").prop("checked", true); // by default isliving check true
		else
			$("#chkliving").prop("checked", false);
		if (typeof $(obj).data('ddeathmon') != 'undefined') {
			$('#ddeathmon').val($(obj).data('ddeathmon'));
			$('#ddeathday').val($(obj).data('ddeathday'));
			$('#ddeathyear').val($(obj).data('ddeathyear'));
		}
	}
	// contact information
	if (typeof $(obj).data('email') != 'undefined')
		$('#txt_email').val($(obj).data('email'));
	if (typeof $(obj).data('website') != 'undefined')
		$('#txt_website').val($(obj).data('website'));
	if (typeof $(obj).data('tel') != 'undefined')
		$('#txt_tel').val($(obj).data('tel'));
	if (typeof $(obj).data('mobile') != 'undefined')
		$('#txt_mobile').val($(obj).data('mobile'));
	// biographical information
	if (typeof $(obj).data('birthplace') != 'undefined')
		$('#txt_bplace').val($(obj).data('birthplace'));
	if (typeof $(obj).data('deathplace') != 'undefined')
		$('#txt_dplace').val($(obj).data('deathplace'));
	if (typeof $(obj).data('profession') != 'undefined')
		$('#txt_profession').val($(obj).data('profession'));
	if (typeof $(obj).data('company') != 'undefined')
		$('#txt_company').val($(obj).data('company'));
	if (typeof $(obj).data('interests') != 'undefined')
		$('#txt_interests').val($(obj).data('interests'));
	if (typeof $(obj).data('bio') != 'undefined')
		$('#txt_bio').val($(obj).data('bio'));
}

function genFullName(obj) {
	var fullname = "";
	if (typeof $(obj).data('fname') != 'undefined')
		fullname = $(obj).data('fname');
	if (typeof $(obj).data('sname') != 'undefined')
		fullname = fullname + ' ' + $(obj).data('sname');
	if (trim(fullname) == "")
		fullname = $(obj).data("name");
	return fullname;
}

function genFirstName(obj) {
	var fullname = "";
	if (typeof $(obj).data('fname') != 'undefined')
		fullname = $(obj).data('fname');
	if (trim(fullname) == "")
		fullname = $(obj).data("name");
	return fullname;
}

function setName() {
	return $('#txt_fname').val() + ' ' + $('#txt_sname').val();
}

function rpanels() {
	$('#epartner').hide();
	$('#einfo').show();
	$('#esubling').hide();
}

function getWidth() {
	return $("#chart-demo").width() - conHeight;
}

function getHeight() {
	return $("#chart-demo").height() - conHeight;
}

function isEven(n) {
	return parseFloat(n) && (n % 2 == 0);
}

function isOdd(n) {
	return parseFloat(n) && (n % 2 == 1);
}
// add child
function AddChild(type, gender, ptype) {
	var diff = 0; // bottom
	var partindex = 6; // child with partner
	var caption = "Child";
	var rel = 3; // connect actions
	if (type == 1) {
		if (ptype == 1) {
			rel = 11; // child with ex - partner
			partindex = 7; // child with ex - partner
		} else {
			rel = 6; // child with partner
		}
	}
	if (rel == 6)
		diff = (conWidth + offsetdiff);
	else if (rel == 11)
		diff = -(conWidth + offsetdiff);
	var sid = $('#findex').html(); // source node id
	var childPos = $('#' + sid).offset();
	var parentPos = $('.vcart-inner').offset();
	var childOffset = {
		top: childPos.top - parentPos.top,
		left: childPos.left - parentPos.left
	}
	var t = childOffset.top + 150;
	var l = childOffset.left - diff;
	var pid = sid + '-' + partindex; // 6 child
	var g = $('#' + sid).data('gender');
	//var partid = '-' + partindex; // partner id
	if (gender == "") {
		if (g == 'male') {
			pid = pid + 'f';
			g = 'female';
			// partid = partid + 'm';
		} else {
			pid = pid + 'm';
			g = 'male';
			// partid = partid + 'f';
		}
	} else {
		if (gender == 'f')
			g = 'female';
		else
			g = 'male';
		pid = pid + gender;
	}
	if ($('#' + pid).length > 0) {
		// 50 occurances
		var x = 50;
		var ii = 1;
		var isfound = false;
		while (x > 0) {
			if ($('#' + pid + '' + x).length > 0) {
				var cid = x + 1;
				pid = pid + cid;
				if (rel == 11) // ex - partner
				{
					var exptr = $('#fseindex').html();
					setOffset(exptr, 0, (conWidth + offsetdiff));
					l = l + ((conWidth + offsetdiff) * (cid)); // left side
				} else if (rel == 6) //partner
				{
					var exptr = $('#fseindex').html();
					setOffset(exptr, 0, -(conWidth + offsetdiff));
					l = l - ((conWidth + offsetdiff) * (cid)); // left side
				} else {
					//if(isOdd(x))
					l = l + ((conWidth + offsetdiff) * (cid)); // left side
				}
				isfound = true;
				caption = caption + ' ' + (cid + 1);
				continue;
			}
			x = x - 1;
		}
		if (!isfound) {
			if (rel == 11) {
				var exptr = $('#fseindex').html();
				// set offset of ex-partner
				setOffset(exptr, 0, (conWidth + offsetdiff));
				// retrieve offset of last child node
				l = l + ((conWidth + offsetdiff) * 1);
			} else if (rel == 6) {
				var exptr = $('#fseindex').html();
				setOffset(exptr, 0, -(conWidth + offsetdiff));
				l = l - ((conWidth + offsetdiff) * 1);
			} else {
				l = l + ((conWidth + offsetdiff) * 1);
			}
			pid = pid + 1;
			caption = caption + ' 2';
		}
	}
	var name = genFirstName('#' + sid);
	AddDiv(conWidth, conHeight, t, l, g, caption + ' of ' + name, pid, rel);
	$('#cModal').modal('hide');
}

function setOffset(id, tdiff, ldiff) {
	var oset = $('#' + id).offset();
	var tpost = oset.top;
	var lpost = oset.left;
	tpost = tpost + tdiff;
	lpost = lpost + ldiff;
	$("#" + id).offset({
		top: tpost,
		left: lpost
	})
}
// add both father / mother
function AddParent() {
	var sid = $('#findex').html();
	var childPos = $('#' + sid).offset();
	var parentPos = $('.vcart-inner').offset();
	var childOffset = {
		top: childPos.top - parentPos.top,
		left: childPos.left - parentPos.left
	}
	var t = childOffset.top  - (conHeight + 123);
	var fl = childOffset.left  - (conWidth + 50);
	var pid = sid + '-5f'; // -5f -> parent female
	AddDiv(conWidth, conHeight, t, fl, 'female', 'Mother of ' + genFirstName('#' + sid), pid, 1);
	var ml = childOffset.left + (conWidth + 50);
	pid = sid + '-5m'; // -5f -> parent male
	if ($('#' + pid).length == 0)
		AddDiv(conWidth, conHeight, t, ml, 'male', 'Father of ' + genFirstName('#' + sid), pid, 1);
	$('#cModal').modal('hide');
}
// add new father / mother
// type = 0 (male), 1: (female)
function addParents(type) {
	var diff = (conWidth - 275); // right side
	var caption = "Father";
	if (type == 1) {
		diff = (conWidth + 75);
		caption = "Mother";
	}
	var partindex = 5; // siblings
	var rel = 7; // single father or mother
	var sid = $('#findex').html(); // source node id
	var childPos = $('#' + sid).offset();
	var parentPos = $('.vcart-inner').offset();
	var childOffset = {
		top: childPos.top - parentPos.top,
		left: childPos.left - parentPos.left
	}
	var t = childOffset.top - (conHeight + 90);
	var l = childOffset.left - diff;
	var pid = sid + '-' + partindex; // 2 -> partner // current nod id
	var g = 'male';
	if (type == 1) {
		pid = pid + 'f';
		g = 'female';
	} else {
		pid = pid + 'm';
	}
	if ($('#' + pid).length > 0) {
		// 50 occurances
		var x = 50;
		var isfound = false;
		while (x > 0) {
			if ($('#' + pid + '' + x).length > 0) {
				var cid = x + 1;
				pid = pid + cid;
				if (type == 1)
					l = l - (conWidth + 20) * (cid);
				else
					l = l + (conWidth + 20) * (cid);
				isfound = true;
				caption = caption + ' ' + (cid + 1);
				continue;
			}
			x = x - 1;
		}
		if (!isfound) {
			pid = pid + '1';
			if (type == 1)
				l = l - ((conWidth + 20) * 1);
			else
				l = l + ((conWidth + 20) * 1);
			caption = caption + ' 2';
		}
	}
	var name = genFirstName('#' + sid);
	AddDiv(conWidth, conHeight, t, l, g, caption + ' of ' + name, pid, rel);
	$('#cModal').modal('hide');
}
// add brother / sister
// type 0: no parent connects, 1: parent (mother / father connects)
function AddSiblings(type) {
	var diff = (conWidth - 380); // right side
	var partindex = 4; // siblings
	var caption = "Sibling";
	var rel = 2; // connect actions
	if (type == 1)
		rel = 8; // me -> sibling -> father / mother (connect)
	else if (type == 2)
		rel = 9; // me - sibling -> selected mother
	else if (type == 3)
		rel = 10; // me - sibling - selected father
	//var t = parseInt($('#postop').html()); // - 100; // on same line
	//var l = parseInt($('#posleft').html()) - diff;
	var sid = $('#findex').html(); // source node id
	var childPos = $('#' + sid).offset();
	var parentPos = $('.vcart-inner').offset();
	var childOffset = {
		top: childPos.top - parentPos.top,
		left: childPos.left - parentPos.left
	}
	var t = childOffset.top + 65;
	var l = childOffset.left - diff;
	var pid = sid + '-' + partindex; // 2 -> partner // current nod id
	var g = $('#' + sid).data('gender');
	//var partid = '-' + partindex; // partner id
	if (g == 'male') {
		pid = pid + 'f';
		g = 'female';
		// partid = partid + 'm';
	} else {
		pid = pid + 'm';
		g = 'male';
		// partid = partid + 'f';
	}
	if ($('#' + pid).length > 0) {
		// 50 occurances
		var x = 50;
		var isfound = false;
		while (x > 0) {
			if ($('#' + pid + '' + x).length > 0) {
				var cid = x + 1;
				pid = pid + cid;
				l = l + (conWidth + 20) * (cid);
				isfound = true;
				caption = caption + ' ' + (cid + 1);
				continue;
			}
			x = x - 1;
		}
		if (!isfound) {
			pid = pid + '1';
			l = l + ((conWidth + 20) * 1);
			caption = caption + ' 2';
		}
	}
	var name = genFirstName('#' + sid);
	AddDiv(conWidth, conHeight, t, l, g, caption + ' of ' + name, pid, rel);
	$('#cModal').modal('hide');
}
// type: 0-> partner, 1->ex-partner
function AddPartner(type) {
	var diff = (conWidth + (conWidth * 1)); // left side
	var partindex = 2; // 2: partner, 3: ex-partner
	var caption = "Partner";
	var rel = 4; // partner action (used to generate connects / relationship)
	if (type == 1) {
		diff = (conWidth - (conWidth * 3)); // right side
		partindex = 3;
		caption = "Ex Partner";
		rel = 5;
	}
	var sid = $('#findex').html(); // source node id
	// check if creating partner for already child element
	var childPos = $('#' + sid).offset();
	var parentPos = $('.vcart-inner').offset();
	var childOffset = {
		top: childPos.top - parentPos.top,
		left: childPos.left - parentPos.left
	}
	var t = childOffset.top;
	var l = childOffset.left;
	if (sid.indexOf("1m-6f") != -1 || sid.indexOf("1m-6m") != -1) {
		setOffset(sid, 100, 0); // down child below
		t = t + 100;
	}
	t = t; // on same line
	l = l - diff; // 
	//var t = parseInt($('#postop').html()); // + 100; // on same line
	//var l = parseInt($('#posleft').html()) - diff;
	var pid = sid + '-' + partindex; // 2 -> partner // current nod id
	var g = $('#' + sid).data('gender');
	//var partid = '-' + partindex; // partner id
	if (g == 'male') {
		pid = pid + 'f';
		g = 'female';
		// partid = partid + 'm';
	} else {
		pid = pid + 'm';
		g = 'male';
		// partid = partid + 'f';
	}
	if ($('#' + pid).length > 0) {
		// 50 occurances
		var x = 50;
		var isfound = false;
		while (x > 0) {
			if ($('#' + pid + '' + x).length > 0) {
				var cid = x + 1;
				pid = pid + cid;
				t = t + (conHeight + 40) * (cid);
				isfound = true;
				caption = caption + ' ' + (cid + 1);
				continue;
			}
			x = x - 1;
		}
		if (!isfound) {
			pid = pid + '1';
			t = t + (conHeight + 40);
			caption = caption + ' 2';
		}
	}
	var name = genFirstName('#' + sid);
	AddDiv(conWidth, conHeight, t, l, g, caption + ' of ' + name, pid, rel);
	$('#fseindex').html(pid);
	$('#cModal').modal('hide');
}

function genPlumConnect(id, dest, sourcepos, destpos) {
	jsPlumb.connect({
		source: id,
		target: dest,
		detachable: false,
		paintStyle: {
			strokeStyle: strokeColor,
			lineWidth: strokeLineWidth,
			joinstyle: "round"
		},
		hoverPaintStyle: {
			strokeStyle: hoverPaintStyle,
			lineWidth: hoverstrokeLineWidth
		},
		endpoint: "Blank",
		anchors: [sourcepos, destpos],
		connector: [connectStyle, {
			stub: [30, 30],
			gap: 0,
			cornerRadius: 0,
			alwaysRespectStubs: true
		}]
	});
}
// rel: 0: none, 1: parent, 2: siblings, 3: child, 4: partner, 5: ex partner
function AddDiv(w, h, t, l, c, txt, id, rel) {
	if (readOnly)
		return; // don't create any item if readonly
	if ($('#' + id).length > 0)
		return; // don't create any item if already exist
	var cwidth = 0;
	if (l == 0) cwidth = getWidth() / 2;
	else cwidth = l;
	var cheight = 0;
	if (t == 0) cheight = getHeight() / 2;
	else cheight = t;
	var css = "male";
	var gender = "male";
	if (c != "") {
		gender = c;
		css = c;
	}
	var cap = '';
	if (txt != "")
		cap = txt;
	var dUser = false;
	if (cap == 'Me') {
		if (defaultFName != "")
		   cap = defaultFName + " " + defaultSName;
		else if (defaultUName != "")
			cap = defaultUName;
		css = css + " author";
		dUser = true;
	}
	var Div = $('<div>', {
		id: id
	}, {
		class: 'window'
	}).text(cap).css({
		'min-height': h,
		'width': w,
		top: cheight,
		left: cwidth,
		position: 'absolute'
	}).attr("data-id", id).appendTo('#chart-demo');
	var sourceid = $('#findex').html();
	switch (rel) {
	case 1:
		// parents
		var anchorPos = "Right";
		var relcap = "Mother";
		if (css == "male") {
			// add separate connection between father and mother
			var motherid = sourceid + '-5f';
			genPlumConnect(id, motherid, "Left", "Right");
			// store connection info in array
			prepareConnectInfo(id, motherid, "Left", "Right", "Husband");
			// anchor position for parent / child connect / mother left, father right (default monther)
			anchorPos = "Left";
			relcap = "Father";
			genCounter++; // count once for both mother / father
		}
		genPlumConnect(id, sourceid, anchorPos, "TopCenter");
		prepareConnectInfo(id, sourceid, anchorPos, "TopCenter", relcap);
		break;
	case 4:
		// partner
		genPlumConnect(id, sourceid, "Right", "Left");
		prepareConnectInfo(id, sourceid, "Right", "Left", "Partner");
		break;
	case 5:
		// ex partner
		genPlumConnect(id, sourceid, "Left", "Right");
		prepareConnectInfo(id, sourceid, "Left", "Right", "Ex-Partner");
		break;
	case 2:
		// siblings
		genPlumConnect(id, sourceid, "TopCenter", "TopCenter");
		prepareConnectInfo(id, sourceid, "TopCenter", "TopCenter", "Siblings");
		break;
	case 3:
		// child
		genPlumConnect(id, sourceid, "TopCenter", "BottomCenter");
		prepareConnectInfo(id, sourceid, "TopCenter", "BottomCenter", "Child");
		genCounter++;
		break;
	case 6:
		// me with child and partner
		genPlumConnect(id, sourceid, "TopCenter", "Left");
		prepareConnectInfo(id, sourceid, "TopCenter", "Left", "Child");
		// my partner with child
		if ($('#fseindex').length > 0) {
			var partnerid = $('#fseindex').html();
			genPlumConnect(id, partnerid, "TopCenter", "Right");
			prepareConnectInfo(id, partnerid, "TopCenter", "Right", "Child");
		}
		genCounter++;
		break;
	case 11:
		// me with child and ex-partner
		genPlumConnect(id, sourceid, "TopCenter", "Right");
		prepareConnectInfo(id, sourceid, "TopCenter", "Right", "Child");
		// my partner with child
		if ($('#fseindex').length > 0) {
			var partnerid = $('#fseindex').html();
			genPlumConnect(id, partnerid, "TopCenter", "Left");
			prepareConnectInfo(id, partnerid, "TopCenter", "Left", "Child");
		}
		genCounter++;
		break;
	case 7:
		// add single father or mother
		var anchorPos = "Right";
		var relation = "Mother";
		if (css == "male") {
			anchorPos = "Left";
			relation = "Father";
		}
		genPlumConnect(id, sourceid, anchorPos, "TopCenter");
		prepareConnectInfo(id, sourceid, anchorPos, "TopCenter", relation);
		//genCounter++;
		break;
	case 8:
		// siblings with parents (both mom / dad)
		genPlumConnect(id, sourceid, "TopCenter", "TopCenter");
		prepareConnectInfo(id, sourceid, "TopCenter", "TopCenter", "Siblings");
		// connect with mother
		var motherid = $('#fseindex').html();
		genPlumConnect(id, motherid, "TopCenter", "BottomCenter");
		prepareConnectInfo(id, motherid, "TopCenter", "BottomCenter", "Mother");
		// connect with father
		var fatherid = $('#fteindex').html();
		genPlumConnect(id, fatherid, "TopCenter", "BottomCenter");
		prepareConnectInfo(id, fatherid, "TopCenter", "BottomCenter", "Father");
		break;
	case 9:
		// siblings with mom
		genPlumConnect(id, sourceid, "TopCenter", "TopCenter");
		prepareConnectInfo(id, sourceid, "TopCenter", "TopCenter", "Siblings");
		// me - sibling -> selected mother
		var motherid = $('#fseindex').html();
		genPlumConnect(id, motherid, "TopCenter", "BottomCenter");
		prepareConnectInfo(id, motherid, "TopCenter", "BottomCenter", "Mother");
		break;
	case 10:
		// siblings with dad
		genPlumConnect(id, sourceid, "TopCenter", "TopCenter");
		prepareConnectInfo(id, sourceid, "TopCenter", "TopCenter", "Siblings");
		// me - sibling - selected father
		var fatherid = $('#fteindex').html();
		genPlumConnect(id, fatherid, "TopCenter", "BottomCenter");
		prepareConnectInfo(id, fatherid, "TopCenter", "BottomCenter", "Father");
		break;
	}
	jsPlumb.draggable($(Div));
	$(Div).addClass('chart-demo window ' + css);
	$(Div).attr('data-name', cap);
	if (dUser == true) {
		if (defaultFName != "")
			$(Div).attr('data-fname', defaultFName);
		if (defaultSName != "")
			$(Div).attr('data-sname', defaultSName);
		$(Div).attr('data-author', "1");
	} else {
		$(Div).attr('data-fname', cap);
	}
	$(Div).attr('data-gender', gender);
	$(Div).attr('data-postop', cheight);
	$(Div).attr('data-posleft', cwidth);
	iDs.push({
		eid: id,
		position: cheight
	});
	//alert(nConnects.length);
}

function Save(uname, checktype) {
	if (iDs.length > 0) {
		var nodes = [];
		for (var i = 0; i < iDs.length; i++) {
			var nodeid = iDs[i].eid;
			// store position of elements
			var childPos = $('#' + nodeid).offset();
			var parentPos = $('.vcart-inner').offset();
			var childOffset = {
				top: childPos.top - parentPos.top,
				left: childPos.left - parentPos.left
			}
			var tpost = childOffset.top; //$("#" + nodeid).data('postop');
			var lpost = childOffset.left; //$("#" + nodeid).data('posleft');
			var nodeinfo = $("#" + nodeid).html();
			var name = $("#" + nodeid).data('name');
			var gender = $("#" + nodeid).data('gender');
			var photourl = '';
			if (typeof $("#" + nodeid).data('photo') != 'undefined')
				photourl = $("#" + nodeid).data('photo');
			var fname = "";
			if (typeof $("#" + nodeid).data('fname') != 'undefined')
				fname = $("#" + nodeid).data('fname');
			var sname = "";
			if (typeof $("#" + nodeid).data('sname') != 'undefined')
				sname = $("#" + nodeid).data('sname');
			var dob = "";
			if (typeof $("#" + nodeid).data('dbirthmon') != 'undefined')
				dob = $("#" + nodeid).data('dbirthday') + "/" + $("#" + nodeid).data('dbirthmon') + "/" + $("#" + nodeid).data('dbirthyr');
			var isliving = "";
			if (typeof $("#" + nodeid).data('isliving') != 'undefined') {
				if ($("#" + nodeid).data('isliving') == 0)
					isliving = "0";
				else
					isliving = "1";
			} else {
				isliving = "1"; // default yes
			}
			var deathdate = "";
			if (isliving == "0") {
				deathdate = $("#" + nodeid).data('ddeathmon') + "/" + $("#" + nodeid).data('ddeathday') + "/" + $("#" + nodeid).data('ddeathyear');
			}
			var email = "";
			if (typeof $("#" + nodeid).data('email') != 'undefined')
				email = $("#" + nodeid).data('email');
			var website = "";
			if (typeof $("#" + nodeid).data('website') != 'undefined')
				website = $("#" + nodeid).data('website');
			var tel = "";
			if (typeof $("#" + nodeid).data('tel') != 'undefined')
				tel = $("#" + nodeid).data('tel');
			var mobile = "";
			if (typeof $("#" + nodeid).data('mobile') != 'undefined')
				mobile = $("#" + nodeid).data('mobile');
			var birthplace = "";
			if (typeof $("#" + nodeid).data('birthplace') != 'undefined')
				birthplace = $("#" + nodeid).data('birthplace');
			var deathplace = "";
			if (typeof $("#" + nodeid).data('deathplace') != 'undefined')
				deathplace = $("#" + nodeid).data('deathplace');
			var profession = "";
			if (typeof $("#" + nodeid).data('profession') != 'undefined')
				profession = $("#" + nodeid).data('profession');
			var company = "";
			if (typeof $("#" + nodeid).data('company') != 'undefined')
				company = $("#" + nodeid).data('company');
			var interests = "";
			if (typeof $("#" + nodeid).data('interests') != 'undefined')
				interests = $("#" + nodeid).data('interests');
			var bio = "";
			if (typeof $("#" + nodeid).data('bio') != 'undefined')
				bio = $("#" + nodeid).data('bio');
			var familyid = 0;
			//var fid = $('#fid').html();
			if (typeof familyID != "undefined")
				familyid = parseInt(familyID, 10);
			else if (typeof $("#" + nodeid).data('familyid') != 'undefined')
				familyid = $("#" + nodeid).data('familyid');

			var isdeleted = '';
			if (typeof $("#" + nodeid).data('deleted') != 'undefined')
				isdeleted = '1';
			var isauthor = '0';
			if (typeof $("#" + nodeid).data('author') != 'undefined')
				isauthor = '1';
			nodes.push({
				nodeid: nodeid,
				tpost: tpost,
				lpost: lpost,
				nodeinfo: nodeinfo,
				name: name,
				gender: gender,
				photourl: photourl,
				fname: fname,
				sname: sname,
				dob: dob,
				isliving: isliving,
				deathdate: deathdate,
				email: email,
				website: website,
				tel: tel,
				mobile: mobile,
				birthplace: birthplace,
				deathplace: deathplace,
				profession: profession,
				company: company,
				interests: interests,
				bio: bio,
				familyid: familyid,
				isdeleted: isdeleted,
				username: uname,
				checktype: checktype,
				isauthor: isauthor
			});
		}
		$.ajax({
			type: 'POST',
			url: dn + '' + hd,
			data: {
				output: nodes
			},
			success: function (msg) {
				if (msg == "-1")
					prepareMsg("Error occured while creating Family ID");
				else if (msg.indexOf('http') != -1)
					document.location = msg;
				else if (msg != "0") {
					var isnum = /^\d+$/.test(msg);
					if (isnum) {
						familyID = parseInt(msg,10);
						$('#fid').html(msg);
						prepareMsg("Data Saved Successfully");
						saveConnects(checktype);
					} else {
						prepareMsg(msg);
					}
				}
			},
		});
	}
}

function prepareConnectInfo(source, dest, sourcepos, destpos, relation) {
	var familyid = 0;
	if (typeof $("#" + source).data('familyid') != 'undefined')
		familyid = $("#" + source).data('familyid');
	nConnects.push({
		familyid: familyid,
		source: source,
		dest: dest,
		sourcepos: sourcepos,
		destpos: destpos,
		relation: relation
	});
}

function saveConnects(checktype) {
	if (nConnects.length > 0) {
		var connects = [];
		for (var i = 0; i < nConnects.length; i++) {
			var sourceid = nConnects[i].source;
			var destid = nConnects[i].dest;
			var relation = nConnects[i].relation;
			if (relation == 'Siblings') {
				var gender = $("#" + sourceid).data('gender');
				if (gender == 'male')
					relation = "Brother";
				else
					relation = "Sister";
			}
			var sname = genFullName('#' + sourceid);
			var dname = genFullName('#' + destid);
			var familyid = nConnects[i].familyid;
			var fid = 0;
			if (typeof familyID != "undefined")
			   familyid = familyID;
		
			var isdeleted = '';
			if (typeof $("#" + sourceid).data('deleted') != 'undefined' || typeof $("#" + destid).data('deleted') != 'undefined')
				isdeleted = '1';
			connects.push({
				familyid: familyid,
				source: sourceid,
				dest: destid,
				sourcepos: nConnects[i].sourcepos,
				destpos: nConnects[i].destpos,
				relation: relation,
				sname: sname,
				dname: dname,
				isdeleted: isdeleted,
				checktype: checktype
			});
		}
		$.ajax({
			type: 'POST',
			url: dn + '' + sconnects,
			data: {
				output: connects
			},
			success: function (msg) {
				if (msg == "")
					prepareMsg('Your Tree Saved Successfully');
				else if (msg.indexOf('http') != -1)
					document.location = msg;
				else
					prepareMsg(msg);
			},
		});
	}
}

function LoadData(id) {
	$.ajax({
		type: 'GET',
		url: dn + '' + lhandler,
		data: 'fid=' + id,
		success: function (msg) {
			var nodes = JSON.parse(msg);
			for (var i = 0; i < nodes.length; i++) {
				getNode(nodes[i]);
			}
			// load connects
			LoadConnects(id);
		},
	});
}

function LoadConnects(id) {
	$.ajax({
		type: 'GET',
		url: dn + '' + chandler,
		data: 'fid=' + id,
		success: function (msg) {
			var connects = JSON.parse(msg);
			for (var i = 0; i < connects.length; i++) {
				genConnects(connects[i]);
			}
		},
	});
}

function genConnects(obj) {
	var settings = flowchartSettings;
	if (connectStyle == 'Bezier')
		settings = bezierSettings;
	else if (connectStyle == 'StateMachine')
		settings = statemachineSettings;
	jsPlumb.connect({
		source: obj.selementid,
		target: obj.delementid,
		detachable: false,
		paintStyle: {
			strokeStyle: strokeColor,
			lineWidth: strokeLineWidth
		},
		hoverPaintStyle: {
			strokeStyle: hoverPaintStyle,
			lineWidth: hoverstrokeLineWidth
		},
		dragOptions: {
			cursor: "pointer",
			zIndex: 2000
		},
		endpoint: "Blank",
		anchors: [obj.sconnectpos, obj.dconnectpos],
		connector: [connectStyle, settings]
	});
	prepareConnectInfo(obj.selementid, obj.delementid, obj.sconnectpos, obj.dconnectpos, obj.relation);
	switch (obj.relation) {
	case "Child":
		genCounter++;
		break;
	case "Father":
		genCounter++;
	}
}

function getNode(obj) {
	var cwidth = obj.leftpos;
	var cheight = obj.toppos;
	var css = obj.gender;
	var gender = obj.gender;
	if (trim(obj.isauthor) == 1)
		css = css + " author";
	var cap = obj.nodecaption;
	var nodename = "";
	if (trim(obj.firstname) != "")
		nodename = obj.firstname;
	if (trim(obj.surname) != "")
		nodename = nodename + ' ' + obj.surname;
	if (trim(nodename) == "")
		nodename = obj.nodecaption;
	else if (trim(obj.photo) != "")
		nodename = nodename + '<br /><img src="' + obj.photo + '" class="img-rounded" style="width:' + pWidth + 'px; height:' + pHeight + 'px;" alt="' + nodename + '"Photo" />';
	var Div = $('<div>', {
		id: obj.elementid
	}, {
		class: 'window'
	}).html(nodename).css({
		'min-height': conHeight,
		'width': conWidth,
		top: cheight + 'px',
		left: cwidth + 'px',
		position: 'absolute'
	}).attr("data-id", obj.elementid).appendTo('#chart-demo');
	jsPlumb.draggable($(Div));
	$(Div).addClass('chart-demo window ' + css);
	$(Div).attr('data-familyid', obj.familyid);
	$(Div).attr('data-name', nodename);
	$(Div).attr('data-fname', obj.firstname);
	$(Div).attr('data-sname', obj.surname);
	$(Div).attr('data-gender', gender);
	$(Div).attr('data-postop', cheight);
	$(Div).attr('data-posleft', cwidth);
	if (trim(obj.photo) != "")
		$(Div).attr('data-photo', obj.photo);
	if (trim(obj.birthdate) != "") {
		var sbirth = obj.birthdate.split("/");
		$(Div).attr('data-dbirthmon', sbirth[1]);
		$(Div).attr('data-dbirthday', sbirth[0]);
		$(Div).attr('data-dbirthyr', sbirth[2]);
	}
	$(Div).attr('data-isliving', obj.isliving);
	if (obj.isliving == 0) // dead
	{
		if (trim(obj.deathdate) != "") {
			var dbirth = obj.deathdate.split("/");
			$(Div).attr('data-ddeathmon', dbirth[1]);
			$(Div).attr('data-ddeathday', dbirth[0]);
			$(Div).attr('data-ddeathyear', dbirth[2]);
		}
	}
	if (trim(obj.email) != "")
		$(Div).attr('data-email', obj.email);
	if (trim(obj.website) != "")
		$(Div).attr('data-website', obj.website);
	if (obj.hometel != "")
		$(Div).attr('data-tel', obj.hometel);
	if (trim(obj.mobile) != "")
		$(Div).attr('data-mobile', obj.mobile);
	if (trim(obj.birthplace) != "")
		$(Div).attr('data-birthplace', obj.birthplace);
	if (trim(obj.deathplace) != "")
		$(Div).attr('data-deathplace', obj.deathplace);
	if (trim(obj.profession) != "")
		$(Div).attr('data-profession', obj.profession);
	if (trim(obj.company) != "")
		$(Div).attr('data-company', obj.company);
	if (trim(obj.interests) != "")
		$(Div).attr('data-interests', obj.interests);
	if (trim(obj.bionotes) != "")
		$(Div).attr('data-bio', obj.bionotes);
	// mark selected node to be shown in display view when clicked
	$(Div).attr('data-isupd', '1');
	// register element id for saving trees
	iDs.push({
		eid: obj.elementid,
		position: cheight
	});
}

function prepareParentOptions() {
	$('#epartner').hide();
	$('#einfo').hide();
	$('#esubling').show();
	// add dyamic options
	$('#cpartners').html('');
	$('#cpartners').prepend('<li><a class="acancel" href="#">Cancel</a></li>');
	$('#cpartners').prepend("<li><a id=\"aparent02\" href=\"#\">Add Father</a></li>");
	$('#cpartners').prepend("<li><a id=\"aparent01\" href=\"#\">Add Mother</a></li>");
	$('#cpartners').prepend("<li><a id=\"aparent\" href=\"#\">Add Parents (Mother & Father)</a></li>");
}

function prepareSiblingOptions() {
	$('#epartner').hide();
	$('#einfo').hide();
	$('#esubling').show();
	// add dyamic options
	$('#cpartners').html('');
	$('#cpartners').prepend('<li><a class="acancel" href="#">Cancel</a></li>');
	// check whether parent exist
	var nodeid = $('#findex').html();
	var mothernodeid = nodeid + "-5f";
	var fathernodeid = nodeid + "-5m";
	// add relationship with other parents
	var x = 10;
	while (x > 0) {
		if ($('#' + mothernodeid + '' + x).length > 0) {
			var mid = mothernodeid + '' + x;
			$('#cpartners').prepend('<li><a class="dsublings" href="#" data-mid="' + mid + '">Add Brother or Sister with (' + genFullName('#' + mid) + ')</a></li>');
		}
		if ($('#' + fathernodeid + '' + x).length > 0) {
			var mid = fathernodeid + '' + x;
			$('#cpartners').prepend('<li><a class="dsublings" href="#" data-fid="' + mid + '">Add Brother or Sister with (' + genFullName('#' + mid) + ')</a></li>');
		}
		x = x - 1;
	}
	// add relationship with both mother and father
	if ($('#' + mothernodeid).length > 0 && $('#' + fathernodeid).length > 0)
		$('#cpartners').prepend('<li><a id="asublings01" href="#" data-mid="' + mothernodeid + '" data-fid="' + fathernodeid + '">Add Brother or Sister with Parents (' + genFullName('#' + fathernodeid) + ' &amp; ' + genFullName('#' + mothernodeid) + ')</a></li>');
	$('#cpartners').prepend("<li><a id=\"asublings\" href=\"#\">Add Brother or Sister</a></li>");
}

function prepareChildOptions() {
	$('#epartner').hide();
	$('#einfo').hide();
	$('#esubling').show();
	var nodeid = $('#findex').html();
	var partnerid = nodeid + '-2'; // 2: partner, 3: ex-partner
	var expartnerid = nodeid + '-3';
	var gencap = "";
	if ($('#' + nodeid).data("gender") == 'male') {
		gencap = "Mother";
		partnerid = partnerid + "f";
		expartnerid = expartnerid + "f";
	} else {
		gencap = "Father";
		partnerid = partnerid + "m";
		expartnerid = expartnerid + "m";
	}
	// add dyamic options
	$('#cpartners').html('');
	$('#cpartners').prepend('<li><a class="acancel" href="#">Cancel</a></li>');
	// add relationship with other partner / ex-partner
	var x = 10;
	while (x > 0) {
		if ($('#' + partnerid + '' + x).length > 0) {
			var mid = partnerid + '' + x;
			$('#cpartners').prepend('<li><a class="dpartner" href="#" data-mid="' + mid + '">Add Child with Partner (' + genFullName('#' + mid) + ')</a></li>');
		}
		if ($('#' + expartnerid + '' + x).length > 0) {
			var mid = expartnerid + '' + x;
			$('#cpartners').prepend('<li><a class="dexpartner" href="#" data-mid="' + mid + '">Add Child with Ex Partner (' + genFullName('#' + mid) + ')</a></li>');
		}
		x = x - 1;
	}
	// normal partner
	if ($('#' + partnerid).length > 0)
		$('#cpartners').prepend('<li><a class="dpartner" href="#" data-mid="' + partnerid + '">Add Child with Partner (' + genFullName('#' + partnerid) + ')</a></li>');
	// add normal ex partner
	if ($('#' + expartnerid).length > 0)
		$('#cpartners').prepend('<li><a class="dexpartner" href="#" data-mid="' + expartnerid + '">Add Child with Ex Partner (' + genFullName('#' + expartnerid) + ')</a></li>');
	$('#cpartners').prepend("<li><a id=\"achildnoftr\" href=\"#\">Add child without " + gencap + "</a></li>");
	$('#cpartners').prepend("<li><a id=\"achildnfthr\" data-gender=\"" + gencap + "\" href=\"#\">Add child with new " + gencap + "</a></li>");
}

function prepareMsg(msg) {
	$('#' + msgLabel).html("<h3>" + msg + "</h3>");
}