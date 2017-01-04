jQuery(document).ready(function($){
  $("#submit").click(function(event){
    event.preventDefault();
    var name=$("#name").val();
    var countryCode=$("#countryCode").val();
    var contact=$("#contact").val();
    var email=$("#email").val();
    var occupation=$("#occupation").val();
    var age=$("#age").val();
    var gender=$("#gender:checked").val();
    var smoking=$("#smoking:checked").val();
    var alcohol=$("#alcohol:checked").val();
    var height=$("#height").val();
    var heightUnit=$("#heightUnit").val();
    var weight=$("#weight").val();
    var weightUnit=$("#weightUnit").val();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

//alert(name+countryCode+contact+email+occupation+age+gender+smoking+alcohol+height+heightUnit+weight+weightUnit);
$.ajax({
  url:my_ajax_url.ajax_url,
  method:"POST",
  data:{
    action:'store_info',
    'name':name,
    'countryCode':countryCode,
    'contact':contact,
    'email':email,
    'occupation':occupation,
    'age':age,
    'gender':gender,
    'smoking':smoking,
    'alcohol':alcohol,
    'height':height,
    'heightUnit':heightUnit,
    'weight':weight,
    'weightUnit':weightUnit
  },
  dataType:"json",
  encode:true,
  success:function(data){
  console.log(data);
  if(data.status){
            $("form").trigger("reset");
            $("#success").text(data.success);
            $('#yes').fadeIn('fast');
          //console.log(data.success);
            $("#nameErr").text(" ");
            $("#contactErr").text(" ");
            $("#emailErr").text(" ");
            $("#occupationErr").text(" ");
            $("#ageErr").text(" ");
            $("#genderErr").text(" ");
            $("#heightErr").text(" ");
            $("#weightErr").text(" ");

            if(data.success=="Thank You"){
              setTimeout(function() {
                //$("#yes").text("Thank You");
                //$('#yes').fadeIn('fast');
                //$('#yes').delay(5000);
                $('#success').fadeOut('slow');
              }, 2000);
            }
          }
          else{
            console.log(data.errors);
            if(data.errors[0]){
              $("#nameErr").text(data.errors[0]);
            }
            if(data.errors[1]){
              $("#contactErr").text(data.errors[1]);

            }
            if(data.errors[2]){
              $("#emailErr").text(data.errors[2]);

            }

            if(data.errors[3]){
               $("#occupationErr").text(data.errors[3]);

             }
             if(data.errors[4]){
                $("#ageErr").text(data.errors[4]);

              }
               if(data.errors[5]){
                  $("#genderErr").text(data.errors[5]);

                }
                if(data.errors[6]){
                   $("#heightErr").text(data.errors[6]);

                 }
                 if(data.errors[7]){
                    $("#weightErr").text(data.errors[7]);

                  }
          }
  }


});
  });
})
