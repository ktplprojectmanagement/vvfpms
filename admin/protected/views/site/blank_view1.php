            <!-- BEGIN CONTENT -->
            <script src="ckeditor.js"></script>
            <script src="editor_js/sample.js"></script>
            <link rel="stylesheet" href="editor_css/samples.css">
            <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
            <div class="page-content-wrapper">
            <style type="text/css">
                #cke_45
                {
                    display: none;
                }
                #cke_1_contents
                {
                    height: 300px;
                }
            </style>
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
                    <h3 class="page-title"> Setup Mail
                    </h3>
                    <div class="col-md-1">
                    <label for="sel1">Mail Type :</label>
                    </div>
                  <div class="form-group">
                    <div class="col-md-4">
                       <div class="form-group">
                      
                      <select class="form-control" id="sel1">
                            <option>Goalsheet submitted Mail Format</option>
                            <option>Goalsheet approval Mail Format</option>
                            <option>IDP Approval Mail Format</option>
                            <option>IDP Pending Mail Format</option>
                            <option>Midyear goalsheet approval Mail Format</option>
                            <option>Midyear IDP approval Mail Format</option>
                      </select>
                    </div>
                    </div> <br>                     
                </div> 
                
                    
                <br>
                <br>
                <div id="editor">
                    <h1>Setup mail body!</h1>
                </div><br> 
                <input type="button" class='btn green' value='Save' style="float: right;" id="get_data">
                <script>
                    initSample();
                </script>
                <script type="text/javascript">
                $(function(){
                    $("#get_data").click(function(){
                        var data = CKEDITOR.instances.editor.getData();
                        alert(data);
                        //alert(editor.getData());
                    });
                });
                </script>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->           
        </div>
        <!-- END CONTAINER -->