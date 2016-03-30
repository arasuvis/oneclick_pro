
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JTree Genealogy Tree Maker Script - Create Family Tree</title>
    <link href="<?php echo $tree_url;?>assets/css/bootswatch/simplex/main.css" type="text/css" rel="stylesheet">
    <link href="<?php echo $tree_url;?>assets/css/tree.css" type="text/css" rel="stylesheet">
</head>
<body>
   
<div class="container">
    <ol class="breadcrumb">
      <li class="active">Create Family Tree</li>
    </ol>
    <!-- Start Family Tree Script -->
    <hr />
    <!-- toolbar section -->
    <div id="tcontainer">
        <div class="item">
            <div id="treemsg"></div>
             <div id="lstatus"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="text-align:center;">
                     <button id="_saveTree" title="Save Family Tree" class="btn btn-success">Save Tree</button>
                </div>
           </div>            
    </div>
    <!-- store tree stats -->
    <div id="dinfo">
      <span id="findex" style="display:none;"></span>
      <span id="fseindex" style="display:none;"></span>
      <span id="fteindex" style="display:none;"></span>
      <span id="fid" style="display:none;">0</span>
      <span id="postop" style="display:none;"></span>
      <span id="posleft" style="display:none;"></span>
      <div id="vinfo" style="display:none;"></div>
   </div>
    <!-- tree settings -->
    <script type="text/javascript">
      //  var dn = 'http://bootstrapkits.com/jtree/'; // url where jTree script will run
	    var dn = '<?php echo $tree_url;?>'; // url where jTree script will run
        var hd = 'tree/handler.php';		
        var sconnects = 'tree/savecon.php';
        var lhandler = 'tree/load.php';
        var chandler = 'tree/lconnects.php';
        var strokeColor = '#005b0f';
        var hoverPaintStyle = '#ff0000';
        var strokeLineWidth = 1;
        var hoverstrokeLineWidth = 2;
        var connectStyle = 'Flowchart'; // Bezier, StateMachine, Flowchart,
        var offsetdiff = 20; // horizontal space between two nodes
        var defaultUName = 'administrator';
        var defaultFName = '';
        var defaultSName = '';
        var redirectPageName = 'created.html';
        var familyID = '0'; // id of tree to load
        var msgLabel = 'treemsg';
        var smoothScroll = false; // enable or disable smooth scrolling
        var readOnly = false; // enable or disable readonly
        // plupload settings
        var plUploadHandler = "tree/modules/uploadhandler.php";
        var plupload_flash_url = "assets/plugins/plupload/js/plupload.flash.swf";
        var plupload_silverlight_url = "assets/plugins/plupload/js/plupload.silverlight.xap";
        var maxFileSize = "10mb";
        // default image url
        var defaultThumbUrl = "<?php echo $tree_url;?>assets/images/holder.png"
    </script>
    <!-- actual tree section -->              
    <div class="row">
        <div class="col-lg-12">
             <div id="vcart">			
                 <div class="vcart-inner chart-demo" id="chart-demo">
                </div>            
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- modal dialog popup -->
    <!-- Modal Popup -->
    <div class="modal fade" id="cModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="aheading" class="modal-title"></h4>
      </div>
      <div id="lcatform">
       <div class="item" id="modaltopnav">
            <nav class="navbar navbar-inverse" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse" id="rnav">
                <ul class="nav navbar-nav">
                  <li id="modalp1" class="active"><a id="_parentOptions" href="#">Add Parent</a></li>
                  <li id="modalp2"><a id="_partnerOptions" href="#">Add Partner / Ex</a></li>
                  <li id="modalp3"><a id="_siblingOptions" href="#">Add Brother / Sister</a></li>
                  <li id="modalp4"><a id="_childOptions" href="#">Add Child</a></li>
                </ul>
              </div>
            </nav>
       </div>
       <div class="pd_5" id="einfo">
                    <form id="modalfrm" method="post">
                    <div id="modalmsg"></div>
                    <div id="modalemode">
                    <ul class="nav nav-tabs">
                      <li><a href="#personal" data-toggle="tab">Personal</a></li>
                      <li><a href="#contact" data-toggle="tab">Contact</a></li>
                      <li><a href="#biographical" data-toggle="tab">Biographical</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="personal">
                          <div class="row item_pad">
                             <div class="col-lg-3">
                             	<div class="pd_5" id="modaledthumb">
			                      <div id="_tThumb" class="vd" style="width:100px;\">
			                         <a href="#" title="user profile">
      		                            <img class="img-rounded" id="modaledchange" src="<?php echo $tree_url;?>assets/images/holder.png" style="width:100px; height:100px;" alt="Profile Photo">
                                     </a>
			                         <div class="dur mini-text ui-corner-all" style="bottom:5px; right:5px; display:none;">
			                           <a id="tchange" class="xxmedium-text" title="update photo"><span class=" glyphicon glyphicon-plus-sign white"></span></a>
			                         </div>
                                  </div>
                                </div>
                             </div>
                             <div class="col-lg-9">
                                <div class="form-horizontal" role="form">
                                 <fieldset>
                                      <div class="form-group">
                                           <label for="txt_fname" class="col-lg-3 control-label input-xs">First Name:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_fname" class="form-control input-sm" name="txt_fname" placeholder="Enter First Name">
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_sname" class="col-lg-3 control-label input-sm">Sur Name:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_sname" class="form-control input-sm" name="txt_sname" placeholder="Enter Sur Name">
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_sname" class="col-lg-3 control-label input-sm">Gender:</label>
                                           <div class="col-lg-7">
                                               <label class="radio-inline">
                                                  <input type="radio" name="gender" id="modalckmale" value="male"> Male
                                               </label>
                                               <label class="radio-inline">
                                                   <input type="radio" name="gender" id="modalckfemale" value="female"> Female
                                               </label>
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_sname" class="col-lg-3 control-label input-sm">Birth Date:</label>
                                           <div class="col-lg-7">
                                               <div class="form-inline">
                                                  <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail3">Enter Month</label>
                                                    <select id="dbirthmon" name="dbirthmon" class="form-control input-sm" style="width:80px">
                                                     <option value=""> </option>
                                                      <option value="jan">Jan</option>
                                                      <option value="feb">Feb</option>
                                                      <option value="mar">Mar</option>
                                                      <option value="apr">Apr</option>
                                                      <option value="may">May</option>
                                                      <option value="jun">Jun</option>
                                                      <option value="jul">Jul</option>
                                                      <option value="aug">Aug</option>
                                                      <option value="sep">Sep</option>
                                                      <option value="oct">Oct</option>
                                                      <option value="nov">Nov</option>
                                                      <option value="dec">Dec</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword3">Enter Day</label>
                                                    <select id="dbirthday" name="dbirthday" class="form-control input-sm" style="width:80px">
                                                     <option value=""> </option>
                                                      <option value="01">01</option>
                                                      <option value="02">02</option>
                                                      <option value="03">03</option>
                                                      <option value="04">04</option>
                                                      <option value="05">05</option>
                                                      <option value="06">06</option>
                                                      <option value="07">07</option>
                                                      <option value="08">08</option>
                                                      <option value="09">09</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                      <option value="12">12</option>
                                                      <option value="13">13</option>
                                                      <option value="14">14</option>
                                                      <option value="15">15</option>
                                                      <option value="16">16</option>
                                                      <option value="17">17</option>
                                                      <option value="18">18</option>
                                                      <option value="19">19</option>
                                                      <option value="20">20</option>
                                                      <option value="21">21</option>
                                                      <option value="22">22</option>
                                                      <option value="23">23</option>
                                                      <option value="24">24</option>
                                                      <option value="25">25</option>
                                                      <option value="26">26</option>
                                                      <option value="27">27</option>
                                                      <option value="28">28</option>
                                                      <option value="29">29</option>
                                                      <option value="30">30</option>
                                                      <option value="31">31</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword3">Enter Year</label>
                                                    <input type="text" id="dbirthyr" name="dbirthyr" class="form-control input-sm" style="width:60px"  placeholder="YY" required maxlength="4" >
                                                  </div>
                                                </div>
                                           </div>
                                     </div>
                                     <div class="form-group">
                                          <div class="col-sm-offset-2 col-sm-10">
                                          <div class="checkbox">
                                            <label>
                                              <input id="chkliving" name="chkliving" type="checkbox" checked> This person is living
                                            </label>
                                          </div>
                                      </div>
                                     </div>
                                     <div class="form-group" style="display:none;" id='modaledeath'>
                                           <label for="txt_sname" class="col-lg-3 control-label input-sm">Death Date:</label>
                                           <div class="col-lg-7">
                                                 <div class="form-inline">
                                                  <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail3">Enter Month</label>
                                                    <select id="ddeathmon" name="ddeathmon" class="form-control input-sm" style="width:80px">
                                                      <option value=""> </option>
                                                      <option value="jan">Jan</option>
                                                      <option value="feb">Feb</option>
                                                      <option value="mar">Mar</option>
                                                      <option value="apr">Apr</option>
                                                      <option value="may">May</option>
                                                      <option value="jun">Jun</option>
                                                      <option value="jul">Jul</option>
                                                      <option value="aug">Aug</option>
                                                      <option value="sep">Sep</option>
                                                      <option value="oct">Oct</option>
                                                      <option value="nov">Nov</option>
                                                      <option value="dec">Dec</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword3">Enter Day</label>
                                                    <select id="ddeathday" name="ddeathday" class="form-control input-sm" style="width:80px">
                                                     <option value=""> </option>
                                                      <option value="01">01</option>
                                                      <option value="02">02</option>
                                                      <option value="03">03</option>
                                                      <option value="04">04</option>
                                                      <option value="05">05</option>
                                                      <option value="06">06</option>
                                                      <option value="07">07</option>
                                                      <option value="08">08</option>
                                                      <option value="09">09</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                      <option value="12">12</option>
                                                      <option value="13">13</option>
                                                      <option value="14">14</option>
                                                      <option value="15">15</option>
                                                      <option value="16">16</option>
                                                      <option value="17">17</option>
                                                      <option value="18">18</option>
                                                      <option value="19">19</option>
                                                      <option value="20">20</option>
                                                      <option value="21">21</option>
                                                      <option value="22">22</option>
                                                      <option value="23">23</option>
                                                      <option value="24">24</option>
                                                      <option value="25">25</option>
                                                      <option value="26">26</option>
                                                      <option value="27">27</option>
                                                      <option value="28">28</option>
                                                      <option value="29">29</option>
                                                      <option value="30">30</option>
                                                      <option value="31">31</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword3">Enter Year</label>
                                                    <input type="text" id="ddeathyear" name="ddeathyear" class="form-control input-sm" style="width:60px"  placeholder="YY" required maxlength="4">
                                                  </div>
                                                </div>
                                           </div>
                                     </div>
                                 </fieldset>
                                </div>
                             </div>
                          </div>
                      </div>
                      <div class="tab-pane" id="contact">
                         <div class="item_pad">
                            <div class="form-horizontal" role="form">
                                 <fieldset>
                                      <div class="form-group">
                                           <label for="txt_email" class="col-lg-3 control-label input-sm">Email:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_email" class="form-control input-sm" name="txt_email" placeholder="Enter Email">
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_website" class="col-lg-3 control-label input-sm">Website:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_website" class="form-control input-sm" name="txt_website" placeholder="Enter Website">
                                           </div>
                                     </div>
                                     <div class="form-group">

                                           <label for="txt_tel" class="col-lg-3 control-label input-sm">Home Tel:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_tel" class="form-control input-sm" name="txt_tel" placeholder="Enter Home Tel">
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_tel" class="col-lg-3 control-label input-sm">Mobile:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_mobile" class="form-control input-sm" name="txt_mobile" placeholder="Enter Mobile">
                                           </div>
                                     </div>
                                                                                     
                                 </fieldset>
                                </div>
                         </div>
                      </div>
                      <div class="tab-pane" id="biographical">
                         <div class="item_pad">
                            <div class="form-horizontal" role="form">
                                 <fieldset>
                                      <div class="form-group">
                                           <label for="txt_bplace" class="col-lg-3 control-label input-sm">Birth Place:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_bplace" class="form-control input-sm" name="txt_bplace" placeholder="Enter Birth Place">
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_dplace" class="col-lg-3 control-label input-sm">Death Place:</label>
                                           <div class="col-lg-7">
                                              <input type="text" id="txt_dplace" class="form-control input-sm" name="txt_dplace" placeholder="Enter Death Place">
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_profession" class="col-lg-3 control-label input-sm">Profession:</label>
                                           <div class="col-lg-7">
                                              <textarea id="txt_profession" name="txt_profession" class="form-control input-sm" rows="2" placeholder= "Enter Profession"></textarea>
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_company" class="col-lg-3 control-label input-sm">Company:</label>
                                           <div class="col-lg-7">
                                              <textarea id="txt_company" name="txt_company" class="form-control input-sm" rows="2" placeholder= "Enter Company"></textarea>
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_interests" class="col-lg-3 control-label input-sm">Interests:</label>
                                           <div class="col-lg-7">
                                              <textarea id="txt_interests" name="txt_interests" class="form-control input-sm" rows="2" placeholder= "Enter Interests"></textarea>
                                           </div>
                                     </div>
                                     <div class="form-group">
                                           <label for="txt_bio" class="col-lg-3 control-label input-sm">Bio Notes:</label>
                                           <div class="col-lg-7">
                                           	  <textarea id="txt_bio" name="txt_bio" class="form-control input-sm" rows="2" placeholder= "Enter Bio Notes"></textarea>
                                           </div>
                                     </div>                                            
                                 </fieldset>
                                </div>
                         </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-offset-3">
                         <button id="btnmodok" class="btn btn-primary btn-sm">Ok</button>
                         <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                       </div>
                    </div>
                    </div>
                    <div id="modaldmode">
                    </div>
                    </form>
                </div>
       <div class="pd_5" id= "epartner" style="display:none;">
       		<div class="item_c">
            	<ul class="nav nav-pills nav-stacked">
                   <li><a id="apartner" href="#">Add New Partner</a></li>
                   <li><a id="aexpartner" href="#">Add New Ex Partner</a></li>
                   <li><a class="acancel" href="#">Cancel</a></li>
                </ul>
            </div>
       </div>
       <div class="pd_5" id="esubling" style="display:none;">
       		<div class="item_c">
            	<ul class="nav nav-pills nav-stacked" id="cpartners">
                   
                </ul>
            </div>
       </div>
    </div>
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal fade -->
    <!-- End Family Tree Script -->
   
</div>
   


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo $tree_url;?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo $tree_url;?>assets/plugins/plumb/lib/jquery-ui-1.9.2-min.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/lib/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/lib/jsBezier-0.6.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/lib/jsplumb-geom-0.1.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/util.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/dom-adapter.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/jsPlumb.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/endpoint.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/connection.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/anchors.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/defaults.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/connectors-bezier.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/connectors-flowchart.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/connectors-statemachine.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/connector-editors.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/renderers-svg.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/renderers-canvas.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/renderers-vml.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plumb/src/jquery.jsPlumb.js"></script>
<script src="<?php echo $tree_url;?>assets/js/jquery.overscroll.min.js"></script>
<script src="<?php echo $tree_url;?>assets/plugins/plupload/js/plupload.full.js"></script>

<script src="<?php echo $tree_url;?>tree/tree.js"></script>
<script src="<?php echo $tree_url;?>assets/js/jquery.mousewheel.js"></script>

</body>
</html>
