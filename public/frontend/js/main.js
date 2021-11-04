/*price range*/

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};
 // end if
 

/*scroll to top*/

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});
$(document).ready(function() {
    $("#selSize").change(function(){
        var idSize = $(this).val();
        if(idSize == ""){
            return false;
        }
        $.ajax({
            type:'get',
            url:'/get-product-price',
            data:{idSize:idSize},
            success:function(resp){
                // alert(resp); return false;
                var arr = resp.split('#');
                $("#getPrice").html("US $"+arr[0]);
                $("#price").val(arr[0]);
                if(arr[1]==0){
                    $("#cartButton").hide();
                    $("#availability").text("Out of Stock");
                }else{
                    $("#cartButton").show();
                    $("#availability").text("In Stock");
                }
            },error:function(){
                alert("Error");
            }
        })
    });

    //Replace main Image with Alternative image
    $(".altImage").click(function() {
        var image = $(this).attr('src');
        $(".mainImage").attr("src",image);
    });
});
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
    
    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);
    
        e.preventDefault();
    
        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });
    
    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');
    
    $('.toggle').on('click', function() {
        var $this = $(this);
    
        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });

    $(".deleteRecord").click(function(){
        var id =$(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');

       Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, Remove it!',
             reverseButtons:true
           }).then((result) => {
             if (result.isConfirmed) {
               window.location.href="/cart/"+deleteFunction+"/"+id;
             }
           });
    });

$().ready(function(){
    $("#registerForm").validate({
        rules:{
            name:{
                required:true,
                minlength:2,
                lettersonly:true, 
            },
            email:{
                required:true,
                email:true,
                remote:"/check-email"
            },
            password:{
                required:true,
                minlength:6,
            },

        },
        messages:{
            name:{
                required:"Please Enter your name",
                minlength:"Your Name Must be atleast 2 characters long",
                lettersonly:"Your Name must contains letters only",
            },
            email:{
                required:"Please enter your Email",
                email:"Enter a valid email", 
                remote:"This email already exist"   
            },
            password:{
                required:"Please provide a pasword",
                minlength:"Your Password must be atleast 6characters long",    
            }

        }
    });
    $("#forgotPassword").validate({
        rules:{
            email:{
                required:true,
                email:true,
                remote:"/check-login-email"
            }
        },
        messages:{
            email:{
                required:"Please enter your Email",
                email:"Enter a valid email", 
                remote:"This email not exist. Enter a correct email" 
            }
        }
    });
    $("#userLogin").validate({
        rules:{
            email:{
                required:true,
                email:true,
                remote:"/check-login-email"
            },password:{
                required:true,
            }
        },
        messages:{
            email:{
                required:"Please enter your Email",
                email:"Enter a valid email", 
                remote:"This email not exist. Enter a correct email" 
            },password:{
                required:"Please provide a pasword",
            }
        }
    });

    //User account update field validation
    $("#accountForm").validate({
        rules:{
            name:{
                required:true,
                minlength:2,
                
            },
            address:{
                required:true,
            },
            city:{
                required:true,
            },
            state:{
                required:true,
            },
            postcode:{
                required:true,
            },
            mobile:{
                required:true,
            }
        },
        messages:{
            name:{
                required:"Please Enter your name",
                minlength:"Your Name Must be atleast 2 characters long",
            },
            address:{
                required:"Please Enter your Address",
            },
            city:{
                required:"Please Enter your City",
            },
            state:{
                required:"Please Enter your State",
            },
            postcode:{
                required:"Please Enter your Post Code",
            },
            mobile:{
                required:"Please Enter your Phone Number",
            }
        }
    });
    $("#passwordUpdate").validate({
        rules:{
            current_pwd:{
                required:true,
            },
            new_pwd:{
                required:true,
                minlength:6,
                maxlength:20,
            },
            confirm_pwd:{
                required:true,
                equalTo:"#new_pwd"
            },
        },
        messages:{
            current_pwd:{
                required:"Please enter your old Password",
            },
            new_pwd:{
                required:"Please enter your new Password",
                minlength:"Please enter more than 5 charecter",
                maxlength:"Not more than 20 Charecter",
            },
            confirm_pwd:{
                required:"Please enter your confrim Password ",
                equalTo:"Password not match"
            },
        }
    });
    $("#passwordUpdate").click(function(){
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type:'get',
            url: '/user/check_pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if (resp=="false") {
                    $("#current_pwd").removeClass("is-valid");
                    $("#current_pwd").addClass("is-invalid");
                    $("#chkPWD").html("<font color='red'>Current Password is Incorrect</font>");
                }
                else if (resp=="true") {
                    $("#current_pwd").removeClass("is-invalid");
                    $("#current_pwd").addClass("is-valid");
                    $("#chkPWD").html("<font color='green' border='1px solid green'>Current Password is Correct</font>");
                }
            }
        });
    });
 $("#billToship").on('click',function(){
     if(this.checked){
         $("#shipping_name").val($("#billing_name").val());
         $("#shipping_address").val($("#billing_address").val());
         $("#shipping_city").val($("#billing_city").val());
         $("#shipping_state").val($("#billing_state").val());
         $("#shipping_country").val($("#billing_country").val());
         $("#shipping_postcode").val($("#billing_postcode").val());
         $("#shipping_mobile").val($("#billing_mobile").val());
     }else{
        $("#shipping_name").val('');
        $("#shipping_address").val('');
        $("#shipping_city").val('');
        $("#shipping_state").val('');
        $("#shipping_country").val('');
        $("#shipping_postcode").val('');
        $("#shipping_mobile").val('');
     }
 });


    
});

function selectPaymentMethod() {
   if($("#Paypal").is(':checked') || $("#COD").is(':checked')){
   }else{
       alert("select paymethod");
       return false;
   }
    
}
    




