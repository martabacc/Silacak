<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="detail-page portlet light bg-inverse form-fit" >
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase">
							<!-- TODO LANG -->
							Progress Klasifikasi Data ISSN
						</span>
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body form">
				<pre id="console">asdklfhasldjfagsdljfhadsflhadslf</pre>
                <script language="javascript" type="text/javascript" >
                
                var cmds = {}
                    function receiveResult(cmd, id, callback){ // This function effectively receives the result from the execution of the program.
                    var reg = new RegExp("--"+id+"--$");
                    cmds_interval[id] = setInterval(function(){
                        $.ajax({
                            url:"<?php echo base_url('issn/runPythonScript')?>"    ,
                            dataType: "text",
                            data: {"verify_id":id},
                            success: function(msg){
                            if(reg.test(msg)){ // Is the script closed?
                                msg = msg.replace(reg, ""); // If yes, removes it from the end of the string
                                clearInterval(cmds_interval[id]); // And clear the interval
                            }
                            callback(msg, id, cmd); // Callback with the message from the stdout 
                            }
                        });
                    }, 1000); // refreshes with a interval of 1 second
                    return cmds_interval[id];
                    }

                    function exec(cmd, callback){
                    $.ajax({
                        url:"<?php echo base_url('issn/runPythonScript')?>",
                        dataType: "text",
                        data: {"daemon":cmd},
                        success: function(id){
                        receiveResult(cmd, id, callback);
                        }
                    });
                    }
                </script>

                <script language="javascript" type="text/javascript" >
                    exec("python script.py", function(msg){ 
                        $("#console").html(msg);
                    });
                </script>
				</div>
			</div>
		</div>
	</div>
</div>
