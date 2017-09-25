
<style>
.active {
    background-color: #fff;
}
#err { 
    position: fixed; 
    top: 85px; right: 20; 
    z-index: 10; 
    width: 364px;
    height: 60px;
    border: 1px solid #4C9ED9;
    text-align: center;
    padding-top: 10px;

}


</style> 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    $(function(){
        $(".hasDatepicker").keypress(function(e){ e.preventDefault(); });
    });
  </script>

  <script>
  $( function() {
    $("#dob").datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '1900:2050'}).on('change', function () {
            var yrs=$("#dob").val().split("-");
            var yr=parseInt(yrs[0])+60;
            var retire_dt= yrs[2]+"-"+yrs[1]+"-"+yr;
            $('#dt_retire').val(retire_dt);
            var newdate = ($("#dob").val()).split("-").reverse().join("-");
            var age = getAge(this);
            var months=age.split("years");
            $('#age_yrs').val(months[0]+''+'Years');
            $('#age_mnt').val(months[1]);
            console.log(age);
            $('#dob').val(newdate);

        });
    $( "#date_confrm_trn").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#date_confrm_prob").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#doj_vvf" ).datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '1900:2050'}).on('change', function () {
            var newdate1 = ($("#doj_vvf").val()).split("-").reverse().join("-");
            var doj=($("#doj_vvf").val()).split("-").reverse().join("/");

            var exp = getAge(this);
            var exp_yr=exp.split("years");
            var other_exp= 0 ;
            $('#vvf_exp').val(exp_yr[0]+''+'Years');
            $('#doj_vvf').val(newdate1);
            if ($('#othr_exp').val()!='') {
                other_exp=$('#othr_exp').val(); 
               
            };
            var tot_expn=parseInt(other_exp)+parseInt(exp_yr[0]);
            $('#tot_exp').val((parseInt(other_exp)+parseInt(exp_yr[0]))+''+'Years');
           var arr = doj.split("/");
           var join_dat = new Date(arr[2],arr[1]-1,arr[0]);
           var trn_prob=new Date(new Date(join_dat).setMonth(join_dat.getMonth()+12));
           var fin_dt = new Date(new Date(join_dat).setMonth(join_dat.getMonth()+18));
           var fin_trn_prob = convert(trn_prob);
           $('#due_date_trn_prob').val(fin_trn_prob);
           var dt_of_con = convert(fin_dt);
           $('#confirm_due_date').val(dt_of_con);
    });
    $( "#due_date_trn_prob").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#act_date_trn_prob").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#confirm_due_date" ).datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#confrm_extn_dt").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#confrm_actl_dt").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#promo_dt").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#dt_retire").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#dt_rsign").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#redesgn_dt").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#lst_wrk_dt").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
    $( "#redesign_dt").datepicker({dateFormat: 'dd-M-yy',changeMonth: true,changeYear: true,yearRange: '1900:2050'});
  });

    function process(date){
   var parts = date.split("/");
   return new Date(parts[2], parts[1] - 1, parts[0]);
}
   function getAge(dateVal) {
    //alert(dateVal);
            var
                birthday = new Date(dateVal.value),
                today = new Date(),
                ageInMilliseconds = new Date(today - birthday),
                years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
                months = 12 * (years % 1),
                days = Math.floor(30 * (months % 1));
                //alert(today);

                return Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days';

        }

        function convert(str) {
    var date = new Date(str),
        mnth = ("0" + (date.getMonth()+1)).slice(-2),
        day  = ("0" + date.getDate()).slice(-2);
    return [day,mnth,date.getFullYear()].join("-");
}
  </script>  
    <script type="text/javascript">
 $(function(){
var d = new Date(2017, 09, 01);

//alert(d);

            if($('#dob').val() != ''){

            var yrs=$("#dob").val().split("-");
            var yr=parseInt(yrs[0])+60;
            var retire_dt= yrs[2]+"-"+yrs[1]+"-"+yr;
            $('#dt_retire').val(retire_dt);
            var newdate = ($("#dob").val()).split("-").reverse().join("-");
            var age = getAge(dob);
            var months=age.split("years");
            $('#age_yrs').val(months[0]+''+'Years');
            $('#age_mnt').val(months[1]);
            console.log(age);
            $('#dob').val(newdate);




            var newdate1 = ($("#doj_vvf").val()).split("-").reverse().join("-");
            var exp = getAge(doj_vvf);
            var exp_yr=exp.split("years");
            var other_exp= 0 ;
            $('#vvf_exp').val(exp_yr[0]+''+'Years');
            $('#doj_vvf').val(newdate1);
            if ($('#othr_exp').val()!='') {
                other_exp=$('#othr_exp').val(); 
            
            };
            var tot_expn=parseInt(other_exp)+parseInt(exp_yr[0]);
            
            $('#tot_exp').val((parseInt(other_exp)+parseInt(exp_yr[0]))+' '+'Years');
        }
});
  </script>
  <script>
                       $(function(){

                        $('#state').change(function(){
                            var state_name = {
                                'state_name' : $('#state').find(':selected').val()
                            }
                            var base_url = window.location.origin;  
                            $.ajax({
                                 dataType :'html',
                                 type :'post',
                                 data : state_name,
                                 url : base_url+$("#basepath").attr('value')+'/index.php/MIS/city_list',
                                 success : function(data) {              
                                    $('#city').html(data);                              
                                }
                            });
                        });
                    });
     
  </script>
  <script>
 
$(document).ready(function(){
    
   
    // $("#pers_info").click(function(){
    //      if($('#err').text()==""){
    //     $('#li1').removeClass("active");
    //     $('#li2').addClass("active");
    //     $('#li3').removeClass("active");
    //     $('#li4').removeClass("active");
    //     $('#li5').removeClass("active");
    //     $('#li6').removeClass("active");
    //     $('#li7').removeClass("active");
    //     $('#li8').removeClass("active");
    //     }
    //     else{
    //         $("#pers_info").attr("href", "#");
    //     }
    // });
    // $("#genrl_info").click(function(){
    //     if($('#err').text()==""){
    //     $('#li1').removeClass("active");
    //     $('#li2').removeClass("active"); 
    //     $('#li3').addClass("active");
    //     $('#li4').removeClass("active");
    //     $('#li5').removeClass("active");
    //     $('#li6').removeClass("active");
    //     $('#li7').removeClass("active");
    //     $('#li8').removeClass("active");
    //     }
    //     else{
    //         $("#genrl_info").attr("href", "#");
    //     }
    // });
    // $("#reprt_detls").click(function(){
    //     if($('#err').text()==""){
    //     $('#li1').removeClass("active");
    //     $('#li2').removeClass("active");
    //     $('#li3').removeClass("active");
    //     $('#li4').addClass("active");
    //     $('#li5').removeClass("active");
    //     $('#li6').removeClass("active");
    //     $('#li7').removeClass("active");
    //     $('#li8').removeClass("active");
    //     }
    //     else{
    //         $("#reprt_detls").attr("href", "#");
    //     }
    // });
    // $("#join_detals").click(function(){
    //     if($('#err').text()==""){
    //     $('#li1').removeClass("active");
    //     $('#li2').removeClass("active");
    //     $('#li3').removeClass("active");
    //     $('#li4').removeClass("active");
    //     $('#li5').addClass("active");
    //     $('#li6').removeClass("active");
    //     $('#li7').removeClass("active");
    //     $('#li8').removeClass("active");
    //     }
    //     else{
    //         $("#join_detals").attr("href", "#");
    //     }
    // });
    // $("#promo_detals").click(function(){
    //     if($('#err').text()==""){
    //     $('#li1').removeClass("active");
    //     $('#li2').removeClass("active");
    //     $('#li3').removeClass("active");
    //     $('#li4').removeClass("active");
    //     $('#li5').removeClass("active");
    //     $('#li6').addClass("active");
    //     $('#li7').removeClass("active");
    //     $('#li8').removeClass("active");
    //     }
    //     else{
    //         $("#promo_detals").attr("href", "#");
    //     }
    // });
    // $("#trans_dtls").click(function(){
    //     if($('#err').text()==""){
    //     $('#li1').removeClass("active");
    //     $('#li2').removeClass("active");
    //     $('#li3').removeClass("active");
    //     $('#li4').removeClass("active");
    //     $('#li5').removeClass("active");
    //     $('#li6').removeClass("active");
    //     $('#li7').addClass("active");
    //     $('#li8').removeClass("active");
    //     }
    //     else{
    //         $("#trans_dtls").attr("href", "#");
    //     }
    // });
    // $("#leave_dtls").click(function(){
    //     if($('#err').text()==""){
    //     $('#li1').removeClass("active");
    //     $('#li2').removeClass("active");
    //     $('#li3').removeClass("active");
    //     $('#li4').removeClass("active");
    //     $('#li5').removeClass("active");
    //     $('#li6').removeClass("active");
    //     $('#li7').removeClass("active");
    //     $('#li8').addClass("active");
    //     }
    //     else{
    //         $("#leave_dtls").attr("href", "#");
    //     }
    // });
    
    $("#prve1").click(function(){
        $('#li1').addClass("active");
        $('#li2').removeClass("active");
        $('#li3').removeClass("active");
        $('#li4').removeClass("active");
        $('#li5').removeClass("active");
        $('#li6').removeClass("active");
        $('#li7').removeClass("active");
        $('#li8').removeClass("active");
    }); 
    $("#prve2").click(function(){
        $('#li1').removeClass("active");
        $('#li2').addClass("active");
        $('#li3').removeClass("active");
        $('#li4').removeClass("active");
        $('#li5').removeClass("active");
        $('#li6').removeClass("active");
        $('#li7').removeClass("active");
        $('#li8').removeClass("active");
    });
    $("#prve3").click(function(){
        $('#li1').removeClass("active");
        $('#li2').removeClass("active");
        $('#li3').addClass("active");
        $('#li4').removeClass("active");
        $('#li5').removeClass("active");
        $('#li6').removeClass("active");
        $('#li7').removeClass("active");
        $('#li8').removeClass("active");
    });
    $("#prve4").click(function(){
        $('#li1').removeClass("active");
        $('#li2').removeClass("active");
        $('#li3').removeClass("active");
        $('#li4').addClass("active");
        $('#li5').removeClass("active");
        $('#li6').removeClass("active");
        $('#li7').removeClass("active");
        $('#li8').removeClass("active");
    });
    $("#prve5").click(function(){
        $('#li1').removeClass("active");
        $('#li2').removeClass("active");
        $('#li3').removeClass("active");
        $('#li4').removeClass("active");
        $('#li5').addClass("active");
        $('#li6').removeClass("active");
        $('#li7').removeClass("active");
        $('#li8').removeClass("active");
    });
    $("#prve6").click(function(){
        $('#li1').removeClass("active");
        $('#li2').removeClass("active");
        $('#li3').removeClass("active");
        $('#li4').removeClass("active");
        $('#li5').removeClass("active");
        $('#li6').addClass("active");
        $('#li7').removeClass("active");
        $('#li8').removeClass("active");
    });
    $("#prve7").click(function(){
        $('#li1').removeClass("active");
        $('#li2').removeClass("active");
        $('#li3').removeClass("active");
        $('#li4').removeClass("active");
        $('#li5').removeClass("active");
        $('#li6').removeClass("active");
        $('#li7').addClass("active");
        $('#li8').removeClass("active");
    });

    
});

  </script>
  <script>
    $(document).ready(function(){
   
    $("#pers_info").click(function(){
        $('#fname').css('border','');
        $('#lname').css('border','');
        $('#mname').css('border','');
        $('#email').css('border','');
        $('#perm_add').css('border','');
        $('#state').css('border','');
        $('#city').css('border','');
        $('#pin').css('border','');
        $('#quali').css('border','');
        $('#marital_stat').css('border','');
        $('#no_of_depend').css('border','');
        $('#bld_grp').css('border','');
        $('#pan').css('border','');
        $('#dob').css('border','');
        $('#age_yrs').css('border','');
        $('#contact').css('border','');
        $('#comp_nm').css('border','');
        var nm = /^([a-zA-Z]{1,40})*$/;
        var eml = /^([A-Za-z0-9][A-Za-z0-9_\.]{1,})@([A-Za-z0-9][A-Za-z0-9\-]{1,}).([A-Za-z]{2,4})(\.[A-Za-z]{2,4})?$/;
        var con_no = /^[\d]{10}$/;
        var pin_no = /^[1-9][0-9]{5}$/;
        var adr = /^[1-9][0-9]{11}$/;
        var pan_no = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var mname = $('#mname').val();
        var email = $('#email').val();
        var perm_add = $('#perm_add').val();
        var pin = $('#pin').val();
        var quali = $('#quali').val();
        var pan = $('#pan').val();
        var dob = $('#dob').val();
        var age_yrs = $('#age_yrs').val();
        var age_mnt = $('#age_mnt').val();
        var state= $('option:selected', $('#state')).val();
        var city= $('option:selected', $('#city')).val();
        var mar_stat= $('option:selected', $('#marital_stat')).val();
        var no_of_depend= $('option:selected', $('#no_of_depend')).val();
        var blg_grp= $('option:selected', $('#bld_grp')).val();
        var gender= $('option:selected', $('#gender')).val();
        var post_grad = $('#pg').val();
        var add_edu = $('#add_qual').val();
        var aadhar_no = $('#aadhar').val();
        var sap =$('#sap').val();
        var u_id=$('#u_id').val();
        var contact = $('#contact').val();
        var comp_nm= $('option:selected',$('#comp_nm')).val();
        var per_email =$('#per_email').val();
        if($('#comp_nm').val()==""){
            $('#err').text("Please Select Company name");
            $('#err').show();
            $('#comp_nm').css('border','1px solid red');
            $('#comp_nm').focus();
        }
        else if($('#fname').val()==""){
            $('#err').text("Please enter first name");
            $('#err').show();
            $('#fname').css('border','1px solid red');
            $('#fname').focus();
        }
        else if(!nm.test($('#fname').val())){
            $("#err").css('display','block');
            $('#fname').focus();
            $('#fname').css('border','1px solid red');
            $("#err").text("Please enter only alphabhets in first name field");
        }
        else if(!nm.test($('#mname').val())){
            $("#err").css('display','block');
            $('#mname').focus();
            $('#mname').css('border','1px solid red');
            $("#err").text("Please enter only alphabhets in first name field");
        }
        else if($('#lname').val()==""){
            $('#err').text("Please enter last name");
            $('#err').show();
            $('#lname').css('border','1px solid red');
            $('#lname').focus();
        }
        else if(!nm.test($('#lname').val())){
            $("#err").css('display','block');
            $('#lname').focus();
            $('#lname').css('border','1px solid red');
            $("#err").text("Please enter only alphabhets in first name field");
        }
        // else if($('#mname').val()==""){
        //     $('#err').text("Please enter middle name");
        //     $('#err').show();
        //     $('#mname').css('border','1px solid red');
        //     $('#mname').focus();
        // }
        else if($('#email').val()==""){
            $('#err').text("Please enter Email id");
            $('#err').show();
            $('#email').css('border','1px solid red');
            $('#email').focus();
        }
        else if(!eml.test($('#email').val())){
            $("#err").css('display','block');
            $('#email').focus();
            $('#email').css('border','1px solid red');
            $("#err").text("Please enter valid email id");
        }
        else if(!eml.test($('#per_email').val())){
            $("#err").css('display','block');
            $('#per_email').focus();
            $('#per_email').css('border','1px solid red');
            $("#err").text("Please enter valid email id");
        }
        else if($('#contact').val()==""){
            $('#err').text("Please enter Contact number");
            $('#err').show();
            $('#contact').css('border','1px solid red');
            $('#contact').focus();
        }
        else if(!con_no.test($('#contact').val())){
            $('#err').text("Please enter valid Contact number");
            $('#err').show();
            $('#contact').css('border','1px solid red');
            $('#contact').focus();
        }
        else if($('#perm_add').val()==""){
            $('#err').text("Please enter Permanent Address");
            $('#err').show();
            $('#perm_add').css('border','1px solid red');
            $('#perm_add').focus();
        }
        else if(state ==""){
            $('#err').text("Please select State");
            $('#err').show();
            $('#state').css('border','1px solid red');
            $('#state').focus();
        }
        else if(city =="Select"){
            $('#err').text("Please select city");
            $('#err').show();
            $('#city').css('border','1px solid red');
            $('#city').focus();
        }
        else if($('#pin').val()==""){
            $('#err').text("Please enter Pin code");
            $('#err').show();
            $('#pin').css('border','1px solid red');
            $('#pin').focus();
        }
        else if(!pin_no.test($('#pin').val())){
            $('#err').text("Please enter valid Pin code");
            $('#err').show();
            $('#pin').css('border','1px solid red');
            $('#pin').focus();
        }
        else if($('#quali').val()==""){
            $('#err').text("Please enter Basic qualification");
            $('#err').show();
            $('#quali').css('border','1px solid red');
            $('#quali').focus();
        }
        else if(mar_stat == ""){
            $('#err').text("Please select Marital Status");
            $('#err').show();
            $('#marital_stat').css('border','1px solid red');
            $('#marital_stat').focus();
        }
        else if(no_of_depend ==""){
            $('#err').text("Please select No of Dependents");
            $('#err').show();
            $('#no_of_depend').css('border','1px solid red');
            $('#no_of_depend').focus();
        }
        else if(blg_grp ==""){
            $('#err').text("Please select Blood group");
            $('#err').show();
            $('#bld_grp').css('border','1px solid red');
            $('#bld_grp').focus();
        }
        // else if($('#pan').val()==""){
        //     $('#err').text("Please enter Pan Card number");
        //     $('#err').show();
        //     $('#pan').css('border','1px solid red');
        //     $('#pan').focus();
        // }
        else if(!pan_no.test($('#pan').val())){
            $('#err').text("Please enter valid Pan Card number");
            $('#err').show();
            $('#pan').css('border','1px solid red');
            $('#pan').focus();
        }
        else if(!adr.test($('#aadhar').val())){
            $('#err').text("Please enter valid Aadhar number");
            $('#err').show();
            $('#aadhar').css('border','1px solid red');
            $('#aadhar').focus();
        }
        // else if($('#aadhar').val()==""){
        //     $('#err').text("Please enter Aadhar");
        //     $('#err').show();
        //     $('#aadhar').css('border','1px solid red');
        //     $('#aadhar').focus();
        // }
        else if($('#dob').val()==""){
            $('#err').text("Please enter Date of Birth");
            $('#err').show();
            $('#dob').css('border','1px solid red');
            $('#dob').focus();
        }
        else if($('#age_yrs').val()==""){
            $('#err').text("Please Age in Years");
            $('#err').show();
            $('#age_yrs').css('border','1px solid red');
            $('#age_yrs').focus();
        }
        else if($('#age_mnt').val()==""){
            $('#err').text("Please Age in Months");
            $('#err').show();
            $('#age_mnt').css('border','1px solid red');
            $('#age_mnt').focus();
        }
        else if(gender ==""){
            $('#err').text("Please select Gender");
            $('#err').show();
            $('#gender').css('border','1px solid red');
            $('#gender').focus();
        }
        else{
            $('#err').text("");
            $('#err').hide();
            $('#fname').css('border','');
            $('#lname').css('border','');
            $('#mname').css('border','');
            $('#perm_add').css('border','');
            $('#state').css('border','');
            $('#city').css('border','');
            $('#pin').css('border','');
            $('#quali').css('border','');
            $('#marital_stat').css('border','');
            $('#no_of_depend').css('border','');
            $('#bld_grp').css('border','');
            $('#pan').css('border','');
            $('#dob').css('border','');
            $('#age_yrs').css('border','');
            
            var pers_data = {
                fname : fname,
                lname : lname,
                mname : mname,
                email : email,
                contact:contact,
                perm_add : perm_add,
                pin : pin,
                quali : quali,
                pan : pan,
                dob : dob,
                age_yrs : age_yrs,
                age_mnt : age_mnt,
                state : state,
                city : city,
                mar_stat : mar_stat,
                no_of_depend : no_of_depend,
                blg_grp : blg_grp,
                gender : gender,
                post_grad:post_grad,
                add_edu:add_edu,
                aadhar_no:aadhar_no,
                sap:sap,
                comp_nm:comp_nm,
                per_email:per_email,
                u_id:u_id,
                };

                $.ajax({
                                'type' : 'post',
                                'datatype' : 'html',
                                'data' : pers_data,
                                'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/Save',
                                success : function(data)
                                {
                                    alert(data);
                                }
                            });


                    $("#pers_info").attr("href", "#tab_1_2");
                    $('#li1').removeClass("active");
                    $('#li2').addClass("active");
                    $('#li3').removeClass("active");
                    $('#li4').removeClass("active");
                    $('#li5').removeClass("active");
                    $('#li6').removeClass("active");
                    $('#li7').removeClass("active");
                    $('#li8').removeClass("active");
        }
    });
    $('#genrl_info').click(function(){
        
        $('#pos_code').css('border','');
        $('#desgn').css('border','');
        $('#dept').css('border','');
        $('#sub_dept').css('border','');
        $('#bu').css('border','');
        $('#cadre').css('border','');
        $('#grade').css('border','');
        $('#loc_work').css('border','');
        $('#loc_pay').css('border','');
        $('#clust_nm').css('border','');
        var pos_code = $('#pos_code').val();
        var desgn = $('option:selected', $('#desgn')).val();
        var dept = $('option:selected', $('#dept')).val();
        var sub_dept = $('option:selected', $('#sub_dept')).val();
        var bu = $('option:selected', $('#bu')).val();
        var cadre= $('option:selected', $('#cadre')).val();
        var grade= $('option:selected', $('#grade')).val();
        var loc_work= $('option:selected', $('#loc_work')).val();
        var loc_pay= $('option:selected', $('#loc_pay')).val();
        var cluster= $('option:selected', $('#clust_nm')).val();
        var u_id=$('#u_id').val();
        //alert(u_id);
        if($('#pos_code').val()==""){
            $('#err').text("Please enter Position code");
            $('#err').show();
            $('#pos_code').css('border','1px solid red');
            $('#pos_code').focus();
        }
        
        else if(dept == "" || dept== "Select"){
            $('#err').text("Please Select Department");
            $('#err').show();
            $('#dept').css('border','1px solid red');
            $('#dept').focus();
        }
        else if(sub_dept == ""){
            $('#err').text("Please Select Sub-Department");
            $('#err').show();
            $('#sub_dept').css('border','1px solid red');
            $('#sub_dept').focus();
        }
        else if(bu == ""){
            $('#err').text("Please Select BU");
            $('#bu').css('border','1px solid red');
            $('#err').show();
            $('#bu').focus();
        }
        else if(cadre == ""){
            $('#err').text("Please Select Cadre");
            $('#cadre').css('border','1px solid red');
            $('#err').show();
            $('#cadre').focus();
        }
        else if(grade == ""){
            $('#err').text("Please Select Grade");
            $('#grade').css('border','1px solid red');
            $('#err').show();
            $('#grade').focus();
        }
        else if(desgn == ""){
            $('#err').text("Please Select Designation");
            $('#err').show();
            $('#desgn').css('border','1px solid red');
            $('#desgn').focus();
        }
        else if(loc_work == ""){
            $('#err').text("Please Select Location-Working");
            $('#loc_work').css('border','1px solid red');
            $('#err').show();
            $('#loc_work').focus();
        }
        else if(loc_pay == ""){
            $('#err').text("Please Select Location-Payroll");
            $('#loc_pay').css('border','1px solid red');
            $('#err').show();
            $('#loc_pay').focus();
        }
        else if(cluster == ""){
            $('#err').text("Please Select Cluster");
            $('#clust_nm').css('border','1px solid red');
            $('#err').show();
            $('#clust_nm').focus();
        }
        else{

            $('#err').text("");
            $('#err').hide();

            var genrl_detls={
                pos_code : pos_code,
                desgn:desgn,
                dept : dept,
                sub_dept : sub_dept,
                bu : bu ,
                cadre : cadre,
                grade : grade,
                loc_work : loc_work,
                loc_pay : loc_pay,
                cluster : cluster,
                u_id:u_id,
            };
            $.ajax({
                    'type' : 'post',
                    'datatype' : 'html',
                    'data' : genrl_detls,
                    'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/genrl_info',
                    success : function(data)
                    {
                        alert(data);
                    }
                });

            $("#genrl_info").attr("href", "#tab_1_3");
            $('#li1').removeClass("active");
            $('#li2').removeClass("active");
            $('#li3').addClass("active");
            $('#li4').removeClass("active");
            $('#li5').removeClass("active");
            $('#li6').removeClass("active");
            $('#li7').removeClass("active");
            $('#li8').removeClass("active");
            
        }
        
    });
    
    $("#reprt_detls").click(function(){
        $('#report_mgr_sap').css('border','');
        $('#rep1_attd').css('border','');
        $('#rep1_appr').css('border','');
        $('#dot_mgr').css('border','');
        $('#mgr_mgr').css('border','');
        $('#clust_hd').css('border','');
        var report_mgr_sap=$("#report_mgr_sap").val();
        var rep1_attd = $('#rep1_attd').val();
        var rep1_appr = $('#rep1_appr').val();
        var dot_mgr = $('option:selected', $('#dot_mgr')).val();
        var mgr_mgr = $('#mgr_mgr').val();
        var clust_hd = $('option:selected', $('#clust_hd')).val();
        var u_id=$('#u_id').val();
        if(report_mgr_sap == ""){
            $('#err').text("Please enter reporting manager sap code");
            $('#report_mgr_sap').css('border','1px solid red');
            $('#err').show();
            $('#report_mgr_sap').focus();
        }
        else if(rep1_attd == ""){
            $('#err').text("Please Select reporting manager for time and attendance");
            $('#rep1_attd').css('border','1px solid red');
            $('#err').show();
            $('#rep1_attd').focus();
        }
        else if(rep1_appr == ""){
            $('#err').text("Please Select reporting manager for appraisal");
            $('#rep1_appr').css('border','1px solid red');
            $('#err').show();
            $('#rep1_appr').focus();
        }
        else if(dot_mgr == ""){
            $('#err').text("Please Select dotted manager");
            $('#dot_mgr').css('border','1px solid red');
            $('#err').show();
            $('#dot_mgr').focus();
        }
        else if(mgr_mgr == ""){
            $('#err').text("Please Select Manager's manager");
            $('#mgr_mgr').css('border','1px solid red');
            $('#err').show();
            $('#mgr_mgr').focus();
        }
        else if(clust_hd == ""){
            $('#err').text("Please Select Cluster head");
            $('#clust_hd').css('border','1px solid red');
            $('#err').show();
            $('#clust_hd').focus();
        }
        else{
            $('#err').hide();
            $('#err').text('');
            var reprt_data={
                report_mgr_sap : report_mgr_sap,
                rep1_attd : rep1_attd,
                rep1_appr : rep1_appr,
                dot_mgr : dot_mgr,
                mgr_mgr : mgr_mgr,
                clust_hd : clust_hd,
                u_id : u_id,
            };
            $.ajax({
                    'type' : 'post',
                    'datatype' : 'html',
                    'data' : reprt_data,
                    'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/report_info',
                    success : function(data)
                    {
                        alert(data);
                    }
                });

            $("#reprt_detls").attr("href", "#tab_1_4");
            $('#li1').removeClass("active");
            $('#li2').removeClass("active");
            $('#li3').removeClass("active");
            $('#li4').addClass("active");
            $('#li5').removeClass("active");
            $('#li6').removeClass("active");
            $('#li7').removeClass("active");
            $('#li8').removeClass("active");
        }
    });
    
    $("#join_detals").click(function(){
        $('#trainee').css('border','');
        $('#trn_dept').css('border','');
        $('#date_confrm_trn').css('border','');
        $('#date_confrm_prob').css('border','');
        $('#aftr_trn_confrm').css('border','');
        $('#prev_emplyr').css('border','');
        $('#doj_vvf').css('border','');
        $('#othr_exp').css('border','');
        $('#vvf_exp').css('border','');
        $('#tot_exp').css('border','');
        $('#due_date_trn_prob').css('border','');
        $('#act_date_trn_prob').css('border','');
        $('#confirm_due_date').css('border','');
        $('#confrm_extn_dt').css('border','');
        $('#confrm_actl_dt').css('border','');
        var trainee = $('option:selected', $('#trainee')).val();
        var trn_dept = $('option:selected', $('#trn_dept')).val();
        var date_confrm_trn = $('#date_confrm_trn').val();
        var date_confrm_prob = $('#date_confrm_prob').val();
        var aftr_trn_confrm = $('#aftr_trn_confrm').val();
        var prev_emplyr = $('#prev_emplyr').val();
        var doj_vvf = $('#doj_vvf').val();
        var othr_exp = $('#othr_exp').val();
        var vvf_exp = $('#vvf_exp').val();
        var tot_exp = $('#tot_exp').val();
        var due_date_trn_prob = $('#due_date_trn_prob').val();
        var act_date_trn_prob = $('#act_date_trn_prob').val();
        var confirm_due_date = $('#confirm_due_date').val();
        var confrm_extn_dt = $('#confrm_extn_dt').val();
        var confrm_actl_dt = $('#confrm_actl_dt').val();
        var u_id=$('#u_id').val();
        if(trainee != ''){

            if(trn_dept==''){
                $('#err').text("Please Select training department");
                $('#trn_dept').css('border','1px solid red');
                $('#err').show();
                $('#trn_dept').focus();
            }
            else if(date_confrm_trn==''){
                $('#err').text("Please Enter Actual Date of Training to Probation ");
                $('#date_confrm_trn').css('border','1px solid red');
                $('#err').show();
                $('#date_confrm_trn').focus();
            }
            else if(aftr_trn_confrm==''){
                $('#err').text("Please Enter After Trainee Confirmed as ");
                $('#aftr_trn_confrm').css('border','1px solid red');
                $('#err').show();
                $('#aftr_trn_confrm').focus();
            }
            else if(doj_vvf==''){
           $('#err').text("Please Enter Date of Joining VVF ");
           $('#doj_vvf').css('border','1px solid red');
           $('#err').show();
           $('#doj_vvf').focus(); 
        }
            else if(due_date_trn_prob==''){
                $('#err').text("Please Enter Due date for Training to Probation  ");
                $('#due_date_trn_prob').css('border','1px solid red');
                $('#err').show();
                $('#due_date_trn_prob').focus();
            }
            else if(act_date_trn_prob==''){
                $('#err').text("Please Enter Actual Date for Training to Probation ");
                $('#act_date_trn_prob').css('border','1px solid red');
                $('#err').show();
                $('#act_date_trn_prob').focus();
            }
            else if(date_confrm_prob==''){
                $('#err').text("Please Enter Actual Date of Probation to Confirmation ");
                $('#date_confrm_prob').css('border','1px solid red');
                $('#err').show();
                $('#date_confrm_prob').focus();
            }
            else if(confirm_due_date==''){
                $('#err').text("Please Enter Confirmation Due Date  ");
                $('#confirm_due_date').css('border','1px solid red');
                $('#err').show();
                $('#confirm_due_date').focus();
            }
            else if(confrm_extn_dt==''){
                $('#err').text("Please Enter Confirmation extention date ");
                $('#confrm_extn_dt').css('border','1px solid red');
                $('#err').show();
                $('#confrm_extn_dt').focus();
            }
            else if(confrm_actl_dt==''){
                $('#err').text("Please Enter Confirmation Actual Date ");
                $('#confrm_actl_dt').css('border','1px solid red');
                $('#err').show();
                $('#confrm_actl_dt').focus();
            }
            else{
                $('#err').text("");
                $('#err').hide();
            }
        }
        
    if(trainee == ""){
         if(doj_vvf==''){
           $('#err').text("Please Enter Date of Joining VVF ");
           $('#doj_vvf').css('border','1px solid red');
           $('#err').show();
           $('#doj_vvf').focus(); 
        }
        // else if(othr_exp==''){
        //    $('#err').text("Please Enter Other Experience ");
        //    $('#othr_exp').css('border','1px solid red');
        //    $('#err').show();
        //    $('#othr_exp').focus(); 
        // }
        else if(vvf_exp==''){
           $('#err').text("Please Enter VVF Experience");
           $('#vvf_exp').css('border','1px solid red');
           $('#err').show();
           $('#vvf_exp').focus(); 
        }
        else if(tot_exp==''){
           $('#err').text("Please Enter Total Experience");
           $('#tot_exp').css('border','1px solid red');
           $('#err').show();
           $('#tot_exp').focus(); 
        }

        else{
                $('#err').text("");
                $('#err').hide();
            }
    }

        if($('#err').text()==""){

            $('#err').hide();
            $('#err').text('');
            var join_details = {
                trainee:trainee,
                trn_dept:trn_dept,
                date_confrm_trn:date_confrm_trn,
                date_confrm_prob :date_confrm_prob,
                aftr_trn_confrm: aftr_trn_confrm,
                prev_emplyr:prev_emplyr,
                doj_vvf:doj_vvf,
                othr_exp:othr_exp,
                vvf_exp :vvf_exp,
                tot_exp:tot_exp,
                due_date_trn_prob :due_date_trn_prob,
                act_date_trn_prob :act_date_trn_prob,
                confirm_due_date :confirm_due_date,
                confrm_extn_dt :confrm_extn_dt,
                confrm_actl_dt:confrm_actl_dt,
                u_id : u_id,
            };   
            $.ajax({
                'type' : 'post',
                'datatype' : 'html',
                'data' : join_details,
                'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/join_details',
                success : function(data)
                {
                    alert(data);
                }
            }); 

            $("#join_detals").attr("href", "#tab_1_5");
            $('#li1').removeClass("active");
            $('#li2').removeClass("active");
            $('#li3').removeClass("active");
            $('#li4').removeClass("active");
            $('#li5').addClass("active");
            $('#li6').removeClass("active");
            $('#li7').removeClass("active");
            $('#li8').removeClass("active");


        }
    });

    $("#promo_detals").click(function(){
        $('#promo_dt').css('border','');
        $('#desg_bfr_promo').css('border','');
        $('#cdre_bfr_promo').css('border','');
        $('#prev_cadre').css('border','');
        $('#redesgn_dt').css('border','');
        $('#desg_bfr_promo').css('border','');
        $('#desg_bfr_redesgn').css('border','');
        $('#cdr_bfr_redesgn').css('border','');
        $('#grd_bfr_redgn').css('border','');
        $('#desgn_bfr_promo').css('border','');
        var promo_dt = $('#promo_dt').val();
        var degn_bfr_promo = $('option:selected', $('#desg_bfr_promo')).val();
        var cdre_bfr_promo = $('option:selected', $('#cdre_bfr_promo')).val();
        var prev_cadre = $('option:selected', $('#prev_cadre')).val();
        var redesgn_dt = $('#redesgn_dt').val();
        var desg_bfr_promo = $('option:selected', $('#desg_bfr_promo')).val();
        var desg_bfr_redesgn = $('option:selected', $('#desg_bfr_redesgn')).val();
        var cdr_bfr_redesgn = $('option:selected', $('#cdr_bfr_redesgn')).val();
        var grd_bfr_redgn = $('option:selected', $('#grd_bfr_redgn')).val();
        var desgn_bfr_promo = $('option:selected', $('#desgn_bfr_promo')).val();
        var u_id=$('#u_id').val();
        if(promo_dt!= ""){
            if(desg_bfr_promo == ""){
                $('#err').text("Please Select Designation Before Promotion");
                $('#desg_bfr_promo').css('border','1px solid red');
                $('#err').show();
                $('#desg_bfr_promo').focus();
            }
            else if(cdre_bfr_promo == ""){
                $('#err').text("Please Select Cadre Before Promotion");
                $('#cdre_bfr_promo').css('border','1px solid red');
                $('#err').show();
                $('#cdre_bfr_promo').focus();
            }
            else if(prev_cadre == ""){
                $('#err').text("Please Select Previous Cadre");
                $('#prev_cadre').css('border','1px solid red');
                $('#err').show();
                $('#prev_cadre').focus();
            }
            else if(redesgn_dt == ""){
                $('#err').text("Please Enter Redesignation Date");
                $('#redesgn_dt').css('border','1px solid red');
                $('#err').show();
                $('#redesgn_dt').focus();
            }
            else if(desg_bfr_redesgn == ""){
                $('#err').text("Please Select Designation Before Redesignation");
                $('#desg_bfr_redesgn').css('border','1px solid red');
                $('#err').show();
                $('#desg_bfr_redesgn').focus();
            }
            else if(cdr_bfr_redesgn == ""){
                $('#err').text("Please Select Cadre before Redesignation");
                $('#cdr_bfr_redesgn').css('border','1px solid red');
                $('#err').show();
                $('#cdr_bfr_redesgn').focus();
            }
            else if(grd_bfr_redgn == ""){
                $('#err').text("Please Select Grade before Redesignation");
                $('#grd_bfr_redgn').css('border','1px solid red');
                $('#err').show();
                $('#grd_bfr_redgn').focus();
            }
            else if(desgn_bfr_promo == ""){
                $('#err').text("Please Select Designation before Promotion");
                $('#desgn_bfr_promo').css('border','1px solid red');
                $('#err').show();
                $('#desgn_bfr_promo').focus();
            }
            else{
           
            $('#err').text("");
            $('#err').hide();
        }
            
        }

        if($('#err').text()==''){
                var promo_details={
                promo_dt : promo_dt,
                desg_bfr_promo : desg_bfr_promo,
                cdre_bfr_promo : cdre_bfr_promo,
                prev_cadre : prev_cadre,
                redesgn_dt : redesgn_dt,
                desg_bfr_promo : desg_bfr_promo,
                desg_bfr_redesgn : desg_bfr_redesgn,
                cdr_bfr_redesgn : cdr_bfr_redesgn,
                grd_bfr_redgn : grd_bfr_redgn,
                desgn_bfr_promo : desgn_bfr_promo,
                u_id:u_id,
                };
                $.ajax({
                'type' : 'post',
                'datatype' : 'html',
                'data' : promo_details,
                'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/promo_details',
                success : function(data)
                {
                    alert(data);
                }
            });

            $("#promo_detals").attr("href", "#tab_1_6");
            $('#li1').removeClass("active");
            $('#li2').removeClass("active");
            $('#li3').removeClass("active");
            $('#li4').removeClass("active");
            $('#li5').removeClass("active");
            $('#li6').addClass("active");
            $('#li7').removeClass("active");
            $('#li8').removeClass("active");
        }
    });

    $('#trans_dtls').click(function(){
        $('#trnsfr_frm_loc').css('border','');
        $('#tranr_wef_loc').css('border','');
        $('#transfr_frm_old_data_loc').css('border','');
        $('#transfr_old_data_wef_loc').css('border','');
        $('#transfr_frm_dept').css('border','');
        $('#tranr_wef_dept').css('border','');
        var trnsfr_frm_loc = $('option:selected', $('#trnsfr_frm_loc')).val();
        var tranr_wef_loc = $('option:selected', $('#tranr_wef_loc')).val();
        var transfr_frm_old_data_loc = $('option:selected', $('#transfr_frm_old_data_loc')).val();
        var transfr_old_data_wef_loc = $('option:selected', $('#transfr_old_data_wef_loc')).val();
        var transfr_frm_dept = $('option:selected', $('#transfr_frm_dept')).val();
        var tranr_wef_dept = $('option:selected', $('#tranr_wef_dept')).val();
        var u_id=$('#u_id').val();
        if(trnsfr_frm_loc != ""){
            if(tranr_wef_loc == ""){
                $('#err').text("Please Select Transfer W.e.f (Location) ");
                $('#tranr_wef_loc').css('border','1px solid red');
                $('#err').show();
                $('#tranr_wef_loc').focus();
            }
            else if(transfr_frm_old_data_loc == ""){
                $('#err').text("Please Select Transferred From Old Data (Location)");
                $('#transfr_frm_old_data_loc').css('border','1px solid red');
                $('#err').show();
                $('#transfr_frm_old_data_loc').focus();
            }
            else if(transfr_old_data_wef_loc == ""){
                $('#err').text("Please Select Transfer Old data W.e.f (Location) ");
                $('#transfr_old_data_wef_loc').css('border','1px solid red');
                $('#err').show();
                $('#transfr_old_data_wef_loc').focus();
            }
            else if(transfr_frm_dept == ""){
                $('#err').text("Please Select Transferred From (Department) ");
                $('#transfr_frm_dept').css('border','1px solid red');
                $('#err').show();
                $('#transfr_frm_dept').focus();
            }
            else if(tranr_wef_dept == ""){
                $('#err').text("Please Select Transfer W.e.f (Department) ");
                $('#tranr_wef_dept').css('border','1px solid red');
                $('#err').show();
                $('#tranr_wef_dept').focus();
            }
            else{
                $('#err').text("");
                $('#err').hide();
            }
        }
        if($('#err').text()=='')
        {
            var trans_details= {
                trnsfr_frm_loc: trnsfr_frm_loc,
                tranr_wef_loc : tranr_wef_loc,
                transfr_frm_old_data_loc: transfr_frm_old_data_loc,
                transfr_old_data_wef_loc : transfr_old_data_wef_loc,
                transfr_frm_dept: transfr_frm_dept,
                tranr_wef_dept : tranr_wef_dept,
                u_id:u_id,
            };
            $.ajax({
                'type' : 'post',
                'datatype' : 'html',
                'data' : trans_details,
                'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/trans_details',
                success : function(data)
                {
                    alert(data);
                }
            });

            $("#trans_dtls").attr("href", "#tab_1_7");
            $('#li1').removeClass("active");
            $('#li2').removeClass("active");
            $('#li3').removeClass("active");
            $('#li4').removeClass("active");
            $('#li5').removeClass("active");
            $('#li6').removeClass("active");
            $('#li7').addClass("active");
            $('#li8').removeClass("active");

        }
    });

    $('#leave_dtls').click(function(){
        //alert("hiiiii");
        $('#dt_retire').css('border','');
        $('#lst_wrk_dt').css('border','');
        $('#arrt_prd').css('border','');
        $('#redesign_dt').css('border','');
        $('#reasn_leave').css('border','');
        $('#ext_cat').css('border','');
        $('#remark').css('border','');
        $('#attr_type').css('border','');
        var dt_retire = $('#dt_retire').val();
        var lst_wrk_dt = $('#lst_wrk_dt').val();
        var arrt_prd = $('#arrt_prd').val();
        var redesign_dt = $('#redesign_dt').val();
        var reasn_leave = $('#reasn_leave').val()
        var ext_cat = $('#ext_cat').val();
        var remark = $('#remark').val();
        var attr_type = $('option:selected', $('#attr_type')).val();
        var u_id=$('#u_id').val();
        if(lst_wrk_dt != ""){
            if(arrt_prd == ""){
                $('#err').text("Please Enter Attrition Period ");
                $('#arrt_prd').css('border','1px solid red');
                $('#err').show();
                $('#arrt_prd').focus();
            }
            else if(dt_retire == "" || redesign_dt == ""){
                $('#err').text("Please Enter Retirement date or Resignation date");
                $('#dt_retire').css('border','1px solid red');
                $('#redesign_dt').css('border','1px solid red');
                $('#err').show();
                $('#dt_retire').focus();
            }
            else if(reasn_leave == ""){
                $('#err').text("Please Enter Reason of Leaving ");
                $('#reasn_leave').css('border','1px solid red');
                $('#err').show();
                $('#reasn_leave').focus();
            }
            else if(ext_cat == ""){
                $('#err').text("Please Enter Exit Category ");
                $('#ext_cat').css('border','1px solid red');
                $('#err').show();
                $('#ext_cat').focus();
            }
            else if(attr_type == ""){
                $('#err').text("Please Select Attrition Type ");
                $('#attr_type').css('border','1px solid red');
                $('#err').show();
                $('#attr_type').focus();
            }
            else{
                $('#err').text('');
                $('#err').hide("");
            }
        }

        if($('#err').text()==''){
            //alert($('#err').text());
            var leave_details = {
                    dt_retire : dt_retire,
                    lst_wrk_dt : lst_wrk_dt,
                    arrt_prd : arrt_prd,
                    redesign_dt : redesign_dt,
                    reasn_leave : reasn_leave,
                    ext_cat : ext_cat,
                    remark : remark,
                    attr_type : attr_type,
                    u_id : u_id ,
                };
                $.ajax({
                    'type' : 'post',
                    'datatype' : 'html',
                    'data' : leave_details,
                    'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/leave_details',
                    success : function(data)
                    {
                        alert(data);
                    }
                });

            $("#leave_dtls").attr("href", "#tab_1_8");
            $('#li1').removeClass("active");
            $('#li2').removeClass("active");
            $('#li3').removeClass("active");
            $('#li4').removeClass("active");
            $('#li5').removeClass("active");
            $('#li6').removeClass("active");
            $('#li7').removeClass("active");
            $('#li8').addClass("active");
           }

    });
    
    $('#save_data').click(function(){
        $('#cost_center').css('border','');
        $('#cost_cenr_descr').css('border','');
        $('#emp_sta').css('border','');
        var cost_center = $('option:selected', $('#cost_center')).val();
        var cost_cenr_descr = $('#cost_cenr_descr').val();
        var emp_sta = $('option:selected', $('#emp_sta')).val();
        var u_id=$('#u_id').val();
        if(cost_center == ""){
            $('#err').text("Please enter Cost Centre Codes");
            $('#cost_center').css('border','1px solid red');
            $('#err').show();
            $('#cost_center').focus();       
        }
        else if(cost_cenr_descr == ""){
            $('#err').text("Please enter Cost Centre Description");
            $('#cost_cenr_descr').css('border','1px solid red');
            $('#err').show();
            $('#cost_cenr_descr').focus();       
        }
        else if(emp_sta == ""){
            $('#err').text("Please enter Employee Status");
            $('#emp_sta').css('border','1px solid red');
            $('#err').show();
            $('#emp_sta').focus();       
        }
        else{
            var othr_details={
                cost_center : cost_center,
                cost_cenr_descr : cost_cenr_descr,
                emp_sta : emp_sta,
                u_id:u_id,
            };
            $.ajax({
                'type' : 'post',
                'datatype' : 'html',
                'data' : othr_details,
                'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/other_details',
                success : function(data)
                {
                    alert(data);
                }
            });
        }
    });
    
    $('#report_mgr_sap').focusout(function(){
        //alert("hello");
        var rep_sap=$('#report_mgr_sap').val();
        //alert(rep_sap);
        var rep_mgr_data={
            rep_sap:rep_sap,
        };
        $.ajax({
                'type' : 'post',
                'datatype' : 'html',
                'data' : rep_mgr_data,
                'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/ReprtngMgr',
                success : function(data)
                {
                    //$("#rep1_attd").val(data);
                    var report=data.split('-');
                    $("#rep1_attd").val(report['0']);
                    $("#rep1_appr").val(report['0']);
                    $("#mgr_mgr").val(report['1']);
                    //alert(report);
                }
            });
    });


    $("#grade").change(function(){
                                            var grade = {
                                                'grade' :$(this).find(':selected').text(),
                                            };
                                            //alert($(this).find(':selected').text());
                                            var base_url = window.location.origin;
                                            $.ajax({
                                                'type' : 'post',
                                                'datatype' : 'html',
                                                'data' : grade,
                                                'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/Designation_change',
                                               
                                                success : function(data)
                                                {
                                                    //alert(data);
                                                    $('#desgn').html(data);
                                                }
                                            });
                                        }); 



$("#cost_center").change(function () {
    var cost_center = {
                    'cost_center' :$(this).find(':selected').text(),
                };
                var base_url = window.location.origin;
                $.ajax({
                    'type' : 'post',
                    'datatype' : 'html',
                    'data' : cost_center,
                    'url' : base_url+$("#basepath").attr('value')+'/index.php/MIS/costCenter_change',
                   
                    success : function(data)
                    {
                    
                        $('#cost_cenr_descr').val(data);
                    }
                });
});


});


  </script>
  <script>
              $(function(){
                    $("body").on('keyup','.validate_field',function(){
                        
                        var id = $(this).attr('id');            
                        var pattern="[1-9][0-9]{5}";
                        var string1 = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
                        if (id == 'fname' || id == 'mname' || id == 'lname') 
                        {
                            var string1 = /^([a-zA-Z]{1,40})*$/;
                            
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#err").text("Please enter only alphabhets in name field");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id=='email'){
                            var string1 = /^([A-Za-z0-9][A-Za-z0-9_\.]{1,})@([A-Za-z0-9][A-Za-z0-9\-]{1,}).([A-Za-z]{2,4})(\.[A-Za-z]{2,4})?$/;
                             if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $('#err').show();
                                $(this).css('border','1px solid red');
                                $("#err").text("Please enter valid email ID");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id=='per_email'){
                            var string1 = /^([A-Za-z0-9][A-Za-z0-9_\.]{1,})@([A-Za-z0-9][A-Za-z0-9\-]{1,}).([A-Za-z]{2,4})(\.[A-Za-z]{2,4})?$/;
                             if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $('#err').show();
                                $(this).css('border','1px solid red');
                                $("#err").text("Please enter valid email ID");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id=='contact'){
                            var string1 = /^[\d]{10}$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#error_value").text("Please enter valid contact number");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id=='pin'){
                            //alert(id);

                            var string1 = /^[1-9][0-9]{5}$/;
                             if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $('#err').show();
                                $(this).css('border','1px solid red');
                                $("#err").text("Please enter valid Pincode");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id=='aadhar'){
                           // alert(id);

                            var string1 = /^[1-9][0-9]{11}$/;
                             if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $('#err').show();
                                $(this).css('border','1px solid red');
                                $("#err").text("Please enter valid Aadhar");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            }
                        }
                        else if(id=='pan'){
                            //alert(id);
                            var string1 = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
                            if (!string1.test($(this).val())) 
                            {
                                $("#err").css('display','block');
                                $("#err").addClass("alert-danger"); 
                                $(this).css('border','1px solid red');
                                $("#err").text("Please enter valid PAN number");
                            }
                            else
                            {
                                $("#err").css('display','none');
                                $(this).css('border','1px solid #999');
                            } 
                        }
                    });
              });
  </script>
                       <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height:900px" >
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->                   
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">New Employee MIS</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">Employee MIS
                    </h3>
            
   
            <div class="container-fluid">
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="alert alert-danger fade in" id="err" style="display:none" ></div>
         
 
                              <div class="col-md-10">
                                                <div class="portlet light ">
                                                    <div class="portlet-title tabbable-line">
                                                        <div class="caption caption-md">
                                                            <i class="icon-globe theme-font hide"></i>
                                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                        </div>
                                                        <ul class="nav nav-tabs">
                                                            <li class="active" id="li1">
                                                                <a href="#tab_1_1" data-toggle="tab" aria-expanded="false">Personal Info</a>
                                                            </li>
                                                            <li class="" id="li2">
                                                                <a href="#tab_1_2" data-toggle="tab" aria-expanded="true">General Details</a>
                                                            </li>
                                                            <li id="li3">
                                                                <a href="#tab_1_3" data-toggle="tab">Reporting details</a>
                                                            </li>
                                                            <li id="li4">
                                                                <a href="#tab_1_4" data-toggle="tab">Joining details</a>
                                                            </li>
                                                             <li id="li5">
                                                                <a href="#tab_1_5" data-toggle="tab">Promotion Details</a>
                                                            </li>
                                                             <li id="li6">
                                                                <a href="#tab_1_6" data-toggle="tab">Transfer Details</a>
                                                            </li>
                                                             <li id="li7">
                                                                <a href="#tab_1_7" data-toggle="tab">Leaving Details</a>
                                                            </li>
                                                             <li id="li8">
                                                                <a href="#tab_1_8" data-toggle="tab">Other Details</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="tab-content">
                                                            <!-- PERSONAL INFO TAB -->
                                                            <div class="tab-pane active" id="tab_1_1">
                                                                <form action="#" class="form-horizontal">

                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Company Name</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="comp_nm">
                                                                                    <option value="">Select</option>
                                                                                    <option value="VVF Ltd.">VVF Ltd.</option>
                                                                                    <option value="VVF India Ltd.">VVF India Ltd.</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Company Name </span>
                                                                            </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">First Name
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control validate_field" placeholder="Enter First Name" type="text" id="fname">
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Last Name
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control validate_field" placeholder="Enter Last Name" type="text" id="lname">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Middle Name
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control validate_field" placeholder="Enter Middle Name" type="text" id="mname">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Email Address</label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-envelope"></i>
                                                                            </span>
                                                                            <input class="form-control validate_field" placeholder="Email Address" type="email" id="email"> </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Personal Email Address</label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-envelope"></i>
                                                                            </span>
                                                                            <input class="form-control validate_field" placeholder="Email Address" type="email" id="per_email"> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Contact Number</label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control validate_field" placeholder="Enter Contact number" type="email" id="contact"> </div>
                                                                    
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Permanent Address</label>
                                                                    <div class="col-md-6">
                                                                        
                                                                            <textarea class="form-control" rows="3" placeholder="Enter Address" id="perm_add"></textarea>

                                                                        </div>
                                                                    </div>
                                                               <div class="form-group">
                                                                    <label class="col-md-3 control-label">State</label>
                                                                    <div class="col-md-6">
                                                                        <?php 
                                                                            $cluster_name_models = new StateCityForm();
                                                                            $records = $cluster_name_models->get_list('state');
                                                                            $list = CHtml::listData($records,'state', 'state');                                        
                                                                            echo CHtml::activeDropDownList($cluster_name_models,'state',$list,array('class'=>'form-control state','id'=>'state','empty'=>'Select')); 
                                                                        ?>
                                                                        <span class="help-block"> Select State </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">District/City/Area</label>
                                                                    <div class="col-md-6">
                                                                                <!--<select class="form-control" id="city">-->
                                                                                <!--    <option value="">Select</option>-->
                                                                                <!--    <option value="">Male</option>-->
                                                                                <!--    <option value="">Female</option>-->
                                                                                <!--</select>-->
                                                                                <?php echo CHtml::dropDownList("city",'',array('Select' => 'Select'),$htmlOptions=array('class'=>'form-control format_list city','id'=>'city'));?>
                                                                                <span class="help-block"> Select city </span>
                                                                            </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Pincode</label>
                                                                    <div class="col-md-6">
                                                                    <input class="form-control validate_field" placeholder="Enter Pincode" type="text" id="pin"></div>
                                                                
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Basic Qualification (uptil Graduation)</label>
                                                                    <div class="col-md-6">
                                                                                <!--<select class="form-control" id="quali">-->
                                                                                <!--    <option value="">Select</option>-->
                                                                                <!--    <option value="">B.A.</option>-->
                                                                                <!--    <option value="">B.Com.</option>-->
                                                                                <!--    <option value="">B.Sci.</option>-->
                                                                                <!--</select>-->
                                                                                <!--<span class="help-block"> Select Qualification </span>-->
                                                                                <input class="form-control" placeholder="Enter Basic Qualification" type="text" id="quali">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Post Graduations/ PG Diploma holders</label>
                                                                    <div class="col-md-6">
                                                                                <!--<select class="form-control" id="pg">-->
                                                                                <!--    <option value="">Select</option>-->
                                                                                <!--    <option value="">B.A.</option>-->
                                                                                <!--    <option value="">B.Com.</option>-->
                                                                                <!--    <option value="">B.Sci.</option>-->
                                                                                <!--</select>-->
                                                                                <!--<span class="help-block"> Select Post Graduations </span>-->
                                                                                 <input class="form-control" placeholder="Enter Post Graduations" type="text" id="pg">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Additional qualification/Certification course</label>
                                                                    <div class="col-md-6">
                                                                         <input class="form-control" placeholder="Enter Additional qualification" type="text" id="add_qual"> </div>           
                                                                   
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Marital Status</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="marital_stat">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Single">Single</option>
                                                                                    <option value="Married">Married</option>
                                                                                    <option value="Separated">Separated</option>
                                                                                    <option value="Divorced">Divorced</option>
                                                                                    <option value="Widowed">Widowed</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Marital Status </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">No of Dependents</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="no_of_depend">
                                                                                    <option value="">Select</option>
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                                <span class="help-block"> Select No of Dependents </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Blood Group</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="bld_grp">
                                                                                    <option value="">Select</option>
                                                                                    <option value="A +ve">A +ve</option>
                                                                                    <option value="B +ve">B +ve</option>
                                                                                    <option value="AB +ve">AB +ve</option>
                                                                                    <option value="O +ve">O +ve</option>
                                                                                    <option value="A -ve">A -ve</option>
                                                                                    <option value="B -ve">B -ve</option>
                                                                                    <option value="AB -ve">AB -ve</option>
                                                                                    <option value="O -ve">O -ve</option>
                                                                                    
                                                                                </select>
                                                                                <span class="help-block"> Select Blood Group </span>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">PAN Card No.
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control validate_field" placeholder="Enter PAN Card No." type="text" id="pan">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Aadhar number
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control validate_field" placeholder="Enter Aadhar number" type="text" id="aadhar">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Date of Birth
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Date of Birth" type="text" id="dob">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Age (Yrs)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Age (Yrs)" type="text" id="age_yrs" Disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Age (Months)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Age (Months)" type="text" id="age_mnt" Disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Gender</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="gender">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Male">Male</option>
                                                                                    <option value="Female">Female</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Gender</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">SAP Code
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter SAP Code" type="text" id="sap">
                                                                    </div>
                                                                </div>
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Unique Id
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter SAP Code" type="text" id="u_id" value="<?php echo uniqid();?>" Disabled>
                                                                    </div>
                                                                </div>
                                                                
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                         <!--<a class="btn green btnNext">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>-->
                                                                         <a class="btn green"  data-toggle="tab" aria-expanded="false" id="pers_info">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>
                                                                        <!--<button type="submit" class="btn green"><a href="#tab_1_2">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a></button>-->
                                                                        <!--<button type="button" class="btn default">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true"></i></button>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                </form>
                                                            </div>
                                                            
                                                            <!-- END PERSONAL INFO TAB -->
                                                            <!-- CHANGE AVATAR TAB -->
                                                            <div class="tab-pane " id="tab_1_2">
                                                                
                                                                <form action="#" class="form-horizontal">
                                                                    <div class="form-group">
                                                                    <label class="col-md-3 control-label">
                                                                    Position Code
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" id="pos_code" placeholder="Enter Position Code" type="text">
                                                                       
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Departments
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <!-- <select class="form-control" id="dept">
                                                                                    <option value="">Select</option>
                                                                                    <option value="IT">IT</option>
                                                                                    <option value="Hr">Hr</option>
                                                                                </select> -->
                                                                                <?php 
                                                                                 $cluster_name_models = new ClusterForm();
                                                                                 $cluster_name_model = new EmployeeForm();
                                                                               
                                                                                 $records=$cluster_name_model->get_department_list();
                                                                                 
                                                                                 $list = CHtml::listData($records,'Department', 'Department'); 
                                                                                 
                                                                                    echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('id'=>'dept','class'=>'form-control department','options'=>$records,'empty'=>'Select')); 
                                                                                
                                                                                 ?>
                                                                                <span class="help-block"> Select Departments</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Sub-Departments
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <!-- <select class="form-control" id="sub_dept">
                                                                                    <option value="">Select</option>
                                                                                    <option value="IT">IT</option>
                                                                                    <option value="Hr">Hr</option>
                                                                                </select> -->
                                                                                 <?php 
                                                                                 $cluster_name_models = new ClusterForm();
                                                                                 $cluster_name_model = new EmployeeForm();
                                                                               
                                                                                 $records=$cluster_name_model->get_department_list();
                                                                                 
                                                                                 $list = CHtml::listData($records,'Department', 'Department'); 
                                                                                 
                                                                                    echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('id'=>'sub_dept','class'=>'form-control department','options'=>$records,'empty'=>'Select')); 
                                                                                
                                                                                 ?>
                                                                                <span class="help-block"> Select Sub-Departments</span>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">BU
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="bu">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Corporate Shared Services">Corporate Shared Services</option>
                                                                                    <option value="Oleochemicals">Oleochemicals</option>
                                                                                    <option value="Contract Manufacturing">Contract Manufacturing</option>
                                                                                    <option value="Personal Care Products">Personal Care Products</option>
                                                                                    <option value="Consumer Products Division">Consumer Products Division</option>
                                                                                    <option value="Contract Manufacturing">Contract Manufacturing
                                                                                    </option>
                                                                                    <option value="SMC">SMC</option>
                                                                                    <option value="CSS">CSS</option>
                                                                                    <option value="PCP">PCP</option>
                                                                                    <option value="Consumer Products Division Marketing">Consumer Products Division Marketing</option>
                                                                                </select>
                                                                                <span class="help-block"> Select BU</span>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cadre
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="cadre">
                                                                                    <option value="">Select</option>
                                                                                    <option value="JMC">JMC</option>
                                                                                    <option value="MMC">MMC</option>
                                                                                    <option value="SMC">SMC</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Cadre</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Grade
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="grade">
                                                                                    <option value="">Select</option>
                                                                                    <option value="JMC">JMC</option>
                                                                                    <option value="MMC">MMC</option>
                                                                                    <option value="SMC">SMC</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Grade</span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Designation
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="desgn">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Assistant Manager">Assistant Manager</option>
                                                                                    <option value="Junior Executive">Junior Executive</option>
                                                                                    <option value="Executive">Executive</option>
                                                                                    <option value="Senior Manager">Senior Manager</option>
                                                                                    <option value="Manager">Manager</option>
                                                                                    <option value="Select">Select</option>
                                                                                    <option value="Assistant General Manager">Assistant General Manager</option>
                                                                                    <option value="General Manager">General Manager</option>
                                                                                    <option value="Vice President">Vice President</option>
                                                                                    <option value="Senior Manager 
                                                                                    ">Senior Manager 
                                                                                    </option>
                                                                                </select>
                                                                                <span class="help-block"> Select Designation</span>
                                                                    </div>
                                                                </div>



                                                               <div class="form-group">
                                                                    <label class="col-md-3 control-label">Location-Working at</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="loc_work">
                                                                                    <option value="">Select</option>
                                                                                    <option value="0">Corporate</option>
                                                                                    <option value="1">Sion</option>
                                                                                    <option value="2">Taloja</option>
                                                                                    <option value="3">Raipur</option>
                                                                                    <option value="4">Kolkata</option>
                                                                                    <option value="5">Baddi</option>
                                                                                    <option value="6">Tiljala</option>
                                                                                    <option value="7">Kutch-II</option>
                                                                                    <option value="8">Palanpur</option>
                                                                                    <option value="9">Daman</option>
                                                                                    <option value="10">Chennai</option>
                                                                                    <option value="11">New Delhi</option>
                                                                                    <option value="12">Taloja</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Location-Working at </span>
                                                                            </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Location-Payroll at</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="loc_pay">
                                                                                    <option value="">Select</option>
                                                                                    <option value="0">Corporate</option>
                                                                                    <option value="1">Sion</option>
                                                                                    <option value="2">Taloja</option>
                                                                                    <option value="3">Raipur</option>
                                                                                    <option value="4">Kolkata</option>
                                                                                    <option value="5">Baddi</option>
                                                                                    <option value="6">Tiljala</option>
                                                                                    <option value="7">Kutch-II</option>
                                                                                    <option value="8">Palanpur</option>
                                                                                    <option value="9">Daman</option>
                                                                                    <option value="10">Chennai</option>
                                                                                    <option value="11">New Delhi</option>
                                                                                    <option value="12">Taloja</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Location-Payroll at </span>
                                                                            </div>
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cluster Name</label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="clust_nm">
                                                                                    <option value="">Select</option>
                                                                                    <option value="R&amp;D">R&amp;D</option>
                                                                                    <option value="Oleo Non Mfg">Oleo Non Mfg</option>
                                                                                    <option value="Sewree Operations">Sewree Operations</option>
                                                                                    <option value="HR/Security/Admin">HR/Security/Admin</option>
                                                                                    <option value="Finance / IT / Indirect Tax/Excise/EXIM">Finance / IT / Indirect Tax/Excise/EXIM</option>
                                                                                    <option value="Strategic Procurement">Strategic Procurement</option>
                                                                                    <option value="CMB Non Mfg">CMB Non Mfg</option>
                                                                                    <option value="Oleo Mfg">Oleo Mfg</option>
                                                                                    <option value="SMC Cluster">SMC Cluster</option>
                                                                                    <option value="Miscellaneous">Miscellaneous</option>
                                                                                    <option value="CPD">CPD</option>
                                                                                    <option value="CMB Manufacturing">CMB Manufacturing</option>
                                                                                    <option value="PCP Quality">PCP Quality</option>
                                                                                    <option value="Promoters">Promoters</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Cluster Name </span>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                        <a class="btn green" href="#" data-toggle="tab" aria-expanded="false" id="genrl_info">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>
                                                                        <a class="btn default" href="#tab_1_1" data-toggle="tab" aria-expanded="false" id="prve1">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true" ></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         </form>
                                                            </div>
                                                            <!-- END CHANGE AVATAR TAB -->
                                                            <!-- CHANGE PASSWORD TAB -->
                                                            <div class="tab-pane" id="tab_1_3">
                                                                 <form action="#" class="form-horizontal">
                                                                    <div class="form-group">
                                                                    <label class="col-md-3 control-label">Reporting Mgr SAP Code
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Reporting Mgr SAP Code" type="text" id="report_mgr_sap">
                                                                       
                                                                    </div>
                                                                </div>
<!--                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Reporting-1 (For Time & Attendance)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <?php 
                                                                            // $reporting_list = new EmployeeForm();
                                                                            // $records = $reporting_list->get_appraiser_list();
                                                                            // // echo count($records);die();
                                                                            // for ($k=0; $k < count($records); $k++) { 
                                                                            // $where = 'where Email_id = :Email_id ';
                                                                            // $list = array('Email_id','pms_status');
                                                                            // $data = array($records[$k]['Reporting_officer1_id'],'Active');
                                                                            // $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                                                            // }
                                                                            
                                                                            // $Report_id = array(); 
                                                                            
                                                                            // for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                            // if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                            // $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                            // }
                                                                            
                                                                            // }
                                                                            
                                                                            // echo CHtml::dropDownList("rep1_attd",'',$Report_id,$htmlOptions=array('class'=>"form-control cadre",'empty'=>'Select'));
                                                                        ?>
                                                                        <span class="help-block"> Select Reporting-1 (For Time & Attendance)</span>
                                                                    </div>
                                                                </div> -->

                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Reporting-1 (For Time & Attendance)</label>
                                                                    <div class="col-md-6">
                                                            
                                                                            <input class="form-control validate_field" placeholder="Enter Reporting-1 (For Time & Attendance)" type="rep1_attd" id="rep1_attd"> </div>
                                                                   
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Reporting-1 (For appraisal)</label>
                                                                    <div class="col-md-6">

                                                                            <input class="form-control validate_field" placeholder="Enter Reporting-1 (For appraisal)" type="rep1_appr" id="rep1_appr"> </div>
                                                                    
                                                                </div>
<!--                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Reporting-1 (For appraisal)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                    <?php 
                                                                            // $reporting_list = new EmployeeForm();
                                                                            // $records = $reporting_list->get_appraiser_list();
                                                                            // // echo count($records);die();
                                                                            // for ($k=0; $k < count($records); $k++) { 
                                                                            // $where = 'where Email_id = :Email_id ';
                                                                            // $list = array('Email_id','pms_status');
                                                                            // $data = array($records[$k]['Reporting_officer1_id'],'Active');
                                                                            // $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                                                            // }
                                                                            
                                                                            // $Report_id = array(); 
                                                                            
                                                                            // for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                            // if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                            // $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                            // }
                                                                            
                                                                            // }
                                                                            
                                                                            // echo CHtml::dropDownList("rep1_appr",'',$Report_id,$htmlOptions=array('class'=>"form-control cadre",'empty'=>'Select'));
                                                                        ?>
                                                                                <span class="help-block"> Select Reporting-1 (For appraisal)</span>
                                                                    </div>
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Dotted Line Manager
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <?php 
                                                                            $reporting_list = new EmployeeForm();
                                                                            $records = $reporting_list->get_appraiser_list();
                                                                            // echo count($records);die();
                                                                            for ($k=0; $k < count($records); $k++) { 
                                                                            $where = 'where Email_id = :Email_id ';
                                                                            $list = array('Email_id','pms_status');
                                                                            $data = array($records[$k]['Reporting_officer1_id'],'Active');
                                                                            $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                                                            }
                                                                            
                                                                            $Report_id = array(); 
                                                                            
                                                                            for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                            if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                            $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                            }
                                                                            
                                                                            }
                                                                            
                                                                            echo CHtml::dropDownList("dot_mgr",'',$Report_id,$htmlOptions=array('class'=>"form-control cadre",'empty'=>'Select'));
                                                                        ?>
                                                                                <span class="help-block"> Select Dotted Line Manager</span>
                                                                    </div>
                                                                </div>
<!--                                                                  <div class="form-group">
                                                                    <label class="col-md-3 control-label">Manager's Manager
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                            <?php 
                                                                            //     $reporting_list = new EmployeeForm();
                                                                            //     $records = $reporting_list->get_appraiser_list();
                                                                            //     // echo count($records);die();
                                                                            //     for ($k=0; $k < count($records); $k++) { 
                                                                            //     $where = 'where Email_id = :Email_id ';
                                                                            //     $list = array('Email_id','pms_status');
                                                                            //     $data = array($records[$k]['Reporting_officer1_id'],'Active');
                                                                            //     $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                                                            //     }
                                                                                
                                                                            //     $Report_id = array(); 
                                                                                
                                                                            //     for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                            //     if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                            //     $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                            //     }
                                                                                
                                                                            //     }
                                                                                
                                                                            //     echo CHtml::dropDownList("mgr_mgr",'',$Report_id,$htmlOptions=array('class'=>"form-control cadre",'empty'=>'Select'));
                                                                            ?>
                                                                                <span class="help-block"> Select Manager's Manager</span>
                                                                    </div>
                                                                </div> -->
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Manager's Manager</label>
                                                                    <div class="col-md-6">

                                                                            <input class="form-control validate_field" placeholder="Enter Manager's Manager" type="mgr_mgr" id="mgr_mgr"> </div>
                                                                    
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cluster Head
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                           <?php 
                                                                                $reporting_list = new EmployeeForm();
                                                                                $records = $reporting_list->get_appraiser_list();
                                                                                // echo count($records);die();
                                                                                for ($k=0; $k < count($records); $k++) { 
                                                                                $where = 'where Email_id = :Email_id ';
                                                                                $list = array('Email_id','pms_status');
                                                                                $data = array($records[$k]['Reporting_officer1_id'],'Active');
                                                                                $Reporting_officer_data[$k] = $reporting_list->get_employee_data($where,$data,$list);
                                                                                }
                                                                                
                                                                                $Report_id = array(); 
                                                                                
                                                                                for ($l=0; $l < count($Reporting_officer_data); $l++) { 
                                                                                if (isset($Reporting_officer_data[$l]['0']['Emp_fname']) && isset($Reporting_officer_data[$l]['0']['Emp_lname']) && $Reporting_officer_data[$l]['0']['Email_id']) {
                                                                                $Report_id[$Reporting_officer_data[$l]['0']['Email_id']] = $Reporting_officer_data[$l]['0']['Emp_fname']." ".$Reporting_officer_data[$l]['0']['Emp_lname'];
                                                                                }
                                                                                
                                                                                }
                                                                                
                                                                                echo CHtml::dropDownList("clust_hd",'',$Report_id,$htmlOptions=array('class'=>"form-control cadre",'empty'=>'Select'));
                                                                            ?>
                                                                               
                                                                                <span class="help-block"> Select Cluster Head</span>
                                                                    </div>
                                                                </div>
                                                                
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                        <a class="btn green" href="#" data-toggle="tab" aria-expanded="false" id="reprt_detls">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>
                                                                        <a class="btn default" href="#tab_1_2" data-toggle="tab" aria-expanded="false" id="prve2">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true" ></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         </form>
                                                            </div>
                                                            <!-- END CHANGE PASSWORD TAB -->
                                                            <!-- PRIVACY SETTINGS TAB -->
                                                            <div class="tab-pane" id="tab_1_4">
                                                             <form action="#" class="form-horizontal">
                                                                    <div class="form-group">
                                                                    <label class="col-md-3 control-label">Types of Trainee
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        
                                                                                <select class="form-control" id="trainee">
                                                                                    <option value="">Select</option>
                                                                                    <option value="MT">MT</option>
                                                                                    <option value="EMT">EMT</option>
                                                                                    <option value="GET">GET</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Types of Trainee</span>
                                                                   
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Department /Division at the time of Joining
                                                                    </label>
                                                                    <div class="col-md-6">
                                                              <!--           <select class="form-control" id="trn_dept">
                                                                                    <option value="">Select</option>
                                                                                    <option value="IT">IT</option>
                                                                                    <option value="Account">Account</option>
                                                                       </select> -->
                                                                       <?php 
                                                                                 $cluster_name_models = new ClusterForm();
                                                                                 $cluster_name_model = new EmployeeForm();
                                                                               
                                                                                 $records=$cluster_name_model->get_department_list();
                                                                                 
                                                                                 $list = CHtml::listData($records,'Department', 'Department'); 
                                                                                 
                                                                                    echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('id'=>'trn_dept','class'=>'form-control department','options'=>$records,'empty'=>'Select')); 
                                                                                
                                                                                 ?>
                                                                       <span class="help-block"> Select Department /Division at the time of Joining</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Actual Date of Training to Probation (*)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Actual Date of Probation to Confirmation" type="text" id="date_confrm_trn">
                                                                    </div>
                                                                </div>
                                                               <div class="form-group">
                                                                    <label class="col-md-3 control-label">Actual Date of Probation to Confirmation
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Actual Date of Actual Date of Probation to Confirmation" type="text" id="date_confrm_prob">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">After Trainee Confirmed as (w.e.f  *)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter After Trainee Confirmed as (w.e.f*)" type="text" id="aftr_trn_confrm">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Previous Employer
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Previous Employer" type="text" id="prev_emplyr">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Other Exp (In Yrs)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Other Exp (In Yrs)" type="text" id="othr_exp">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Date of Joining VVF
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Date of Joining VVF" type="text" id="doj_vvf" >
                                                                    </div>
                                                                </div>
                                                                
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">VVF Exp (In Yrs)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter VVF Exp (In Yrs)" type="text" id="vvf_exp" Disabled>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Total Exp (In Yrs)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Total Exp (In Yrs)" type="text" id="tot_exp" Disabled>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Due date for Training to Probation  (Traniee cadre )
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Due date for Training to Probation  (Traniee cadre )" type="text" id="due_date_trn_prob">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Actual Date for Training to Probation  (Traniee cadre )
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Actual Date for Training to Probation  (Traniee cadre )" type="text" id="act_date_trn_prob">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Confirmation Due Date 
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Confirmation Due Date " type="text" id="confirm_due_date">
                                                                    </div>
                                                                </div>
                                                                 
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Confirmation extention date
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Confirmation extention date" type="text" id="confrm_extn_dt">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Confirmation Actual Date
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Confirmation Actual Date" type="text" id="confrm_actl_dt">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                        <a class="btn green" href="#" data-toggle="tab" aria-expanded="false" id="join_detals">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>
                                                                        <a class="btn default" href="#tab_1_3" data-toggle="tab" aria-expanded="false" id="prve3">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true" ></i></a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                         </form>
                                                            </div>
                                                            <!-- END PRIVACY SETTINGS TAB -->
                                                            <!--Begin Promotion Tab-->
                                                             <div class="tab-pane" id="tab_1_5">
                                                                 
                                                                 <form action="#" class="form-horizontal">
                                                                    <div class="form-group">
                                                                    <label class="col-md-3 control-label">Promotion Date
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                         <input class="form-control" placeholder="Enter Promotion Date" type="text" id="promo_dt">
                                                                   </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Designation Before Promotion 
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <!--<input class="form-control" placeholder="Enter Designation Before Promotion" type="text" id="desg_bfr_promo">-->
                                                                       
                                                                                <select class="form-control" id="desg_bfr_promo">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Assistant Manager">Assistant Manager</option>
                                                                                    <option value="Junior Executive">Junior Executive</option>
                                                                                    <option value="Executive">Executive</option>
                                                                                    <option value="Senior Manager">Senior Manager</option>
                                                                                    <option value="Manager">Manager</option>
                                                                                    <option value="Select">Select</option>
                                                                                    <option value="Assistant General Manager">Assistant General Manager</option>
                                                                                    <option value="General Manager">General Manager</option>
                                                                                    <option value="Vice President">Vice President</option>
                                                                                    <option value="Senior Manager 
                                                                                    ">Senior Manager 
                                                                                    </option>
                                                                                </select>
                                                                                <span class="help-block"> Select Designation Before Promotion </span>
                                                                  
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cadre before Promotion
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                              <select class="form-control" id="cdre_bfr_promo">
                                                                                    <option value="">Select</option>
                                                                                    <option value="JMC">JMC</option>
                                                                                    <option value="MMC">MMC</option>
                                                                                    <option value="SMC">SMC</option>
                                                                              </select>
                                                                              <span class="help-block">Select Cadre before Promotion</span>
                                                                    </div>
                                                                </div>
                                                               <div class="form-group">
                                                                    <label class="col-md-3 control-label">Previous Grade
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                            <select class="form-control" id="prev_cadre">
                                                                                    <option value="">Select</option>
                                                                                    <option value="JMC">JMC</option>
                                                                                    <option value="MMC">MMC</option>
                                                                                    <option value="SMC">SMC</option>
                                                                            </select>
                                                                            <span class="help-block">Select Previous Grade</span>
                                                                            <!--   <input class="form-control" placeholder="Enter Previous Grade" type="text" id="prev_cadre"> -->
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Redesignation Date
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <input class="form-control" placeholder="Enter Redesignation Date" type="text" id="redesgn_dt">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Designation Before Redesignation 
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <!--<input class="form-control" placeholder="Enter Designation Before Redesignation " type="text" id="desg_bfr_redesgn">-->
                                                                               
                                                                                <select class="form-control" id="desg_bfr_redesgn">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Assistant Manager">Assistant Manager</option>
                                                                                    <option value="Junior Executive">Junior Executive</option>
                                                                                    <option value="Executive">Executive</option>
                                                                                    <option value="Senior Manager">Senior Manager</option>
                                                                                    <option value="Manager">Manager</option>
                                                                                    <option value="Select">Select</option>
                                                                                    <option value="Assistant General Manager">Assistant General Manager</option>
                                                                                    <option value="General Manager">General Manager</option>
                                                                                    <option value="Vice President">Vice President</option>
                                                                                    <option value="Senior Manager 
                                                                                    ">Senior Manager 
                                                                                    </option>
                                                                                </select>
                                                                                <span class="help-block"> Select Designation Before Redesignation  </span>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cadre before Redesignation 
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control" id="cdr_bfr_redesgn">
                                                                                <option value="">Select</option>
                                                                                <option value="JMC">JMC</option>
                                                                                <option value="MMC">MMC</option>
                                                                                <option value="SMC">SMC</option>
                                                                        </select>
                                                                        <span class="help-block">Select Cadre before Redesignation </span>
                                                                               <!-- <input class="form-control" placeholder="Enter Cadre before Redesignation" type="text" id="cdr_bfr_redesgn"> -->
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Grade before Redesignation  Grade
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control" id="grd_bfr_redgn">
                                                                            <option value="">Select</option>
                                                                            <option value="JMC">JMC</option>
                                                                            <option value="MMC">MMC</option>
                                                                            <option value="SMC">SMC</option>
                                                                        </select>
                                                                        <span class="help-block">Select Grade before Redesignation </span>
                                                                               <!-- <input class="form-control" placeholder="Enter Grade before Redesignation  Grade" type="text" id="grd_bfr_redgn"> -->
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Designation Before Promotion or In Case of Grade change (mention old grade)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                               <!--<input class="form-control" placeholder="Enter Designation Before Promotion" type="text" id="desgn_bfr_promo">-->
                                                                               <select class="form-control" id="desgn_bfr_promo">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Assistant Manager">Assistant Manager</option>
                                                                                    <option value="Junior Executive">Junior Executive</option>
                                                                                    <option value="Executive">Executive</option>
                                                                                    <option value="Senior Manager">Senior Manager</option>
                                                                                    <option value="Manager">Manager</option>
                                                                                    <option value="Select">Select</option>
                                                                                    <option value="Assistant General Manager">Assistant General Manager</option>
                                                                                    <option value="General Manager">General Manager</option>
                                                                                    <option value="Vice President">Vice President</option>
                                                                                    <option value="Senior Manager 
                                                                                    ">Senior Manager 
                                                                                    </option>
                                                                                </select>
                                                                                <span class="help-block"> Select Designation Before Promotion or In Case of Grade change </span>
                                                                    </div>
                                                                </div>
                                                        
                                                                 <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                        <a class="btn green" href="#" data-toggle="tab" aria-expanded="false" id="promo_detals">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>
                                                                        <a class="btn default" href="#tab_1_4" data-toggle="tab" aria-expanded="false" id="prve4">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true" ></i></a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                         </form>
                                                             </div>
                                                            <!-- End Promotion Tab-->
                                                            <!--Begin Transfer Tab-->
                                                             <div class="tab-pane " id="tab_1_6">
                                                                 <form action="#" class="form-horizontal">
                                                                    <div class="form-group">
                                                                    <label class="col-md-3 control-label">Transferred From (Location)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                         <select class="form-control" id="trnsfr_frm_loc">
                                                                           <option value="">Select</option>
                                                                                    <option value="Corporate">Corporate</option>
                                                                                    <option value="Sion">Sion</option>
                                                                                    <option value="Taloja" >Taloja</option>
                                                                                    <option value="Raipur">Raipur</option>
                                                                                    <option value="Kolkata">Kolkata</option>
                                                                                    <option value="Baddi">Baddi</option>
                                                                                    <option value="Tiljala">Tiljala</option>
                                                                                    <option value="Kutch-II">Kutch-II</option>
                                                                                    <option value="Palanpur">Palanpur</option>
                                                                                    <option value="Daman">Daman</option>
                                                                                    <option value="Chennai">Chennai</option>
                                                                                    <option value="New Delhi">New Delhi</option>
                                                                       </select>
                                                                       <span class="help-block"> Select Transferred From (Location)</span>
                                                                   </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Transfer W.e.f (Location)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control" id="tranr_wef_loc">
                                                                                   <option value="">Select</option>
                                                                                    <option value="Corporate">Corporate</option>
                                                                                    <option value="Sion">Sion</option>
                                                                                    <option value="Taloja" >Taloja</option>
                                                                                    <option value="Raipur">Raipur</option>
                                                                                    <option value="Kolkata">Kolkata</option>
                                                                                    <option value="Baddi">Baddi</option>
                                                                                    <option value="Tiljala">Tiljala</option>
                                                                                    <option value="Kutch-II">Kutch-II</option>
                                                                                    <option value="Palanpur">Palanpur</option>
                                                                                    <option value="Daman">Daman</option>
                                                                                    <option value="Chennai">Chennai</option>
                                                                                    <option value="New Delhi">New Delhi</option>
                                                                       </select>
                                                                       <span class="help-block"> Select Transfer W.e.f (Location)</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Transferred From Old Data (Location) 
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="transfr_frm_old_data_loc">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Corporate">Corporate</option>
                                                                                    <option value="Sion">Sion</option>
                                                                                    <option value="Taloja" >Taloja</option>
                                                                                    <option value="Raipur">Raipur</option>
                                                                                    <option value="Kolkata">Kolkata</option>
                                                                                    <option value="Baddi">Baddi</option>
                                                                                    <option value="Tiljala">Tiljala</option>
                                                                                    <option value="Kutch-II">Kutch-II</option>
                                                                                    <option value="Palanpur">Palanpur</option>
                                                                                    <option value="Daman">Daman</option>
                                                                                    <option value="Chennai">Chennai</option>
                                                                                    <option value="New Delhi">New Delhi</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Transferred From Old Data (Location) </span>
                                                                    </div>
                                                                </div>
                                                               <div class="form-group">
                                                                    <label class="col-md-3 control-label">Transfer Old data W.e.f (Location)
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                                <select class="form-control" id="transfr_old_data_wef_loc">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Corporate">Corporate</option>
                                                                                    <option value="Sion">Sion</option>
                                                                                    <option value="Taloja" >Taloja</option>
                                                                                    <option value="Raipur">Raipur</option>
                                                                                    <option value="Kolkata">Kolkata</option>
                                                                                    <option value="Baddi">Baddi</option>
                                                                                    <option value="Tiljala">Tiljala</option>
                                                                                    <option value="Kutch-II">Kutch-II</option>
                                                                                    <option value="Palanpur">Palanpur</option>
                                                                                    <option value="Daman">Daman</option>
                                                                                    <option value="Chennai">Chennai</option>
                                                                                    <option value="New Delhi">New Delhi</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Transferred From Old Data (Location) </span>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Transferred From (Department) 
                                                            </label>
                                                                    <div class="col-md-6">
                                               <!--                                  <select class="form-control" id="transfr_frm_dept">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Corporate">Corporate</option>
                                                                                    <option value="Sion">Sion</option>
                                                                                    <option value="Taloja" >Taloja</option>
                                                                                    <option value="Raipur">Raipur</option>
                                                                                    <option value="Kolkata">Kolkata</option>
                                                                                    <option value="Baddi">Baddi</option>
                                                                                    <option value="Tiljala">Tiljala</option>
                                                                                    <option value="Kutch-II">Kutch-II</option>
                                                                                    <option value="Palanpur">Palanpur</option>
                                                                                    <option value="Daman">Daman</option>
                                                                                    <option value="Chennai">Chennai</option>
                                                                                    <option value="New Delhi">New Delhi</option>
                                                                                </select> -->
                                                                              <?php 
                                                                                 $cluster_name_models = new ClusterForm();
                                                                                 $cluster_name_model = new EmployeeForm();
                                                                               
                                                                                 $records=$cluster_name_model->get_department_list();
                                                                                 
                                                                                 $list = CHtml::listData($records,'Department', 'Department'); 
                                                                                 
                                                                                    echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('id'=>'transfr_frm_dept','class'=>'form-control department','options'=>$records,'empty'=>'Select')); 
                                                                                
                                                                                 ?>
                                                                                <span class="help-block"> Select Transferred From Old Data (Location) </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Transfer W.e.f (Department) </label>
                                                                    <div class="col-md-6">
                            <!--                                             <select class="form-control" id="tranr_wef_dept">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Corporate">Corporate</option>
                                                                                    <option value="Sion">Sion</option>
                                                                                    <option value="Taloja" >Taloja</option>
                                                                                    <option value="Raipur">Raipur</option>
                                                                                    <option value="Kolkata">Kolkata</option>
                                                                                    <option value="Baddi">Baddi</option>
                                                                                    <option value="Tiljala">Tiljala</option>
                                                                                    <option value="Kutch-II">Kutch-II</option>
                                                                                    <option value="Palanpur">Palanpur</option>
                                                                                    <option value="Daman">Daman</option>
                                                                                    <option value="Chennai">Chennai</option>
                                                                                    <option value="New Delhi">New Delhi</option>
                                                                       </select> -->
                                                                                  <?php 
                                                                                 $cluster_name_models = new ClusterForm();
                                                                                 $cluster_name_model = new EmployeeForm();
                                                                               
                                                                                 $records=$cluster_name_model->get_department_list();
                                                                                 
                                                                                 $list = CHtml::listData($records,'Department', 'Department'); 
                                                                                 
                                                                                    echo CHtml::activeDropDownList($cluster_name_model,'Department',$list,array('id'=>'tranr_wef_dept','class'=>'form-control department','options'=>$records,'empty'=>'Select')); 
                                                                                
                                                                                 ?>
                                                                       <span class="help-block"> Select Transfer W.e.f (Department) </span>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                        <a class="btn green" href="#" data-toggle="tab" aria-expanded="false" id="trans_dtls">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>
                                                                        <a class="btn default" href="#tab_1_5" data-toggle="tab" aria-expanded="false" id="prve5">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true" ></i></a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                         </form>
                                                             </div>
                                                             <!--End of Transfer Tab-->
                                                                                                                         <!--Begin leaving Tab-->
                                                             <div class="tab-pane" id="tab_1_7">
                                                                 
                                                                 <form action="#" class="form-horizontal">
                                                                    <div class="form-group">
                                                                    <label class="col-md-3 control-label">Date of Retirement</label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Date of Retirement" type="text" id="dt_retire" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Last working Date
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Last working Date" type="text" id="lst_wrk_dt">
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Attrition Period
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Attrition Period" type="text" id="arrt_prd">
                                                                    </div>
                                                                </div>
                                                               <div class="form-group">
                                                                    <label class="col-md-3 control-label">Date of Resignation
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Date of Retirement" type="text" id="redesign_dt">

                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Reason for Leaving </label>
                                                                    <div class="col-md-6">
                                                                        <textarea class="form-control" row="3" id="reasn_leave" placeholder="Enter Reason for Leaving"></textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                                    <div class="form-group">
                                                                    <label class="col-md-3 control-label">Exit Category </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Exit Category" type="text" id="ext_cat">
                                                                    </div>
                                                                
                                                                </div>
                                                                
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Remarks (If any)</label>
                                                                    <div class="col-md-6">
                                                                        <textarea class="form-control" row="3" id="remark" placeholder="Enter Remarks"></textarea>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-3 control-label">Type of Attrition
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control" id="attr_type">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Resign">Resign</option>
                                                                                    <option value="Retire">Retire</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Type of Attrition</span>
                                                                    </div>
                                                                </div>
                                                                
                                                        
                                                                 <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                        <a class="btn green" href="#" data-toggle="tab" aria-expanded="false" id="leave_dtls">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>
                                                                        <a class="btn default" href="#tab_1_6" data-toggle="tab" aria-expanded="false" id="prve6">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true" ></i></a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                         </form>
                                                             </div>
                                                            <!-- End leaving Tab-->
                                                                                                                         <!--Begin other details Tab-->
                                                             <div class="tab-pane" id="tab_1_8">
                                                                 
                                                                 <form action="#" class="form-horizontal">
                                                                    <!-- <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cost Centre Codes</label>
                                                                    <div class="col-md-6">
                                                                        
                                                                        <input class="form-control" placeholder="Enter Cost Centre Codes from 01-April-2016" type="text" id="cost_center">
                                                                    </div>
                                                                </div> -->

                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cost Centre Codes</label>
                                                                    <div class="col-md-6">
                                                                        
                                                                         <?php 
                                                                                 $cluster_name_models = new ClusterForm();
                                                                                 $costcenter_model = new CostCenter();
                                                                               
                                                                                 $records=$costcenter_model->getCodes();
                                                                                // print_r($records);
                                                                                 $list = CHtml::listData($records,'cost_center', 'cost_center'); 
                                                                                 
                                                                                    echo CHtml::activeDropDownList($costcenter_model,'cost_center',$list,array('id'=>'cost_center','class'=>'form-control cost_center','options'=>$records,'empty'=>'Select')); 
                                                                                
                                                                                 ?>

                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Cost Centre Description
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" placeholder="Enter Cost Centre Description" type="text" id="cost_cenr_descr">
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Employee Status
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control" id="emp_sta">
                                                                                    <option value="">Select</option>
                                                                                    <option value="Active">Active</option>
                                                                                    <option value="Left">Left</option>
                                                                                </select>
                                                                                <span class="help-block"> Select Employee Status</span>
                                                                    </div>
                                                                </div>
                                                              
                                                        
                                                                 <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-6">
                                                                    <!--    <a class="btn green" href="#tab_1_8" data-toggle="tab" aria-expanded="false" id="trans_dtls">Next&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" ></i></a>-->
                                                                        <a class="btn green" href="#" data-toggle="tab" aria-expanded="false" id="save_data">Save&nbsp;&nbsp;</a>
                                                                        <a class="btn default" href="#tab_1_7" data-toggle="tab" aria-expanded="false" id="prve7">Previous&nbsp;&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true" ></i></a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                         </form>
                                                             </div>
                                                            <!-- End other details Tab-->
                                                            </div></div></div></div></div></div></div></div></div></div>