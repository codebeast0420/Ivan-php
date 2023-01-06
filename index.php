<html>
    <head>
        <title>Invoice System</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="./script.js"></script>
    </head>
    <body>
        <div class="container">
<div class="header">
		<img class="logo" src="docwatts_logo.png" width="120px">
	<h2>Materials Request Form</h2>
	<span>Complete the form and click on "Mail" to submit </span>
</div>
            <div class="row">
                <div class="col-sm-3 number">
                    <h4>Job/Work Number <span class="required_dot">*</span></h4>
                </div>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" id="work_num" />
                </div>
            </div>
            <div class="row requested_by">
                <div class="col-sm-3">
                    <h4>Requested By:</h4>
                </div>
                <div class="col-sm-6">
                    <select name="requested_by" id="requested_by" class="form-control">

                                          
                        
                        
			<option value="Chenet">Chenet</option>
			<option value="George">George</option>
			<option value="Henry">Henry</option>
			<option value="Jackson">Jackson</option>
			<option value="Jacob">Jacob</option>
			<option value="Jonah">Jonah</option>
			<option value="Jose">Jose</option>
			<option value="Joshua P">Joshua P</option>
			<option value="Ronaldo">Ronaldo</option>
			<option value="Teddy">Teddy</option>
			
                    </select>
                </div>
            </div>
            <div class="row order_parts">
                <div class="col-sm-3">
                    <h4>Order Parts</h4>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-1"><h5>&#10004</h5></div>
                        <div class="col-sm-1"><h5>Qty</h5></div>
                        <div class="col-sm-4"><h5>Parts</h5></div>
                        <div class="col-sm-2"><h5>Unit</h5></div>
                        <div class="col-sm-2"><h5>Need By</h5></div>
                    </div>
                    <ul class="item_list">
                    </ul>
                    <div class="row">
                        <div class="new_item"  data-toggle="modal" data-target="#myModal" onclick="newItem()">
                            <span><i class="fa fa-plus-circle"></i></span>
                            <h4>New Item</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row vehicle_number">
                <div class="col-sm-3">
                    <h4>Vehicle Number</h4>
                </div>
                <div class="col-sm-6">
                    <select name="vehicle_number" id="vehicle_number" class="form-control">
                         <option value="SV-E002">SV-E002</option>
                        <option value="SV-E001">SV-E001</option>
                        <option value="SV-E003">SV-E003</option>
                        <option value="SV-E004">SV-E004</option>
                        <option value="BT-E001">BT-E001</option>
                        <option value="BX-E001">BX-E001</option>
                        <option value="GS-ORL01">GS-ORL01</option>
                        <option value="GT-E001">GT-E001</option>
                        <option value="OV-001">OV-001</option>
                        <option value="OV-002">OV-002</option>
                        <option value="SA-E001">SA-E001</option>
                        <option value="SA-E002">SA-E002</option>
                        <option value="SA-E003">SA-E003</option>
                        <option value="SA-E004">SA-E004</option>
                        <option value="SA-E005">SA-E005</option>
                        <option value="SA-E006">SA-E006</option>
                        <option value="SA-E007">SA-E007</option>
                        <option value="SA-E008">SA-E008</option>
                        <option value="SA-E009">SA-E009</option>
                        <option value="WH-ORL01">WH-ORL01</option>
                        <option value="WH-TPA01">WH-TPA01</option>
                        <option value="WV-E001">WV-E001</option>
                    </select>
                </div>
            </div>
            <div class="row parts_get2">
                <div class="col-sm-12">
                   
                </div>
            </div>
            <div class="row footer">
                <div class="col-sm-9">
                    
                    
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-6">
                        <button class="btn btn-success" id="snd-mail" onclick="sendmail()">Mail</button>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-warning" >Cancel</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Item</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" id="qty" class="form-control" min="1" />
                    </div>
                    <div class="form-group">
                        <label for="item">Select Item</label>
                        <input type="text" name="item" id="item" onfocus="dropDown()" class="form-control" autocomplete="off" >
                        <div id="myDropdown" class="dropdown-content">
                            <input type="text" placeholder="Search.." id="myInput" class="form-control" autocomplete="off"/>
                            <div id="filter_result">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="unit">Unit</label>
                      <textarea class="form-control" id="unit"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="needby">Need by</label>
                      <input class="form-control" type="date"  id="need_by"/>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" onclick="add_item()">Select</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
    </body>
</html>
